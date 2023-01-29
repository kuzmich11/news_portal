<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __construct(
        private $news = new News(),
        private $categories = new Category(),
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return \view('homePage', [
            'categories' => $this->categories->getCategories(),
            'news'=>$this->news->getNews(),
        ]);
    }

}
