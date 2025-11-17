<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Grade;
use \App\Models\User;

use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'clarity' => 'required|integer|min:0|max:5',
            'answers' => 'required|integer|min:0|max:5',
            'originality' => 'required|integer|min:0|max:5',
            'knowledge' => 'required|integer|min:0|max:5',
        ]);

        $grade = new Grade();
        $grade->user_id = Auth::user()->id;
        $grade->group_grader_id = Auth::user()->group_id;
        $grade->group_graded_id = $request->input('group_id');
        $grade->clarity = $request->input('clarity');
        $grade->answers = $request->input('answers');
        $grade->originality = $request->input('originality');
        $grade->knowledge = $request->input('knowledge');
        $grade->save();

        return redirect()->route('groups.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = Grade::find($id);
        if ($grade) {
            $grade->delete();
        }

        return redirect()->route('groups.index');
    }

}
