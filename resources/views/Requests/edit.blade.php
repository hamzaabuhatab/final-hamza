@extends('layouts.app')

@section('content')
<div class="container">
    <h2>esit request</h2>

    <form action="{{ route('requests.update', $request->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="maintenance_request_id" class="form-label">maintenance request id</label>
            <input type="number" name="maintenance_request_id" class="form-control" value="{{ $request->maintenance_request_id }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">status</label>
            <select name="status" class="form-control" required>
                <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>new</option>
                <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>in_progress</option>
                <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">note</label>
            <textarea name="note" class="form-control">{{ $request->note }}</textarea>
        </div>

        <div class="mb-3">
            <label for="updated_by" class="form-label">updated_by</label>
            <input type="number" name="updated_by" class="form-control" value="{{ $request->updated_by }}" required>
        </div>

        <button type="submit" class="btn btn-primary">update</button>
        <a href="{{ route('requests.index') }}" class="btn btn-secondary">cancek</a>
    </form>
</div>
@endsection
