<?php 
namespace App\Domain\User\Service;

use App\Domain\User\Repository\FighterCreatorRepository;
use App\Exception\ValidationException;

final class FighterCreator 
{
 private $repository;

 public function __construct(FighterCreatorRepository $repository)
 {
     $this->repository = $repository;
 }
 public function creatFighter(array $data)
 {
     $this->validateNewFighter($data);

     $fighterId =$this->repository->insertFighter($data);
    
     return $fighterId;
 }
 private function validateNewFighter(array $data) 
 {
     $errors =[];

     if(empty($data['fighter_name'])) {
         $errors['fighter_name'] = 'Invalid Name';

     }
     if(empty($data['gender'])) {
        $errors['gender'] = 'Invalid Gender';
     
        if(empty($data['weight'])) {
        $errors['weight'] = 'Invalid weight';
   
        }
        if(empty($data['height'])) {
            $errors['height'] = 'Invalid Height';
   
        }
        if($errors) {
            throw new ValidationException('Please verify the typed data', $errors);
        }

    }
     


 }



}