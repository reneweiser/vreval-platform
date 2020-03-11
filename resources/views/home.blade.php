@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.error-alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ auth()->user()->name }}</li>
                        <li class="list-group-item">Personal Auth-Token: abcdefg12345</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @if ($projects)
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Your Projects</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            @forelse ($projects as $project)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="m-0"><a
                                                href="{{route('project.show', ['project' => $project])}}">{{ $project->name }}</a>
                                        </h5>
                                        @can("*.projects.{$project->id}")
                                            <span class="badge badge-success text-white">Owner</span>
                                        @endcan
                                        @if($project->isPublished())
                                            <span class="badge badge-info text-white">Published</span>
                                        @endif
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu">
                                            @can("invite.projects.{$project->id}")
                                                <button class="dropdown-item" type="button">Invite User</button>
                                            @endcan
                                            @can("edit.projects.{$project->id}")
                                                @if (!$project->isPublished())
                                                    <a class="dropdown-item"
                                                       href="{{ route('project.edit', ['project' => $project->id]) }}">Edit</a>
                                                @else
                                                    <div data-toggle="tooltip"
                                                         data-placement="left"
                                                         title="You cannot edit a published project"
                                                         style="cursor: not-allowed"
                                                    >
                                                        <span class="dropdown-item disabled"
                                                            type="button"
                                                            title="Editing disabled while published"
                                                            style="pointer-events:none;"
                                                        >Edit</span>
                                                    </div>
                                                @endif
                                            @endcan
                                            @can("publish.projects.{$project->id}")
                                                @if(!$project->isPublished())
                                                    <form action="{{ route('project.publisher.edit', ['project' => $project->id])}}"
                                                          method="post"
                                                    >
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="published" value="1">
                                                        <button class="dropdown-item" type="submit">Publish</button>
                                                    </form>
                                                    @else
                                                        <form action="{{ route('project.publisher.edit', ['project' => $project->id])}}"
                                                            method="post"
                                                        >
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="published" value="0">
                                                            <button class="dropdown-item" type="submit">Unpublish</button>
                                                        </form>
                                                @endif
                                            @endcan
                                            @can("delete.projects.{$project->id}")
                                                @if ($project->isPublished())
                                                    <div data-toggle="tooltip"
                                                        data-placement="left"
                                                        title="You cannot delete a published project"
                                                        style="cursor: not-allowed"
                                                    >
                                                        <span class="dropdown-item text-muted"
                                                            style="pointer-events:none">Delete</span>
                                                    </div>
                                                @else
                                                    <button class="dropdown-item text-danger"
                                                        data-toggle="modal"
                                                        data-target="#delete-project-{{$project->id}}">Delete</button>
                                                @endif
                                            @endcan
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <p>You don't have and Projects yet.</p>
                            @endforelse
                        </ul>
                        <div class="card-footer d-flex justify-content-end">
                            @can('create.projects')
                                <a href="{{ route('project.create') }}" class="btn btn-success">Create new Project</a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @foreach ($projects as $project)
        @include('includes.project-delete-modal', ['project' => $project])
    @endforeach
@endsection

@section('scripts')
    <script defer>
        window.$(function () {
            window.$('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection