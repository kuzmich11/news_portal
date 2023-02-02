<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(
        private $news = new News(),
        private $categories = new Category()
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function show(
        int $id,
        CategoryQueryBuilder $categoryQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
    ): View {
//        dd($newsQueryBuilder->getNewsById($id));
        return \view('news.news', [
            'categories' => $categoryQueryBuilder->getAll(),
            'news'=>$newsQueryBuilder->getNewsById($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
