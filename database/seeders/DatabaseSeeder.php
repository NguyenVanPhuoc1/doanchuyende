<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Table product
        DB::table('product')->insert([
            [
                'name' => 'Ban go',
                'cate_id' => 1,
                'image'=> 'hinh1.jpg',
                'description'=>'0',
                'noi_bat' => 'true'
            ],
            [
                'name' => 'Ban go',
                'cate_id' => 2,
                'image'=> 'hinh2.jpg',
                'description'=>'0',
                'noi_bat' => 'false'
            ],
            [
                'name' => 'Ban go',
                'cate_id' => 3,
                'image'=> 'hinh3.jpg',
                'description'=>'0',
                'noi_bat' => 'true'
            ]
        ]);
        // Table product_image
        DB::table('product_image')->insert([
            [
                'pro_image'=> 'hinh1.jpg',
                'pro_id' => 1
                
            ],
            [
                'pro_image'=> 'hinh2.jpg',
                'pro_id' => 1
                
            ],
            [
                'pro_image'=> 'hinh3.jpg',
                'pro_id' => 2
                
            ],
            [
                'pro_image'=> 'hinh4.jpg',
                'pro_id' => 2
                
            ],
            [
                'pro_image'=> 'hinh3.jpg',
                'pro_id' => 3
                
            ],
            [
                'pro_image'=> 'hinh3.jpg',
                'pro_id' => 3
                
            ],         
        ]);
        // Table comment
        DB::table('comment')->insert([
            [ 
                'pro_id' => 1,
                'name' => 'Customer1',
                'email'=> 'cus1@gmail.com.vn',
                'content'=>'So beautiful'
            ],
            [
                'pro_id' => 2,
                'name' => 'Customer2',
                'email'=> 'cus2@gmail.com.vn',
                'content'=>'So beautiful'
            ],
            [
                'pro_id' => 1,
                'name' => 'Customer3',
                'email'=> 'cus3@gmail.com.vn',
                'content'=>'So beautiful'
            ]
        ]);
        // Table category
        DB::table('category')->insert([
            [ 
                'cate_name' => 'Ban',
                'noi_bat'=> 'true'
            ],
            [
                'cate_name' => 'Ghe',
                'noi_bat'=> 'false'
            ],
            [
                'cate_name' => 'Ban da',
                'noi_bat'=> 'true'
            ]
        ]);
        // Table policy
        DB::table('policy')->insert([
            [ 
                'poli_name' => 'Bao hanh',
                'description' => 'Bao hanh doi tra trong vong sau thang',
                'noi_bat'=> 'true'
            ],
            [
                'poli_name' => 'Doi tra',
                'description' => 'Bao hanh doi tra trong vong sau thang',
                'noi_bat'=> 'true'
            ],
            [
                'poli_name' => 'Bao duong',
                'description' => 'Bao duong tan noi chuyen nghiep',
                'noi_bat'=> 'true'
            ]
        ]);
        // Table customers
        DB::table('customers')->insert([
            [ 
                'cus_name' => 'Cus1',
                'cus_email' => 'cus1@gmail.com',
                'cus_phone'=> '0123456789',
                'cus_content'=> 'No comment'
            ],
            [
                'cus_name' => 'Cus2',
                'cus_email' => 'cus2@gmail.com',
                'cus_phone'=> '0123456789',
                'cus_content'=> 'No comment'
            ],
            [
                'cus_name' => 'Cus3',
                'cus_email' => 'cus3@gmail.com',
                'cus_phone'=> '0123456789',
                'cus_content'=> 'No comment'
            ]
        ]);
        // Table news
        DB::table('news')->insert([
            [ 
                'news_name' => 'Bai viet 1',
                'news_image' => 'hinhv1.jpg',
                'news_desc'=> 'noi dung bai viet nay dang duoc cap nhat',
                'cus_id'=> 1,
                'noi_bat'=> 'true'
            ],
            [
                'news_name' => 'Bai viet 2',
                'news_image' => 'hinhv2.jpg',
                'news_desc'=> 'noi dung bai viet nay dang duoc cap nhat',
                'cus_id'=> 2,
                'noi_bat'=> 'true'
            ],
            [
                'news_name' => 'Bai viet 3',
                'news_image' => 'hinhv3.jpg',
                'news_desc'=> 'noi dung bai viet nay dang duoc cap nhat',
                'cus_id'=> 3,
                'noi_bat'=> 'true'
            ]
        ]);
        // Table news
        DB::table('info_admin')->insert([
            [ 
                'info_name' => 'Admin1',
                'hotline' => '01593578624',
                'phone'=> '0123456987',
                'gioitinh'=> 'male',
                'diachi'=> 'Thu duc'
            ],
            [
                'info_name' => 'Admin2',
                'hotline' => '01593578624',
                'phone'=> '0123456987',
                'gioitinh'=> 'male',
                'diachi'=> 'Thu duc'
            ],
            [
                'info_name' => 'Admin3',
                'hotline' => '01593578624',
                'phone'=> '0123456987',
                'gioitinh'=> 'female',
                'diachi'=> 'Thu duc'
            ]
        ]);
    }
    
}
