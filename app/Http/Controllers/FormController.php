<?php

namespace App\Http\Controllers;

use App\Form;
use App\Project;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function index(Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");

        return view('forms.index', [
            'forms' => $project->forms,
            'project' => $project
        ]);
    }

    public function create(Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");

        return view('forms.create', ['project' => $project]);
    }

    public function store(Request $request, Project $project)
    {
        $this->authorize("edit.projects.{$project->id}");
        $form = new Form($this->validateForm($request, $project));
        $form->project()->associate($project);
        $form->save();

        return redirect(route('forms.index', ['project' => $project]));
    }

    public function show(Form $form)
    {
        //
    }

    public function edit(Project $project, Form $form)
    {
        $this->authorize("edit.projects.{$project->id}");

        return view('forms.edit', [
            'project' => $project,
            'form' => $form
        ]);
    }

    public function update(Request $request, Project $project, Form $form)
    {
        $this->authorize("edit.projects.{$project->id}");
        $form->update($this->validateForm($request, $project));
        $form->save();

        return redirect(route('forms.index', [ 'project' => $project ]));
    }

    public function destroy(Form $form)
    {
        //
    }

    private function validateForm(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:5|max:255',
            'description' => 'required',
            'template' => 'json',
        ]);
    }
}
