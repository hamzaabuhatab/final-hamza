@extends('layouts.app')

@section('content')
<div class="container">
    <h1>request list</h1>

    <a href="{{ route('requests.create') }}" class="btn btn-success mb-3">add request</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>request id</th>
                <th>maintenance_request_id</th>
                <th>ststus</th>
                <th>notes</th>
                <th>ubdated by</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ optional($request->maintenanceRequest)->id ?? '—' }}</td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->note }}</td>
                <td>{{ $request->updatedBy->name ?? '—' }}</td>
                <td>
                    <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-sm btn-primary">edit</a>
                    <form action="{{ route('requests.destroy', $request->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('sure')">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
