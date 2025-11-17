<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('K2 Groups') }}
        </h2>
    </x-slot>

    <section class="glass-background">
        <h2>Active Groups you can join</h2>
        <ul>
            @foreach ($activeGroups as $group)
                <li>
                    {{ $group->name }}
                    <a href="{{ route('groups.join', $group->id) }}" class="button">Join</a>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="glass-background">
        <h2>Activate your group</h2>
        <form action="{{ route('groups.activate') }}" method="POST">
            @csrf
            <input type="text" name="slug">
            <button type="submit" class="button">Activate</button>
        </form>
    </section>
</x-app-layout>
