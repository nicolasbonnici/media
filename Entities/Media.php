<?php
namespace bundles\media\Entities;

/**
 * Media Entity
 *
 * @author infradmin
 */
class Media extends \Library\Core\Entity {

    const ENTITY = 'Media';
    const TABLE_NAME = 'media';
    const PRIMARY_KEY = 'idmedia';

    /**
     * Object caching duration in seconds
     * @var integer
     */
    protected $iCacheDuration = 50;

    protected $bIsSearchable = true;

    protected $aLinkedEntities = array(
        'category' => array(
            'loadByDefault' => false,
            'relationship' => 'oneToOne',
    		'entity' => 'MediaType',
    		'mappedByField' => 'mediatype_idmediatype'
        )
    );
}

