<?php
require_once "../bd/Conexao.php";
require_once "../vo/Aluguel.php";
class AluguelDAO {
    
    public static function inserir(Aluguel $obj) {
        try {
            $sql = "insert into aluguel (dataAluguel,horaAluguel,dataPrevistaDevolucao,dataOcorreuDevolucao,pago,valor,idUsuario,idCliente,multa,desconto) values (:dataAluguel,:horaAluguel,:dataPrevistaDevolucao,:dataOcorreuDevolucao,:pago,:valor,:idUsuario,:idCliente,:multa,:desconto)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":dataAluguel", $obj->getDataAluguel());
            $p_sql->bindValue(":horaAluguel", $obj->getHoraAluguel());
            $p_sql->bindValue(":dataPrevistaDevolucao", $obj->getDataPrevistaDevolucao());
            $p_sql->bindValue(":dataOcorreuDevolucao", $obj->getDataOcorreuDevolucao());
            $p_sql->bindValue(":pago", $obj->getPago());
            $p_sql->bindValue(":valor", $obj->getValor());
            $p_sql->bindValue(":idUsuario", $obj->getIdUsuario());
            $p_sql->bindValue(":idCliente", $obj->getIdCliente());
            $p_sql->bindValue(":multa", $obj->getMulta());
            $p_sql->bindValue(":desconto", $obj->getDesconto());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }

    public static function atualizar($obj) {
        try {
            $sql = "update aluguel set dataAluguel= :dataAluguel,horaAluguel= :horaAluguel ,dataPrevistaDevolucao = :dataPrevistaDevolucao,dataOcorreuDevolucao = :dataOcorreuDevolucao,pago=:pago,valor=:valor,idUsuario=:idUsuario,idCliente=:idCliente,multa=:multa,desconto=:desconto where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->bindValue(":dataAluguel", $obj->getDataAluguel());
            $p_sql->bindValue(":horaAluguel", $obj->getHoraAluguel());
            $p_sql->bindValue(":dataPrevistaDevolucao", $obj->getDataPrevistaDevolucao());
            $p_sql->bindValue(":dataOcorreuDevolucao", $obj->getDataOcorreuDevolucao());
            $p_sql->bindValue(":pago", $obj->getPago());
            $p_sql->bindValue(":valor", $obj->getValor());
            $p_sql->bindValue(":idUsuario", $obj->getIdUsuario());
            $p_sql->bindValue(":idCliente", $obj->getIdCliente());
            $p_sql->bindValue(":multa", $obj->getMulta());
            $p_sql->bindValue(":desconto", $obj->getDesconto());
            $p_sql->bindValue(":id", $obj->getId());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível atualizar. " . $ex->getMessage();
        }
    }

    public static function remover($id) {
        try {
            $sql = "delete from aluguel where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $sql = "select * from aluguel where id = :id ";
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
            $sql = "select * from aluguel";
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
            $sql = "select * from aluguel ".$sqlWhere;
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
        $obj = new Aluguel();
        $obj->setId($dados->id);
         $obj->setDataAluguel($dados->dataAluguel);
         $obj->setHoraAluguel($dados->horaAluguel);
         $obj->setDataPrevistaDevolucao($dados->dataPrevistaDevolucao);
         $obj->setDataOcorreuDevolucao($dados->dataOcorreuDevolucao);
         $obj->setPago($dados->pago);
         $obj->setValor($dados->valor);
         $obj->setIdUsuario($dados->idUsuario);
         $obj->setIdCliente($dados->idCliente);
         $obj->setMulta($dados->multa);
         $obj->setDesconto($dados->desconto);
        return $obj;
    }
}
