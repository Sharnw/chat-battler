@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Games</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('games.create') }}" class="btn btn-success">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Characters</th>
                            <th>Items</th>
                            <th>Battles</th>
                        </tr>
                        @foreach($games as $game)
                            <tr>
                                <td><a href="{{ route('games.show', $game) }}">{{ $game->name }}</a></td>
                                <td>{{ $game->characters()->count() }}</td>
                                <td>{{ $game->items()->count() }}</td>
                                <td>{{ $game->battles()->count() }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
