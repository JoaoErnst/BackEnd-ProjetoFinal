<?php 
namespace App\Domain\User\Service;

use App\Domain\User\Repository\FighterListRepository;


final class FighterList
{
 private $repository;

 public function __construct(FighterListRepository $repository)
 {
     $this->repository = $repository;
 }
 public function findAll()
 {
     $fighters = $this->repository->findAll();

     return $fighters;
 }



}