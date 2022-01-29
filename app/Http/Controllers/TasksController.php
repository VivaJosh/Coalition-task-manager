<?php

    namespace App\Http\Controllers;

    use App\Models\Project;
    use App\Models\Task;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Redirector;
    use Inertia\Inertia;

    class TasksController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Inertia\Response
         */
        public function create (): \Inertia\Response
        {
            return Inertia::render('Tasks/Create', [
                'projects' => auth()->user()->projects
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @param Request $request
         *
         * @return Response
         */
        public function sync (Request $request): Response
        {
            if($request->has('tasks')) {
                foreach($request->input('tasks') as $item) {
                    Task::find($item['id'])->update(['priority' => $item['priority']]);
                }
            }
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         *
         * @return Application|RedirectResponse|Response|Redirector
         */
        public function store (Request $request)
        {
            $request->validate([
                'name' => 'required|min:5',
                'project_id' => 'required',
                'priority' => 'sometimes',
            ]);

            auth()->user()->tasks()->create([
                'name' => $request->input('name'),
                'priority' => $request->input('priority'),
                'project_id' => $request->input('project_id')
            ]);

            $project = Project::find($request->input('project_id'));
            return redirect(route('projects.show', $project->hash_id));
        }



        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param Task $task
         *
         * @return RedirectResponse
         */
        public function update (Request $request, Task $task)
        {
            $request->validate(['name' => 'required|min:5', 'priority' => 'sometimes']);


            $task->update(['name' => $request->input('name'), 'priority' => $request->input('priority')]);

            return back();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Task $task
         *
         * @return RedirectResponse
         */
        public function destroy (Task $task)
        {
            $task->delete();
            return back();
        }
    }
