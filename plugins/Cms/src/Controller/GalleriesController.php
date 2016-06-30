<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Galleries Controller
 *
 * @property \Cms\Model\Table\GalleriesTable $Galleries
 */
class GalleriesController extends AppController
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
        $this->set('galleries', $this->paginate($this->Galleries));
        $this->set('_serialize', ['galleries']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gallery = $this->Galleries->newEntity();
        if ($this->request->is('post')) {

            if($this->request->data['attachment']['error'] == 0) {
                $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
            } else {
                unset($this->request->data['attachment']);
            }

            $gallery = $this->Galleries->patchEntity($gallery, $this->request->data);
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gallery'));
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if($this->request->data['attachment']['error'] == 0) {
                $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
            } else {
                unset($this->request->data['attachment']);
            }

            $gallery = $this->Galleries->patchEntity($gallery, $this->request->data);
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gallery'));
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            $this->Flash->success(__('The gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
