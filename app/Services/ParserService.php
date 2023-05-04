<?php

namespace App\Services;

use App\Enums\NewsStatusEnum;
use App\Http\Requests\News\CreateRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,description,category]'
            ],
        ]);


        foreach ($data['news'] as $news) {
            if (News::where('title', '=', $news['title'])->first() === null) {
                $newsModel = News::Create([
                    'title' => $news['title'],
                    'link' => $news['link'],
                    'description' => $news['description'],
                ]);
                $categoryModel = Category::firstOrCreate([
                    'title' => $news['category'],
                ]);
                \DB::table('categories_has_news')->insert([
                    'category_id' => $categoryModel['id'],
                    'news_id' => $newsModel['id'],
                ]);
            }

        }
    }
}
