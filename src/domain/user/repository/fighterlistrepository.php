<?php 

namespace App\Domain\User\Repository;

use PDO;
use App\Domain\User\Model\Fighter;

class FighterListRepository
{
  private $connection;
  
  public function __construct(PDO $connection)
  {
  $this->connection = $connection;
  }

  public function findAll() 
  {
   
   $sql = "SELECT id, fighter_name, gender, weight, height FROM mma;";
   
   $statement = $this->connection->prepare($sql);
   $statement->execute();
   
   $rows = $statement->fetchAll();
   
   $fighters = [];
   foreach($rows as $row) {
     $fighter = new Fighter();
     $fighter->id = (int) $row['id'];
     $fighter->fighter_name = (string) $row['fighter_name'];
     $fighter->gender = (string) $row['gender'];
     $fighter->weight = (float) $row['weight'];
     $fighter->height = (float) $row['height'];

     $fighters[] = $fighter;

   }
  
  
   return $fighters;

  }

}