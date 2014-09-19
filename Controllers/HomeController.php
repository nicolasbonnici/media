<?php
namespace bundles\media\Controllers;

use bundles\media\Models\MediaModel;
use bundles\media\Models\MediaModelException;

/**
 * Media Bundle HomeController
 * @author Nicolas Bonnici contact@nbonnici.info
 */
class HomeController extends \Library\Core\Auth
{
    protected $oMediaModel;

    public function __preDispatch()
    {
        // Build new model instance constructor with the current logged in user
        // to setup user's workspace if needed
    	$oMediaModel = new MediaModel($this->oUser);
    	if($oMediaModel instanceof MediaModelException) {
    	    return $oMediaModel->getMessage();
    	} else {
    	    $this->oMediaModel = $oMediaModel;
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

    public function listAction()
    {
        return $this->oMediaModel->loadUserWorkspace();
    }
}
