<?php

namespace Database\Seeders;

use App\Enums\SystemConfigKeyEnum;
use App\Models\SystemConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemConfig::query()->insert([
            [
                'key' => SystemConfigKeyEnum::CATEGORY_HEADER,
                'value' => 1,
            ],
            [
                'key' => SystemConfigKeyEnum::CATEGORY_BODY_1,
                'value' => 2,
            ],
            [
                'key' => SystemConfigKeyEnum::CATEGORY_BODY_2,
                'value' => 3,
            ],
            [
                'key' => SystemConfigKeyEnum::CATEGORY_FOOTER,
                'value' => 4,
            ],
        ]);
    }
}
