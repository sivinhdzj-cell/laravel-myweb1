{{-- thừa kế layout/view admin.blade.php --}}
{{-- resources/views/admin/layouts/admin.blade.php --}}
@extends('admin.layouts.admin')

{{-- Gán nội dung cho vùng section 'title' --}}
{{-- (tương ứng với @yield('title') trong layout --}}
@section('title', 'Loại Sản phẩm')

{{-- Gán nội dung cho vùng section 'content' --}}
{{-- (tương ứng với @yield('content') trong layout --}}
@section('content')
<h2 class="mb-3">DANH SÁCH LOẠI SẢN PHẨM</h2>
<a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">
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
            <th>Mã loại</th>
            <th>Tên loại</th>   
            <th>Slug</th>
            <th>Trạng thái</th>
            <th class="text-center" style="width: 150px;">Chức năng</th> {{-- 1. THÊM CỘT CHỨC NĂNG --}}
        </tr>
    </thead>
    <tbody>
        @foreach($list as $item)
        <tr>
            <td>{{ $item->cateid }}</td>
            <td>{{ $item->catename }}</td>
            <td>{{ $item->slug }}</td>
            <td>
                @if($item->status == 1)
                    <span class="badge bg-success">Hiển thị</span>
                @else
                    <span class="badge bg-danger">Ẩn</span>
                @endif
            </td>
            <td class="text-center">
                {{-- 2. THÊM FORM VÀ NÚT XÓA SỬ DỤNG PHƯƠNG THỨC POST + @method('DELETE') --}}
                <form action="{{ route('admin.categories.destroy', $item->cateid) }}" 
                      method="POST" 
                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa loại sản phẩm này không?');">
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
@endsection