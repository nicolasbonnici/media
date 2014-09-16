<?php
namespace bundles\media\Entities;

/**
 * Media Entity
 *
 * @author infradmin
 */
class MediaType extends \Library\Core\Entity {

    const ENTITY = 'MediaType';
    const TABLE_NAME = 'mediatype';
    const PRIMARY_KEY = 'idmediatype';

    /**
     * Object caching duration in seconds
     * @var integer
     */
    protected $iCacheDuration = 50;

    protected $bIsSearchable = true;

    protected $aLinkedEntities = array();
}

