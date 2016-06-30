<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ResultadosController extends AppController
{

    public function index()
    {
        $tableResults = TableRegistry::get("Results");

        $resultados = [];

        $results = $tableResults->find()->all();

        foreach($results as $r) {
            $resultados[$r->categoria][$r->posicao] = $r->toArray();
        }

        foreach($resultados as $categoria => $dados){
            sort($resultados[$categoria]);
        }

        $categoria_atual = "classificacao_geral";

        $this->set(compact("resultados", "categoria_atual"));
    }

    public function etapa_1()
    {
        $tableResults = TableRegistry::get("Results");

        $resultados = [];

        $results = $tableResults->find()->all();

        foreach($results as $r) {
            $resultados[$r->categoria][$r->posicao] = $r->toArray();
        }

        foreach($resultados as $categoria => $dados){
            sort($resultados[$categoria]);
        }

        $categoria_atual = "etapa_1";

        $this->set(compact("resultados", "categoria_atual"));
    }

    public function etapa_2()
    {
        $tableResults = TableRegistry::get("Results");

        $resultados = [];

        $results = $tableResults->find()->all();

        foreach($results as $r) {
            $resultados[$r->categoria][$r->posicao] = $r->toArray();
        }

        foreach($resultados as $categoria => $dados){
            sort($resultados[$categoria]);
        }

        $categoria_atual = "etapa_2";

        $this->set(compact("resultados", "categoria_atual"));
    }

    public function etapa_3()
    {
        $tableResults = TableRegistry::get("Results");

        $resultados = [];

        $results = $tableResults->find()->all();

        foreach($results as $r) {
            $resultados[$r->categoria][$r->posicao] = $r->toArray();
        }

        foreach($resultados as $categoria => $dados){
            sort($resultados[$categoria]);
        }

        $categoria_atual = "etapa_3";

        $this->set(compact("resultados", "categoria_atual"));
    }

}