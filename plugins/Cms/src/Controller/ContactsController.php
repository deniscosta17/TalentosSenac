<?php
namespace Cms\Controller;

use Cms\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \Cms\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function export()
    {

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('contacts', $this->paginate($this->Contacts));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {

            if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $contact = $this->Contacts->patchEntity($contact, $this->request->data);
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(!empty($this->request->data['attachment']['error']) && $this->request->data['attachment']['error'] == 0) {
   $this->request->data['attachment'] = $this->Upload->uploadIt("attachment");
} else {
   unset($this->request->data['attachment']);
}

            $contact = $this->Contacts->patchEntity($contact, $this->request->data);
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
