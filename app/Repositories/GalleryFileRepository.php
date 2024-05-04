<?php

namespace App\Repositories;

use App\Models\GalleryFile;

class GalleryFileRepository
{
    private $model;

    public function __construct(GalleryFile $model)
    {
        $this->model = $model;
    }

    public function get($params =[])
    {
        $galleryFiles = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['with']), function ($query) use ($params) {
                return $query->with($params['with']);
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                return $query->whereHas('gallery', function ($query) use ($params) {
                    return $query->whereHas('categoryImage', function ($query) use ($params) {
                        return $query->where('title','like','%'. $params['search']['title'] .'%');
                    });
                });
            });
        
        if (!empty($params['pagination'])) {
            return  $galleryFiles->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }
        return $galleryFiles->get();
    }
}