<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class AjaxController extends AppController
{

    public function update_document_attachment()
    {
        $this->layout = "ajax";
        $this->autoRender = false;

        $id = $this->request->data["id"];
        $value = $this->request->data["value"];
        $field = $this->request->data["field"];

        $tableDocumentAttachments = TableRegistry::get("DocumentAttachments");
        $entityDocumentAttachment = $tableDocumentAttachments->get($id);

        $entityDocumentAttachment->$field = $value;

        $tableDocumentAttachments->save($entityDocumentAttachment);

        $return = ['status' => 'success'];

        echo json_encode($return);
    }
}