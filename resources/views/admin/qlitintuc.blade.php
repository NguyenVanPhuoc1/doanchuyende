    @extends('admin.layout.headerend')

    @section('title', 'Quản Lí Tin Tức')

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
                            <li class="breadcrumb-item"><a href="#">Bảng Điều Khiển</a></li>
                            <li class="breadcrumb-item active">Quản Lí Tin Tức</li>
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
                    <h3 class="card-title">Danh Sách Tin Tức</h3>

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
                                    <th class="align-middle text-center">Hình</th>
                                    <th class="align-middle text-center"style="width: 40%;" >Tiêu Đề</th>
                                    <th class="align-middle text-center">Nổi Bật</th>
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
                                        <a href="#" title="Bàn ăn">
                                            <img class="rounded img-preview" src="{{ asset('front/public/image/ban_an.jpg')}}" alt="Bàn ăn" style="max-width: 70px; max-height: 55px;">                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="text-dark text-break" href="#S"
                                            title="SANITARY EQUIMENT">SANITARY EQUIMENT</a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-hienthi-14"
                                                data-table="product_list" data-id="14" data-attr="hienthi" checked="">
                                            <label for="show-checkbox-hienthi-14" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-md text-nowrap">
                                        <a class="text-primary mr-2" href="#"
                                            title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
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