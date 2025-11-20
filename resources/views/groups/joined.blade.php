<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('K2 Groups') }}
        </h2>
        Your group: <strong>{{ $userGroup->name }}</strong>
            <a href="{{ route('groups.leave', $userGroup->id) }}" class="button">Leave</a>
        <h3>Participants</h3>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </x-slot>
    <section class="glass-background">
        <h2>Active Groups</h2>
        <ul>
            @foreach ($activeGroups as $group)
                @if ($group->id != $userGroup->id)
                <div class="glass-background mb-6">
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
                                <ul class="mx-6 mb-2">
                                    @php
                                        $groupUsers = \App\Models\User::where('group_id', '=', $group->id)->get();
                                    @endphp
                                    @foreach ($groupUsers as $user)
                                            <li>{{ $user->name }}</li>
                                    @endforeach
                                </ul>
                    </div>
                @endif
            @endforeach
        </ul>
    </section>

</x-app-layout>
