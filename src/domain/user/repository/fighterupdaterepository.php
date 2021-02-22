<?php 

namespace App\Domain\User\Repository;

use PDO;

class FighterUpdateRepository
{
  private $connection;
  
  public function __construct(PDO $connection)
  {
  $this->connection = $connection;
  }

  public function updateFighter(array $fighter) 
  {
   
   $row = [
       'id' => $fighter['id'], 
       'fighter_name' => $fighter['fighter_name'],
       'gender' => $fighter['gender'],
       'weight' => $fighter['weight'],
       'height' => $fighter['height'],
    ];
   
    $sql = "UPDATE mma SET
    fighter_name=:fighter_name,
    gender=:gender,
    weight=:weight,
    height=:height
    WHERE id=:id;";
   
   $statement = $this->connection->prepare($sql);
   $statement->execute($row);
   
   return (int) $statement->rowCount();

 

  }

}