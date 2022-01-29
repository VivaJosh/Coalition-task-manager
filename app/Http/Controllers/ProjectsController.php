<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Projects/Index', [
            'projects' => ProjectResource::collection(auth()->user()->projects)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Project $project
     *
     * @return \Inertia\Response
     */
    public function create(Project $project): \Inertia\Response
    {
        return Inertia::render('Projects/Create', [
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5'
        ]);

        auth()->user()->projects()->create([
            'name' => $request->input('name'),
            'details' => $request->input('details')
        ]);

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     *
     * @return \Inertia\Response
     */
    public function show(Project $project): \Inertia\Response
    {

        $data = [
            'project' => $project,
            'tasks' => $project->tasks
        ];

        return Inertia::render('Projects/Show', [
            'data' => $data
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|min:5'
        ]);

        $project->update([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
        ]);

        return redirect(route('projects.show', $project->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     *
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return back();
    }
}
