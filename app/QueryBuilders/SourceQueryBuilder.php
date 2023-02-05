<?php

namespace App\QueryBuilders;

use App\Models\DataSources;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SourceQueryBuilder extends QueryBuilder
{
    public Builder $model;
    public function __construct()
    {
        $this->model = DataSources::query();
    }
    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getSourceWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
