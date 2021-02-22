<?php 
namespace App\Action;

use App\Domain\User\Service\FighterList;
Use Psr\Http\Message\ResponseInterface;
Use Psr\Http\Message\ServerRequestInterface;

final class FighterListAction
{
    private $fighterList;

    public function __construct(FighterList $fighterList)
    {
        $this->fighterList = $fighterList;
    }
    
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
        ): ResponseInterface{
           
            $fighters = $this->fighterList->findAll();
            

            $result =[
                'fighters' => $fighters
            ];
            $response->getBody()->write((string)json_encode($result));
            
            return $response 
            ->withHeader('Content-Type','application/json')
            ->withStatus(200);

        }




}