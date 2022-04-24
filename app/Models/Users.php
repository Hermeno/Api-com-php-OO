<?php

namespace App\Models;
require_once "../config.php";

  class Users {
      private static $box = 'user';


     public static function select($id){
          //$con = new \PDO(DBDRIVE.' :host= '.DBHOST.'; : dbname='.DBNAME, DBUSER, DBPASS);
          $con = new \PDO("mysql:host=localhost; dbname=api_puro_php","root","");
         
          $sql = 'SELECT * FROM user WHERE id = :id';
          $stmt = $con->prepare($sql);
          $stmt->bindValue(':id', $id);
          $stmt->execute();
          if($stmt->rowCount() > 0 ) {
              return $stmt->fetch(\PDO::FETCH_ASSOC);
          }else{
              throw new \Exception("Nenhum usuario encontrado!");
          }
      }


     public static function selectAll(){
        //$con = new \PDO(DBDRIVE.' :host= '.DBHOST.'; : dbname='.DBNAME, DBUSER, DBPASS);
        $con = new \PDO("mysql:host=localhost; dbname=api_puro_php","root",""); 
        $sql = 'SELECT * FROM user ';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0 ) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            throw new \Exception("Nenhum usuario encontrado!");
        }
    }

    public static function insert($dados){
        $con = new \PDO("mysql:host=localhost; dbname=api_puro_php","root",""); 
        $sql = 'INSERT INTO user (name, email, password) VALUES (?,?,?)';
        $stmt = $con->prepare($sql);        
        $stmt->bindParam(1,$dados['name']);
        $stmt->bindParam(2,$dados['email']);
        $stmt->bindParam(3,$dados['password']);
        $stmt->execute();

        if($stmt->rowCount() > 0 ) {
            return "Usuario(a) inserida com successo!";
        }else{
            throw new \Exception("Falha na insercao do usuario(a)!");
        } 
    }
    public function delete($data) {
       $con = new \PDO("mysql:host=localhost; dbname=api_puro_php", "root", "");
       $sql = "DELETE * FROM user WHERE id = ?";
       $stmt = $con->prepare($sql);
       $stmt->bindParam(1, $data['id']);
       $stmt->execute();
        if($stmt->roeCount() > 0) {
            return "Usuario eliminado com sucesso!";
        }else
        {
            return new \Exception("falha ao deletar");
        }
    }
 }