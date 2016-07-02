<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class CmsController extends AppController
{

    public function exportar_egressos()
    {
        $rows = [
            ['cpf', 'nome', 'email', 'atualizou_seus_dados', 'unidade', 'ocupacao', 'data_modificacao']
        ];

        $tableParticipants = TableRegistry::get("Participants");
        $participants = $tableParticipants->find()->all();

        foreach($participants as $p)
        {
            if(!empty($p->modified))
            {
                $data_modificacao = $p->modified->format("d/m/Y H:i:s");
            } else
            {
                $data_modificacao = null;
            }

            $rows[] = [$p->cpf, utf8_decode($p->name), $p->email, $p->atualizou_seus_dados, utf8_decode($p->unidade), utf8_decode($p->ocupacao), $data_modificacao];
        }

        $fp = fopen(WWW_ROOT . 'uploads' . DS . 'exportacao-egressos.csv', 'w');

        foreach($rows as $r)
        {
            fputcsv($fp, $r);
        }

        fclose($fp);

        try {
            $this->response->file('uploads' . DS . 'exportacao-egressos.csv', ['download' => true] );
        } catch(\Exception $e) {
            $this->Flash->error("Ocorreu um problema ao efetuar o download deste arquivo.");

            return $this->redirect(['action' => 'index']);
        }

        $this->autoRender = false;
    }

    public function exportar_interessados()
    {
        $rows = [
            ['id', 'nome', 'email', 'data_de_criacao']
        ];

        $tableNewsletters = TableRegistry::get("Newsletters");
        $newsletters = $tableNewsletters->find()->all();

        foreach($newsletters as $p)
        {
            if(!empty($p->created))
            {
                $data_modificacao = $p->created->format("d/m/Y H:i:s");
            } else
            {
                $data_modificacao = null;
            }

            $rows[] = [$p->id, $p->name, $p->email, $data_modificacao];
        }

        $fp = fopen(WWW_ROOT . 'uploads' . DS . 'exportacao-interessados.csv', 'w');

        foreach($rows as $r)
        {
            fputcsv($fp, $r);
        }

        fclose($fp);

        try {
            $this->response->file('uploads' . DS . 'exportacao-interessados.csv', ['download' => true] );
        } catch(\Exception $e) {
            $this->Flash->error("Ocorreu um problema ao efetuar o download deste arquivo.");

            return $this->redirect(['action' => 'index']);
        }

        $this->autoRender = false;
    }

    public function index()
    {
        $tableSettings = TableRegistry::get("Settings");
        $entitySettings = $tableSettings->newEntity();
        $videoUrl = $tableSettings->find()->where(['identifier' => 'video_url'])->first()->value;
        $horarioFaleConosco = $tableSettings->find()->where(['identifier' => 'horario_fale_conosco'])->first()->value;
        $formHome = $tableSettings->find()->where(['identifier' => 'form_home'])->first();

        $this->set(compact("horarioFaleConosco", "entitySettings", "videoUrl", "formHome"));

        if($this->request->is("post")) {

            foreach($this->request->data as $field => $value) {

                $entitySettings = $tableSettings->find()->where(['identifier' => $field])->first();

                if(!$entitySettings)
                    $entitySettings = $tableSettings->newEntity();
                    $entitySettings->identifier = $field;
                    $entitySettings->value = $value;

                $entitySettings->value = $value;
                $tableSettings->save($entitySettings);
            }

            $this->Flash->success("Configurações atualizadas.");

            return $this->redirect(['action' => 'index']);
        }
    }

}
