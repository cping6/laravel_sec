<div class="list-group-item">
    <img class="mr-3" width="32" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
    <a href="{{ route('users.show', $user) }}">
        {{ $user->name }}
    </a>
</div>