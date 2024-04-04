@extends('layouts.app')


@section('content')
    


<section class="h-100 gradient-custom" style="background-color: #eee;">
    <div class="container py-5">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Cart - {{$cart->count()}} items</h5>
            </div>
            <div class="card-body">
              <!-- Single item -->
              @foreach ($cart as $item)


                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 ">
                      <!-- Image -->
                      <div class="bg-image hover-overlay hover-zoom ripple rounded d-flex justify-content-center">
                        <img src="{{$item->image}}" class="w-50" alt="Blue Jeans Jacket" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                      </div>
                      <!-- Image -->
                    </div>
      
                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                      <!-- Data -->
                      <p><strong>{{$item->description}}</strong></p>
                      <p>Color: {{$item->color}}</p>
                      <p>Brand: {{$item->productName}}</p>
                      <div class="row">
                        <div class="col-sm-2">
                          <a href="{{route('delItem', ['id' => $item->productid])}}" class="btn btn-primary btn-sm me-1 mb-2"><i class="fas fa-trash"></i></a>
                        </div>

                        <div class="col-sm-2">
                          <a href="btn btn-primary btn-sm me-1 mb-2" class="btn btn-danger btn-sm mb-2"><i class="fas fa-heart"></i></i></a>
                        </div>
                      </div>
                      
                      <!-- Data -->
                    </div>
      
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                      <!-- Quantity -->
                      <div class="d-flex mb-4" style="max-width: 300px">
                        <button class="btn btn-primary px-3 me-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>
      
                        <div class="form-outline">
                          <input id="form1" min="0" name="quantity" value="{{$item->count}}" type="number" class="form-control" />
                          <label class="form-label" for="form1">Quantity</label>
                        </div>
      
                        <button class="btn btn-primary px-3 ms-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <!-- Quantity -->
      
                      <!-- Price -->
                      <p class="text-start text-md-center">
                        <strong>{{$item->price * $item->count}} SAR</strong>
                      </p>
                      <!-- Price -->
                    </div>
                  </div>

                <hr class="my-4" />
              @endforeach
              <!-- Single item -->
  
              
  

            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body">
              <p><strong>Expected shipping delivery</strong></p>
              <p class="mb-0">10.4.2024 - 20.4.2024</p>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body">
              <p><strong>We accept</strong></p>
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                alt="Visa" />
              <img class="me-2" width="45px"
                src="https://iconape.com/wp-content/png_logo_vector/mada-01.png"
                alt="American Express" />
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                alt="Mastercard" />
              <img class="me-2" width="45px"
                src="https://iconape.com/wp-content/png_logo_vector/apple-pay-3.png"
                alt="PayPal acceptance mark" />
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Summary</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">

                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">Products<span>{{$total['lastPrice']}} SAR</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">Shipping<span>Free</span></li>

                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Total amount</strong>
                        <strong>
                          <p class="mb-0">(including VAT and Discount)</p>
                        </strong>
                      </div>
                      <span><strong>{{$total['totalNet']}} SAR</strong></span>
                    </li>
              </ul>
  
              <button type="button" class="btn btn-primary btn-lg btn-block">
                Go to checkout
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection