<?php 
namespace App\Action;

use App\Domain\User\Service\FighterReader;
Use Psr\Http\Message\ResponseInterface;
Use Psr\Http\Message\ServerRequestInterface;

final class FighterReaderAction
{
    private $fighterReader;

    public function __construct(FighterReader $fighterReader)
    {
        $this->fighterReader = $fighterReader;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args =[]
        ): ResponseInterface{

             
            $fighterId =(int) $args['id'];

            $fighter = $this->fighterReader->getFighterById($fighterId);
            

            $result =[
                'fighter_id' =>$fighter->id,
                'fighter_name' =>$fighter->fighter_name,
                'gender' =>$fighter->gender,
                'weight' =>$fighter->weight,
                'height' =>$fighter->height,

            ];
            $response->getBody()->write((string)json_encode($result));
            
            return $response 
            ->withHeader('Content-Type','application/json')
            ->withStatus(200);

        }




}