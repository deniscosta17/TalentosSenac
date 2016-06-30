<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Clippings Controller
 *
 * @property \Cms\Model\Table\ClippingsTable $Clippings
 */
class ClippingsController extends AppController
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
        $this->set('clippings', $this->paginate($this->Clippings));
        $this->set('_serialize', ['clippings']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clipping = $this->Clippings->newEntity();
        if ($this->request->is('post')) {

            $clipping = $this->Clippings->patchEntity($clipping, $this->request->data);
            if ($this->Clippings->save($clipping)) {
                $this->Flash->success(__('The clipping has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clipping could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('clipping'));
        $this->set('_serialize', ['clipping']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clipping id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clipping = $this->Clippings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $clipping = $this->Clippings->patchEntity($clipping, $this->request->data);
            if ($this->Clippings->save($clipping)) {
                $this->Flash->success(__('The clipping has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clipping could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('clipping'));
        $this->set('_serialize', ['clipping']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clipping id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clipping = $this->Clippings->get($id);
        if ($this->Clippings->delete($clipping)) {
            $this->Flash->success(__('The clipping has been deleted.'));
        } else {
            $this->Flash->error(__('The clipping could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
