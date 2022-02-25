<?php

namespace App\Controllers;

//recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

//models
use App\Models\Produto;
use App\Models\Info;


class IndexController extends Action {

    public function index() {

        //retorna uma instancia já criada do objeto com a conexao do banco estabelecida
        $produto = Container::getModel('Produto');

        //chama o metodo que busca os produtos e armazena no array produtos
        $produtos = $produto->getProdutos();
        
        $this->view->dados = $produtos;

        $this->render('index', 'layout1');
    }

    public function sobreNos() {

        $info = Container::getModel('Info');

        $informacoes = $info->getInfo();

        $this->view->dados = $informacoes;

        $this->render('sobreNos', 'layout2');
    }
}

?>