<?php

namespace Database\Seeders;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'author' => \fake()->userName(),
                'status' => NewsStatusEnum::DRAFT->value,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
