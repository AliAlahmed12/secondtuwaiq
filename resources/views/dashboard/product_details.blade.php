@extends('layouts.base')
    

@section('content')
    
<div class="container">
    
    <pre class="text-black mt-5"><a href="{{route('index')}}">Home</a>  >  Product Details</pre>

    <h2 class="text-black mt-5">Product Details</h2>
    <div class="row mt-5">
        <div class="col">
            <!-- Button trigger modal -->
            
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Add product Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('createProductDetails')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-2">
                                    <div class="col">
                                        <select class="form-select" name="productID">
                                            @foreach ($products as $item)
                                                <option value="{{$item->id}}" class="text-black">{{$item->productName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col text-black">
                                        <label for="color" class="text-dark">Color</label>
                                        <input type="text" class="form-control @error('color')  is-invalid @enderror" name="color">
                                        @error('color') <span class="invalid-feedback" role="alert"> {{ $message }} </span> @enderror
                                    </div>
                                    <div class="col">
                                        <label for="price" class="text-dark">Price</label>
                                        <input type="number" class="form-control @error('price')  is-invalid @enderror" name="price">
                                        @error('price') <span class="invalid-feedback" role="alert"> {{ $message }} </span> @enderror
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col text-black">
                                        <label for="description" class="text-dark">Description</label>
                                        <input type="text" class="form-control @error('description')  is-invalid @enderror" name="description">
                                        @error('description') <span class="invalid-feedback" role="alert"> {{ $message }} </span> @enderror
                                    </div>
                                    <div class="col">
                                        <label for="qty" class="text-dark">Quantity</label>
                                        <input type="number" class="form-control @error('qty')  is-invalid @enderror" name="qty">
                                        @error('qty') <span class="invalid-feedback" role="alert"> {{ $message }} </span> @enderror
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <label for="image" class="text-dark">Image</label>
                                    <input type="file" class="form-control @error('image')  is-invalid @enderror" name="image">
                                    @error('image') <span class="invalid-feedback" role="alert"> {{ $message }} </span> @enderror
                                </div>

                                <button type="submit" class="btn btn-info mt-4">Save</button>
                                <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Close</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card w-75 bg-transparent border-0">
                <div class="card-body">
                    <div class="row">

                        <div class="col">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-plus"></i>
                                <span class="ms-1">Add product details</span>
                            </button>
                        </div>

                        <div class="col  d-flex justify-content-end">
                            <form class="w-50" action="{{ route('searchProductDetails') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3 ms-3">
                                            <span class="input-group-text rounded-start-3 border-black" id="inputGroup-sizing-sm"><i class="bi bi-search text-black"></i></span>
                                            <input name="productDetailsName" type="text" class="form-control rounded-end-3 border-black" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                          </div>
    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col text-black d-flex">
            <div class="card w-75">
                <div class="card-body d-flex justify-content-between">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-funnel text-black"></i> Filter by date </a>
                    <!-- Dropdown menu -->
                    <div class="row dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <div class="col">
                            <form action="{{ route('searchProductDetails') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="startDate" class="text-black">Start date</label>
                                        <input type="date" class="form-control" name="startDate" value="{{ date('Y-m-d') }}">
                                    </div>

                                    <div class="col">
                                        <label for="endDate" class="text-black">End date</label>
                                        <input type="date" class="form-control" name="endDate" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <button class="btn btn-primary">Perform</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <a href="{{route('getProductDetails')}}" class="btn btn-primary">Show all</a>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="card w-75 bg-white">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead class="text-center">
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th colspan="2">Action</th>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($productDetails as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->productName}}</td>
                                <td>{{$item->color}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <div class="row"><div class="col"><a href="{{ route('delProductDetails', ['id' => $item->id]) }}"><i class="fa fa-trash text-danger"></i></a></div></div>
                                    <div class="row"><div class="col text-danger">Delete</div></div>
                                </td>
                                <td>
                                    <div class="row"><div class="col"><a href="{{ route('editProductDetails', ['id' => $item->id]) }}"><i class="fas fa-edit text-success"></i></a></div></div>
                                    <div class="row"><div class="col text-success">Edit details</div></div>
                                </td>

                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection