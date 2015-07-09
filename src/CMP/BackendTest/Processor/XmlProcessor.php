<?php 

namespace CMP\BackendTest\Processor;

use CMP\BackendTest\Entity\Video;

class XmlProcessor extends Base
{
	
	/**
	 * Receive an XML stream and return Video entities
	 */
	public function parse ($content)
	{
		$result = array();
		// Some random titles...
		$titles = array ("tiger vs dog", "fall out boy - the phoenix", "science experiment goes wrong", "amazing dog can talk");
		
		$i = 0; // Indexer to count the tags
		foreach ($titles as $title) 
		{
			// Create a new simulated entity
			$entity = new Video (
					$title,
					"http://http://glorf.com/videos/".uniqid(),
					array ('tag'.(++$i), 'tag'.(++$i), 'tag'.(++$i))
			);

			$result[] = $entity;
		}
		
		return $result;
	}
	
	public function fromConfiguration ($parameters)
	{		
		// Some configuration, if needed...
		return $this;
	}
}