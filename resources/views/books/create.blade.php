@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل الكتاب: {{ $book->title }}</h2>
    
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="form-group mb-3">
            <label>عنوان الكتاب:</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>المؤلف:</label>
            <input type="text" name="author" value="{{ $book->author }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>سنة النشر:</label>
            <input type="number" name="year_published" value="{{ $book->year_published }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">تحديث البيانات</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection