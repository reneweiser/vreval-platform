<nav class="card-header" aria-label="breadcrumb">
    <ol class="breadcrumb p-0 m-0" style="background: none;">
        @foreach ($fragments as $fragment)
        <li class="breadcrumb-item"><a href="{{ route($fragment['routeName'], $fragment['routeData']) }}">{{$fragment['name']}}</a></li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{$currentName}}</li>
    </ol>
</nav>