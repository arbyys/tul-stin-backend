<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexIncoming()
    {
        $currencies = Currency::all();

        return view('pages.incoming-payment', [
            "currencies" => $currencies,
        ]);
    }

    public function indexOutcoming()
    {
        $currencies = Currency::all();

        return view('pages.outcoming-payment', [
            "currencies" => $currencies,
        ]);
    }

    public function newIncomingPayment(Request $request) {
        dd($request->all());
    }
    public function newOutcomingPayment(Request $request) {
        $validatedData = $request->validate([
            'amount' => 'required|integer|min:0',
            'currency' => 'required|exists:currencies,code',
        ]);

        dd($validatedData);

        return redirect()->back()->with([
            "success" => "Platba úspěšně zpracována"
        ]);
    }
}
