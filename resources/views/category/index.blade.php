@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('post') }}" class="btn btn-success">Post</a>
                
            </div>
        </div>
        <div class="card">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible col-3" role="alert">
                <strong>{{ session('success')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <div class="card-header">{{ __('Categories') }}</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">sr#</th>
                                <th scope="col">Category</th>
                                <th scope="col">SubCategory</th>
                                <th scope="col">SubSub Category</th>
                                

                            </tr>
                        </thead>
                        <tbody> @php $i=1; @endphp
                            @foreach ($categories as $cat)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$cat->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('category.store')}}" method="POST">
                        @csrf
                        <label for="category" class="form-control">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Category">
                        <button class="btn btn-success mt-2" type="submit">Add</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-8">

                </div>
                <div class="col-md-4">
                    <form action="{{ route('subcat.add')}}" method="POST">
                        @csrf
                        <select name="parent_id" id="" class="form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="subcategory" class="form-control" placeholder="Sub Category">
                        <button class="btn btn-success mt-2" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
