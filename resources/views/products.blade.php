@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    
</div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>
                <table class="table">
                    <thead>
                        <tr>
                            
                            <th scope="col">name</th>
                            <th scope="col">des</th>
                            <th scope="col">price</th>
                           
                        </tr>
                    </thead>
                    <tbody> @php $i=1; @endphp
                       @foreach ($products as $item)
                           <tr>
                               <td>{{$item->name}}</td>
                               <td>{{$item->des}}</td>
                               <td>{{$item->price}}</td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <form action="{{route('p.store')}}" method="POST">
                @csrf
                <input type="text" name="pname" class="form-control" placeholder="Name">
                <input type="text" name="pdes" class="form-control" placeholder="Description">
                <input type="number" name="price" class="form-control" placeholder="price">
                <button class="btn btn-success mt-2" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection