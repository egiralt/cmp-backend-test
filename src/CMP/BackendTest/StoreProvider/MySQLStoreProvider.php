<?php
/**
 * Video Share: A Backend Framework for CMProductions's Test
 * ==================================================================
 * by Ernesto Giralt (egiralt@gmail.com), July/2015
 *
 * This code has been made only demonstrative intentions and the author is not liable for
 * its use or application beyond the stated purpose.
 */

namespace CMP\BackendTest\StoreProvider;

use CMP\BackendTest\Entity\Video;
use CMP\BackendTest\Configurable;

class MySQLStoreProvider extends Base implements StoreProvider
{
	const ANY_TITLE = "Silly title";
	const ANY_URL = "https://no_url";
	

    public function storeEntity(Video $entity)
    {
        // TODO: write logic here
    }
    
    public function removeEntity(Video $entity)
    {
    	// TODO: write logic here
    }
    

    public function fetchEntity($url)
    {
        // To satisfy the tests
        return new Video (self::ANY_TITLE, self::ANY_URL, array ("tag1", "tag2"));
    }
    
    public function fromConfiguration ($parameters)
    {
    	// Some configuration, if needed...
    	return $this;
    }
    
}
