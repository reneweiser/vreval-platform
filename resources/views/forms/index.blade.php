@extends('layouts.app')

@php
    $headerClasses = 'm-0 font-weight-bold h5 text-primary';
@endphp

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    @include('includes.card-header-breadcrumb', [
                        'fragments' => [
                            ['routeName' => 'dashboard', 'routeData' => ['project' => $project->id], 'name' => 'Dashboard'],
                            ['routeName' => 'projects.edit', 'routeData' => ['project' => $project->id], 'name' => $project->name],
                        ],
                        'currentName' => 'Forms'
                    ])
                    <ul class="list-group list-group-flush">
                        @forelse ($forms as $form)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{-- <span>{{ $form->name }}</span> --}}
                            <a href="{{ route('forms.edit', ['project' => $project, 'form' => $form]) }}">{{ $form->name }}</a>
                        </li>
                        @empty
                        <p class="m-0 p-4 text-center lead text-muted">There are no forms yet.</p>
                        @endforelse
                    </ul>
                    <div class="card-footer text-right">
                        <a href="{{ route('forms.create', ['project' => $project]) }}" class="btn btn-success">Create Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection