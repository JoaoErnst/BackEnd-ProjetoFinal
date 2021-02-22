<?php 
namespace App\Domain\User\Service;

use App\Domain\User\Repository\FighterReaderRepository;
use App\Domain\User\Model\Fighter;
use App\Exception\ValidationException;

final class FighterReader
{
 private $repository;

 public function __construct(FighterReaderRepository $repository)
 {
     $this->repository = $repository;
 }
 public function getFighterById(int $fighterId)
 {
     if(empty($fighterId)) {
         throw new ValidationException('Please type the fighter code');

     }
     $fighter =$this->repository->getFighterById($fighterId);
     return $fighter;
 }


}