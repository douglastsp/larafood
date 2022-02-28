<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        String $identify,
        Float $total,
        String $status,
        Int $tenant_id,
        String $comment = '',
        $client_id = '',
        $table_id = '',
    );

    public function getOrderByIdentify(String $identify);
    public function registerProductsOrder(Int $orderId, Array $products);
    public function getOrdersByClient(Int $idClient);
}
