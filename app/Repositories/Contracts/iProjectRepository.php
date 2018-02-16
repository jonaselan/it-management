<?php
namespace itmanagement\Repositories\Contracts;

interface iProjectRepository
{
    public function findAll();
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);
}
?>