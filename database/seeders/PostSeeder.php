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
        Post::query()->insert([
            [
                'user_id' => 1,
                'title' => 'PHỤC HỒI KỲ DIỆU SAU 2 PHẪU THUẬT TIM MẠCH TRONG MỘT LẦN MỔ',
                'body' => '<p>body</p>',
                'thumbnail_url' => 'thumbnails/UjIqAI04JecT929HDmjWsha8PzTV27hU3c5kBfB2.jpg',
                'slug' => 'phuc-hoi-ky-dieu-sau-2-phau-thuat-tim-mach-trong-mot-lan-mo',
                'category_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Hội chứng Wolff-Parkinson-White (Phần 1)',
                'body' => '<p>body</p>',
                'thumbnail_url' => 'thumbnails/UjIqAI04JecT929HDmjWsha8PzTV27hU3c5kBfB2.jpg',
                'slug' => 'hoi-chung-wolff-parkinson-white-phan-1',
                'category_id' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Hội chứng Wolff-Parkinson-White (Phần 2)',
                'body' => '<p>body</p>',
                'thumbnail_url' => 'thumbnails/UjIqAI04JecT929HDmjWsha8PzTV27hU3c5kBfB2.jpg',
                'slug' => 'hoi-chung-wolff-parkinson-white-phan-2',
                'category_id' => 2,
                'created_at' => now(),
            ],
        ]);
    }
}
