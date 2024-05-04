<?php

namespace App\Repositories;

use App\Models\LearnedMaterial;

class LearnedMaterialRepository
{
    private $model;

    public function __construct(LearnedMaterial $model)
    {
        $this->model = $model;
    }
    
    public function get($params = [])
    {
        $learnedMaterials = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            });
        
        if (!empty($params['pagination'])) {
            return  $learnedMaterials->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $learnedMaterials->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(LearnedMaterial $learnedMaterial)
    {
        $learnedMaterial->save();

        return $learnedMaterial;
    }
}