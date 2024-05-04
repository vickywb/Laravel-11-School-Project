<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{
    private $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $students = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['name']), function ($query) use ($params) {
                return $query->where('name', 'like', '%'. $params['search']['name'] .'%');
            });
        
        if (!empty($params['pagination'])) {
            return  $students->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }
       
        return $students->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Student $student)
    {
        $student->save();

        return $student;
    }
}