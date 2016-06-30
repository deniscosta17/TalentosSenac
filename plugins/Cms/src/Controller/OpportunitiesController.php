<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Opportunities Controller
 *
 * @property \Cms\Model\Table\OpportunitiesTable $Opportunities
 */
class OpportunitiesController extends AppController
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
        $this->set('opportunities', $this->paginate($this->Opportunities));
        $this->set('_serialize', ['opportunities']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opportunity = $this->Opportunities->newEntity();
        if ($this->request->is('post')) {

            if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $opportunity = $this->Opportunities->patchEntity($opportunity, $this->request->data);
            if ($this->Opportunities->save($opportunity)) {
                $this->Flash->success(__('The opportunity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The opportunity could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opportunity'));
        $this->set('_serialize', ['opportunity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opportunity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opportunity = $this->Opportunities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $opportunity = $this->Opportunities->patchEntity($opportunity, $this->request->data);

            if ($this->Opportunities->save($opportunity)) {
                $this->Flash->success(__('The opportunity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The opportunity could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opportunity'));
        $this->set('_serialize', ['opportunity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opportunity id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunity = $this->Opportunities->get($id);
        if ($this->Opportunities->delete($opportunity)) {
            $this->Flash->success(__('The opportunity has been deleted.'));
        } else {
            $this->Flash->error(__('The opportunity could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
