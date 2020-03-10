@extends('layouts.app')

@section('content')
<section class="container">
    <div class="row mb-5">
        <div class="col-md-8">
            <div class="card shadow">
                @include('includes.card-header', ['title'=>'Edit Project'])
                <div class="card-body">
                    <form action="{{ route('project.update', ['project' => $project->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control form-control-lg" name="name" type="text" value="{{ $project->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="description" rows="3">{{ $project->description }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-link text-secondary mr-2" href="{{ route('home') }}">Cancel</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                @include('includes.card-header', ['title'=>'Users'])
                <ul class="list-group list-group-flush">
                    @foreach ($project->users as $user)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{$user->name}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card-deck">
                <div class="card shadow">
                    @include('includes.card-header', ['title'=>'Playlists'])
                    <div class="card-body"></div>
                </div>
                <div class="card shadow">
                    @include('includes.card-header', ['title'=>'Results'])
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card-deck">
                <div class="card shadow">
                    @include('includes.card-header', ['title'=>'Models'])
                    <div class="card-body">
                        <p>Upload 3d geometry models to use in virtual walkthroughs.</p>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary">Edit Models</a>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    @include('includes.card-header', ['title'=>'Forms'])
                    <div class="card-body">
                        <p>Create forms for your participants to fill out.</p>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary">Edit Forms</a>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    @include('includes.card-header', ['title'=>'Checkpoints'])
                    <div class="card-body">
                        <p>Create or upload checkpoints. Checkpoints are predefined locations within the geometry you can attach forms and other behaviour to.</p>
                        <div class="text-right">
                            <a href="#" class="btn btn-primary">Edit Checkpoints</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection