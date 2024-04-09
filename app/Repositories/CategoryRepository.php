<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $categories = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                $query->orderByRaw($params['order']);
            });
        
        if (!empty($params['pagination'])) {
            return  $categories->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $categories->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Category $category)
    {
        $category->save();

        return $category;
    }
}