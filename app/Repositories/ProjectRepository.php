<?php

namespace itmanagement\Repositories;

use itmanagement\Repositories\Contracts\iProjectRepository;
use itmanagement\Project;

class ProjectRepository implements iProjectRepository
{
    private $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function findAll(){
        return $this->model->all();
    }

    public function pagination($type = 'simple', $offset=10){
        $model = $this->model;

        if ($type == 'advanced')
            return $model->paginate($offset);

        return $model->simplePaginate($offset);
    }

    public function find(array $criteria, array $orderBy = null)
    {
        $model = $this->model;

        if (count($criteria) > 1) {
            foreach ($criteria as $c) {
                $model = $model->where($c[0], $c[1], $c[2]);
            }
        } elseif (count($criteria) == 1) {
            $model = $model->where($criteria[0][0], $criteria[0][1], $criteria[0][2]);
        }

        if (count($orderBy) > 1) {
            foreach ($orderBy as $order) {
                $model = $model->orderBy($order[0], $order[1]);
            }
        } elseif (count($orderBy) == 1) {
            $model = $model->orderBy($orderBy[0][0], $orderBy[0][1]);
        }

        return $model;
    }
}

?>