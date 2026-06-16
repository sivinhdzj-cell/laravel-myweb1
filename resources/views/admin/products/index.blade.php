{{-- thừa kế layout/view admin.blade.php --}}
{{-- resources/views/admin/layouts/admin.blade.php --}}
@extends('admin.layouts.admin')

{{-- Gán nội dung cho vùng section 'title' --}}
@section('title', 'Quản lý Sản phẩm')

{{-- Gán nội dung cho vùng section 'content' --}}
@section('content')
<h2 class="mb-3">DANH SÁCH SẢN PHẨM</h2>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th style="width: 50px;" class="text-center">STT</th>
            <th style="width: 90px;" class="text-center">Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá bán</th>
            <th>Phân loại</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">
                {{-- Hiển thị ảnh mặc định nếu trường image trống --}}
                @php
                    $imageName = (!empty($item->image)) ? $item->image : 'default.png';
                @endphp
                <img src="{{ asset('images/' . $imageName) }}" 
                     alt="{{ $item->productname }}" style="width: 60px; height: 60px; object-fit: cover;" class="img-thumbnail">
            </td>
            <td>
                <strong>{{ $item->productname }}</strong>
                <br>
                <small class="text-muted">Slug: {{ $item->slug }}</small>
            </td>
            <td>
                {{-- Hiển thị giá và giá giảm (nếu có) --}}
                <span class="text-danger fw-bold">{{ number_format($item->price, 0, ',', '.') }} đ</span>
                @if($item->pricediscount > 0)
                    <br><small class="text-decoration-line-through text-muted">{{ number_format($item->pricediscount, 0, ',', '.') }} đ</small>
                @endif
            </td>
            <td>
                <span class="badge bg-info text-dark">Loại: {{ $item->catename ?? 'N/A' }}</span>
                <br>
                <span class="badge bg-secondary mt-1">Hiệu: {{ $item->brandname ?? 'N/A' }}</span>
            </td>
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