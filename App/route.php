<?php

namespace App;

class Route {

    private $routes;

    //a partir da instancia iniciada no index.php, roda o metodo construct
    public function __construct() {
        //inicia as rotas
        $this->initRoutes();
        //executa o método run com base na URL que o usuário está
        $this->run($this->getUrl());
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function setRoutes(array $routes) {
        $this->routes = $routes;
    }

    public function initRoutes() {

        //inicia as rotas cadastrando tudo dentro do array $routes
        $routes['home'] = array(
            //aponta qual a rota
            'route' => '/',
            //mostra pra qual controlador essa rota aponta
            'controller' => 'indexController',
            //dentro do controlador, aponta qual método apontado
            'action' => 'index'
        );

        $routes['sobre_nos'] = array(
            'route' => '/sobre_nos',
            'controller' => 'indexController',
            'action' => 'sobreNos'
        );

        //seta o array routes com as rotas definidas acima
        $this->setRoutes($routes);
    }

    public function run($url) {

        //percorre todas as URLs cadastradas no initRoutes()
        foreach($this->getRoutes() as $key => $route) {

            //verifica se a URL acessada pelo usuário é a mesma configurada como rota
            if($url == $route['route']) {

                //cria uma variável que executa o controller de acordo com URL acessada usando namespace
                $class = "App\\Controllers\\".ucfirst($route['controller']);

                //instancia o controller dinamicamente
                $controller = new $class;
                //recupera a action que ta vindo no array de rotas
                $action = $route['action'];
                //executa o metodo recuperado;
                $controller->$action();
            }
        }
    }

    public function getUrl() {
        //retorna a informação de path já testada, tudo que vem depois da / na URL
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

?>