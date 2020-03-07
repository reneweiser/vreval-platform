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
            <div class="card">
                <div class="card-header">Your Profile</div>
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
            <div class="card">
                <div class="card-header">Your Projects</div>
                <ul class="list-group list-group-flush">
                    @foreach ($projects as $project)
                        <li class="list-group-item d-flex justify-content-between">
                            <h5>{{ $project->name }}</h5>
                            <div>
                                @can('publish-project', $project)
                                    <button class="btn btn-primary">Publish</button>
                                @endcan
                                @can('delete-project', $project)
                                    <button class="btn btn-outline-danger">Delete</button>
                                @endcan
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
