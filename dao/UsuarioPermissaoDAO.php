<?php

require_once $_SERVER['DOCUMENT_ROOT']."/locadora/bd/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/vo/UsuarioPermissao.php";

class UsuarioPermissaoDAO {

    public static function inserir(UsuarioPermissao $obj) {
        try {
            $sql = "insert into usuarioPermissao (idUsuario,idPermissao) values (:idUsuario,:idPermissao)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":idUsuario", $obj->getIdUsuario());
            $p_sql->bindValue(":idPermissao", $obj->getIdPermissao());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }

    public static function atualizar($obj) {
        try {
            $sql = "update usuarioPermissao set idUsuario= :idUsuario,idPermissao= :idPermissao  where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":idUsuario", $obj->getIdUsuario());
            $p_sql->bindValue(":idPermissao", $obj->getIdPermissao());
            $p_sql->bindValue(":id", $obj->getId());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível atualizar. " . $ex->getMessage();
        }
    }

    public static function remover($id) {
        try {
            $sql = "delete from usuarioPermissao where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $sql = "select * from usuarioPermissao where id = :id ";
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
            $sql = "select * from usuarioPermissao";
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

    public static function getList($sqlWhere, $parametros) {
        try {
            $sql = "select * from usuarioPermissao " . $sqlWhere;
            $p_sql = Conexao::getInstance()->prepare($sql);

            $i = 1;
            for ($j = 0; $j < sizeof($parametros); $j++) {
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
        $obj = new UsuarioPermissao();
        $obj->setId($dados->id);
        $obj->setIdUsuario($dados->idUsuario);
        $obj->setIdPermissao($dados->idPermissao);
        return $obj;
    }

}
