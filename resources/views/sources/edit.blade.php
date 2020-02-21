@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="p-1">Edit Source</h2>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('sources.update', $source) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $source->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <chat-source-picker identifier="{{ old('identifier', $source->identifier) }}" :chat-sources="{{ json_encode($chat_sources) }}" :settings="{{ old('settings', $source->settings) }}" :old="{{ json_encode(session()->getOldInput()) }}" :errors="{{ $errors }}"></chat-source-picker>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-tick"></i> {{ __('Edit') }}
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
