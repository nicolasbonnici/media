<?php
namespace bundles\media\Models;

use Library\Core\Directories;
use Library\Core\Files;

/**
 * Media managment
 * Medias can be from several types (extendable)
 * Medias can be public or private (belong to a User)
 *
 */

class MediaModel
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
     * User's workspace
     * @var string
     */
    protected $sUserWorkspacePath;

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
        $this->sUserWorkspacePath = $this->buildUserPath($oUser);
        if (! Directories::exists($this->sUserWorkspacePath) && ! Directories::create($this->sUserWorkspacePath)) {
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

    /**
     * Build user's directory name under the workspace
     *
     * @param \bundles\user\Entities\User $oUser
     * @param boolean $bIsPublic   TRUE to build private worspace path
     * @return string
     */
    private function buildUserPath(\bundles\user\Entities\User $oUser, $bIsPublic = false)
    {
        if (! $bIsPublic) {
            $sPath = $this->sPublicWorkspacesPath . md5($oUser->mail);
        } else {
            $sPath = $this->sPrivateMediasPath . md5($oUser->mail);
        }

        return $sPath;
    }

    /**
     * Load user's workspace files
     *
     * @return string
     */
    public function loadUserWorkspace()
    {
        $sResponse = $this->scanUserWorkspace(PUBLIC_PATH . $this->sUserWorkspacePath);
        header('Content-type: application/json');
        echo json_encode(array(
            "name" => "files",
            "type" => "folder",
            "path" => '/' . $this->sUserWorkspacePath,
            "items" => $sResponse
        ));
    }

    /**
     *
     * @return array
     */
    private function scanUserWorkspace($sPathToScan = null, array $aItems = array())
    {
        if (is_null($sPathToScan)) {
            $sPathToScan = $sPathToScan;
        }
        if(file_exists($sPathToScan)) {
            foreach(scandir($sPathToScan) as $f) {

                if(!$f || $f[0] == '.') {
                    continue;
                }

                if(is_dir($sPathToScan . '/' . $f)) {
                    // Folder
                    $aItems[] = array(
                        "name" => $f,
                        "type" => "folder",
                        "path" => $this->sUserWorkspacePath . '/' . $f,
                        "items" => $this->scanUserWorkspace($sPathToScan . '/' . $f)
                    );
                }

                else {
                    // File
                    $aItems[] = array(
                        "name" => $f,
                        "type" => "file",
                        "path" => $this->sUserWorkspacePath. '/' . $f,
                        "size" => filesize($sPathToScan . '/' . $f)
                    );
                }
            }

        }

        return $aItems;
    }

}

class MediaModelException extends \Exception
{
}