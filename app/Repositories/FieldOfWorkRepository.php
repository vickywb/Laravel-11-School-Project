<?php

namespace App\Repositories;

use App\Models\FieldOfWork;

class FieldOfWorkRepository
{
    private $model;

    public function __construct(FieldOfWork $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $fieldOfWorks = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                $query->orderByRaw($params['order']);
            });
        
        if (!empty($params['pagination'])) {
            return  $fieldOfWorks->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $fieldOfWorks->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(FieldOfWork $fieldOfWork)
    {
        $fieldOfWork->save();

        return $fieldOfWork;
    }
}