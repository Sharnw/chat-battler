@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Battle Details</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('battles.edit', $battle) }}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="p-1">
                            <form method="DELETE" action="{{ route('battles.destroy', $battle) }}">
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
                            <th>Winning Character</th>
                            <th>Created</th>
                            <th>Resolved</th>
                        </tr>
                        <tr>
                            <td><a href="{{ route('battles.show', $battle) }}">{{ $battle->name }}</a></td>
                            <td><a href="{{ route('games.show', $battle->game) }}">{{ $battle->game->name }}</a></td>
                            <td>
                                @if ($battle->winning_character_id)
                                    <a href="{{ route('characters.show', $battle->winningCharacter) }}">
                                        {{ $battle->winningCharacter->name }}
                                    </a>
                                @endif
                            </td>
                            <td>{{ $battle->created_at }}</td>
                            <td>{{ $battle->resolved_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Participants</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                        </tr>
                        @foreach ($battle->characters as $character)
                            <tr>
                                <td><a href="{{ route('characters.show', $character) }}">{{ $character->name }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
