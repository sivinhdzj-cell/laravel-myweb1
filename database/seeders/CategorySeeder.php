<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            
            // Tạo tên danh mục ngẫu nhiên bằng tiếng Anh (gồm 3 từ)
            $name = fake()->unique()->words(3, true);
            
            DB::table('categories')->insert([
                // Thay thế $request bằng việc sử dụng dữ liệu fake mẫu tự động
                'catename'    => ucfirst($name), // Viết hoa chữ cái đầu cho đẹp
                'slug'        => Str::slug($name), // Tự động chuyển đổi chuỗi thành dạng slug (vi-du-slug)
                'status'      => fake()->numberBetween(0, 1),
                'sort_order'  => $i,
                'description' => fake()->sentence(30),
                'created_at'  => now(),
                'updated_at'  => now()
            ]);
        }
    }
}