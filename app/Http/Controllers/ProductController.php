<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.sanpham', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.chitietsanpham', ['product' => $product]);
    }

    public function indexAdmin()
    {
        $products = Product::with('images')->get();
        $categories = Category::all();
        return view('admin.qlsanpham', ['products' => $products], ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.themsanpham', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Xử lý lưu thông tin sản phẩm vào bảng product
        $product = Product::create([
            'name' => $request->name,
            'cate_id' => $request->danhmuc,
            'noi_bat' => $request->noibat,
            'description' => $request->description,
        ]);

        // Xử lý lưu các file ảnh vào bảng images, liên kết với sản phẩm mới được tạo
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public', $fileName); // Lưu ảnh vào thư mục images (hoặc sử dụng disk khác)

                ProductImage::create([
                    'product_id' => $product->id,

                    // file_name sẽ tạo thêm một chuỗi dựa trên thời gian hiện tại, để tránh việc trùng tên file làm chúng bị ghi đè
                    'file_name' => $fileName
                    // Thêm các trường thông tin khác của ảnh
                ]);
            }
        }
        return redirect('admin/san-pham');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $categories = Category::all();
        return view('admin.suasanpham', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->update([
                'name' => $request->name,
                'cate_id' => $request->danhmuc,
                'noi_bat' => $request->noibat,
                'description' => $request->description
            ]);

        // Xử lý lưu các file ảnh vào bảng images, liên kết với sản phẩm mới được tạo
        if ($request->hasFile('images')) {
            // Xóa các hình ảnh cũ có cột product_id = $id trước khi thêm ảnh mới
            ProductImage::where('product_id', $id)->delete();

            foreach ($request->file('images') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public', $fileName); // Lưu ảnh vào thư mục images (hoặc sử dụng disk khác)

                ProductImage::create([
                    'product_id' => $id,

                    // file_name sẽ tạo thêm một chuỗi dựa trên thời gian hiện tại, để tránh việc trùng tên file làm chúng bị ghi đè
                    'file_name' => $fileName
                    // Thêm các trường thông tin khác của ảnh
                ]);
            }
        }
        return redirect('admin/san-pham');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Lấy thông tin sản phẩm cần xóa
        $product = Product::findOrFail($id);

        // Lấy danh sách các ảnh liên quan đến sản phẩm
        $images = $product->images;

        // Xóa các ảnh từ thư mục lưu trữ
        foreach ($images as $image) {
            Storage::delete('public/' . $image->file_name);
        }

        // Xóa các bản ghi ảnh từ cơ sở dữ liệu
        $product->images()->delete();

        // Xóa sản phẩm
        $product->delete();

        return redirect('admin/san-pham')->with('success', 'Sản phẩm đã được xóa thành công');
    }
}
