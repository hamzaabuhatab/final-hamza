@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل طلب الصيانة</h2>

    <form action="{{ route('requests.update', $request->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="maintenance_request_id" class="form-label">معرف طلب الصيانة</label>
            <input type="number" name="maintenance_request_id" class="form-control" value="{{ $request->maintenance_request_id }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">الحالة</label>
            <select name="status" class="form-control" required>
                <option value="new" {{ $request->status == 'new' ? 'selected' : '' }}>جديد</option>
                <option value="in_progress" {{ $request->status == 'in_progress' ? 'selected' : '' }}>قيد التنفيذ</option>
                <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>مكتمل</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">ملاحظة</label>
            <textarea name="note" class="form-control">{{ $request->note }}</textarea>
        </div>

        <div class="mb-3">
            <label for="updated_by" class="form-label">تم التحديث بواسطة (ID المستخدم)</label>
            <input type="number" name="updated_by" class="form-control" value="{{ $request->updated_by }}" required>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('requests.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
