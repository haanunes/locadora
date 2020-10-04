<?php
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/bd/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/vo/Cliente.php";
class ClienteDAO {
    
    public static function inserir(Cliente $obj) {
        try {
            $sql = "insert into cliente (nome,rua,numero,complemento,bairro,cidade,uf,cep,dataNascimento,cpf) values (:nome,:rua,:numero,:complemento,:bairro,:cidade,:uf,:cep,:dataNascimento,:cpf)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":rua", $obj->getRua());
            $p_sql->bindValue(":numero", $obj->getNumero());
            $p_sql->bindValue(":complemento", $obj->getComplemento());
            $p_sql->bindValue(":bairro", $obj->getBairro());
            $p_sql->bindValue(":cidade", $obj->getCidade());
            $p_sql->bindValue(":uf", $obj->getUf());
            $p_sql->bindValue(":cep", $obj->getCep());
            $p_sql->bindValue(":dataNascimento", $obj->getDataNascimento());
            $p_sql->bindValue(":cpf", $obj->getCpf());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }

    public static function atualizar($obj) {
        try {
            $sql = "update cliente set nome= :nome,rua= :rua ,numero = :numero,complemento = :complemento,bairro=:bairro,cidade=:cidade,uf=:uf,cep=:cep,dataNascimento=:dataNascimento,cpf=:cpf where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":rua", $obj->getRua());
            $p_sql->bindValue(":numero", $obj->getNumero());
            $p_sql->bindValue(":complemento", $obj->getComplemento());
            $p_sql->bindValue(":bairro", $obj->getBairro());
            $p_sql->bindValue(":cidade", $obj->getCidade());
            $p_sql->bindValue(":uf", $obj->getUf());
            $p_sql->bindValue(":cep", $obj->getCep());
            $p_sql->bindValue(":dataNascimento", $obj->getDataNascimento());
            $p_sql->bindValue(":cpf", $obj->getCpf());
            $p_sql->bindValue(":id", $obj->getId());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível atualizar. " . $ex->getMessage();
        }
    }

    public static function remover($id) {
        try {
            $sql = "delete from cliente where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $sql = "select * from cliente where id = :id ";
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
            $sql = "select * from cliente";
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
            $sql = "select * from cliente ".$sqlWhere;
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
        $obj = new Cliente();
        $obj->setId($dados->id);
         $obj->setNome($dados->nome);
         $obj->setRua($dados->rua);
         $obj->setNumero($dados->numero);
         $obj->setComplemento($dados->complemento);
         $obj->setBairro($dados->bairro);
         $obj->setCidade($dados->cidade);
         $obj->setUf($dados->uf);
         $obj->setCep($dados->cep);
         $obj->setDataNascimento($dados->dataNascimento);
         $obj->setCpf($dados->cpf);
        return $obj;
    }
}
