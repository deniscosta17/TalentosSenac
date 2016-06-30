<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \Cms\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends AppController
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
        $this->set('questions', $this->paginate($this->Questions));
        $this->set('_serialize', ['questions']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {

              if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
