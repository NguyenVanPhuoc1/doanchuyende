@extends('admin.layout.dashboard')
 @section('content')
    <div class="form-tt">
        <h4>Đăng Nhập Hệ Thống</h4>
        <form action="{{route('login.custom')}}" method="post" name="login">
            @csrf
            <input type="text" name="name" placeholder="Name" required autofocus>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <br>
            <input type="email" name="email" placeholder="Email" />
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <br>
            <input type="password" name="password" placeholder="Password" />
            @if ($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
            <input type="submit" name="submit" value="Đăng nhập" />
        </form>
    </div>
    <!-- Hiển thị Thông báo khi đăng nhập sai -->
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
@endsection