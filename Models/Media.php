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
     * Public path workspaces (Directly linked to the Workspaces/public bundle directory)
     * Example http://domain.tld/[***[some_dir]***]/path/to/some.file
     *
     * @var string
     */
    protected $sPublicWorkspacesPath = 'u/';

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
            $this->sPublicWorkspacesPath    = PUBLIC_PATH . $this->sPublicWorkspacesPath;
            $this->sPublicMediasPath        = BUNDLES_PATH . 'media/Workspaces/Public/';
            $this->sPrivateMediasPath       = BUNDLES_PATH . 'media/Workspaces/Private/';

            if (! $this->checkWorkspaces()) {
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
     *
     * @throw MediaModelException
     */
    public function loadUserMedia()
    {

    }

    /**
     * Accesssor for Media Entity
     *
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
     * @return boolean|MediaModelException   TRUE otherwhise Exception
     */
    protected function initUserWorkspace(\bundles\user\Entities\User $oUser)
    {
        $sUserDirectoryPath = $this->sPublicMediasPath . md5($oUser->mail);
        if (! Directories::exists($sUserDirectoryPath) && ! Directories::create($sUserDirectoryPath)) {
            throw new MediaModelException('Cannot have write eaccess under the current workspace (' . $this->sPublicMediasPath . '), check your rights.');
        } else {
            return true;
        }
        return false;
    }

    /**
     * Check if the workspace is fully functionnal
     *
     * @throws MediaModelException if something very scary happened...
     * @return boolean|MediaModelException   TRUE otherwhise Exception
     */
    private function checkWorkspaces()
    {
        // Check if public folder for user's data is correct
        if (! Directories::exists($this->sPublicWorkspacesPath)) {
            // Try to create
            if (! Directories::create(PUBLIC_PATH . $this->sPublicWorkspacesPath)) {
                throw new MediaModelException('Error: Unable to create workspaces directories: ' . $this->sWorkspacesPath);
            } else {
                return true;
            }
        }
    }
}

class MediaModelException extends \Exception
{
}