@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>
               <livewire:comment>
            </div>
        </div>
    </div>
</div>
</div>
@endsection