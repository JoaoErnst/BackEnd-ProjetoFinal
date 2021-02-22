<?php 
namespace App\Action;

use App\Domain\User\Service\FighterCreator;
Use Psr\Http\Message\ResponseInterface;
Use Psr\Http\Message\ServerRequestInterface;

final class FighterCreatAction
{
    private $fighterCreator;

    public function __construct(FighterCreator $fighterCreator)
    {
        $this->fighterCreator = $fighterCreator;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
        ): ResponseInterface{
            $data = (array) $request->getParsedBody();

            $fighterId = $this->fighterCreator->creatFighter($data);

            $result =[
                'fighter_id' =>$fighterId
            ];
            $response->getBody()->write((string)json_encode($result));
            
            return $response 
            ->withHeader('Content-Type','application/json')
            ->withStatus(201);

        }




}