<?php

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class CategoryQueryBuilder extends QueryBuilder
{
    public Builder $model;
    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getCategoryById($id): Model
    {
        return $this->model->where('id', '=', $id)->sole();
    }
}
