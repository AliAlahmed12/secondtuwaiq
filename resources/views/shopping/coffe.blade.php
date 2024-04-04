@extends('layouts.app')


@section('content')


<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-4">
                    <a href="{{route('showDetails', ['id' => $item->id])}}" style="text-decoration:none; color:black;">
                        <div class="card ">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0">Today's Combo Offer</p>
                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong" style="width: 35px; height: 35px;">
                                    <p class="text-white mb-0 small">x4</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <img style="height: 320px; width: 60%;" src="{{$item->image}}" class="card-img-top mx-auto d-block" alt="">
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span class="small">Coffes</span>
                                    <p class="small text-danger"><s>{{$item->id}}</s></p>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{$item->title}}</h5>
                                    <h5 class="text-dark mb-0"> SAR</h5>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-muted mb-0">Available: <span class="fw-bold"></span></p>
                                    <span class="badge bg-secondary ">Color: </span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="badge bg-success">limited quantity</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        
                @if ($loop->iteration % 3 === 0)
                    </div><div class="row mt-5" >
                @endif
            @endforeach
        </div>
    </div>
  </section>
@endsection