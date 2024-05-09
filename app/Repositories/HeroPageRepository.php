<?php

namespace App\Repositories;

use App\Models\HeroPage;

class HeroPageRepository
{
    private $model;

    public function __construct(HeroPage $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $heroPages = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                return $query->where('title', 'like', '%'. $params['search']['title'] .'%');
            });
        
        if (!empty($params['pagination'])) {
            return  $heroPages->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $heroPages->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value);
    }

    public function store(HeroPage $heroPage)
    {
        $heroPage->save();

        return $heroPage;
    }
}