@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Battles</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('battles.create') }}" class="btn btn-success">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Game</th>
                            <th>Characters</th>
                        </tr>
                        @foreach($battles as $battle)
                            <tr>
                                <td><a href="{{ route('battles.show', $battle) }}">{{ $battle->name }}</a></td>
                                <td><a href="{{ route('games.show', $battle->game) }}">{{ $battle->game->name }}</a></td>
                                <td>{{ $battle->characters()->count() }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
