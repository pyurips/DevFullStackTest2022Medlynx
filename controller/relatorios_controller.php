<?php

    require_once '../model/model.php';
    $data = new APIData();

    $startDate = strtotime($_POST['startDate02']);
    $endDate = strtotime($_POST['endDate02']);


    $atendimentosArray = array();
    foreach ($data->getAllAtendimentos() as $key => $value) {
        if (strtotime($value->data_atendimento) >= $startDate and strtotime($value->data_atendimento) <= $endDate) {
            $atendimentosArray[] = [
                'data_atendimento' => @$value->data_atendimento,
                'nome_paciente' => @$data->getUniquePessoas($value->id_pessoa)->nome,
                'items_usados' => @[$data->getUniqueItens($data->getUniqueLancamentos($value->id_atendimento)->id_item)->descricao, $data->getUniqueLancamentos($value->id_atendimento)->quantidade],
                'valor_total' => floatval(@$data->getUniqueItens($data->getUniqueLancamentos($value->id_atendimento)->id_item)->valor) * floatval(@$data->getUniqueLancamentos($value->id_atendimento)->quantidade)
            ];
        }
    }

    require_once '../view/relatorios_view.php';
?>