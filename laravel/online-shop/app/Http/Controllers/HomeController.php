<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function index()
    {
        return view('index')->with([
            'categories' => Category::all(),
            'products' => Product::all()
        ]);

    }
    function sendOrder(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required'
        ];
        $request->validate($rules);
        dd($request->all());

    }
    function checkout()
    {$products = Product::getCart();
        //subtotal
        $subTotal = 0;
        foreach ($products as $product) {
            $subTotal += $product['quantity'] * ($product['price'] * (1 - $product['discount']));
        }
        //shipping
        $shipping = 0;
        foreach ($products as $product) {
            $shipping += $product['quantity'] * 10;
        }
        $total = $shipping + $subTotal;
        return view('checkout')->with([
            'products' => $products,
            'total'=> $total,
            'subTotal'=> $subTotal,
            'shipping'=> $shipping
        ]);

    }
    function cart()
    {
        $products = Product::getCart();
        //subtotal
        $subTotal = 0;
        foreach ($products as $product) {
            $subTotal += $product['quantity'] * ($product['price'] * (1 - $product['discount']));
        }
        //shipping
        $shipping = 0;
        foreach ($products as $product) {
            $shipping += $product['quantity'] * 10;
        }
        $total = $shipping + $subTotal;

        return view('cart')->with([
            'products'=> $products,
            'total'=> $total,
            'subTotal'=> $subTotal,
            'shipping'=> $shipping
        ]);

    }
    public static function getCart(){
        $products = [];
        $ids = session()->get('ids', []);
        $ids = array_count_values($ids);
        foreach($ids as $id=>$quantity){
            $product= Product::findOrFail($id);
            $product['quantity'] = $quantity;
            array_push($products, $product);
        }
    }
    function editCart(){
        $products = Product::getCart();
        $id = $_GET['id'];
        $comm = $_GET['comm'];
        $ids = session()->get('ids', []);

        switch($comm){
            case 1:
                $gto = false;
                foreach($products as $product){
                    if($product['id']==$id){
                        if ($product['quantity'] > 1)
                            $gto = true;
                    } }
                if ($gto) {
                    for ($i = 0; $i < count($ids); $i++) {
                        if ($ids[$i] == $id) {
                            \array_splice($ids, $i, 1);
                            break;
                        }
                    }
                };break;
            case 2: array_push($ids, $id);break;
            case 3:
                for ($i = 0; $i < count($ids); $i++) {
                    if ($ids[$i] == $id) {
                        \array_splice($ids, $i, 1);
                        $i -= 1;
                    }
                }
                    ;break;
            }
        
        

        Session::put('ids', $ids);
        return redirect()->route('cart');

    }

    function shop(Request $request)
    {
        $query = Product::query();

        $inputs = $request->all();

        if (isset($inputs['keywords'])) {
            $query = $query->where('name', 'like', "%" . $inputs['keywords'] . "%");
        }
        if (isset($inputs['color'])) {
            if (!in_array('-1', $inputs['color'])) {

                $query = $query->whereIn('color_id', $inputs['color']);
            }
        }
        if (isset($inputs['size'])) {
            if (!in_array('-1', $inputs['size'])) {
                $query = $query->whereIn('size_id', $inputs['size']);
            }
        }

        if ($request->has('category_id')) {
            $query = $query->where('category_id', $request->get('category_id'));
        }

        if ($request->has('price')) {
            if (!in_array('-1', $inputs['price'])) {
                $query = $query->where(function ($q) use ($inputs) {
                    foreach ($inputs['price'] as $price) {
                        $q = $q->orWhereBetween('price', [$price, $price + 100]);
                    }
                });
            }
        }

        /*SELECT * FROM Products WHERE con1 and con2 and (
        price between 0 and 100 or
        price between 100 and 200
        )
        */
        $products = $query->paginate(9);


        return view('shop')->with([
            'products' => $products,
            'colors' => Color::all(),
            'sizes' => Size::all()
        ]);
    }
    function add_product(Request $request)
    {
        if ($request->has('id')) {
            $ids = Session::get('ids', []);
            array_push($ids, $request->get('id'));
            Session::put('ids', $ids);
            return response()->json('Data addedd successfully');
        }
        return abort(404);
    }

}