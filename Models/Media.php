<?php
namespace bundles\media\Models;

use Library\Core\Directories;
/**
 * Media managment
 * Medias can be from several types (extendable)
 * Medias can be public or private (belong to a User)
 *
 */

class Media
{
    /**
     * Public path workspaces
     *
     *
     * @var string
     */
    protected $sPublicWorkspacesPath = 'workspaces/';

    /**
     * Alllowed file types
     *
     * @todo add all free document format
     * @var array
     */
    protected $aHandledFileTypes = array(
    	'image' => array(
    	   '.jpg',
    	   '.jpeg',
    	   '.png',
    	   '.gif',
    	   '.svg'
        ),
        'video' => array(
    	   '.flv',
    	   '.avi',
    	   '.mov',
    	   '.mp4'
        ),
        'audio' => array(
    	   '.ogg',
    	   '.oga',
    	   '.mp3',
    	   '.wave'
        ),
        'document' => array(
    	   '.pdf',
    	   '.odt',
    	   '.odf',
    	   '.doc',
    	   '.docx',
    	   '.xls'
        ),
        'archive' => array(
    	   '.tar',
    	   '.tar.gz',
    	   '.tgz',
    	   '.zip',
    	   '.7z',
    	   '.rar',
    	   '.7z'
        )
    );

    /**
     * Public file repository absolute local path
     * @var string
     */
    protected $sPublicMediasPath;

    /**
     * Private file repository absolute local path
     * @var string
     */
    protected $sPrivateMediasPath;

    /**
     * Uploaded file absolute local path
     * @var unknown
     */
    protected $sUploadedMediasPath;

    /**
     * Media Entity instance
     * @var \Library\Core\Entity
     */
    private $oMedia;

    /**
     * User Entity instance (optional)
     * @var \Library\Core\Entity
     */
    private $oUser;

    /**
     * Meida entities collection
     * @var \Library\Core\EntitiesCollection
     */
    private $oMediaCollection;

    /**
     * Instance constructor
     *
     * @return MediaModelException If something bad happen otherwhise strictly noting -.-
     */
    public function __construct(\bundles\user\Entities\User $oUser)
    {
        try {
            $this->checkWorkspace();

            $this->isInitiatedUserWorkspace($oUser) {
                $this->initUserWorkspace($oUser);
            }

        } catch(\MediaModelException $oMediaModelException) {
            return $oMediaModelException;
        }

    }

    /**
     * HTTP POST upload one or several files
     */
    public function upload()
    {
        // Handle the $_FILES component with an UploadFiles component (array_map)
    }

    /**
     * Request for download a file directly on the client
     */
    public function download()
    {
        // Simply send HTTP meta encode then redfile iso solocal cdn
    }

    /**
     * Load the Medias found for the User provided at instance
     * @throw MediaModelException
     */
    public function loadUserMedia()
    {

    }

    /**
     * Accesssor for Media Entity
     * \Library\Core\EntitY
     */
    public function getMedia()
    {
        return $this->oMedia;
    }

    /**
     * Accessor for Media Collection entities
     * @return \Library\Core\EntitiesCollection
     */
    public function getMediaCollection()
    {
        return $this->oMediaCollection;
    }

    /**
     * Init a user workspace
     *
     * @param \bundles\user\Entities\User $oUser
     * @return boolean
     */
    protected function initUserWorkspace(\bundles\user\Entities\User $oUser)
    {

    }

    /**
     * Check if a given user is already initiated
     *
     * @param \bundles\user\Entities\User $oUser
     * @return boolean
     */
    protected function isInitiatedUserWorkspace(\bundles\user\Entities\User $oUser)
    {

    }

    private function checkWorkspaces()
    {
        // Check if public folder for user's data is correct
        if (! Directories::exists(PUBLIC_PATH . $this->sPublicWorkspacesPath)) {
            // Try to create
            if (! Directories::create(PUBLIC_PATH . $this->sPublicWorkspacesPath)) {
                throw new MediaModelException('Error: Unable to create workspaces directories: ' . PUBLIC_PATH . $this->sWorkspacesPath);
            }
        }

    }
}

class MediaModelException extends \Exception
{
}