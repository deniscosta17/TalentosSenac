<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ParticipantsTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function getCpf($cpf = '') {
        // return padrão
        $return = ['status' => 'danger', 'message' => 'CPF inválido.'];

        // 1 - verifica se existe um participante com este cpf
        $participants = $this->find()->where(['cpf' => $cpf])->all();

        if(empty($participants->toArray())) {
            $return['message'] = '<i class="fa fa-exclamation-triangle"></i> Não há participante com este CPF.';
        } else {

                $return['status'] = 'success';
                $return['message'] = '<i class="fa fa-check"></i> Seja bem-vindo! Precisamos saber seu e-mail.';

                // Agora vamos popular unidades e ocupacões por unidade
                $unidades = [];
                $ocupacoes = [];
                $ocupacoes_por_unidade = [];

                foreach($participants as $p) {
                    $return['nome'] = $p->name;

                    $unidades[$p->unidade] = $p->unidade;
                    $ocupacoes[$p->ocupacao] = $p->ocupacao;

                    $ocupacoes_por_unidade[$p->ocupacao][] = $p->unidade;
                }

                $return['unidades'] = $unidades;
                $return['ocupacoes'] = $ocupacoes;
                $return['ocupacoes_por_unidade'] = $ocupacoes_por_unidade;
        }

        return $return;
    }

}