<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

    /**
     * @param Project $project
     *
     * @return mixed
     */
    public function index(Project $project){
        return $project->tasks;
    }


    /**
     * @param Project $project
     * @param Request $request
     *
     * @return RedirectResponse
     */

    public function store(Project $project, Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|min:5',
        ]);

        $project->tasks()->create([
            'name' => $request->input('name'),
            'priority' => $request->input('priority'),
            'user_id' => auth()->id()
        ]);

        return back();
    }


}
