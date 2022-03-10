<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $body = '';

            for ($j = 0; $j < 10; $j++) {
                $body .= Str::random(10) . ' ';
            }

            DB::table('posts')->insert([
                'author_id' => 1,
                'title' => Str::random(10) . ' ' . Str::random(5),
                'body' => $body,
                'slug' => Str::random(10),
                'active' => 1,
            ]);
        }
    }
}
