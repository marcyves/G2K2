<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Group;
use \App\Models\User;
use \App\Models\Grade;

use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::orderBy('name')->get();
        $activeGroups = Group::getActive();

        $userGroup = Group::find(Auth::user()->group_id);

        if ($userGroup)
        {
            // Get groups already graded
            $grades = Grade::where('group_grader_id', Auth::user()->group_id)->get();
            $users = $userGroup->getParticipants();
 
            return view('groups.joined', compact('groups', 'activeGroups', 'userGroup', 'grades', 'users'));
        }

        return view('groups.index', compact('groups', 'activeGroups'));
    }

    public function activate(Request $request)
    {
        $group = Group::where('slug', $request->slug)->first();
        if($group)
        {
            $group->active = true;
            $group->save();
        }

        return redirect()->route('groups.index');
    }

    public function join(string $id)
    {
        $user =Auth::user();
        $group = Group::find($id);
        if($group)
        {
            $user->joinGroup($group);
            $user->save();
        }

        return redirect()->route('groups.index');
    }   
    public function leave(string $id)
    {
        $user =Auth::user();
        $group = Group::find($id);
        if($group)
        {
            $user->leaveGroup($group);
            $user->save();
        }

        return redirect()->route('groups.index');
    }   
    public function grade($id)
    {
        $userGroup = Group::find(Auth::user()->group_id);
        $group = Group::find($id);

        return view('groups.grading', compact('userGroup', 'group'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

}
