<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return \view('category.index', [
//            'categories' => $this->returnCategory(),
            'categories' => $this->categories->getCategories(),
        ]);
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
     * @param \Illuminate\Http\Request $request
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
        int                  $id,
        CategoryQueryBuilder $categoryQueryBuilder,
        NewsQueryBuilder     $newsQueryBuilder
    ): View
    {
        return \view('category.show', [
            'id' => $id,
            'categories' => $categoryQueryBuilder->getAll(),
            'news' => $newsQueryBuilder->getNewsByCategoryId($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
