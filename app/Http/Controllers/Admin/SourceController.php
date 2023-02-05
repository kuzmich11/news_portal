<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSources;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SourceQueryBuilder $sourceQueryBuilder
     * @return View
     */
    public function index(SourceQueryBuilder $sourceQueryBuilder): View
    {
        return \view('admin.sources.index', [
            'sources' => $sourceQueryBuilder->getSourceWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param SourceQueryBuilder $sourceQueryBuilder
     * @return View
     */
    public function create(SourceQueryBuilder $sourceQueryBuilder): View
    {
        return \view('admin.sources.create', [
            'sources' => $sourceQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $source = new DataSources($request->except('_token', 'id'));

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Новость добавлена');
        }

        return \back()->with('error', 'Не удалось добавить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DataSources $source
     * @return View
     */
    public function edit(DataSources $source): View
    {
        return \view('admin.sources.edit', [
            'source' => $source,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DataSources $source
     * @return RedirectResponse
     */
    public function update(Request $request, DataSources $source): RedirectResponse
    {
        $source = $source->fill($request->except('_token', 'id'));

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Новость добавлена');
        }

        return \back()->with('error', 'Не удалось добавить новость');
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
