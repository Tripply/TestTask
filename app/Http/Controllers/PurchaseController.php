<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function create(Request $request): void
    {
        $totalSum = $request->summ - $request->discount;

        if ($totalSum > 0){
            Purchase::create([
                'customer_id' => $request->customer_id,
                'purchase_amount' => $totalSum,
            ]);
        }
    }
}
