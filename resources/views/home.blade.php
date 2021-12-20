@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-2">
        <a href="{{ route('post')}}" class="btn btn-success">Post</a>
        <a href="{{ route('qrcode.add') }}" class="btn btn-success">QR Code</a>
    </div>
    <div class="col-2">
        <a href="{{ route('category.index')}}" class="btn btn-success">Category</a>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-2">
                    <a href="{{ route('device.export') }}" class="btn btn-success">Export</a>
                    </div>
                    <div class="col-4">
                        <form action="{{ route('device.import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control" name="csv_file" accept="csv">
                            <button class="btn btn-success" type="submit">Import</button>
                        </form>
                    </div>
                </div>
            
                <div class="card-header">{{ __('Devices') }}</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">sr#</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Series</th>
                            <th scope="col">Issue</th>
                            <th scope="col">Description</th>
                            <th scope="col">price</th>
                            
                        </tr>
                    </thead>
                    <tbody> @php $i=1; @endphp
                        @foreach($issues as $issue)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$issue->brand->Name}}</td>
                            <td>{{$issue->deviceModel->name}}</td>
                            <td>{{$issue->name}}</td>
                            <td>{{$issue->issue}}</td>
                            <td>{{$issue->description}}</td>
                            <td>{{$issue->price}}</td>
                            
                           
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