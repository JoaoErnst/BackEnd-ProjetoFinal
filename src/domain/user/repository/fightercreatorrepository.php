<?php 

namespace App\Domain\User\Repository;

use PDO;

class FighterCreatorRepository
{
  private $connection;
  
  public function __construct(PDO $connection)
  {
  $this->connection = $connection;
  }

  public function insertFighter(array $fighter) 
  {
   
   $row = [
       'fighter_name' => $fighter['fighter_name'],
       'gender' => $fighter['gender'],
       'weight' => $fighter['weight'],
       'height' => $fighter['height'],
    ];
   
    $sql = "INSERT INTO mma SET
    fighter_name=:fighter_name,
    gender=:gender,
    weight=:weight,
    height=:height;";
   
   $this->connection->prepare($sql)->execute($row);

   return (int) $this->connection->lastInsertId();
 

  }

}