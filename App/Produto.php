<?php

namespace App;

class Produto
{
    public $nome;
    public $descricao;
    public function save()
    {

        // INSERT values($this->nome, $this->descricao)



        define('PARAMETER', 1);
    }

    public function update()
    {
        //UPDATE registro
        
        define('PARAMETER', 2);

        //retorna objeto atualizado

    }

    public function find($id)
    {
        /*SELECT * FROM produtos
        WHERE id=$id; */

        //retorna objeto pelo id

    }

    public function all()
    {
        //SELECT * FROM produtos;

        //retorna objetos

    }

    public function destroy($id)
    {
       /*DROP * FROM produtos
       WHERE id=$id*/

    }


}