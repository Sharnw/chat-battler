@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Characters</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('characters.create') }}" class="btn btn-success">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Game</th>
                            <th>Items</th>
                            <th>Battles</th>
                        </tr>
                        @foreach($characters as $character)
                            <tr>
                                <td><a href="{{ route('characters.show', $character) }}">{{ $character->name }}</a></td>
                                <td><a href="{{ route('games.show', $character->game) }}">{{ $character->game->name }}</a></td>
                                <td>{{ $character->items()->count() }}</td>
                                <td>{{ $character->battles()->count() }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
