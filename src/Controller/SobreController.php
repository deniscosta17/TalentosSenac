<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class SobreController extends AppController
{

    public function index()
    {
        $tablePages = TableRegistry::get("Pages");
        $tableTestimonials = TableRegistry::get("Testimonials");
        $page = $tablePages->find()->where(['name' => 'Sobre o Talentos'])->first();
        $testimonials = $tableTestimonials->find()->order(['position' => 'DESC'])->all();

        $tableBanners = TableRegistry::get("Banners");
        $banners = $tableBanners->find()->all();
        $this->set(compact("banners", "page", "testimonials"));
    }

}