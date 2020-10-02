<?php
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/bd/Conexao.php";
require_once $_SERVER['DOCUMENT_ROOT']."/locadora/vo/Disco.php";
class DiscoDAO {
    
    public static function inserir(Disco $obj) {
        try {
            $sql = "insert into disco (titulo,faixaEtaria,preco,artista,anoLancamento) values (:titulo,:faixaEtaria,:preco,:artista,:anoLancamento)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":titulo", $obj->getTitulo());
            $p_sql->bindValue(":faixaEtaria", $obj->getFaixaEtaria());
            $p_sql->bindValue(":preco", $obj->getPreco());
            $p_sql->bindValue(":artista", $obj->getArtista());
            $p_sql->bindValue(":anoLancamento", $obj->getAnoLancamento());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }

    public static function atualizar($obj) {
        try {
            $sql = "update disco set titulo= :titulo,faixaEtaria= :faixaEtaria ,preco = :preco,artista = :artista,anoLancamento=:anoLancamento where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->bindValue(":titulo", $obj->getTitulo());
            $p_sql->bindValue(":faixaEtaria", $obj->getFaixaEtaria());
            $p_sql->bindValue(":preco", $obj->getPreco());
            $p_sql->bindValue(":artista", $obj->getArtista());
            $p_sql->bindValue(":anoLancamento", $obj->getAnoLancamento());
            $p_sql->bindValue(":id", $obj->getId());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível atualizar. " . $ex->getMessage();
        }
    }

    public static function remover($id) {
        try {
            $sql = "delete from disco where id = :id ";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível remover. " . $ex->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $sql = "select * from disco where id = :id ";
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
            $sql = "select * from disco";
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
            $sql = "select * from disco ".$sqlWhere;
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
        $obj = new Disco();
        $obj->setId($dados->id);
         $obj->setTitulo($dados->titulo);
         $obj->setFaixaEtaria($dados->faixaEtaria);
         $obj->setPreco($dados->preco);
         $obj->setArtista($dados->artista);
         $obj->setAnoLancamento($dados->anoLancamento);
        return $obj;
    }
}
