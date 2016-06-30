<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\Helper\HtmlHelper;

class SenacHelper extends HtmlHelper
{

    public function upload($filename, $options = [])
    {
        return $this->image('/uploads/' . $filename, $options);
    }
}
