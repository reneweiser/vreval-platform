<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectPublishController extends Controller
{
    public function update(Request $request, Project $project)
    {
        $this->authorize("publish.projects.{$project->id}");
        $project->update([
            'published' => $request->published === '0' ? null : now()
        ]);
        $project->save();
        return redirect(route('home'));
    }
}
