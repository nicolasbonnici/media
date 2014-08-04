<?php
namespace bundles\media\Models;

/**
 * Media managment
 * Medias can be from several types (extendable)
 * Medias can be public or private (belong to a User)
 *
 */

class Media
{
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

    public function __construct()
    {
        // @todo create an Media and MediaType Entity
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
        // Simply send HTTP meta encode then redfile
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
}

class MediaModelException extends \Exception
{
}