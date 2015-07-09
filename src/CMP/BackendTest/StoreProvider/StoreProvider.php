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

interface StoreProvider
{

	/**
	 * Save an entity into the final repository
	 */
	function storeEntity (Video $entity);
	
	function removeEntity (Video $entity);

	/**
	 * Find an entity using the URL. 
	 */
	function fetchEntity ($url);
	
}
