<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('games.index') }}">{{ __('Games') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('characters.index') }}">{{ __('Characters') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('items.index') }}">{{ __('Items') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('battles.index') }}">{{ __('Battles') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('sources.index') }}">{{ __('Sources') }}</a>
    </li>
</ul>
<input id="app_token" type="hidden" value="{{ auth()->user()->getAccessToken() }}">