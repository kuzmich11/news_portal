<?php

namespace Database\Seeders;

use App\Enums\NewsStatusEnum;
use App\Services\ParserService;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $parser = new ParserService();
        $load = $parser->setLink('https://www.kommersant.ru/RSS/news.xml')->getParseData();
        $data = [];
        foreach ($load['news'] as $news) {
            $data[] = [
                'title' => $news['title'],
                'description' => $news['description'],
                'author' => 'Комерсант',
                'status' => NewsStatusEnum::DRAFT->value,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
