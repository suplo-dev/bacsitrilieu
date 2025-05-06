<?php

use App\Enums\CategoryTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();
            $table->string('background_color', 50)->nullable()->default('#3182CE');
            $table->text('icon')->nullable()->default('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGNsYXNzPSJsdWNpZGUgbHVjaWRlLWhlYXJ0LXBsdXMtaWNvbiBsdWNpZGUtaGVhcnQtcGx1cyI+PHBhdGggZD0iTTEzLjUgMTkuNSAxMiAyMWwtNy03Yy0xLjUtMS40NS0zLTMuMi0zLTUuNUE1LjUgNS41IDAgMCAxIDcuNSAzYzEuNzYgMCAzIC41IDQuNSAyIDEuNS0xLjUgMi43NC0yIDQuNS0yYTUuNSA1LjUgMCAwIDEgNS40MDIgNi41Ii8+PHBhdGggZD0iTTE1IDE1aDYiLz48cGF0aCBkPSJNMTggMTJ2NiIvPjwvc3ZnPg==');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
