{{-- thừa kế layout/view admin.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'Thêm mới Loại sản phẩm')

@section('content')
<div class="container-fluid">
    <h2 class="mb-3">THÊM MỚI LOẠI SẢN PHẨM</h2>
    
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Quay lại danh sách
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                {{-- Chỉ thị bảo mật bắt buộc để không bị lỗi 419 --}}
                @csrf 

                <div class="mb-3">
                    <label class="form-label fw-bold">Tên loại sản phẩm</label>
                    <input type="text" name="catename" class="form-control" required placeholder="Nhập tên loại sản phẩm (Ví dụ: Laptop, Điện thoại)">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Slug</label>
                    <input type="text" name="slug" class="form-control" required placeholder="Nhập đường dẫn tĩnh (Ví dụ: laptop, dien-thoai)">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Lưu dữ liệu
                </button>
            </form>
        </div>
    </div>
</div>
@endsection