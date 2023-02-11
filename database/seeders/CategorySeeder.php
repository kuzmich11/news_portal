<?php

namespace Database\Seeders;

use App\Services\ParserService;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $parser = new ParserService();
        $load = $parser->setLink('https://www.kommersant.ru/RSS/news.xml')->getParseData();
        $data = [];
        foreach ($load['news'] as $news) {
            if (!empty($data) and in_array($news['category'], array_column($data, 'title'))) {
                continue;
            }
            $data[] = [
                'title' => $news['category'],
                'description' => 'None',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
