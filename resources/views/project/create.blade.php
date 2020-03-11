@extends('layouts.app')

@section('content')
<section class="container">
    <div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('home') }}" class="btn btn-link">< Back</a>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow">
                @include('includes.card-header', ['title'=>'Edit Project'])
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                id="name"
                                class="form-control form-control-lg @error('name') border-danger @enderror"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                            >
                            @error('name')
                                <p class="m-0 help text-danger">{{ $errors->first('name') }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                id="description"
                                class="form-control @error('description') border-danger @enderror"
                                name="description"
                                rows="3"
                                required
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <p class="m-0 help text-danger">{{ $errors->first('description') }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-link text-secondary mr-2" href="{{ route('home') }}">Cancel</a>
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection