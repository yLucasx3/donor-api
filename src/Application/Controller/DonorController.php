<?php

namespace App\Application\Controller;

use App\Application\DAO\DonorDAO;

class DonorController {
        
    protected $donorDAO;

    function __construct(){

        $this->donorDAO = new DonorDAO();
    }

    function show($id) {
       
        return $this->donorDAO->show($id);
    }

    function list($page, $limit) {
       
        return $this->donorDAO->list($page, $limit);
    }

    function create($donor) {

        return $this->donorDAO->create($donor);
    }

    function update($donor) {
        
        return $this->donorDAO->update($donor);
    }

    function delete($id) {

        return $this->donorDAO->delete($id);
    }
}