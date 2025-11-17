<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('K2 Groups') }}
        </h2>
    </x-slot>

    <section class="glass-background">
        <h2>Grade group {{$group->name}}</h2>

         <x-input-error :messages="$errors->all()" class="m-2" />

        <form action="{{ route('grade.store') }}" method="POST">
            @csrf
            <input type="hidden" name="group_id" value="{{$group->id}}">
            <table>
                <tr>
                    <th>Competency</th>
                    <th>Score (0 to 5)</th>
                </tr>
                <tr>
                    <td>Clarity of the explanations</td>
                    <td><input type="number" name="clarity" value="{{old('clarity')}}" /></td>
                </tr>
                <tr>
                    <td>Capacity to answer to questions and remarks</td>
                    <td><input type="number" name="answers" value="{{old('answers')}}" /></td>
                </tr>
                <tr>
                    <td>Originality of the presentation</td>
                    <td><input type="number" name="originality" value="{{old('originality')}}" /></td>
                </tr>
                                <tr>
                    <td>Knowledge developped</td>
                    <td><input type="number" name="knowledge" value="{{old('knowledge')}}" /></td>
                </tr>
            </table>
            <button type="submit" class="button">Grade</button>
        </form>
        <hr>
        <a href="{{route('groups.index')}}" class="button">Back</a>
    </section>
</x-app-layout>