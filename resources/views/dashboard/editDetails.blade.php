@extends('layouts.base')
    

@section('content')
    
<div class="container">

    <pre class="text-black mt-5"><a href="{{route('index')}}">Home</a>  >  <a href="{{route('getProductDetails')}}">Products Details</a>  >  Edit</pre>

    <h2 class="text-black mt-5">Product detail edit</h2>

    <div class="row mt-5">
        <div class="col">
            <div class="card w-50">
                <div class="card-header bg-primary text-white">Add new details for product <strong>{{$productDetails->productName}}</strong></div>
                <div class="card-body">

                    <form action="{{ route('updateDetails') }}" method="post" class="text-black">
                        @csrf
                        <input type="hidden" name="id" value="{{$productDetails->productID}}">
                        <input type="hidden" name="productID" value="{{$productDetails->id}}">
                        <div class="row mt-3">
                            <div class="col">
                                <label for="color"class="text-black" >Color</label>
                                <input type="text" name="color" class="form-control p-1 text-black @error('color')  is-invalid @enderror" value="{{$productDetails->color}}">
                            </div>

                            <div class="col">
                                <label for="price"class="text-black" >Price</label>
                                <input type="float" name="price" class="form-control p-1 text-black @error('color')  is-invalid @enderror" value="{{$productDetails->price}}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <label for="qty"class="text-black" >Quantity</label>
                                <input type="integer" name="qty" class="form-control p-1 text-black @error('color')  is-invalid @enderror" value="{{$productDetails->qty}}">
                            </div>

                            <div class="col">
                                <label for="description"class="text-black" >Description</label>
                                <input type="text" name="description" class="form-control p-1 text-black @error('color')  is-invalid @enderror" value="{{$productDetails->description}}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label for="image"class="text-black" >Image</label>
                            <input type="text" name="image" class="form-control p-1 text-black @error('image')  is-invalid @enderror" value="{{$productDetails->image}}">
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