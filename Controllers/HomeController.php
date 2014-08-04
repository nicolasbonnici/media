<?php
namespace bundles\media\Controllers;

/**
 * Media Bundle HomeController
 * @author Nicolas Bonnici contact@nbonnici.info
 */
class HomeController extends \Library\Core\Auth
{

    public function __preDispatch()
    {}

    public function __postDispatch()
    {}

    /**
     * A dashboard for User's media
     */
    public function indexAction()
    {
        $this->oView->render($this->aView, 'home/index.tpl');
    }
}
