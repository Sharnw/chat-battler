@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Sources</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('sources.create') }}" class="btn btn-success">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Identifier</th>
                        </tr>
                        @foreach($sources as $source)
                            <tr>
                                <td><a href="{{ route('sources.show', $source) }}">{{ $source->name }}</a></td>
                                <td>{{ $source->identifier }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
