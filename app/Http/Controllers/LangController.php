<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function switchLang(Request $request, $lang){
        if(array_key_exists($lang, config('app.languages'))){
            $request->session()->put('mylocale', $lang);
        }
        return back();
    }
}
