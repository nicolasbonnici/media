<?php
namespace bundles\media\Controllers;

use bundles\media\Models\Media;
use bundles\media\Models\MediaModelException;

/**
 * Media Bundle HomeController
 * @author Nicolas Bonnici contact@nbonnici.info
 */
class HomeController extends \Library\Core\Auth
{

    public function __preDispatch()
    {
        // Build new model instance constructor with the current logged in user
    	$oMediaModel = new Media($this->oUser);
    	if($oMediaModel instanceof MediaModelException) {
    	    return $oMediaModel->getMessage();
    	}
    }

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
