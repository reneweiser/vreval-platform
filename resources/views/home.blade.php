@extends('layouts.app')

@section('content')
<div class="container">
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
                    @foreach ($projects as $project)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <h5 class="m-0">{{ $project->name }}</h5>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    @can('invite-project-members', $project)
                                        <button class="dropdown-item" type="button">Invite User</button>
                                    @endcan
                                    @can('update-project', $project)
                                        <button class="dropdown-item" type="button">Edit</button>
                                    @endcan
                                    @can('publish-project', $project)
                                        <button class="dropdown-item" type="button">Publish</button>
                                    @endcan
                                    @can('delete-project', $project)
                                        <button class="dropdown-item text-danger" type="button">Delete</button>
                                    @endcan
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="card-footer d-flex justify-content-end">
                    @can('create-project')
                        <button class="btn btn-success">Create new Project</button>
                    @endcan
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
