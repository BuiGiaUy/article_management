<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        // Tạo dữ liệu cho bảng 'seos' dựa trên bài viết
        foreach ($posts as $post) {
            Seo::create([
                'seo_keywords' => 'Từ khóa SEO cho ' . $post->title,
                'seo_description' => 'Mô tả SEO cho ' . $post->title,
                'seo_title' => 'Tiêu đề SEO cho ' . $post->title,
                'post_id' => $post->id, // Sử dụng ID của bài viết tương ứng
            ]);
        }
    }
}
