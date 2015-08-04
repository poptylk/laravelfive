<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository
{
    protected $model;

    /**
     * Get model all.
     * @return App\Models\Model
     */
    public function index()
    {
        return $this->model->all();
    }

    /**
     * Get item count.
     *
     * @return int
     */
    public function count()
    {
        return $this->model->count();
    }

    public function uniqid()
    {
        return md5(uniqid(rand()));
    }

    /**
     * Destory Mmdel by id.
     *
     * @param int $id
     */
    public function destory($id)
    {
        $this->getById($id)->delete();
    }

    /**
     * Get model by id.
     *
     * @param int $id
     *
     * @return App\Models\Model
     */
    public function getById($id)
    {
        try {
            $item = $this->model->findOrFail($id);
            return $item;
        } catch(ModelNotFoundException  $e) {
            return abort(404);
        }
    }
}
