<?php
namespace itmanagement\Repositories\Contracts;

interface iLogoRepository
{
    public function store($request, $model);
    public function retrieve($model);
}
?>