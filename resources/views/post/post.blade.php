@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Post') }}
            <div class="row">
                <div class="col-4">
                    <livewire:support-tick>
                </div>
                <div class="col-8">
                    <livewire:comment>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection