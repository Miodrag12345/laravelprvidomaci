<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartAddRequest;
use App\Models\Orders;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\OrderItems;


class ShoppingCartController extends Controller
{

    public function index()
    {






        $combined=[];
        foreach (Session::get('product') as $item){
            $product=ProductsModel::firstWhere(['id'=>$item['product_id']]);
            if($product){
                $combined[]=[
                    'name'=>$product->name,
                    'amount'=>$item->amount,
                     'price'=>$product->price,
                     'total'=>$item['amount']*$product->price
                ];
            }
        }

       return view("cart" , [
            'combinedItems'=>$combined

       ]);
    }

    public function finishOrder()
    {
        $korpa = Session::get('product', []);
        $totalCartPrice = 0;

        // prvo izračunamo ukupnu cenu
        foreach ($korpa as $item) {
            $product = ProductsModel::firstWhere('id', $item['product_id']);
            $totalCartPrice += $item['amount'] * $product->price;
        }

        // sada kreiramo order
        $order = Orders::create([
            'user_id' => Auth::id(),
            'price'   => $totalCartPrice
        ]);

        // sada prolazimo opet i pravimo order items
        foreach ($korpa as $item) {
            $product = ProductsModel::firstWhere('id', $item['product_id']);

            $product->amount -= $item['amount'];
            $product->save();

            OrderItems::create([
                'order_id'   => $order->id,
                'product_id' => $product->id,
                'amount'     => $item['amount'],
                'price'      => $item['amount'] * $product->price
            ]);
        }

        Session::remove("product");

        return view("thankYou");
    }

    public function addToCart(CartAddRequest $request)
    {
        $product=ProductsModel::firstWhere(['id'=>$request->id])->first(); // imamo proizvod taj
        if($product->amount<$request->amount){
            return redirect ()->back();
        }

        Session::push('product', [
            'product_id'=>$request->id,
            'amount'=>$request->amount,

        ]);



        return redirect()->route('cart.index');
    }
}


