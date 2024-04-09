<?php

namespace App\Repositories;

use App\Models\Major;

class MajorRepository
{
    private $model;

    public function __construct(Major $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $majors = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                $query->where('title', 'like', '%'. $params['search']['title'] .'%');
            });
        
        if (!empty($params['pagination'])) {
            return  $majors->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $majors->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Major $major)
    {
        $major->save();

        return $major;
    }

}