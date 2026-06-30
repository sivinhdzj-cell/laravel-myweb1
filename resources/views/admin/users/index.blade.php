{{-- thừa kế layout/view admin.blade.php --}}
{{-- resources/views/admin/layouts/admin.blade.php --}}
@extends('admin.layouts.admin')

{{-- Gán nội dung cho vùng section 'title' --}}
{{-- (tương ứng với @yield('title') trong layout --}}
@section('title', 'Thành viên')

{{-- Gán nội dung cho vùng section 'content' --}}
{{-- (tương ứng với @yield('content') trong layout --}}
@section('content')
<h2 class="mb-3">DANH SÁCH THÀNH VIÊN</h2>

<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th style="width: 50px;">STT</th>
            <th style="width: 80px;">Avatar</th>
            <th>Họ và tên</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Giới tính</th>
            <th>Quyền hạn</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        {{-- Sử dụng $loop->iteration để tự động tăng số thứ tự từ 1 --}}
        @foreach($list as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">
                {{-- Nếu cột avatar trống hoặc không tồn tại, lấy ảnh default.png trong public/images/ --}}
                @php
                    $avatarName = (!empty($item->avatar)) ? $item->avatar : 'default.png';
                @endphp
                <img src="{{ asset('images/' . $avatarName) }}" 
                     alt="{{ $item->username }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
            </td>
            <td>{{ $item->fullname }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>
                {{ $item->gender == 1 ? 'Nam' : 'Nữ' }}
            </td>
            <td>
                @if($item->role == 1)
                    <span class="badge bg-danger">Admin</span>
                @else
                    <span class="badge bg-info">User</span>
                @endif
            </td>
            <td>
                @if($item->status == 1)
                    <span class="badge bg-success">Kích hoạt</span>
                @else
                    <span class="badge bg-danger">Khóa</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-3">
    {{ $list->links() }}
</div>
@endsection 