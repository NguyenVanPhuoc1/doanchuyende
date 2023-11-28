@extends('admin.layout.headerend')

@section('title', 'Quản Lí Logo')

@section('body')
    <div class="content-wrapper qlidanhmuc" id="qlidanhmuc">
        <!-- Content Header (Page header) -->
        <section class="content-header ">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class=" col-md-12 ">
                        <h1>Quản Lí Logo</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content-header ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="d-flex">
                                <a class="btn btn-sm bg-gradient-primary text-white m-2" href="#" title="Thêm mới">
                                    <i class="fas fa-save mr-2">
                                    </i>Lưu
                                </a>
                                <a class="btn btn-sm bg-gradient-danger text-white m-2" id="delete-all" data-url="#"
                                    title="Xóa tất cả">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <img src="image/logo_web.png" alt="" width="400px" height="400px">
        <input type="file">
        <!-- /.content -->
    @endsection
