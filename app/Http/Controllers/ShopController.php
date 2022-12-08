<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function confirm(Cart $cart){
        $cart->update([
           'status' => 'confirmed'
        ]);
        return back()->with('message', 'Confirmed');
    }

    public function cart(){
        $cart = Cart::where('status', 'ordered')->with(['shop', 'user'])->get();
        return view('adm.cart', ['cart' => $cart]);
    }

    public function buy(){
        $buy = Auth::user()->postswithStatus('in_cart')->allRelatedIds();
        foreach($buy as $b){
            Auth::user()->postswithStatus('in_cart')->updateExistingPivot($b, ['status' => 'ordered']);
        }
        return back()->with('message', 'You have purchased this item.Please waiting for confirm');
    }

    public function deleteCart(Shop $shop){
        $cart =  Auth::user()->postswithStatus('in_cart')->where('shop_id', $shop->id)->get();
        if ($cart != null)
            Auth::user()->postswithStatus('in_cart')->detach($shop->id);
        return view('cart.index',['cart' => $cart])->with('error', 'Deleted from cart');
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
        return back()->with('message', 'Successfully added in cart');
    }

    public function cartIndex(){
        $x = Auth::user()->postswithStatus('in_cart')->get();
        return view('cart.index', ['cart' => $x]);
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
            'image' =>'required|image|mimes:jpg,png,jpeg,svg|max:2048',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
        ]);

        $fillname = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('shops', $fillname, 'public');
        $validated ['image'] = '/storage/'.$image_path;
        Auth::user()->shops()->create($validated);

        return redirect()->route('adm.shops.product')->with('message', 'Saved successfully');
    }

    public function edit(Shop $shop){
        return view('adm.shops.edit', ['shop' => $shop, 'manufacturer' => Manufacturer::all(), 'categories' => Category::all()]);
    }

    public function update(Request $request, Shop $shop){
        $shop->update([
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
        return redirect()->route('adm.shops.product',['manufacturer' => Manufacturer::all()])->with('message', 'Updated Successfully');
    }

    public function destroy(Shop $shop){
        $shop->delete();
        return redirect()->route('adm.shops.product')->with('error','Deleted');
    }
}
