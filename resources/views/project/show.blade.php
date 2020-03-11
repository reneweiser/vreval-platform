@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid bg-primary text-white"  style="margin-top:-1.5rem">
    <div class="container">
        <h1 class="display-4">{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <hr class="my-4">
        <h3>{{ count($project->users) > 1 ? 'Team' : 'Author' }}</h3>
        <p class="lead">
            @foreach ($project->users as $user)
                <span>{{ $user->name }}</span>
                @if(!$loop->last) | @endif
            @endforeach
        </p>
    </div>
</div>
<div class="container">
    <h1>Stats</h1>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
</div>
@endsection