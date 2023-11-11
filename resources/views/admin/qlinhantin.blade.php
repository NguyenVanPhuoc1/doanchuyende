@extends('admin.layout.headerend')

@section('title', 'Quản Lí Nhận Tin')

@section('body')

<!-- difference here  Body -->
<div class="content-wrapper qlitintuc" id="qlitintuc">
        <!-- Content Header (Page header) -->
        <section class="content-header ">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class=" col-md-12 ">
                        <h1>Quản Lí</h1>
                        <div class="row">
                            <div class="d-flex">
                                <a class="btn btn-sm bg-success text-white m-2" href="#" title="Thêm mới">
                                    <i class="fas fa-paper-plane mr-2">
                                    </i>Gửi Email
                                </a>
                                <!-- <a class="btn btn-sm bg-gradient-primary text-white m-2" href="#" title="Thêm mới">
                                    <i class="fas fa-plus mr-2">
                                    </i>Thêm mới
                                </a> -->
                                <a class="btn btn-sm bg-gradient-danger text-white m-2" id="delete-all" data-url="#" title="Xóa tất cả">
                                    <i class="far fa-trash-alt mr-2"></i>Xóa tất cả
                                </a>
                            </div>
                            <!-- <div class="form-inline form-search d-inline-block align-middle col-lg-3 w-100  mt-2 mb-2">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" onkeypress="">
                                    <div class="input-group-append bg-primary rounded-right">
                                        <button class="btn btn-navbar text-white" type="button" onclick="">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">Bảng Điều Khiển</a></li>
                            <li class="breadcrumb-item active">Quản Lí Nhận Tin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Người Gửi</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead> 
                                <tr>
                                    <th class="align-middle" style="width: 5%;">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="selectall-checkbox1">
                                            <label for="selectall-checkbox1" class="custom-control-label"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle text-center" style="width: 10%;">STT</th>
                                    <th class="align-middle text-center">Tên</th>
                                    <th class="align-middle"style="width: 20%;" >Email</th>
                                    <!-- <th class="align-middle"style="width: 30%;" >Nội Dung</th> -->
                                    <th class="align-middle text-center">Ngày Gửi</th>
                                    <th class="align-middle text-center">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox" value="14">
                                            <label for="select-checkbox" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-center m-1">1</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        Nguyễn văn Phước
                                    </td>
                                    <td class="align-middle">
                                        phuoc031123@gmail.com
                                    </td>
                                    <!-- <td class="align-middle text-center">
                                        <div class="custom-control custom-checkbox my-checkbox pl-0">
                                            <p class="text-truncate" style="overflow: hidden; text-overflow: ellipsis; white-space: normal; -webkit-box-orient: vertical;display: -webkit-box;
                                            -webkit-line-clamp: 3; text-align: justify;
                                        ">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                                                Id est beatae doloribus maiores ipsum voluptatibus magnam animi, ratione distinctio consequuntur perferendis impedit deleniti saepe hic odio minima perspiciatis, autem sequi.
                                            </p>
                                        </div>
                                    </td>
                                     -->
                                     <td class="align-middle text-center text-md text-nowrap">
                                        3/11/2023
                                    </td>
                                    <td class="align-middle text-center text-md text-nowrap">
                                        <!-- <a class="text-primary mr-2" href="#"
                                            title="Chỉnh sửa"><i class="fas fa-edit"></i></a> -->
                                        <a class="text-danger" id="delete-item" href="#"  title="Xóa"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->

        <!-- Main content -->
        <section class="content">
            <form action="#" class="validation-form" method="post" enctype="multipart/form-data">
                <!-- Default box -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-primary card-outline text-sm mb-0">
                            <div class="card-header">
                                <h3 class="card-title">Gửi Email đến danh sách được chọn</h3>
                            </div>
                            <!-- card-body table-responsive p-0 -->
                            <div class="card-body ">
                                
                                <div class="card card-primary card-outline card-outline-tabs">
                                    <div class="card-body card-article">
                                        <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                            <div class="tab-pane fade show active" id="tabs-lang-vi" role="tabpanel" aria-labelledby="tabs-lang">
                                                <div class="form-group">
                                                    <label for="email_name">Tiêu đề :</label>
                                                    <input type="text" class="form-control for-seo text-sm" name="data[email_name]" id="email_name" placeholder="Tiêu đề" value="" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="content_email">Nội dung cần gửi:</label>
                                                    <textarea class="form-control for-seo text-sm" name="content_email" id="content_email" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                
                <!-- /.card -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- difference here -->
    
    <!-- Modal xóa tất cả -->
    <div class="modal" id="confirmationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa tất cả?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa tất cả các bài viết không?
                </div>
                <div class="modal-footer">
                    <button id="confirmDelete" type="button" class="btn btn-danger">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script src="{{ asset('admin/dist/js/quanli.js')}}"></script>
@endsection