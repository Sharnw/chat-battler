@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="p-1">Create Item</h2>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('items.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="game" class="col-md-4 col-form-label text-md-right">{{ __('Game') }}</label>

                            <div class="col-md-6">
                                <select name="game_id" class="form-control" required>
                                    <option></option>
                                    @foreach ($games as $game)
                                        <option value="{{ $game->id }}" @if (old('game_id') == $game->id) selected @endif>
                                            {{ $game->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('game_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-tick"></i> {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection
