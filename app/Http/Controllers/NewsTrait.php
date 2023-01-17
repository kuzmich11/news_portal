<?php

namespace App\Http\Controllers;

trait NewsTrait
{
    public function returnCategory (int $categoryId = null): array
    {
        $category = [];
        $quantityCategory = 5;

        if ($categoryId === null) {
            for ($i = 1; $i <= $quantityCategory; $i++) {
                $category[$i] = [
                    'id' => $i,
                    'title' => fake()->jobTitle()
                ];
            }
            return $category;
        }
        return [
            'id' => $categoryId,
            'title' => fake()->jobTitle()
        ];
    }
    public function returnNews (int $newsId = null): array
    {
        $news = [];
        $quantityNews = 20;

        if ($newsId === null) {
            for ($i = 1; $i <= $quantityNews; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y H:i'),
                    'category_id' => rand(1, 6)
                ];
            }
            return $news;
        }
        return [
            'id' => $newsId,
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format('d-m-Y H:i'),
            'category_id' => rand(1, 6)
        ];
    }
}
