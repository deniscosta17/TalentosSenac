<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Pages Controller
 *
 * @property \Cms\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function delete_attachment($block = null, $id = null)
    {
        $tablePages = TableRegistry::get("Pages");
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);

        $attribute_name = "block_" . $block . "_attachment";

        $page->$attribute_name = null;

        $tablePages->save($page);

        $this->Flash->success(__('O anexo foi excluído.'));

        return $this->redirect(['action' => 'edit', $id]);

    }
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if($this->request->data['block_1_attachment']['error'] == 0) {
                $this->request->data['block_1_attachment'] = $this->Upload->uploadIt("block_1_attachment");
            } else {
                unset($this->request->data['block_1_attachment']);
            }

            if($this->request->data['block_2_attachment']['error'] == 0) {
                $this->request->data['block_2_attachment'] = $this->Upload->uploadIt("block_2_attachment");
            } else {
                unset($this->request->data['block_2_attachment']);
            }

            if($this->request->data['block_3_attachment']['error'] == 0) {
                $this->request->data['block_3_attachment'] = $this->Upload->uploadIt("block_3_attachment");
            } else {
                unset($this->request->data['block_3_attachment']);
            }

            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('A página foi salva.'));
                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('Não foi possível salvar a página.'));
            }
        }
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

}
