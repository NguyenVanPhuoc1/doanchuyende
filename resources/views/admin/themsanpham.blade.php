@extends('admin.layout.headerend')

@section('title', 'Thêm sản phẩm')

@section('body')
    <div class="content-wrapper addproduct" id="themsanpham">
        <!-- Content Header (Page header) -->
        <section class="content-header ">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class=" col-md-12 ">
                        <h1>Thêm sản phẩm</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="/admin/san-pham" class="validation-form" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Default box -->
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card card-primary card-outline text-sm mb-0">
                            <div class="card-header">
                                <h3 class="card-title">Nội dung Product</h3>
                            </div>
                            <!-- card-body table-responsive p-0 -->
                            <div class="card-body ">

                                <div class="card card-primary card-outline card-outline-tabs">
                                    <div class="card-header p-0 border-bottom-0">
                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="tabs-lang" data-toggle="pill"
                                                    href="#tabs-lang-vi" role="tab" aria-controls="tabs-lang-vi"
                                                    aria-selected="true">Tiếng Việt</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body card-article">
                                        <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                            <div class="tab-pane fade show active" id="tabs-lang-vi" role="tabpanel"
                                                aria-labelledby="tabs-lang">
                                                <div class="form-group">
                                                    <label for="namevi">Tên Sản Phẩm (vi):</label>
                                                    <input type="text" class="form-control for-seo text-sm"
                                                        name="name" id="namevi" placeholder="Tiêu đề (vi)"
                                                        value="" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="contentvi">Mô tả (vi):</label>
                                                    <textarea name="description" id="contentvi" cols="10" rows="80"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline text-sm mb-0">
                            <div class="card-header">
                                <h3 class="card-title">Bộ sưu tập ảnh</h3>
                            </div>
                            <!-- card-body table-responsive p-0 -->
                            <div class="card-body">
                                <!-- Vùng để chọn nhiều ảnh -->
                                <input required name="images[]" style="display: none" type="file" id="upload-button"
                                    multiple accept="image/*" />
                                <label for="upload-button" class="btn btn-primary">
                                    Chọn ảnh
                                </label>
                                <!-- Hiển thị ảnh đã chọn -->
                                <div id="image-display"></div>
                                <!-- Thông báo lỗi -->
                                <div id="error"></div>
                                <!-- Thêm nút Xóa ảnh -->
                                <button type="button" id="clear-button" class="btn btn-danger">Chọn lại</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group-category row">
                                    <div class="form-group col-xl-12 col-sm-12">
                                        <select required name="danhmuc" data-level="0" data-type="product"
                                            class="form-control select2 select-category select2-hidden-accessible"
                                            aria-hidden="true">
                                            <option value="">Chọn danh mục</option>
                                            @isset($categories)
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Sản phẩm nổi bật</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group-category row">
                                    <div class="form-group col-xl-12 col-sm-12">
                                        <select required name="noibat" data-level="0" data-type="product"
                                            class="form-control select2 select-category select2-hidden-accessible"
                                            aria-hidden="true">
                                            <option value="0">Không</option>
                                            <option value="1">Nổi bật</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success mt-5 mb-5 w-100" value="Thêm sản phẩm">
                </div>
                <!-- /.card -->
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('javascript')
    <script>
        ClassicEditor
            .create(document.querySelector('#contentvi'))
            .catch(error => {
                console.error(error);
            });

        // Lấy các phần tử HTML
        let uploadButton = document.getElementById("upload-button");
        let error = document.getElementById("error");
        let imageDisplay = document.getElementById("image-display");
        let btnClear = document.getElementById("clear-button");

        // Xử lý khi người dùng chọn ảnh
        const fileHandler = (file, name, type) => {
            // Kiểm tra nếu không phải là file ảnh
            if (type.split("/")[0] !== "image") {
                error.innerText = "Vui lòng chọn file ảnh";
                return false;
            }
            error.innerText = "";

            // Đọc và hiển thị ảnh
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = () => {
                let imageContainer = document.createElement("figure");
                let img = document.createElement("img");
                img.src = reader.result;
                imageContainer.appendChild(img);
                imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
                imageDisplay.appendChild(imageContainer);
            };
        };

        // Thêm ảnh vào vùng hiển thị
        const addImagesToDisplay = (files) => {
            Array.from(files).forEach((file) => {
                fileHandler(file, file.name, file.type);
            });
        };

        // Xóa tất cả ảnh đã chọn
        const clearImages = () => {
            imageDisplay.innerHTML = ""; // Xóa tất cả các ảnh
            btnClear.style.display = "none";
            uploadButton.value = null;
        };

        // Xử lý sự kiện khi người dùng chọn file
        uploadButton.addEventListener("change", (e) => {
            addImagesToDisplay(e.target.files);
            btnClear.style.display = "unset";
        });

        // Xử lý sự kiện khi người dùng click vào nút xóa ảnh
        btnClear.addEventListener("click", clearImages);
    </script>
@endsection
