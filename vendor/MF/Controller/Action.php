<?php

namespace MF\Controller;

use stdClass;

abstract class Action {
    
    protected $view;

    public function __construct() {
        //cria um objeto vazio usando a classe standart do php que pode ser usado nos demais métodos e recuperado nas views
        $this->view = new \stdClass();
    }

    protected function render($view) {

        //pega o nome da classe atual
        $classAtual = get_class($this);

        //retira o nome dos diretórios porque todos os controllers ficam na mesma pasta
        $classAtual = str_replace('App\\Controllers\\', '', $classAtual);

        //remove a palavra controller do nome do arquivo, pra pegar apenas o nome do controlador e usar dinamicamente no require
        $classAtual = strtolower(str_replace('Controller', '', $classAtual));

        //o caminho dos requires sempre irá partir do arquivo index.php, dentro da public por conta do autoload do composer
        require_once "../App/Views/".$classAtual."/".$view.".phtml";
    }
}

?>