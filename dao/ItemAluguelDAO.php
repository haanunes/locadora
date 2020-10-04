<?php
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/bd/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/vo/ItemAluguel.php";

class ItemAluguelDAO {

    public static function inserir(ItemAluguel $obj) {
        try {
            $sql = "insert into itemAluguel (idDisco,idAluguel) values (:idDisco,:idAluguel)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":idDisco", $obj->getIdDisco());
            $p_sql->bindValue(":idAluguel", $obj->getIdAluguel());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }

    public static function atualizar($obj) {
        try {
            $sql = "update itemAluguel set idDisco= :idDisco,idAluguel= :idAluguel  where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":idDisco", $obj->getIdDisco());
            $p_sql->bindValue(":idAluguel", $obj->getIdAluguel());
            $p_sql->bindValue(":id", $obj->getId());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível atualizar. " . $ex->getMessage();
        }
    }

    public static function remover($id) {
        try {
            $sql = "delete from itemAluguel where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $sql = "select * from itemAluguel where id = :id ";
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
            $sql = "select * from itemAluguel";
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
            $sql = "select * from itemAluguel " . $sqlWhere;
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
        $obj = new ItemAluguel();
        $obj->setId($dados->id);
        $obj->setIdDisco($dados->idDisco);
        $obj->setIdAluguel($dados->idAluguel);
        return $obj;
    }

}
