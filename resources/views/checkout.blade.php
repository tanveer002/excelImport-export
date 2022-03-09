<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cart</title>
  </head>
  <body>
    <div class="float-right">
       
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Product</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cart</a>
              </li>
              <li class="nav-item dropdown">
               
               
              </li>
             
            </ul>
            @if (Route::has('login'))
            <div class="hidden ">
                @auth
                    <a href="{{ url('/home') }}" class="">Home</a>
                @else
                    <a href="{{ route('login') }}" class="">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">Register</a>
                    @endif
                @endauth
            </div>
        @endif
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row">
            <div class="col-12  ">
                <div class="card ">
                    <div class="card-title text-center">
                        Checkout Page
                    </div>
                    <div class="card-body">
                        <form action="{{ route('confirm.order')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                        @if (session('cart'))
                                            @php
                                                $total;
                                            @endphp
                                        @foreach (session('cart') as $id => $product)
                                            @php
                                            $sub_total = $product['price'] * $product['quantity'];
                                            @endphp
                                            <div class="card">
                                                    <div class="col-3">
                                                        <h3>{{$product['name']}}</h3>
                                                        <li>
                                                            Details:{{$product['des']}}
                                                        </li>
                                                        <li>
                                                            Quantity:{{$product['quantity']}}
                                                        </li>
                                                        <li>
                                                           Price: {{$product['price']}}
                                                        </li>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
                                </div>
                                <div class="col-6">
                                    <input type="text" name="name" placeholder="Name">
                                    <input type="email" name="email" placeholder="email">
                                    <input type="text" name="address" placeholder="address">
                                </div>
                                <button class="btn btn-success">submit</button>
                            </div>
                        </form>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>












    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>