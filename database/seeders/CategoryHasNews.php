<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryHasNews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('categories_has_news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'category_id' => rand(1, 5),
                'news_id' => rand(1, 20),
            ];
        }
        return $data;
    }
}
