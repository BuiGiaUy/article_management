<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Tiêu đề bài viết 1',
                'slug' => 'tieu-de-bai-viet-1',
                'description' => 'Mô tả cho bài viết 1',
                'image' => 'image1.jpg',
                'content' => 'Nội dung của bài viết 1',
            ],
            [
                'title' => 'Tiêu đề bài viết 2',
                'slug' => 'tieu-de-bai-viet-2',
                'description' => 'Mô tả cho bài viết 2',
                'image' => 'image2.jpg',
                'content' => 'Nội dung của bài viết 2',
            ],
            // Thêm bài viết khác nếu cần
        ];
        for ($i = 3; $i <= 12; $i++) {
            $posts[] = [
                'title' => 'Tiêu đề bài viết ' . $i,
                'slug' => 'tieu-de-bai-viet-' . $i,
                'description' => 'Mô tả cho bài viết ' . $i,
                'image' => 'image' . $i . '.jpg',
                'content' => 'Nội dung của bài viết ' . $i,
            ];
        }
        // Insert dữ liệu vào bảng 'posts'
        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
