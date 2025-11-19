<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('K2 Groups') }}
        </h2>
        Your group: <strong>{{ $userGroup->name }}</strong>
        @if(Auth::user()->id == 1)
            <a href="{{ route('groups.leave', $userGroup->id) }}" class="button">Leave</a>
        @endif
        <h3>Participants</h3>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </x-slot>
    <section class="glass-background">
        <h2>Active Groups</h2>
        <ul class="glass-background">
            @foreach ($activeGroups as $group)
                @if ($group->id != $userGroup->id)
                    <li class="group">
                        <div class="grade">{{ $group->name }}
                            @if ($grades->where('group_graded_id', $group->id)->count() > 0)
                                @foreach ($grades as $grade)
                                    @if ($grade->group_graded_id == $group->id)
                                        {{ $grade->clarity + $grade->answers + $grade->originality + $grade->knowledge }}/20
                        </div>
                        <form action="{{ route('grades.destroy', $grade->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button">
                                Reset
                            </button>
                        </form>
                @endif
            @endforeach
        @else
            </div>
            <a href="{{ route('groups.grade', $group->id) }}" class="button">
                Grade
            </a>
            @endif
            </li>
        <ul class="glass-background mx-6 mb-2">
            @php
                $groupUsers = \App\Models\User::where('group_id', '=', $group->id)->get();
            @endphp
            @foreach ($groupUsers as $user)
                    <li>{{ $user->name }}</li>
            @endforeach
        </ul>
            @endif
            @endforeach
        </ul>
    </section>

</x-app-layout>
