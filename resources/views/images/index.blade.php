@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Images</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('images.create') }}" class="btn btn-success">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>File Name</th>
                            <th>File Size</th>
                            <th>Path</th>
                            <th>Ext</th>
                            <th>Height</th>
                            <th>Width</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        @foreach($images as $image)
                            <tr>
                                <td><a href="{{ route('images.show', $image) }}">{{ $image->file_name }}</a></td>
                                <td>{{ $image->file_size }}</td>
                                <td>{{ $image->path }}</td>
                                <td>{{ $image->ext }}</td>
                                <td>{{ $image->height }}</td>
                                <td>{{ $image->width }}</td>
                                <td><a href="{{ route('images.edit', $image) }}" class="btn btn-info">Edit</a></td>
                                <td><a href="{{ route('images.destroy', $image) }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
