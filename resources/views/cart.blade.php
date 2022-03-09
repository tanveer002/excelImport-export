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
                        Cart
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Describtion</th>
                                <th>Quantity</th>
                                <th scope="col">Price</th>
                                <th>Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                            @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $product)
                                @php
                                $sub_total = $product['price'] * $product['quantity'];
                                $total += $sub_total;
                            @endphp
                                <tr>
                                    <td></td>
                                    <td>{{$product['name']}}</td>
                                    <td>{{$product['des']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>{{$product['price']}}</td>
                                    <td>{{$sub_total}}</td>
                                    <td>
                                        <a href="{{route('remove.product', [$id])}}" class="btn btn-danger btn-sm">X</a>
                                    </td>
                                </tr> 
                                   
                                @endforeach
                            @endif
                            </tbody>
                          </table>
                    </div>
                    <div class="card-footer float-right">
                       
                         <a href="" class="btn btn-primary float-right">Countinue Shopping</a>
                        <a href="{{route('checkout')}}" class="btn btn-success float-right">Checkout</a>
                        <p class="">Total: {{$total}}</p>
                       
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