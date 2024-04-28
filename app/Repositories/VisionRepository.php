<?php

namespace App\Repositories;

use App\Models\Vision;

class VisionRepository
{
    private $model;

    public function __construct(Vision $model)
    {
        $this->model = $model;
    }
    
    public function get($params = [])
    {
        $visions = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                $query->orderByRaw($params['order']);
            });
        
        if (!empty($params['pagination'])) {
            return  $visions->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $visions->get();
    }
    
    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Vision $vision)
    {
        $vision->save();

        return $vision;
    }
    
}