<?php
    
    require __DIR__ . "/vendor/autoload.php";

    use Slim\App as App;
    use Slim\Http\Request;
    use Slim\Http\Response;

    $app = new App();

    $app->get("/", function(Request $request, Response $response){
        $response->getBody()->write("Bem vindo Slim!");
        return $response;
    });
    $app->get("/estudantes", function(Request $request, Response $response){
        $response->getBody()->write("Bem vindo estudante!");
        return $response;
    });
    $app->get("/estudante/{nome}", function(Request $request, Response $response, $params){
        $nome = $params['nome'];
        $response->getBody()->write("Bem vindo estudante $nome!");
        return $response;
    });
    $app->get("/curso[/{nome}]", function(Request $request, Response $response, $params){
        $nome = $params['nome'] ? $params['nome'] : "Nenhum curso selecionado";
        $response->getBody()->write("Curso: $nome!");
        return $response;
    });
    $app->get("/chocolates", function(Request $request, Response $response){
        $pais = $request->getQueryParam('pais', 'não informado');
        $response->getBody()->write("Chocolate do pais: $pais.");
        return $response;
    });
    $app->run();

?>