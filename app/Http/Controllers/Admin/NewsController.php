<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.news.index', [
            'newsList' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @return View
     */
    public function create(CategoryQueryBuilder $categoryQueryBuilder,): View
    {
       return \view('admin.news.create', [
           'categories' => $categoryQueryBuilder->getAll(),
           'statusList' => NewsStatusEnum::all(),
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success', 'Новость добавлена');
        }

        return \back()->with('error', 'Не удалось добавить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoryQueryBuilder $categoryQueryBuilder): View
    {
//        dd($news);
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoryQueryBuilder->getAll(),
            'statusList' => NewsStatusEnum::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success', 'Новость изменена');
        }

        return \back()->with('error', 'Не удалось изменить новость');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
