<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use NewsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('homePage', [
            'categories' => $this->returnCategory(),
            'news'=>$this->returnNews(),
        ]);
    }

}
