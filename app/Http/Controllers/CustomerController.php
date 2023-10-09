<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use App\Services\SmsService;
use App\Traits\CleanPhoneNumberTrait;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CustomerController extends Controller
{
    use CleanPhoneNumberTrait;

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): View
    {
        $customers = Customer::leftJoin('purchases', 'customers.id', '=', 'purchases.customer_id')
            ->select('customers.id', 'customers.name', 'customers.phone_number', DB::raw('SUM(purchases.purchase_amount) as total_purchase_amount'), DB::raw('COUNT(purchases.customer_id) as purchase_count'))
            ->groupBy('customers.id', 'customers.name')
            ->get();

        return view('customers', compact('customers'));
    }

    /**
     * @param int $customerId
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(int $customerId): View
    {
        $customer = Customer::leftJoin('purchases', 'customers.id', '=', 'purchases.customer_id')
            ->select('customers.id', 'customers.name', 'customers.phone_number', DB::raw('COUNT(purchases.customer_id) as purchase_count'))
            ->where('customers.id', $customerId)
            ->groupBy('customers.id', 'customers.name')
            ->get()
            ->first();

        $discount = $this->discountCalculate($customer->purchase_count);

        return view('customer', compact('customer', 'discount'));
    }

    /**
     * @param CustomerStoreRequest $request
     * @return void
     */
    public function update(CustomerStoreRequest $request): void
    {
        $request->phone_number = self::cleanPhoneNumber($request->phone_number);

        $customer = Customer::find($request->id);
        $customer->update([
            'name' => $request->name,
            'phone_number' => $request->$request->phone_number,
        ]);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request): void
    {
        Customer::destroy($request->id);
    }

    /**
     * @param CustomerStoreRequest $request
     * @return void
     */
    public function create(CustomerStoreRequest $request)
    {
        $request->phone_number = self::cleanPhoneNumber($request->phone_number);

        $customer = Customer::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        $this->generateQRCode($customer->id);
        $this->sendSms($request->phone_number, $customer->id);
    }

    /**
     * @param int $customerId
     * @return void
     */
    public function generateQRCode(int $customerId)
    {
        $customerLink = route('customer.show', $customerId);
        $qrCode = QrCode::create($customerLink)
            ->setSize(600)
            ->setMargin(40);

        $qrCodeImagePath = public_path("qrcodes/{$customerId}.png");
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $result->saveToFile($qrCodeImagePath);
    }

    /**
     * @param string $phoneNumber
     * @param int $id
     * @return void
     */
    public function sendSms(string $phoneNumber, int $id): void
    {
        $smsService = new SmsService();
        $smsService->sendSms($phoneNumber, config('app.url', 'http://127.0.0.1:8000')."/customer/qr/{$id}");
    }

    /**
     * @param int $visitCount
     * @return int
     */
    public function discountCalculate(int $visitCount): int
    {
        $discount = 0;

        if ($visitCount === 3) {
            $discount = 5;
        } elseif ($visitCount === 5) {
            $discount = 10;
        } elseif ($visitCount === 8) {
            $discount = 5;
        } elseif ($visitCount === 10) {
            $discount = 10;
        }

        return $discount;
    }

    /**
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function showQr(int $id): View
    {
        return view('show-code', compact('id'));
    }
}
