<?php
namespace itmanagement\Repositories\Contracts;

interface iProjectRepository
{
    public function findAll();
    public function pagination($type, $offset);
    public function find(array $criteria, array $orderBy = null);
}
?>