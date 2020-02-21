@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Character Details</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('characters.edit', $character) }}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="p-1">
                            <form method="DELETE" action="{{ route('characters.character', $battle) }}">
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
                            <td>{{ $character->name }}</td>
                            <td><a href="{{ route('games.show', $character->game) }}">{{ $character->game->name }}</a></td>
                            <td>
                                @if ($character->image_id)
                                    <a href="{{ route('images.show', $character->image) }}" alt="{{ $character->image->file_name }}"><img src="{{ $character->image->path }}" /></a>
                                @endif
                            </td>
                            <td>{{ $character->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Items</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                        </tr>
                        @foreach ($character->items as $item)
                            <tr>
                                <td><a href="{{ route('items.show', $item) }}">{{ $item->name }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Battles</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Winning Character</th>
                            <th>Created</th>
                            <th>Resolved</th>
                        </tr>
                        @foreach ($character->battles as $battle)
                            <tr>
                                <td><a href="{{ route('battles.show', $battle) }}">{{ $battle->name }}</a></td>
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
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
