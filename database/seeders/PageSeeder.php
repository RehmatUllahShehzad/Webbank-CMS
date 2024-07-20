<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Topdot\Cms\Models\Page;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = config('pages');
        
        foreach($pages as $key => $id)
        {
            if(!Page::whereId($id)->exists())
            {
                $title = Str::replace('-', ' ', $key);
                $title = Str::title($title);
                $page = Page::create([
                    'id' => $id,
                    'title' => $title,
                ]);
                echo "Page '{$title}' created\n";
            }
            else
            {
                echo "Page '{$key}' already exists\n";
            }
        }
    }
}
