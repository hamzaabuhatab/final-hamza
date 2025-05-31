@extends('layouts.app')

@section('content')
<div class="container">
    <h2>add new request</h2>

    <form action="{{ route('requests.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="maintenance_request_id" class="form-label">maintenance_request_id</label>
            <input type="number" name="maintenance_request_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">status</label>
            <select name="status" class="form-control" required>
                <option value="new">new</option>
                <option value="in_progress">in_progress</option>
                <option value="completed">completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">notes</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="number" name="updated_by" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">save</button>
        <a href="{{ route('requests.index') }}" class="btn btn-secondary">cancel</a>
    </form>
</div>
@endsection
