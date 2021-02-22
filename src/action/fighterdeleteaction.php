<?php 
namespace App\Action;

use App\Domain\User\Service\FighterDelete;
Use Psr\Http\Message\ResponseInterface;
Use Psr\Http\Message\ServerRequestInterface;

final class FighterDeleteAction
{
    private $fighterReader;

    public function __construct(FighterDelete $fighterDelete)
    {
        $this->fighterDelete = $fighterDelete;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args =[]
        ): ResponseInterface{

             
            $fighterId =(int) $args['id'];

            $rowCount = $this->fighterDelete->deleteFighterById($fighterId);
            

            $result =[
                'success' =>$rowCount ==1 ? true : false,

            ];
            $response->getBody()->write((string)json_encode($result));
            
            return $response 
            ->withHeader('Content-Type','application/json')
            ->withStatus(200);

        }




}