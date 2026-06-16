{{-- thừa kế layout/view admin.blade.php --}}
{{-- resources/views/admin/layouts/admin.blade.php --}}
@extends('admin.layouts.admin')

{{-- Gán nội dung cho vùng section 'title' --}}
@section('title', 'Quản lý Bài viết')

{{-- Gán nội dung cho vùng section 'content' --}}
@section('content')
<h2 class="mb-3">DANH SÁCH BÀI VIẾT</h2>

<table class="table table-bordered table-hover table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th style="width: 50px;" class="text-center">STT</th>
            <th style="width: 100px;" class="text-center">Hình ảnh</th>
            <th>Thông tin bài viết</th>
            <th>Tóm tắt nội dung</th>
            <th>Tác giả</th>
            <th style="width: 120px;" class="text-center">Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        {{-- Sử dụng $loop->iteration để tự động tăng số thứ tự từ 1 --}}
        @foreach($list as $item)
        <tr>
            <td class="text-center fw-bold">{{ $loop->iteration }}</td>
            <td class="text-center">
                {{-- Hiển thị ảnh mặc định default.png nếu bài viết chưa có ảnh --}}
                @php
                    $imageName = (!empty($item->image)) ? $item->image : 'default.png';
                @endphp
                <img src="{{ asset('images/' . $imageName) }}" 
                     alt="{{ $item->title }}" style="width: 80px; height: 50px; object-fit: cover;" class="img-thumbnail">
            </td>
            <td>
                <span class="text-primary fw-bold">{{ $item->title }}</span>
                <br>
                <small class="text-muted">Slug: {{ $item->slug }}</small>
                <br>
                <small class="text-muted"><i class="far fa-clock"></i> Ngày đăng: {{ date('d/m/Y H:i', strtotime($item->created_at)) }}</small>
            </td>
            <td>
                {{-- Dùng Str::limit để cắt bớt chữ nếu nội dung content quá dài --}}
                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 80, '...') }}
            </td>
            <td>
                {{-- Hiển thị fullname của user đã được JOIN từ Controller --}}
                <span class="badge bg-secondary">{{ $item->fullname ?? 'Ẩn danh' }}</span>
            </td>
            <td class="text-center">
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