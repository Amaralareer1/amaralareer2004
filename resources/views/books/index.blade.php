@extends('layouts.app')

@content
<div class="container">
    <h2>قائمة الكتب (النشطة فقط)</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">إضافة كتاب جديد</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>المؤلف</th>
                <th>سنة النشر</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year_published }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endcontent