<?php
namespace bundles\sample\Controllers;

/**
 *
 * @author info
 */
class HomeController extends \Library\Core\Auth
{

    public function __preDispatch()
    {

    }

    public function __postDispatch()
    {}

    public function indexAction()
    {
        $this->oView->render($this->aView, 'sample/index.tpl');
    }
}

?>
