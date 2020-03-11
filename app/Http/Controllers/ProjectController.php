<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        $this->authorize('create.projects');
        return view('project.create');
    }

    public function store()
    {
        $this->authorize('create.projects');
        $project = Project::create($this->validateProject());
        $project->attachOwner(auth()->user());
        return redirect(route('project.edit', ['project' => $project]));
    }

    public function show(Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");
        return view('project.show', ['project' => $project]);
    }

    public function edit(Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");
        return view('project.edit', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");
        $project->update($this->validateProject());
        $project->save();
        return view('project.edit', ['project' => $project]);
    }

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
