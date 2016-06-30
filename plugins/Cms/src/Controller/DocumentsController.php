<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

/**
 * Documents Controller
 *
 * @property \Cms\Model\Table\DocumentsTable $Documents
 */
class DocumentsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }

// Não é usado o UploadComponent pois é necessário fazer uma adaptação no upload por causa do Dropzone.js
    public function upload_document()
    {
        $this->layout = "ajax";
        $this->autoRender = false;

        if(!empty($_FILES)) {
            $tmpFile = $_FILES['file']['tmp_name'];
            $targetPath = WWW_ROOT . 'uploads' . DS;
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $filename = time() . '-' . strtolower(Inflector::slug($_FILES['file']['name']) . '.' . $ext);
            $targetFile = $targetPath . $filename;

            move_uploaded_file($tmpFile, $targetFile);

            $document_id = $_POST['document_id'];

            $tableDocumentAttachments = TableRegistry::get("DocumentAttachments");
            $entity = $tableDocumentAttachments->newEntity();

            $entity->document_id = $document_id;
            $entity->attachment = $filename;
            $entity->name = $filename;
            $entity->description = $filename;

            $result = $tableDocumentAttachments->save($entity);

            $return = [
                'attachment' => $filename,
                'name' => $filename,
                'description' => $filename,
                'document_id' => $document_id,
                'id' => $result->id,
            ];

            echo json_encode($return);
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('documents', $this->paginate($this->Documents));
        $this->set('_serialize', ['documents']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $document = $this->Documents->newEntity();
        if ($this->request->is('post')) {

            $document = $this->Documents->patchEntity($document, $this->request->data);
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('O documento da competição foi salvo.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível salvar o documento.'));
            }
        }
        $this->set(compact('document'));
        $this->set('_serialize', ['document']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => [
                'DocumentAttachments' => function($a) {
                    return $a->order(['id' => 'DESC']);
                }
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $document = $this->Documents->patchEntity($document, $this->request->data);
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('O documento da competição foi salvo.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível salvar o documento.'));
            }
        }
        $this->set(compact('document'));
        $this->set('_serialize', ['document']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('O documento foi excluído.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o documento.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function delete_attachment($id = null, $document_id = null)
    {
        $document_attachment = $this->Documents->DocumentAttachments->get($id);
        if ($this->Documents->DocumentAttachments->delete($document_attachment)) {
            $this->Flash->success(__('O anexo foi excluído.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o anexo.'));
        }
        return $this->redirect(['action' => 'edit', $document_id]);
    }
}
