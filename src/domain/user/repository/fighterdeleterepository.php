<?php 

namespace App\Domain\User\Repository;

use PDO;
use App\Domain\User\Model\Fighter;
use DomainException;


class FighterDeleteRepository
{
  private $connection;
  
  public function __construct(PDO $connection)
  {
  $this->connection = $connection;
  }

  public function deleteFighterById(int $fighter_id) 
  {
    $sql = "DELETE FROM mma WHERE id =:id;";
  
   $statement = $this->connection->prepare($sql);
   $statement->execute(['id' =>$fighter_id]);
   
   return (int) $statement->rowCount();

  }


}