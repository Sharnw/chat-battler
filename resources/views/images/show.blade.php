@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Image Preview: {{ $image->file_name }}</div>
                <div class="card-body">
                    <img src="{{ $image->path }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
