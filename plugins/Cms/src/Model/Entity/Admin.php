<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Entidade referente a tabela de Administradores do CMS.
 *
 * @author henrique <henrique@bblender.com.br>
 */
class Admin extends Entity
{

/**
 * Função utilizada para verificar se o usuário existe ou não.
 *
 * @return [object] Se o usuário existir, retorna os dados dele
 * @return [boolean] Se o usuário NÃO existir, retorna false
 */
    public function checarAdminExiste()
    {
        $table = TableRegistry::get("Admins");

        $where = [
            'username' => $this->username
        ];

        $find = $table
                    ->find()
                    ->where($where)
                    ->first();

        if(!empty($find)) {
            return $find;
        } else {
            return false;
        }
    } // fim - checarAdminExiste

/**
 * Função utilizada para verificar se a senha do usuário é compatível.
 *
 * @return [type] [description]
 */
    public function checarSenha($entity, $senhaDigitada)
    {
        $senhaDigitadaEncriptada = md5($senhaDigitada);

        return ($senhaDigitadaEncriptada == $entity->password);
    } // fim - checarAdminExiste
}