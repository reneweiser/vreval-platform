<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ProjectController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create.projects');
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create.projects');
        $project = Project::create($this->validateProject());
        $project->attachOwner(auth()->user());
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $this->authorize("show.projects.{$project->id}");
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");
        $project->update($this->validateProject());
        $project->save();
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize("delete.projects.{$project->id}");
        $project->deletePermissions();
        $project->delete();
        return redirect(route('home'));
    }

    private function validateProject()
    {
        return request()->validate([
            'name' => 'required|min:5|max:255',
            'description' => 'required',
        ]);
    }
}
