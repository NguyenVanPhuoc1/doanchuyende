@extends('admin.layout.headerend')

@section('title', 'Quản Lí Sản Phẩm')

@section('body')
    <script>
        var products = @json($products);
        var categories = @json($categories);
    </script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper qlisanpham" id="qlisanpham">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class=" col-md-12 ">
                        <h1>Quản Lí</h1>
                        <div class="row">
                            <div class="d-flex">
                                <a class="btn btn-sm bg-gradient-primary text-white m-2" href="/admin/san-pham/create"
                                    title="Thêm mới">
                                    <i class="fas fa-plus mr-2">
                                    </i>Thêm mới
                                </a>
                                <a class="btn btn-sm bg-gradient-danger text-white m-2" id="delete-all" data-url="#"
                                    title="Xóa tất cả">
                                    <i class="far fa-trash-alt mr-2"></i>Xóa tất cả
                                </a>
                            </div>
                            <div class="form-inline form-search d-inline-block align-middle col-lg-3 w-100  mt-2 mb-2">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar text-sm" type="search" id="keyword"
                                        placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" onkeypress="">
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
                            <li class="breadcrumb-item active">Quản lí Sản Phẩm</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="container-fluid content">
            <!-- Danh mục -->
            <div class="card-footer form-group-category text-sm bg-light row">
                <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2">
                    <select id="id_list" name="id_list" onchange="displayProducts(this.value)"
                        class="form-control filter-category select2 select2-hidden-accessible" data-select2-id="id_list"
                        tabindex="-1" aria-hidden="true">
                        @isset($categories)
                            <option value="0" data-select2-id="2">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>
            <!-- Danh mục  -->
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách sản phẩm </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                @isset($products)
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
                                        <th class="align-middle text-center">Ảnh</th>
                                        <th class="align-middle" style="width: 30%;">Tên SP</th>
                                        <th class="align-middle text-center" style="width: 20%;">Danh mục</th>
                                        <th class="align-middle text-center">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Duyệt và hiển thị ra danh sách sản phẩm xuống bảng sản phẩm  --}}
                                    @foreach ($products as $product)
                                        <tr categoryID="{{ $product->cate_id }}">
                                            <td class="align-middle">
                                                <div class="custom-control custom-checkbox my-checkbox">
                                                    <input type="checkbox" class="custom-control-input select-checkbox"
                                                        id="select-checkbox" value="14">
                                                    <label for="select-checkbox" class="custom-control-label"></label>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-center m-1">{{ $product->id }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="/chi-tiet-san-pham/{{ $product->id }}">
                                                    <img class="rounded img-preview"
                                                        src="{{ asset('storage/' . $product->images->first()->file_name) }}"
                                                        alt="Ảnh sản phẩm" style="max-width: 70px; max-height: 55px;"> </a>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-dark text-break" href="#S">{{ $product->name }}</a>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-center">{{ $product->category->cate_name }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a class="btn text-primary mr-2" href="san-pham/{{ $product->id }}/edit"
                                                    title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                                {{-- <a class="text-danger" id="delete-item" href="#" title="Xóa"><i
                                                        class="fas fa-trash-alt"></i></a> --}}

                                                {{-- delete food --}}
                                                <form action="san-pham/{{ $product->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn text-danger" type="submit"
                                                        onclick="confirmDelete(event)"><i class="fas fa-trash-alt"
                                                            title="Xóa"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Hiển thị phân trang -->
                    {{ $products->links() }}
                @endisset
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('javascript')
    <script>
        const tableRows = document.querySelectorAll('.card-body.table-responsive.p-0 table.table-hover tbody tr');
        var products = @json($products);
        var categories = @json($categories);
        var productId;

        function displayProducts(categoryId) {
            if (categoryId == 0) {
                tableRows.forEach(function(row) {
                    row.classList.remove('d-none');
                });
                return;
            } else {
                tableRows.forEach(function(row) {
                    product_cate_id = row.getAttribute("categoryID");
                    console.log(product_cate_id);
                    if (product_cate_id != categoryId) {
                        row.classList.add('d-none');
                    } else {
                        row.classList.remove('d-none');
                    }
                });
            }
        }

        function confirmDelete(event) {
            event.preventDefault();
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
@endsection
