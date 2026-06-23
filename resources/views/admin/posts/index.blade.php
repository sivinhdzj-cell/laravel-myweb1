@extends('admin.layouts.admin')

@section('title', 'Bài viết')

@section('content')
<h2 class="mb-3">DANH SÁCH BÀI VIẾT</h2>
<a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-3">
    + Thêm mới
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Mã bài viết</th>
            <th>Tiêu đề</th>
            <th>Loại</th>
            <th>Người đăng</th>
            <th>Trạng thái</th>
            <th class="text-center" style="width: 150px;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @forelse($list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->category?->catename ?? 'N/A' }}</td>
            <td>{{ $item->user?->name ?? 'N/A' }}</td>
            <td>
                @if($item->status == 1)
                    <span class="badge bg-success">Hiển thị</span>
                @else
                    <span class="badge bg-danger">Ẩn</span>
                @endif
            </td>
            <td class="text-center">
                <a href="{{ route('admin.posts.edit', $item->id) }}" class="btn btn-sm btn-warning">
                    Sửa
                </a>
                <form action="{{ route('admin.posts.destroy', $item->id) }}"
                      method="POST"
                      style="display:inline-block"
                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        Xóa
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Không có dữ liệu</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
{{ $list -> links()  }}
</div>
@endsection