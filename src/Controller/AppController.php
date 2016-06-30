<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $session;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->session = $this->request->session();

        // Se o controller for uma área restrita
        if($this->areaRestrita == true) {
            // Recupera a sessão de admin
            $admin = $this->session->read("admin");
            // Se não houver sessão de admin, redireciona o usuário para o login
            if(empty($admin))
            {
                $this->Flash->error("Você não tem permissão para acessar esta página! Faça seu login.");
                return $this->redirect(['controller' => 'authentication', 'action' => 'login']);
            } // fim - return
        } // fim - areaRestrita

        $this->authConfig();
    }

    public function authConfig()
    {
        // Recupera a sessão de user
        $user_logged = $this->session->read("user_logged");
        $affiliatesTable = TableRegistry::get("Affiliates");
        $affiliateEntity = $affiliatesTable->newEntity();
        if(empty($user_logged))
        {
            $user_logged = false;
        }
        $this->set(compact("user_logged", "affiliateEntity"));
    }
}
