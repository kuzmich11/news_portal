<?php

namespace App\Http\Controllers;

use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

class HomePageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(
        CategoryQueryBuilder $categoryQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
    ): View {
//        dd($newsQueryBuilder->model);
        return \view('homePage', [
            'categories' => $categoryQueryBuilder->getAll(),
            'news'=>$newsQueryBuilder->getAll(),
        ]);
    }

}
