<?php 

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
