<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Number;
use Nette\Utils\Random;

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
                'thumbnail_url' => 'p/1/1.jpg',
                'slug' => 'phuc-hoi-ky-dieu-sau-2-phau-thuat-tim-mach-trong-mot-lan-mo',
                'category_id' => 1,
                'created_at' => now(),
                'fake_view' => rand(5000, 10000),
            ],
            [
                'user_id' => 1,
                'title' => 'Hội chứng Wolff-Parkinson-White (Phần 1)',
                'body' => '<p>body</p>',
                'thumbnail_url' => 'p/2/1.jpg',
                'slug' => 'hoi-chung-wolff-parkinson-white-phan-1',
                'category_id' => 1,
                'created_at' => now(),
                'fake_view' => rand(5000, 10000),
            ],
            [
                'user_id' => 1,
                'title' => 'Hội chứng Wolff-Parkinson-White (Phần 2)',
                'body' => '<p>body</p>',
                'thumbnail_url' => 'p/3/1.jpg',
                'slug' => 'hoi-chung-wolff-parkinson-white-phan-2',
                'category_id' => 1,
                'created_at' => now(),
                'fake_view' => rand(5000, 10000),
            ],
        ]);
    }
}
