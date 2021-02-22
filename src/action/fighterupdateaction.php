<?php 
namespace App\Action;

use App\Domain\User\Service\FighterUpdate;
Use Psr\Http\Message\ResponseInterface;
Use Psr\Http\Message\ServerRequestInterface;

final class FighterUpdateAction
{
    private $fighterUpdate;

    public function __construct(FighterUpdate $fighterUpdate)
    {
        $this->fighterUpdate = $fighterUpdate;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
        ): ResponseInterface{
            $data = (array) $request->getParsedBody();

            $rowCount = $this->fighterUpdate->updateFighter($data);

            $result =[
                'success' => $rowCount == 1 ? true : false
            ];
            $response->getBody()->write((string)json_encode($result));
            
            return $response 
            ->withHeader('Content-Type','application/json')
            ->withStatus(200);

        }




}