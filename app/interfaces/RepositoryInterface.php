<?php

namespace App\interfaces;

interface RepositoryInterface{

    public function getall();
    public function insert($data);
    public function delete($id);
    public function update($id, $data);
    public function getCategorytoView();
    public function getCategoryForPost();
    
}

?>
