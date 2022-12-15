<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Shop;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function confirm(Cart $cart){
        $cart->update([
           'status' => 'confirmed'
        ]);
        return back()->with('message', __('validation.confirm_pro'));
    }

    public function cart(){
        $cart = Cart::where('status', 'ordered')->with(['shop', 'user'])->get();
        return view('adm.cart', ['cart' => $cart]);
    }

    public function buy(Wallet $wallet, User $user){
        $sum = 0;
        $prices = Auth::user()->BoughtCart()->where('status', 'in_cart')->get();
        foreach($prices as $q){
            $sum = ($sum + $q->price);
        }
        if(Auth::user()->wallets()->first()->money >= $sum) {
            $buy = Auth::user()->postswithStatus('in_cart')->allRelatedIds();
            foreach ($buy as $b) {
                Auth::user()->postswithStatus('in_cart')->updateExistingPivot($b, ['status' => 'ordered']);
            }
        }else{
            return back()->with('error', __('messages.no_cash'));
        }
        $new =  Auth::user()->wallets()->first()->money - $sum;
        return back()->with('message', __('validation.buy_cart'));
    }

    public function cartIndex(){
        $x = Auth::user()->postswithStatus('in_cart')->get();
        return view('cart.index', ['cart' => $x]);
    }

    public function deleteCart(Shop $shop){
        $cart =  Auth::user()->postswithStatus('in_cart')->get();
        if ($cart != null)
            Auth::user()->postswithStatus('in_cart')->detach($shop->id);
        return view('cart.index',['cart' => $cart])->with('error', __('validation.delete'));
    }

    public function addCart(Request $request, Shop $shop){
        $carts = Auth::user()->postswithStatus('in_cart')->where('shop_id', $shop->id)->first();
        if($carts != null){
            Auth::user()->postswithStatus('in_cart')->updateExistingPivot($shop->id,
                [
                    'color' => $request->input('color'),
                    'quantity' => $carts->pivot->quantity+$request->input('quantity'),
                ]);
        }else{
            Auth::user()->postswithStatus('in_cart')->attach($shop->id,
            [
                'color' => $request->input('color'),
                'quantity' => $request->input('quantity')
            ]);
        }
        return back()->with('message', __('validation.add_cart'));
    }

    public function shopManufacturer(Manufacturer $manufacturer){
        return view('adm.shops.index', ['shops' => $manufacturer->shops, 'manufacturer' => Manufacturer::all()]);
    }

    public function shopCategory(Category $category){
        return view('adm.shops.index', ['shops' => $category->shops, 'categories' => Category::all()]);
    }

    public function show(Shop $shop){
        return view('adm.shops.show', ['shop' => $shop, 'categories' => Category::all()]);
    }

    public function product(Request $request){
        if ($request->search){
            $shops = Shop::where('name', 'LIKE', '%' .$request->search. '%')
                ->with('manufacturer')->get();
        }else{
            $shops = Shop::with('manufacturer')->get();
        }
        return view('adm.shops.product', ['products' => $shops, 'product'=>Shop::all()]);
    }

    public function index(){
        $all = Shop::with('category')->get();
        return view('adm.shops.index',['shops'=>$all, 'categories' => Category::all(), 'manufacturer' => Manufacturer::all()]);
    }

    public function create(){
        return view('adm.shops.create', ['manufacturer' => Manufacturer::all(), 'categories' => Category::all()]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_kz' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_ita' => 'required|string|max:255',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
            'description' => 'required',
            'description_kz' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'description_ita' => 'required',
            'image' =>'required|image|mimes:jpg,png,jpeg,svg,pdf|max:2048',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
        ]);

        $fillname = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('shops', $fillname, 'public');
        $validated ['image'] = '/storage/'.$image_path;
        Auth::user()->shops()->create($validated);

        return redirect()->route('adm.shops.product')->with('message', __('validation.save_pst'));
    }

    public function edit(Shop $shop){
        return view('adm.shops.edit', ['shop' => $shop, 'manufacturer' => Manufacturer::all(), 'categories' => Category::all()]);
    }

    public function update(Request $request, Shop $shop){
         $validated = $request->validate([
            'name' => $request->input('name'),
            'name_kz' => $request->input('name_kz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'name_ita' => $request->input('name_ita'),
            'price' => $request->input('price'),
            'size' => $request->input('size'),
            'description' => $request->input('description'),
            'description_kz' => $request->input('description_kz'),
            'description_en' => $request->input('description_en'),
            'description_ita' => $request->input('description_ita'),
            'description_ru' => $request->input('description_ru'),
            'image' => $request->input('image'),
            'manufacturer_id' => $request->input('manufacturer_id'),
            'category_id' => $request->input('category_id'),
        ]);
        Auth::user()->shops()->update($validated);
        return redirect()->route('adm.shops.product',['manufacturer' => Manufacturer::all()])->with('message', __('validation.update_pst'));
    }

    public function destroy(Shop $shop){
        $shop->delete();
        return redirect()->route('adm.shops.product')->with('error', __('validation.delete_pst'));
    }
}
