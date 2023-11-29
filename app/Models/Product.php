<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productImage;
use App\Models\productComment;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey ='id';
    protected $guarded =[];

    //Mối quan hệ một-một được thiết lập bằng cách sử dụng phương thức hasOne và belongsTo.
    // One-to-Many (Mối quan hệ một-nhiều) Mối quan hệ một-nhiều được thiết lập bằng cách sử dụng phương thức hasMany và belongsTo.
    // Many-to-Many (Mối quan hệ nhiều-nhiều)   Mối quan hệ nhiều-nhiều được thiết lập bằng cách sử dụng phương thức belongsToMany
    // Has Many Through (Mối quan hệ qua nhiều) Mối quan hệ "has many through" được sử dụng khi bạn muốn thiết lập mối quan hệ giữa hai mô hình thông qua một mô hình trung gian

    //1 sản phẩm có nhiều hình
    public function images(){
        return $this->hasMany(ProductImage::class);   
    }

    //1 sản phẩm có nhiều comment
    public function productComment(){
        return $this->hasMany(ProductComment::class,'pro_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
