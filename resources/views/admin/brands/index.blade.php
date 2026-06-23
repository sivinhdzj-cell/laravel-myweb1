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
<a href="{{ route('admin.brands.create') }}" class="btn btn-success mb-3">
    + Thêm mới
</a>

{{-- Hiển thị thông báo thành công nếu có --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>Mã thương hiệu</th>
            <th>Tên thương hiệu</th>
            <th>Slug</th>
            <th>Trạng thái</th>
            <th class="text-center" style="width: 150px;">Chức năng</th> {{-- THÊM CỘT CHỨC NĂNG --}}
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
            <td class="text-center">
                {{-- NÚT SỬA --}}
                <a href="{{ route('admin.brands.edit', $item->id) }}" class="btn btn-sm btn-warning">
                    Sửa
                </a>

                {{-- NÚT XÓA --}}
                <form action="{{ route('admin.brands.destroy', $item->id) }}"
                      method="POST"
                      style="display:inline-block"
                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa thương hiệu này không?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        Xóa
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- hiển thị phân trang --}}
<div class="d-flex justify-content-center">
{{ $list -> links()  }}
</div>

@endsection