@extends('layouts.base')
    

@section('content')
    
<div class="container">

    <pre class="text-black mt-5"><a href="{{route('index')}}">Home</a>  >  Products</pre>

    <h2 class="text-black mt-5">Products</h2>
    <div class="row mt-5">
        <div class="col">
            <!-- Button trigger modal -->
            
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Add new product</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('createProduct')}}" method="post">
                                @csrf
                                <label for="productName" class="text-dark">Enter product name</label>
                                <input type="text" class="form-control @error('productName')  is-invalid @enderror" name="productName">
                                <button type="submit" class="btn btn-info mt-2">Save</button>
                                @error('productName') <span class="invalid-feedback" role="alert"> {{ $message }} </span> @enderror
                                <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Close</button>

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
                                <span class="ms-1">Add product</span>
                            </button>
                        </div>

                        <div class="col  d-flex justify-content-end">
                            <form class="w-50" action="{{ route('product') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group input-group-sm mb-3 ms-3">
                                            <span class="input-group-text rounded-start-3 border-black" id="inputGroup-sizing-sm"><i class="bi bi-search text-black"></i></span>
                                            <input name="productName" type="text" class="form-control rounded-end-3 border-black" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                          </div>
                                        
                                        {{-- <a href="{{ route('product') }}" class="btn btn-success ms-2">Show all</a> --}}
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
                            <form action="{{ route('filter') }}" method="post">
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

                    <a href="{{route('product')}}" class="btn btn-primary">Show all</a>
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
                            <th colspan="2">Action</th>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($products as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->productName}}</td>
                                <td>
                                    <div class="row"><div class="col"><a href="{{ route('del', ['id' => $item->id]) }}"><i class="fa fa-trash text-danger"></i></a></div></div>
                                    <div class="row"><div class="col text-danger">Delete</div></div>
                                </td>
                                <td>
                                    <div class="row"><div class="col"><a href="{{ route('edit', ['id' => $item->id]) }}"><i class="fas fa-edit text-success"></i></a></div></div>
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