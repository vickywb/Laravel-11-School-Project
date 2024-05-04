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
                $query->orderByRaw($params['order']);
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