<?php

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;
    public function __construct()
    {
        $this->model = News::query();
    }
    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getNewsWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    public function getNewsById($id): Model
    {
        return $this->model->where('id', '=', $id)->sole();
    }

    public function getNewsByCategoryId (int $id): Collection
    {
        return $this->model
            ->leftJoin('categories_has_news', 'news.id', '=', 'categories_has_news.news_id')
            ->where('categories_has_news.category_id', '=', $id)
            ->get();
    }
}
