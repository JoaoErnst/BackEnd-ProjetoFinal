<?php 

namespace App\Domain\User\Repository;

use PDO;
use App\Domain\User\Model\Fighter;
use DomainException;


class FighterReaderRepository
{
  private $connection;
  
  public function __construct(PDO $connection)
  {
  $this->connection = $connection;
  }

  public function getFighterById(int $fighter_id) 
  {
   
   $sql = "SELECT id, fighter_name, gender, weight, height FROM mma WHERE id = :id;";
   $statement = $this->connection->prepare($sql);
   $statement->execute(['id' =>$fighter_id]);
   
   $row = $statement->fetch();
   if(!$row) {
     throw new DomainException(sprintf('Fighter not founded: %s', $fighter_id));

  }

  $fighter = new Fighter();
  $fighter->id = (int) $row['id'];
  $fighter->fighter_name = (string) $row['fighter_name'];
  $fighter->gender = (string) $row['gender'];
  $fighter->weight = (float) $row['weight'];
  $fighter->height = (float) $row['height'];

  return $fighter;

  

 }    

}