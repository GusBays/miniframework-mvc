<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

    protected function initRoutes() {

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
}

?>