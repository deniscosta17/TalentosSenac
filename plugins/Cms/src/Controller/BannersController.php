<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Banners Controller
 *
 * @property \Cms\Model\Table\BannersTable $Banners
 */
class BannersController extends AppController
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
        $this->set('banners', $this->paginate($this->Banners));
        $this->set('_serialize', ['banners']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $banner = $this->Banners->newEntity();
        if ($this->request->is('post')) {

            if($this->request->data['attachment_file']['error'] == 0) {
                $this->request->data['attachment'] = $this->Upload->uploadIt("attachment_file");
            }

            $banner = $this->Banners->patchEntity($banner, $this->request->data);
            if ($this->Banners->save($banner)) {
                $this->Flash->success(__('The banner has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The banner could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('banner'));
        $this->set('_serialize', ['banner']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Banner id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $banner = $this->Banners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if($this->request->data['attachment_file']['error'] == 0) {
                $this->request->data['attachment'] = $this->Upload->uploadIt("attachment_file");
            }

            $banner = $this->Banners->patchEntity($banner, $this->request->data);
            if ($this->Banners->save($banner)) {
                $this->Flash->success(__('The banner has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The banner could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('banner'));
        $this->set('_serialize', ['banner']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Banner id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        if ($this->Banners->delete($banner)) {
            $this->Flash->success(__('The banner has been deleted.'));
        } else {
            $this->Flash->error(__('The banner could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
