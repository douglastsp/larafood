<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        String $identify,
        Float $total,
        String $status,
        Int $tenant_id,
        String $comment = '',
        $client_id = '',
        $table_id = '',
    ) {
        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'tenant_id' => $tenant_id,
            'comment' => $comment
        ];

        if ($client_id) {
            $data['client_id'] = $client_id;
        }

        if ($table_id) {
            $data['table_id'] = $table_id;
        }

        $order = $this->entity->create($data);

        return $order;
    }

    public function getOrderByIdentify(String $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

    public function registerProductsOrder(Int $orderId, Array $products)
    {
        $orderProducts = [];

        /**
         * Insert on pivot table with query builder
         */
        // foreach ($products as $product) {
        //     array_push($orderProducts, [
        //         'order_id' => $orderId,
        //         'product_id' => $product['id'],
        //         'qty' => $product['qty'],
        //         'price' => $product['price'],
        //     ]);
        // }
        // DB::table('order_product')->insert($orderProducts);

        $order = $this->entity->find($orderId);

        foreach ($products as $product) {
            $orderProducts[$product['id']] = [
                'qty' => $product['qty'],
                'price' => $product['price']
            ];
        }

        $order->products()->attach($orderProducts);
    }

    public function getOrdersByClient(Int $idClient)
    {
        $orders = $this->entity->where('client_id', $idClient)->paginate();

        return $orders;
    }
}
