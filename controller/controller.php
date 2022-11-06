<?php
    require_once 'model/model.php';
    class Data {
        public function getRequisito01() {
            $data = new APIData();
            $arrayItens = array();
            foreach ($data->getAllLancamentos() as $chave => $valor) {
                @$arrayItens[$valor->id_item] = $arrayItens[$valor->id_item] + $valor->quantidade;
            }

            $arrayItens2 = array();
            foreach ($data->getAllItens() as $key => $value) {
                array_push($arrayItens2, $value->descricao);
            }
            
            $fixedArray = array();
            foreach ($arrayItens2 as $key => $value) {
                if (array_key_exists(($key + 1), $arrayItens)) {
                    foreach ($arrayItens as $key1 => $value1) {
                        if ($key1 === ($key + 1)) {
                            $fixedArray[$value] = $value1;
                        }
                    }
                }
            }
            arsort($fixedArray);
            return ($fixedArray);
        }

        public function getRequisito03() {
            $data = new APIData();
            $arrayItens = array();
            foreach ($data->getAllEvolucao() as $key => $value) {
                if ($value->descricao === 'reação alérgica grave') {
                    foreach ($data->getAllLancamentos() as $key1 => $value1) {
                        if ($value1->id_atendimento === $value->id_atendimento) {
                            $arrayItens[$data->getUniquePessoas($data->getUniqueAtendimentos($value->id_atendimento)->id_pessoa)->nome] = $data->getUniqueItens($data->getUniqueLancamentos($value1->id_lancamento)->id_item)->descricao;
                        }
                    }
                }
            }
            return $arrayItens;
        }

        public function getRequisito04() {
            $data = new APIData();
            $arrayItens = array();
            foreach ($data->getAllItens() as $key => $value) {
                $arrayItens[$value->descricao] = $value->valor;
            }
            return $arrayItens;
        }
    }
    
    $data = new Data();
    require_once 'view/main.php';
?>