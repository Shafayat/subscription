<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Website::create(['name' => 'Example Site', 'url' => 'https://example.com']);
        Website::create(['name' => 'Another Site', 'url' => 'https://another.com']);
        Website::create(['name' => 'Yet Another Site', 'url' => 'https://yetanother.com']);
    }
}
