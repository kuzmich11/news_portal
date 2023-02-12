<?php

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserQueryBuilder extends QueryBuilder
{

    public Builder $model;
    public function __construct()
    {
        $this->model = User::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUsersWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function getUserById($id): Model
    {
        return $this->model->where('id', '=', $id)->sole();
    }
}
