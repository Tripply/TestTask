<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PurchaseController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $totalSum = $request->summ - $request->discount;

        if ($totalSum > 0) {
            Purchase::create([
                'customer_id' => $request->customer_id,
                'purchase_amount' => $totalSum,
            ]);
        }

        return Redirect::route('dashboard');
    }
}
