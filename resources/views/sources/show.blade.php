@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Source Details</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('sources.edit', $source) }}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="p-1">
                            <form method="DELETE" action="{{ route('sources.destroy', $source) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Identifier</th>
                            <th>Settings</th>
                            <th>Created</th>
                        </tr>
                        <tr>
                            <td>{{ $source->name }}</td>
                            <td>{{ $source->name }}</td>
                            <td>{{ $source->settings }}</td>
                            <td>{{ $source->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
