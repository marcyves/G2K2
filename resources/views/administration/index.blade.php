<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('G2K2 Administration') }}
        </h2>
    </x-slot>

    <section class="glass-background">
        <h2>Groups</h2>

        <ul>
            @foreach ($groups as $group)
                <li class="glass-background p-6">
                    {{ $group->name }}
                    @if($group->active)
                        <span class="text-green-600 font-bold">(Active)</span>
                        @php
                            $groupUsers = \App\Models\User::where('group_id', '=', $group->id)->get();
                        @endphp
                        <ul>
                            @foreach ($groupUsers as $user)
                                <li>
                                        {{ $user->name }}
                                </li>
                            @endforeach
                        </ul>
                        @php
                            $grades = \App\Models\Grade::where('group_graded_id', '=', $group->id)->get();
                            $count = $grades->count();
                            if($count > 0) {
                                $averageGrade = 0;                        
                                foreach ($grades as $grade)
                                {
                                    $averageGrade += $grade->clarity + $grade->answers + $grade->originality + $grade->knowledge;
                                }
                                $averageGrade = $averageGrade / $count;
                            } else {
                                $averageGrade = "N/A";
                            }
                        @endphp
                        <p>Average grade: {{ $averageGrade }}</p>
                    @else
                        <span class="text-red-600 font-bold">(Inactive)</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
</x-app-layout>