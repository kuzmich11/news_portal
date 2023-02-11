<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use App\QueryBuilders\UserQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UserQueryBuilder $userQueryBuilder
     * @return View
     */
    public function index(UserQueryBuilder $userQueryBuilder): View
    {
        return \view('admin.users.index', [
            'users' => $userQueryBuilder->getUsersWithPagination(),
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
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return \view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
//        dd($user->fill($request->validated()));
        $user = $user->fill($request->validated());
        if ($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('success', __('messages.admin.user.update.success'));
        }
        return \back()->with('error', __('messages.admin.user.update.fail'));
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
