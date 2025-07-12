@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Home Page - Dashpoard</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-block">
                go to user managment
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('requests.index') }}" class="btn btn-success btn-block">
                go to requests managment
            </a>
        </div>
    </div>
</div>
@endsection
