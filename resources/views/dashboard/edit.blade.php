@extends('layouts.base')
    

@section('content')
    
<div class="container">

    <pre class="text-black mt-5"><a href="{{route('index')}}">Home</a>  >  <a href="{{route('product')}}">Products</a>  >  Edit</pre>

    <h2 class="text-black mt-5">Product edit</h2>

    <div class="row mt-5">
        <div class="col">
            <div class="card w-50">
                <div class="card-header bg-primary text-white">Add New Product</div>
                <div class="card-body">

                    <form action="{{ route('update') }}" method="post" class="text-black">
                        @csrf
                        <input type="hidden" name="id" class="text-black" value="{{$product['id']}}">
                        <div class="row mt-3">
                            <div class="col d-flex flex-column text-center align-items-center">
                                <label for="productName"class="text-black" >Product Name</label>
                                <input type="text" name="productName" class="input-group-prepend p-1 text-black" value="{{$product['productName']}}">
                        </div>
        
                        <div class="row mt-5">
                            <div class="col text-center ">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>
    </div>


</div>
@endsection