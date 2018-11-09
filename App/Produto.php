<?php

namespace App;

class Produto
{
    public $nome;
    public $descricao;
    public function save()
    {
        //auto increment
        //$this->id = $_SESSION['@id']+1;
        //$_SESSION['@id'] = $this->id;

        //$this->id = $_SESSION['@id'];

        //$_SESSION['@database'] = $this;

        //return $this->nome;
    }

    public function update()
    {
        //$_SESSION['@id'] = $_SESSION['@id'];

        //$_SESSION['@database'] = $this;



    }


    


    public function find($id)
    {
     //return $this;

    }

    public function all()
    {
       
    }

    public function destroy($id)
    {
       

    }


}