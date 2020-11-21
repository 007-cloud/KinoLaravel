<?php

namespace App\Http\Controllers;


use App\Events\ProductPurchased;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        // request()->user()->notify(new PaymentReceived(1000));

        ProductPurchased::dispatch();

        return redirect(route('payments.create'));
    }
}
