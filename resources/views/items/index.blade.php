@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Items</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('items.create') }}" class="btn btn-success">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Game</th>
                            <th>Characters held by</th>
                        </tr>
                        @foreach($items as $item)
                            <tr>
                                <td><a href="{{ route('items.show', $item) }}">{{ $item->name }}</a></td>
                                <td><a href="{{ route('games.show', $item->game) }}">{{ $item->game->name }}</a></td>
                                <td>{{ $item->characters()->count() }}</td>
                                <td><a href="{{ route('items.edit', $item) }}" class="btn btn-info">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
