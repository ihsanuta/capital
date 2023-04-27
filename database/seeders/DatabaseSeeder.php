<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('artikels')->insert([
            'judul' => 'Artikel Single Point',
            'konten' => '<p>KONTEN ARTIKEL</p>',
            'point' => 'single',
        ]);

        DB::table('artikels')->insert([
            'judul' => 'Artikel Multiple Point',
            'konten' => '<p>KONTEN ARTIKEL</p>',
            'point' => 'multiple',
        ]);
    }
}
