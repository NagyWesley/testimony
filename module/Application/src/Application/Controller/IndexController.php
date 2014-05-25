<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
require('Zend.php');

include 'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->debugging = false;
$smarty->force_compile = true;
$smarty->caching = false;
$smarty->compile_check = true;
$smarty->cache_lifetime = -1;
$smarty->template_dir = 'resources/templates';
$smarty->compile_dir = 'resources/templates_c';
$smarty->plugins_dir = array(
  SMARTY_DIR . 'plugins',
  'resources/plugins');

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
