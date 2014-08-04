<?php
namespace bundles\media\Controllers;

/**
 * Media Bundle UploadController
 * @author Nicolas Bonnici contact@nbonnici.info
 */
class UploadController extends \Library\Core\Auth
{

    public function __preDispatch()
    {}

    public function __postDispatch()
    {}

    /**
     * Handle POST upload request
     */
    public function indexAction()
    {
        $this->oView->render($this->aView, 'upload/index.tpl');
    }
}

?>
