<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\Connection;
use App\Models\Produto;

class IndexController extends Action {

    public function index() {

        //puxar instancia da conexão com o banco
        $conn = Connection::getDB();

        //criar instancia da classe produto
        $produto = new Produto($conn);

        //chama o metodo que busca os produtos e armazena no array produtos
        $produtos = $produto->getProdutos();
        
        $this->view->dados = $produtos;

        $this->render('index', 'layout1');
    }

    public function sobreNos() {
        $this->render('sobreNos', 'layout2');
    }
}

?>