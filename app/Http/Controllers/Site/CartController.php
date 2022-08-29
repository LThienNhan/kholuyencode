<?php

namespace App\Http\Controllers\Site;

use Cart;
use DB;
use Auth;
use App\Models\User;
use App\Models\Carts;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CartContract;

class CartController extends Controller
{

    public function __construct(CartContract $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getCart()
    {
        return view('site.pages.cart');
    }

    // public function seesion($id)
    // {
    //     $data = User::find($id);
    //     $data->archives = 'session'; 
    //     $data->save();
    //     return redirect('/');
    // }

    // public function database($id)
    // {
    //     // khi người dùng chưa đăng nhập tài khoản và tài khoản chưa chọn kho lưu trữ, 
    //     //nếu người dùng chọn cho lưu trữ là database thì các sản phẩm đã thêm trước đó có trong 
    //     //session sẽ bị xóa đi để lưu sản phẩm của cho database
    //     Cart::clear();
    //     $data = User::find($id);
    //     $data->archives = 'database'; 
    //     $data->save();
    //     return redirect('/');
    // }

    public function addToCartSession(Request $request)
    {
        $product = $this->cartRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function addToCartDB(Request $request)
    {
        $product = $this->cartRepository->storeCartDetails($request->all());
        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function update(Request $request, $id)
    {   
        $this->cartRepository->updateSession($request->all(), $id);
        return redirect()->back()->with('message', 'Item update successfully.');
    }

    public function updateDB(Request $request, $id)
    {   
        $this->cartRepository->updateDatabase($request->all(), $id);

        return redirect()->back()->with('message', 'Item update successfully.');
    }
    
    public function removeItem($id)
    {
        Cart::remove($id);
        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function removeItemDB($id)
    {
        CartItem::where('id',$id)->delete();
        $count = CartItem::select()->where('id',$id)->get()->count();
        if ( $count > 0) {
            return redirect()->back()->with('message', 'Item removed from cart successfully.');
        } else {
            return redirect('/');
        }
    }

    public function clearCart()
    {
        Cart::clear();
        return redirect('/');
    }

    public function clearCartDB()
    {
        $this->cartRepository->clearCartDatabase();
        return redirect('/');
    }
}