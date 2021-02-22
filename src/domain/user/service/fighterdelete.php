<?php 
namespace App\Domain\User\Service;

use App\Domain\User\Repository\FighterDeleteRepository;
use App\Domain\User\Model\Fighter;
use App\Exception\ValidationException;

final class FighterDelete
{
 private $repository;

 public function __construct(FighterDeleteRepository $repository)
 {
     $this->repository = $repository;
 }
 public function deleteFighterById(int $fighterId)
 {
     if(empty($fighterId)) {
         throw new ValidationException('Please type the fighter code');

     }
     $rowCount =$this->repository->deleteFighterById($fighterId);
     return $rowCount;
 }


}