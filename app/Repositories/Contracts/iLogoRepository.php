<?php
namespace itmanagement\Repositories\Contracts;

interface iLogoRepository
{
    public function upload($request, $model);
    public function retrieve();
}
?>