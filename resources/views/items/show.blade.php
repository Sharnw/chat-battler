@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Item Details</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="p-1">
                            <form method="DELETE" action="{{ route('items.destroy', $item) }}">
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
                            <th>Game</th>
                            <th>Image</th>
                            <th>Created</th>
                        </tr>
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ route('games.show', $item->game) }}">{{ $item->game->name }}</a></td>
                            <td>
                                @if ($item->image_id)
                                    <a href="{{ route('images.show', $item->image) }}" alt="{{ $item->image->file_name }}"><img src="{{ $item->image->path }}" /></a>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Characters held by</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                        </tr>
                        @foreach ($item->characters as $character)
                            <tr>
                                <td><a href="{{ route('items.show', $character) }}">{{ $character->name }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
