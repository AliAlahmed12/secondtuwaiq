@extends('layouts.app')
@section('content')


<style>
    .headMain{
        background: rgb(26,84,171);
        background: linear-gradient(90deg, rgba(26,84,171,1) 0%, rgba(2,34,91,1) 100%); 
    }
</style>
<body>
    <div class="headMain " style="border-radius: 0 0 100px 100px;">
        
        <div class="row d-flex justify-content-center ">
            <div class="col-sm-5 d-flex flex-column justify-content-center">
                <h1 class="text-white"><strong>{{__('message.titleMain')}}</strong></h1>
                <p class="text-white">{{__('message.titleText')}}</p>
            </div>

            <div class="col-sm-5 d-flex justify-content-center ">
                <img src="assets/img/homePage.png" class="w-75" alt="">
            </div>
        </div>

    </div>
    <div class="container mt-5">
    <div class="row text-center d-flex justify-content-center mt-5">
        <div class="col-sm-4">
            <a href="{{route('listItems')}}" style="text-decoration:none;">
                <div class="card">
                    <div class="card-body" style="background: rgb(255, 255, 255); box-shadow: 0 2px 4px rgba(3, 70, 169, 0.8);">
                        <i class="bi bi-phone text-center" style="font-size: 60px;"></i>
                        <h6>{{__('message.smartphone')}}</h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body" style="background: rgb(255, 255, 255); box-shadow: 0 2px 4px rgba(3, 70, 169, 0.8);">
                    <i class="bi bi-laptop text-center" style="font-size: 60px;"></i>
                    <h6>{{__('message.laptops')}}</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body" style="background: rgb(255, 255, 255); box-shadow: 0 2px 4px rgba(3, 70, 169, 0.8);">
                    <i class="bi bi-printer text-center" style="font-size: 60px;"></i>
                    <h6>{{__('message.printers')}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection