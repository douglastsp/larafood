<?php 

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    public function createNewClient(Array $data);
    public function getClient(Int $id);
}
