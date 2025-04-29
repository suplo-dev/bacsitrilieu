<?php

namespace App\Http\Controllers;

use App\Enums\SystemConfigKeyEnum;
use App\Models\Category;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() {
        return Inertia::render('HomePage');
    }
}
