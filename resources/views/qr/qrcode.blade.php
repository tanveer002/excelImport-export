@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>QR Code</h1>
            </div>
        </div>
        <div class="card">
           
            <h1>Laravel 8 - QR Code Generator Example</h1>
     
           {{ $qr_code}}
             
            
        </div>
    </div>
    
@endsection
