<?php 
namespace App\Domain\User\Service;

use App\Domain\User\Repository\FighterUpdateRepository;
use App\Exception\ValidationException;

final class FighterUpdate
{
 private $repository;

 public function __construct(FighterUpdateRepository $repository)
 {
     $this->repository = $repository;
 }
 public function updateFighter(array $data)
 {
     $this->validateNewFighter($data);

     $rowCount =$this->repository->updateFighter($data);
    
     return $rowCount;
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