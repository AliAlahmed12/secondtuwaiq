<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\productDetails;
use App\Models\cart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{

    public function getCoffe()
    {
        $response=Http::get('https://api.sampleapis.com/coffee/hot');
        return view('shopping.coffe', ['data'=>$response->object()]);   
    }

//     https://v1.baseball.api-sports.io/leagues
// Key : 
// Name : X-RapidAPI-Key
// Value : 24c939c2ba293c859d5ecd476932d293


    public function users()
    {
        $apiUrl = 'https://jsonplaceholder.typicode.com/users';
            $headers=[
                'content-type' => 'appliccation/json'
            ];

        $response=Http::withHeaders($headers)->get($apiUrl, [
            'email' => 'Shanna@melissa.tv'
        ]);

        $data=$response->json();

        return Response()->json($data);   
    }



    public function showListItems(){

        $data = DB::table('products')
        ->Join('product_details', 'products.id', '=', 'product_details.productID')
        ->get();

        $tax=0.15;
        $discount=10/100;

        foreach($data as $key => $row)
        {

            $data[$key]->total=($data[$key]->price*$tax)+$data[$key]->price;
            $data[$key]->discount=$discount;
            $data[$key]->tax=$tax;
            $data[$key]->net=$data[$key]->total - ($data[$key]->discount * $data[$key]->total);
        }
        return view('shopping.list-items', ['product'=>$data]);
    }



    public function showDetails($id){

        
        $data = DB::table('products')
        ->Join('product_details', 'products.id', '=', 'product_details.productID')
        ->where('product_details.id', '=', $id)
        ->first();

        $tax=0.15;
        $discount=10/100;

        $data->total=($data->price*$tax)+$data->price;
        $data->discount=$discount;
        $data->tax=$tax;
        $data->net=$data->total - ($data->discount * $data->total);
        
        
        return view('shopping.showDetails', ['data'=>$data]);
    }


    public function add_to_cart(Request $request, $id)
    {
        $userId=$request->user()->id;
        $data = DB::table('products')
        ->Join('product_details', 'products.id', '=', 'product_details.productID')
        ->where('product_details.id', '=', $id)
        ->first();

        $tax=0.15;
        $discount=10/100;

        $data->total=($data->price*$tax)+$data->price;
        $data->discount=$discount;
        $data->tax=$tax;
        $data->net=$data->total - ($data->discount * $data->total);

        $row=[
            'productid'=> $data->id,
            'qty'=> $data->qty,
            'price'=> $data->price,
            'tax'=> $data->tax,
            'discount'=> $data->discount,
            'net'=> $data->net,
            'userID'=> $userId,
        ];

        
        DB::table('carts')->insert($row);

        $count = DB::table('carts')
        ->where('userID', '=', $userId)
        ->count();

        Session::put('count', $count);

        return Redirect()->back();
    }


    public function cart(Request $request)
    {
        $userId=$request->user()->id;

        $data=DB::table('carts')
        ->where('userID', '=', $userId)
        ->join('product_details', 'carts.productid', '=', 'product_details.id')
        ->join('products', 'product_details.productID', '=', 'products.id')
        ->get();


        $groupedCart = $data->groupBy('productid')->map(function ($group) {  // Map allows you to iterate over each item in a collection and transform or modify them based on a callback function.
            $firstItem = $group->first();
            $firstItem->count = $group->count();
            return $firstItem;
        });

        $lastPrice = 0;
        $totalNet = 0;
        foreach ($groupedCart as $item) {
            $lastPrice += $item->price * $item->count ;
            $totalNet += $item->net * $item->count;
        }
    
        
        $total=[
            'lastPrice' => $lastPrice,
            'totalNet' => $totalNet

        ];


        return view('shopping.cart', ['cart'=>$groupedCart, 'total' => $total]);
    }



    public function delItem($id)
    {
        $cart = cart::where('productid', $id);
        $cart->delete();

        return Redirect('/store/cart');
    }
}
