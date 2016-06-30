<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \Cms\Model\Table\ArticlesTable $Articles
 */
class B2bController extends AppController
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
        $this->set('b2b', $this->paginate($this->B2b));
        $this->set('_serialize', ['b2b']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $b2b = $this->B2b->newEntity();
        if ($this->request->is('post')) {

            if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $b2b = $this->B2b->patchEntity($b2b, $this->request->data);
            if ($this->B2b->save($b2b)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('b2b'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $b2b = $this->B2b->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $article = $this->B2b->patchEntity($b2b, $this->request->data);
            if ($this->B2b->save($b2b)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('b2b'));
        $this->set('_serialize', ['b2b']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->B2b->get($id);
        if ($this->B2b->delete($b2b)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
