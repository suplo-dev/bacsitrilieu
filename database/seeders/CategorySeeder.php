<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = ['HEADER', 'BODY_1', 'BODY_2', 'FOOTER'];
        $arraySub = [
            [
                'header1' => [
                    'header1.1',
                    'header1.2',
                    'header1.3',
                ],
                'header2' => [
                    'header2.1',
                    'header2.2',
                ],
                'header3' => [],
                'header4' => [],
            ],
            [
                'body_1.1',
                'body_1.2',
                'body_1.3',
            ],
            [
                'body_2.1',
                'body_2.2',
                'body_2.3',
                'body_2.4',
                'body_2.5',
                'body_2.6',
                'body_2.7',
                'body_2.8',
            ],
            [
                'footer1',
                'footer2',
                'footer3',
                'footer4',
            ]
        ];
        foreach ($array as $item) {
            Category::query()->create(['name' => $item]);
        }
        foreach($arraySub as $index => $item) {
            foreach ($item as $index2 => $sub) {
                if (is_array($sub)) {
                    $parent = Category::query()->create(['name' => $index2, 'parent_id' => $index + 1, 'slug' => Str::slug($index2)]);
                    foreach ($sub as $key => $value) {
                        Category::query()->create(['name' => $value, 'slug' => Str::slug($value), 'parent_id' => $parent->id, 'description' => 'Mọi thông tin cá nhân và nội dung buổi trị liệu đều được giữ kín. Bạn có thể yên tâm chia sẻ trong một môi trường an toàn và riêng tư..']);
                    }
                }
                else {
                    Category::query()->create(['name' => $sub, 'slug' => Str::slug($sub), 'parent_id' => $index + 1, 'description' => 'Mọi thông tin cá nhân và nội dung buổi trị liệu đều được giữ kín. Bạn có thể yên tâm chia sẻ trong một môi trường an toàn và riêng tư..']);
                }
            }
        }
    }
}
