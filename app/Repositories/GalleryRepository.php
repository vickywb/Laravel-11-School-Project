<?php

namespace App\Repositories;

use App\Models\Gallery;

class GalleryRepository
{
    private $model;

    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }

    public function get($params =[])
    {
        $galleries = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                return $query->where('title','like','%'. $params['search']['title'] .'%');
            });

        if (!empty($params['pagination'])) {
            return  $galleries->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }
        return $galleries->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value)->first();
    }

    public function store(Gallery $gallery)
    {
        $gallery->save();

        return $gallery;
    }
}