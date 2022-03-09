@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('post')}}" class="btn btn-success">Post</a>
            <a href="{{ route('qrcode.add') }}" class="btn btn-success">QR Code</a>
            <a href="{{ route('devices') }}" class="btn btn-success">Devices</a>
            <a href="{{ route('api.data')}}" class="btn btn-success">Api Data</a>
            <a href="{{route('s.product')}}" class="btn btn-success"> Products</a>
        </div>
    </div> 
</div>
@endsection