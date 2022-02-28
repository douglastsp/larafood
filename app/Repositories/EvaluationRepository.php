<?php 

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\EvaluationRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EvaluationRepository implements EvaluationRepositoryInterface
{
    protected $entity;

    public function __construct(Evaluation $evaluation)
    {
        $this->entity = $evaluation;
    }

    public function newEvaluationOrder(Int $idOrder, int $idClient, Array $data)
    {
        $evaluation = [
            'client_id' => $idClient,
            'order_id' => $idOrder,
            'stars' => $data['stars'],
            'comment' => isset($data['comment']) ? $data['comment'] : ''
        ];

        return $this->entity->create($evaluation);
    }

    public function getEvaluationsByOrder(Int $idOrder)
    {
        return $this->entity->where('order_id', $idOrder)->get();
    }

    public function getEvaluationsByClient(Int $idClient)
    {
        return $this->entity->where('client_id', $idClient)->get();
    }

    public function getEvaluationById(Int $idEvaluation)
    {
        return $this->entity->find($idEvaluation);
    }
    
    public function getEvaluationByClientIdByOrderId(Int $idClient, Int $idOrder)
    {
        return $this->entity->where(['client_id', $idClient], ['order_id', $idOrder])->first();
    }
}
