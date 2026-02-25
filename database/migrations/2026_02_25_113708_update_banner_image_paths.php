<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update banner image paths to remove 'uploads/' prefix
        // Since we're using the 'uploads' disk, paths should be relative to public/uploads/
        DB::table('banners')->update([
            'image' => DB::raw("REPLACE(image, 'uploads/', '')")
        ]);
    }

    public function down(): void
    {
        // Restore the 'uploads/' prefix
        DB::table('banners')
            ->whereNotNull('image')
            ->where('image', 'NOT LIKE', 'uploads/%')
            ->update([
                'image' => DB::raw("CONCAT('uploads/', image)")
            ]);
    }
};
