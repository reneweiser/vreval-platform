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
                <div class="card-body">
                    <ul>
                        <li>Personal Auth-Token: abcdefg12345</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Projects you own</div>
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Projects you are part of</div>
                <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection
