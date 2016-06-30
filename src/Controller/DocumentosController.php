<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class DocumentosController extends AppController
{

    public function download($filename)
    {

        try {
            $this->response->file('uploads' . DS . $filename, ['download' => true] );
        } catch(\Exception $e) {
            $this->Flash->error("Ocorreu um problema ao efetuar o download deste arquivo.");

            return $this->redirect(['action' => 'index']);
        }
        return $this->response;
    }

    public function index()
    {
        $tableDocuments = TableRegistry::get("Documents");
        $documents = $tableDocuments->find()->all();

        $this->set(compact("documents"));
    }

    public function visualizar($id = null)
    {
        $this->layout = "ajax";

        $tableDocuments = TableRegistry::get("Documents");
        $document = $tableDocuments->find()->where(['id' => $id])->contain(['DocumentAttachments'])->first();

        $this->set(compact("document"));
    }

}