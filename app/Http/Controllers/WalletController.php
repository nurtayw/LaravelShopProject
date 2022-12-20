<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(Wallet $wallet){
        $wallet = Wallet::all();
        return view('wallet.index', ['wallet' => $wallet]);
    }

    public function create(){
        return view('wallet.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
           'money' => 'required|numeric',
           'wallet_id' => 'numeric'
        ]);
        Auth::user()->wallets()->create($validated);
        return redirect()->route('wallet.index');
    }

    public function edit(Wallet $wallet){
        return view('wallet.edit', ['wallet' => $wallet])->with('message', __('messages.w_add'));
    }

    public function update(Request $request, Wallet $wallet){
        $wallet->update([
            'money' => $request->input('money'),
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->route('wallet.index')->with('message', __('messages.w_u'));
    }

    public function destroy(Wallet $wallet){
        $wallet->delete();
        return redirect()->route('wallet.index')->with('error', __('messages.w_d'));
    }
}
