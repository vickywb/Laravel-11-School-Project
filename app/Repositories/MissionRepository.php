<?php

namespace App\Repositories;

use App\Models\Mission;

class MissionRepository
{
    private $model;

    public function __construct(Mission $model)
    {
        $this->model = $model;
    }
    
    public function get($params = [])
    {
        $missions = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                $query->orderByRaw($params['order']);
            });
        
        if (!empty($params['pagination'])) {
            return  $missions->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $missions->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Mission $mission)
    {
        $mission->save();

        return $mission;
    }
    
}