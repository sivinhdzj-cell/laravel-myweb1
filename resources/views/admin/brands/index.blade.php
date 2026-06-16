{{-- thừa kế layout/view admin.blade.php --}}
{{-- resources/views/admin/layouts/admin.blade.php --}}
@extends('admin.layouts.admin')

{{-- Gán nội dung cho vùng section 'title' --}}
{{-- (tương ứng với @yield('title') trong layout --}}
@section('title', 'Thương hiệu')

{{-- Gán nội dung cho vùng section 'content' --}}
{{-- (tương ứng với @yield('content') trong layout --}}
@section('content')
<h2 class="mb-3">DANH SÁCH THƯƠNG HIỆU</h2>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Mã thương hiệu</th>
            <th>Tên thương hiệu</th>
            <th>Slug</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list as $item)
        <tr>
            {{-- Thay đổi các thuộc tính sang cấu trúc của bảng brands --}}
            <td>{{ $item->id }}</td>
            <td>{{ $item->brandname }}</td>
            <td>{{ $item->slug }}</td>
            <td>
                @if($item->status == 1)
                    <span class="badge bg-success">Hiển thị</span>
                @else
                    <span class="badge bg-danger">Ẩn</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection