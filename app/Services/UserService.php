<?php

namespace App\Services;
use App\Models\Users;

class UserService
{
    public function get($id = null){ 
      if($id){
         return Users::select($id);
      }else{
         return Users::selectAll();
      }
    }

    public function post(){
       $dados = $_POST;
        return Users::insert($dados);
    }
    public function update(){

    }
    public function delete($id =null) {
        if($id){
           $data = $_POST($id);
         return Users::delete($data);
        }
    }

}