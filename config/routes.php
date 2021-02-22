<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

return function (App $app) {

    $app->get('/', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });
   
    $app->post('/fighter',\App\Action\FighterCreatAction::class);

    $app->get('/fighter',\App\Action\FighterListAction::class);

    $app->get('/fighter/{id}',\App\Action\FighterReaderAction::class);

    $app->put('/fighter',\App\Action\FighterUpdateAction::class);

    $app->delete('/fighter/{id}',\App\Action\FighterDeleteAction::class);


};
