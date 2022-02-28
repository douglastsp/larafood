<?php 

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(Int $idOrder, int $idClient, Array $data);
    public function getEvaluationsByOrder(Int $idOrder);
    public function getEvaluationsByClient(Int $idClient);
    public function getEvaluationById(Int $idEvaluation);
    public function getEvaluationByClientIdByOrderId(Int $idClient, Int $idOrder);
}
