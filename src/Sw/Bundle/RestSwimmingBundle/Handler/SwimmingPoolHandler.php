<?php
namespace Sw\Bundle\RestSwimmingBundle\Handler;
use Sw\Bundle\RestSwimmingBundle\Entity\SwimmingPool;

class SwimmingPoolHandler
{

    public function __construct($om, $entityClass)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function getByZipcode($zipCode)
    {
        return $this->repository->findByZipcode($zipCode);
    }

    public function post($data)
    {
        $pool = new SwimmingPool();
        $pool->setId($data["id"]);
        $pool->setName($data["name"]);
        $pool->setAddress($data["address"]);
        $pool->setZipCode($data["zipCode"]);
        $pool->setLatitude($data["latitude"]);
        $pool->setLongitude($data["longitude"]);
        $this->om->persist($pool);
        $this->om->flush($pool);

        return $pool;
    }
}
