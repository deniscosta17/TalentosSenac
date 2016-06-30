<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Results Controller
 *
 * @property \Cms\Model\Table\ResultsTable $Results
 */
class ResultsController extends AppController
{

  public function initialize()
  {
      parent::initialize();
      $this->loadComponent('Upload');
  }

    /**
     * Index method
     *
     * @return void
     */
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

        $this->set(compact("resultados"));

        if($this->request->is("post")) {

            $filename = $this->Upload->uploadIt("attachment");

            $csv_path = WWW_ROOT . 'uploads' . DS . $filename;

            $dados = [];

            if (($getfile = fopen($csv_path, "r")) !== FALSE) {
                $data = fgetcsv($getfile, 1000, ",");

                while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
                    $num = count($data);

                    for ($c=0; $c < $num; $c++) {
                        $result = $data;
                        $str = implode(",", $result);
                        $slice = explode(";", $str);

                        $dado = [
                            'posicao' => substr($slice[0], 0, -1),
                            'nome' => utf8_encode($slice[1]),
                            'curso' => ucfirst(utf8_encode($slice[2])),
                            'unidade' => ucfirst(utf8_encode($slice[3])),
                            'categoria' => $this->request->data['category']
                        ];

                        $dados[] = $dado;
                    }
                }

            } // fim - csv

            $tableResults->deleteAll(['NOT' => ['Results.categoria' => $this->request->data['category'] ] ]);

            foreach($dados as $dado) {
                $entity = $tableResults->newEntity();

                foreach($dado as $field => $value) {
                    $entity->$field = $value;
                }

                $tableResults->save($entity);
            }

            $this->Flash->success("CSV importado.");

            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $result = $this->Results->newEntity();
        if ($this->request->is('post')) {
            $result = $this->Results->patchEntity($result, $this->request->data);
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('result'));
        $this->set('_serialize', ['result']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Result id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $result = $this->Results->patchEntity($result, $this->request->data);
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('result'));
        $this->set('_serialize', ['result']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Result id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $result = $this->Results->get($id);
        if ($this->Results->delete($result)) {
            $this->Flash->success(__('The result has been deleted.'));
        } else {
            $this->Flash->error(__('The result could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
