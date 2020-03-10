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
                    <li class="list-group-item">{{ Auth::user()->name }}</li>
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
                            <h5 class="m-0"><a href="{{route('project.show', ['project' => $project])}}">{{ $project->name }}</a></h5>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    @can("invite.projects.{$project->id}")
                                        <button class="dropdown-item" type="button">Invite User</button>
                                    @endcan
                                    @can("edit.projects.{$project->id}")
                                        <a class="dropdown-item" href="{{ route('project.edit', ['project' => $project->id]) }}">Edit</a>
                                    @endcan
                                    @can("publish.projects.{$project->id}")
                                        <button class="dropdown-item" type="button">Publish</button>
                                    @endcan
                                    @can("delete.projects.{$project->id}")
                                        <form action="{{ route('project.destroy', $project) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link text-danger dropdown-item" type="submit">Delete</button>
                                        </form>
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
@endsection
