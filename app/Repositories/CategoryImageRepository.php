<?php

namespace App\Repositories;

use App\Models\CategoryImage;

class CategoryImageRepository
{
    private $model;

    public function __construct(CategoryImage $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $categoryImages = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                return $query->where('title', 'like', '%'. $params['search']['title'] .'%');
            });
        
        if (!empty($params['pagination'])) {
            return  $categoryImages->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $categoryImages->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(CategoryImage $categoryImage)
    {
        $categoryImage->save();

        return $categoryImage;
    }
}