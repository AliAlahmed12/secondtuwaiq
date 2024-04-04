<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\productDetails;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class Dashboard extends Controller
{
    // public function __construct()
    // {
    //   $this->middleware('auth');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        return view('auth.login');
    }

    // ---------------------------------------------------------------------------------------------------------

    public function index()
    {
        Session::put('data','Welcome to Tuwaiq');
        // {{Session::get('data')}} for print it in view

        Cookie::queue('A', 'Here my cookie', '1');
        return view('dashboard.index');
    }

    // ---------------------------------------------------------------------------------------------------------

    // ---------------------------------------------------------------------------------------------------------
    public function getProducts(Request $request)
    {
        if (empty($request->all())) {
            $products = Product::all();
            return view('dashboard.product', ['products' => $products]);
        }


        elseif ($request->has('productName')) {
            $products = Product::where('productName', 'LIKE', '%' . $request->input('productName') . '%')->get();
            return view('dashboard.product', ['products' => $products]);

        }
    
    }


    public function createProduct(Request $request)
    {

        $request->validate([
            'productName' => 'required',
        ]);


        $products=product::create([
            'productName'=>$request->productName
        ]);

        

        $products->save;
        return Redirect('/dashboard/products');
    }


    public function del($id)
    {
        $product=product::find($id);
        $product->delete();
        return Redirect('/dashboard/products')->with('success', 'Product deleted succesfully');
    }


    public function edit($id)
    {
        $products=product::find($id);
        return view('dashboard.edit',['product'=> $products]);
    }


    public function update(Request $request)
    {


        $products=product::where('id',$request->id)->update([
            'productName'=>$request->productName,
        ]);
        return Redirect('/dashboard/products')->with('success', 'Product name changed succesfully');
    }


    public function filter(Request $request)
    {

    
        
        if ($request->has('startDate')) {
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
    
            $products = DB::table('products')
            ->whereDate('products.created_at', '>=', $startDate)
            ->whereDate('products.created_at', '<=', $endDate)
            ->get();

            return view('dashboard.product', ['products' => $products]);

        }
    }

    // ---------------------------------------------------------------------------------------------------------


    // ---------------------------------------------------------------------------------------------------------
    public function getProductDetails()
    {
        $product=product::all();

        $productDetails = DB::table('products')
        ->Join('product_details', 'products.id', '=', 'product_details.productID')
        ->get();

        return view('dashboard.product_details', ['productDetails'=>$productDetails, 'products'=>$product]);
    }


    public function createProductDetails(Request $request)
    {

        $request->validate([
            'color' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048', // Adjust the validation rules as needed
        ]);

        $fileName = '/assets/img/' . time() . '.' . $request->image->extension();

        $request->image->move(public_path('/assets/img/'), $fileName);


        $productDetails=productDetails::create([
            'color'=>$request->color,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description,
            'productID'=>$request->productID,
            'image' => $fileName
        ]);

        $productDetails->save();

        return Redirect('/dashboard/productdetails');
    }


    public function searchProductDetails(Request $request)
    {

        if($request->has('productDetailsName')) {

            $product=product::all();
            $productDetails = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_details.productID')
            ->where('products.productName', 'LIKE', '%' . $request->productDetailsName . '%')
            ->get();

            return view('dashboard.product_details', ['productDetails'=>$productDetails, 'products'=>$product]);

        } elseif($request->has('startDate')){
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');

            $product=product::all();
            $productDetails = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_details.productID')
            ->whereDate('product_details.created_at', '>=', $startDate)
            ->whereDate('product_details.created_at', '<=', $endDate)
            ->get();

            return view('dashboard.product_details', ['productDetails'=>$productDetails, 'products'=>$product]);
        }

    }


    public function delProductDetails($id)
    {
        $productDetails=productDetails::find($id);
        $productDetails->delete();
        return Redirect('/dashboard/productdetails');
    }

    public function editProductDetails($id)
    {

        $productDetails = DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.productID')
        ->where('product_details.id', $id)
        ->select('products.productName', 'product_details.*')
        ->first();

        return view('dashboard.editDetails', ['productDetails'=>$productDetails]);
    }


    public function updateDetails(Request $request)
    {

        $validated = $request->validate([
            'color' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'description' => 'required',
        ]);


        $productDetails=productDetails::where('id',$request->id)->update([
            'productID'=>$request->productID,
            'color'=>$request->color,
            'qty'=>$request->qty,
            'price'=>$request->price,
            'description'=>$request->description,
        ]);
        return Redirect('/dashboard/productdetails')->with('success', 'Product name changed succesfully');
    }


    // ---------------------------------------------------------------------------------------------------------

}
