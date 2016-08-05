<?php

namespace TypiCMS\Modules\Places\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use stdClass;
use TypiCMS\Modules\Core\Custom\Repositories\RepositoriesAbstract;

class EloquentPlace extends RepositoriesAbstract implements PlaceInterface
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models.
     *
     * @param bool  $all  Show published or all
     * @param array $with Eager load related models
     *
     * @return Collection Object with $items
     */
    public function all(array $with = [], $all = false)
    {
        // get search string
        $string = Request::input('string');

        $query = $this->make($with);

        if (!$all) {
            $query->online();
        }

        $string && $query->where('title', 'LIKE', '%'.$string.'%');

        $query->order();

        // Get
        return $query->get();
    }
}
