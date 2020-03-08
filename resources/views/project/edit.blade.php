@extends('layouts.app')

@section('content')
<section class="container">
    @component('components.panel', ['title' => 'Edit Project'])
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
    @endcomponent

    @component('components.panel', ['title' => 'Edit Models'])
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between">
            <p class="m-0">Cras justo odio</p>
            <span>x</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <p class="m-0">Dapibus ac facilisis in</p>
            <span>x</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <p class="m-0">Vestibulum at eros</p>
            <span>x</span>
        </li>
    </ul>
    <div class="card-body">
        <button class="btn btn-success w-100">Add Model</button>
    </div>
    <div class="card-body d-flex justify-content-end">
        <a class="btn btn-link text-secondary mr-2" href="{{ route('home') }}">Cancel</a>
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
    @endcomponent
</section>
@endsection