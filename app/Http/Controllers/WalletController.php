<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        return view('wallet.index');
    }

    public function create(){
        return view('wallet.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
           'money' => 'required|numeric',
        ]);
        Wallet::create($validated);
        return redirect()->route('wallet.index');
    }
}
