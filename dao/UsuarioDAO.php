<?php
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/bd/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/vo/Usuario.php";
class UsuarioDAO {
    
    public static function inserir(Usuario $obj) {
        try {
            $sql = "insert into usuario (nome,login,email,senha) values (:nome,:login,:email,:senha)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":login", $obj->getLogin());
            $p_sql->bindValue(":email", $obj->getEmail());
            $p_sql->bindValue(":senha", $obj->getSenha());
            $p_sql->execute();
            return Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }

    public static function atualizar($obj) {
        try {
            $sql = "update usuario set nome= :nome,login= :login ,email = :email,senha = :senha  where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":login", $obj->getLogin());
            $p_sql->bindValue(":email", $obj->getEmail());
            $p_sql->bindValue(":senha", $obj->getSenha());
            $p_sql->bindValue(":id", $obj->getId());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível atualizar. " . $ex->getMessage();
        }
    }

    public static function remover($id) {
        try {
            $sql = "delete from usuario where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $sql = "select * from usuario where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $dados = $p_sql->fetch(PDO::FETCH_OBJ);
            if ($dados != null) {
               
                return self::popular($dados);
            }
            return null;
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getListAll() {
        try {
            $sql = "select * from usuario";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            $dados = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $lista = array();
            foreach ($dados as $p) {
                $lista[] = self::popular($p);
            }
            return $lista;
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }
    
    public static function getList($sqlWhere,$parametros){
        try {
            $sql = "select * from usuario ".$sqlWhere;
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $i=1;
            for ($j=0;$j<sizeof($parametros);$j++){
                 $p_sql->bindValue($i, $parametros[$j]);
                 $i++;
            }
            $p_sql->execute();
            $dados = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $lista = array();
            foreach ($dados as $p) {
                $lista[] = self::popular($p);
            }
            return $lista;
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    private static function popular($dados) {
        $obj = new Usuario();
        $obj->setId($dados->id);
         $obj->setNome($dados->nome);
         $obj->setLogin($dados->login);
         $obj->setEmail($dados->email);
         $obj->setSenha($dados->senha);
        return $obj;
    }
}
