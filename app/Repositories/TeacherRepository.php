<?php

namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository
{
    private $model;

    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }

    public function get($params =[])
    {
        $teachers = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['name']), function ($query) use ($params) {
                $query->where('name','like','%'. $params['search']['name'] .'%');
            });
        
        if (!empty($params['pagination'])) {
            return  $teachers->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }
        return $teachers->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Teacher $teacher)
    {
        $teacher->save();

        return $teacher;
    }
}