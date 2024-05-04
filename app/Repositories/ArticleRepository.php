<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    private $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function get($params = [])
    {
        $articles = $this->model
            ->when(!empty($params['order']), function ($query) use ($params) {
                return $query->orderByRaw($params['order']);
            })
            ->when(!empty($params['search']['title']), function ($query) use ($params) {
                return $query->where('title', 'like', '%'. $params['search']['title'] .'%');
            });
        
        if (!empty($params['pagination'])) {
            return  $articles->paginate($params['pagination'], ['*'], isset($params['pagination_name']) ? $params['pagination_name'] : 'page' );
        }

        return $articles->get();
    }

    public function findByColumn($value, $column)
    {
        $this->model->where($column, $value);
    }

    public function store(Article $article)
    {
        $article->save();

        return $article;
    }
}