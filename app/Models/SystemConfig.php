<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    public static function getConfigByKey(string $key) {
        return self::query()->where('key', $key)->value('value');
    }
}
