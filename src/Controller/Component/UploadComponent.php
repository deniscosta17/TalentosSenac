<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Inflector;

class UploadComponent extends Component
{

    // Execute any other additional setup for your component.
    public function initialize(array $config)
    {
    }

    public function uploadIt($field)
    {
        $dados = $this->request->data[$field];
        $filename = time() . '-' . strtolower(Inflector::slug($dados['name']));
        $ext = pathinfo($dados['name'], PATHINFO_EXTENSION);
        $filename = $filename . "." . $ext;

        $uploadPath = WWW_ROOT . 'uploads' . DS . $filename;

        if(!empty($dados)) {
            if(move_uploaded_file($dados['tmp_name'], $uploadPath))
            {
                return $filename;
            }
        }

        return false;
    }

}