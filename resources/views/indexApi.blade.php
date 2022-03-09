@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Api Data here</h1>
            <ul>
               @foreach ($res as $item)
                   <li>
                        <p>First Name: <strong>{{$item->first_name}}</strong> <br>
                           Last Name: <strong> {{$item->last_name}} </strong> <br>
                           Email: <strong> {{$item->email}} </strong> <br>
                           <img src="{{ $item->avatar}}" alt="">
                        </p>
                   </li>
               @endforeach
            </ul>
        </div>
    </div> 
</div>
@endsection