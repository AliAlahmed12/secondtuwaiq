@extends('layouts.base')
    

@section('content')
    
<div class="container">
    <span class="text-dark">{{Cookie::get('A')}}</span>
    <div class="row mt-5">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center"><i class="bi bi-receipt text-success"></i></h1>
                    <span class="text-center text-dark">Invoices</span>
                </div>
            </div>
        </div>
        
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center"><i class="bi bi-people text-dark"></i></h1>
                    <span class="text-center text-dark">Customers</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection