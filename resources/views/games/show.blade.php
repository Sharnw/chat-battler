@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row">
                        <div class="p-1">
                            <h2>Game Details</h2>
                        </div>
                        <div class="p-1">
                            <a href="{{ route('games.edit', $game) }}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="p-1">
                            <form method="DELETE" action="{{ route('games.destroy', $game) }}">
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
                            <th>Created</th>
                        </tr>
                        <tr>
                            <td>{{ $game->name }}</td>
                            <td>{{ $game->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Characters</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Battles Participated</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        @foreach($game->characters as $character)
                            <tr>
                                <td><a href="{{ route('characters.show', $character) }}">{{ $character->name }}</a></td>
                                <td>{{ $character->battles()->count() }}</td>
                                <td><a href="{{ route('characters.edit', $character) }}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form method="DELETE" action="{{ route('characters.destroy', $character) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="icon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Items</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Characters used by</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        @foreach($game->items as $item)
                            <tr>
                                <td><a href="{{ route('items.show', $item) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->characters()->count() }}</td>
                                <td><a href="{{ route('items.edit', $item) }}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form method="DELETE" action="{{ route('items.destroy', $item) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="icon-trash"></i> Delete</button>
                                    </form>
                                </td>
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
                            <th>Participants</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        @foreach($game->battles as $battle)
                            <tr>
                                <td><a href="{{ route('battles.show', $battle) }}">{{ $battle->name }}</a></td>
                                <td>{{ $battle->characters()->count() }}</td>
                                <td><a href="{{ route('battles.edit', $battle) }}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form method="POST" action="{{ route('battles.destroy', $battle) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="icon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
