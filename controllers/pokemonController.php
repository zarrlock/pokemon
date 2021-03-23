<?php


class pokemonController
{
    function __construct(){
        $this->dao = new pokemonDAO();
    }
    public function index () {
        $pokemons = $this->dao->fetchAll();
        include('view/list.php');
    }

    public function show($id){
        $pokemon = $this->dao->fetch($id);
    }

    public function store ($data){
        $this->dao->store($data);
    }

    public function edit ($id){
        $pokemon = $this->dao->fetch($id);
    }

    public function update ($data){
        $pokemon = $this->dao->update($data);
    }

    public function delete($data){
        $this->dao->delete($data);
    }
}
