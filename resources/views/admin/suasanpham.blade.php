@extends('admin.layout.headerend')

@section('title', 'Sửa sản phẩm')

@section('body')
    <div class="content-wrapper addproduct" id="themsanpham">
        <!-- Content Header (Page header) -->
        <section class="content-header ">
            <div class="container-fluid">
                <div class="row mb-2 ">
                    <div class=" col-md-12 ">
                        <h1>Sửa sản phẩm</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        @isset($product)
            <section class="content">
                <form id="form-sua" action="/admin/san-pham/{{ $product->id }}" class="validation-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- method PUT dùng cho việc eidt --}}
                    @method('PUT')
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
                                                            value="{{ $product->name }}" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="namevi">Mô tả (vi):</label>
                                                        <textarea required name="description" id="contentvi" cols="10" rows="5">{{ $product->description }}</textarea>
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
                                    <input name="images[]" style="display: none" type="file" id="upload-button"
                                        multiple accept="image/*" />
                                    <label id="lbl_chonanh" style="display: none" for="upload-button" class="btn btn-primary">
                                        Chọn ảnh
                                    </label>
                                    <!-- Hiển thị ảnh đã chọn -->
                                    <div id="image-display">
                                        @foreach ($product->images as $image)
                                            <figure><img src="{{ asset('storage/' . $image->file_name) }}">
                                                <figcaption>{{ $image->file_name }}</figcaption>
                                            </figure>
                                        @endforeach
                                    </div>
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
                                                        <option value="{{ $category->id }}"
                                                            @if ($category->id == $product->cate_id) selected @endif>
                                                            {{ $category->cate_name }}</option>
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
                                                <option value="0" {{ $product->noi_bat == 0 ? 'selected' : '' }}>Không</option>
                                                <option value="1" {{ $product->noi_bat == 1 ? 'selected' : '' }}>Nổi bật</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Thông báo lỗi -->
                        <div id="error"></div>
                        <input type="submit" class="btn btn-warning mt-5 mb-5 w-100" value="Sửa sản phẩm">
                    </div>
                    <!-- /.card -->
                </form>
            </section>
        @endisset
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
        let = description = document.querySelector('#contentvi');
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

        // Xử lí khi người dùng chọn ảnh
        const addImagesToDisplay = (files) => {
            Array.from(files).forEach((file) => {
                fileHandler(file, file.name, file.type);
            });
        };

        // Xóa tất cả ảnh đã chọn
        const clearImages = () => {
            let chonAnh = document.getElementById('lbl_chonanh');

            // nếu người dùng không chỉnh sửa gì về ảnh, thì ảnh sẽ không thay đổi, nhưng nếu chọn lại thì bắt buộc không được để trống
            uploadButton.setAttribute('required', true);

            chonAnh.style.display = "unset";
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
