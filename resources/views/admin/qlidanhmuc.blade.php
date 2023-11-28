@extends('admin.layout.headerend')

@section('title', 'Quản Lí Danh Mục')

@section('body')
   
    <!-- Danh Mục -->
    <div class="content-wrapper qlidanhmuc" id="qlidanhmuc">
        <!-- Content Header (Page header) -->
        <section class="content-header ">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class=" col-md-12 ">
                        <h1>Quản Lí</h1>
                        <div class="row">
                            <div class="d-flex">
                                <a class="btn btn-sm bg-gradient-primary text-white m-2" href="#" title="Thêm mới">
                                    <i class="fas fa-plus mr-2">
                                    </i>Thêm mới
                                </a>
                                <a class="btn btn-sm bg-gradient-danger text-white m-2" id="delete-all" data-url="#" title="Xóa tất cả">
                                    <i class="far fa-trash-alt mr-2"></i>Xóa tất cả
                                </a>
                            </div>
                            <div class="form-inline form-search d-inline-block align-middle col-lg-3 w-100  mt-2 mb-2">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" onkeypress="">
                                    <div class="input-group-append bg-primary rounded-right">
                                        <button class="btn btn-navbar text-white" type="button" onclick="">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="index.php">Bảng Điều Khiển</a></li>
                            <li class="breadcrumb-item active">Quản lí danh mục cấp 1</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-primary card-outline text-sm mb-0">
                <div class="card-header">
                    <h3 class="card-title">Danh sách Product cấp 1</h3>
                </div>
                <!-- card-body table-responsive p-0 -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead> 
                            <tr>
                                <th class="align-middle" style="width: 5%;">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                        <label for="selectall-checkbox" class="custom-control-label"></label>
                                    </div>
                                </th>
                                <th class="align-middle text-center" style="width: 10%;">STT</th>
                                <th class="align-middle"style="width: 30%;" >Tiêu Đề</th>
                                <th class="align-middle text-center">Nổi Bật</th>
                                <!-- <th class="align-middle text-center">Hiển Thị</th> -->
                                <th class="align-middle text-center">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-14" value="14">
                                        <label for="select-checkbox-14" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <p class="text-center m-1">1</p>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="#"
                                        title="SANITARY EQUIMENT">SANITARY EQUIMENT</a>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-14"
                                            data-table="product_list" data-id="14" data-attr="noibat" checked="">
                                        <label for="show-checkbox-noibat-14" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <!-- <td class="align-middle text-center">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-hienthi-14"
                                            data-table="product_list" data-id="14" data-attr="hienthi" checked="">
                                        <label for="show-checkbox-hienthi-14" class="custom-control-label"></label>
                                    </div>
                                </td> -->
                                <td class="align-middle text-center text-md text-nowrap">
                                    <a class="text-primary mr-2" href="#"
                                        title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                    <a class="text-danger" id="delete-item" href="#"
                                        data-url="#" title="Xóa"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('javascript')
   
@endsection
