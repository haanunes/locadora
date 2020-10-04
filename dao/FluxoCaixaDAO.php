<?php
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/bd/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/vo/FluxoCaixa.php";
class FluxoCaixaDAO {
    
    public static function inserir(FluxoCaixa $obj) {
        try {
            $sql = "insert into fluxoCaixa (dataPagamento,dataPrevistaPagamento,descricao,idAluguel,valor,tipo,situacao) values (:dataPagamento,:dataPrevistaPagamento,:descricao,:idAluguel,:valor,:tipo,:situacao)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":dataPagamento", $obj->getDataPagamento());
            $p_sql->bindValue(":dataPrevistaPagamento", $obj->getDataPrevistaPagamento());
            $p_sql->bindValue(":descricao", $obj->getDescricao());
            $p_sql->bindValue(":idAluguel", $obj->getIdAluguel());
            $p_sql->bindValue(":valor", $obj->getValor());
            $p_sql->bindValue(":tipo", $obj->getTipo());
            $p_sql->bindValue(":situacao", $obj->getSituacao());
            $p_sql->execute();
            return  Conexao::getInstance()->lastInsertId();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }

    public static function atualizar($obj) {
        try {
            $sql = "update fluxoCaixa set dataPagamento= :dataPagamento,dataPrevistaPagamento= :dataPrevistaPagamento ,descricao = :descricao,idAluguel = :idAluguel,valor=:valor,tipo=:tipo,situacao=:situacao where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->bindValue(":dataPagamento", $obj->getDataPagamento());
            $p_sql->bindValue(":dataPrevistaPagamento", $obj->getDataPrevistaPagamento());
            $p_sql->bindValue(":descricao", $obj->getDescricao());
            $p_sql->bindValue(":idAluguel", $obj->getIdAluguel());
            $p_sql->bindValue(":valor", $obj->getValor());
            $p_sql->bindValue(":tipo", $obj->getTipo());
            $p_sql->bindValue(":situacao", $obj->getSituacao());
            $p_sql->bindValue(":id", $obj->getId());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível atualizar. " . $ex->getMessage();
        }
    }

    public static function remover($id) {
        try {
            $sql = "delete from fluxoCaixa where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $sql = "select * from fluxoCaixa where id = :id ";
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
            $sql = "select * from fluxoCaixa";
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
            $sql = "select * from fluxoCaixa ".$sqlWhere;
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
        $obj = new FluxoCaixa();
        $obj->setId($dados->id);
         $obj->setDataPagamento($dados->dataPagamento);
         $obj->setDataPrevistaPagamento($dados->dataPrevistaPagamento);
         $obj->setDescricao($dados->descricao);
         $obj->setIdAluguel($dados->idAluguel);
         $obj->setValor($dados->valor);
         $obj->setTipo($dados->tipo);
         $obj->setSituacao($dados->situacao);
        return $obj;
    }
}
