<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        $all = Wallet::all();
        return view('wallet.index', ['wallet' => $all]);
    }

    public function create(){
        return view('wallet.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
           'money' => 'required|numeric'
        ]);
        Auth::user()->wallets()->create($validated);
        return redirect()->route('wallet.index');
    }
}
