<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditRequest;
use App\Models\DataSources;
use App\QueryBuilders\SourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $source = DataSources::create($request->validated());

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Новость добавлена');
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
     * @param EditRequest $request
     * @param DataSources $source
     * @return RedirectResponse
     */
    public function update(EditRequest $request, DataSources $source): RedirectResponse
    {
        $source = $source->fill($request->validated());

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Задача добавлена');
        }

        return \back()->with('error', 'Не удалось добавить новость');
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
