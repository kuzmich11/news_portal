<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\DataSources;
use App\QueryBuilders\SourceQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @return string
     */
    public function __invoke(Request $request, Parser $parser, SourceQueryBuilder $sourceQueryBuilder): string
    {
        $sources = $sourceQueryBuilder->getAll();
//        $urls = [
//            "https://news.rambler.ru/rss/technology",
//            "https://news.rambler.ru/rss/moscow_city",
//        ];
        foreach ($sources as $source) {
            \dispatch(new JobNewsParsing($source->resource_url));
        }
        return "Parsing completed";
    }
}
