<?php

namespace CMP\BackendTest\Channel;

use CMP\BackendTest\Configurable;
use CMP\BackendTest\Downloader\FileSystemDownloader;
use CMP\BackendTest\Processor\XmlProcessor;
use CMP\BackendTest\StoreProvider\MySQLStoreProvider;

/**
 * This class is provided as the main (just for now!) class to manage the channels. 
 */
class StandardChannel extends Base implements FeedChannel
{

	/**
	 * Used to simulate an internal repository. 
	 */
	private $_internal_entitiesList;
	
	protected $_content;
	
	function __construct($aName = null)
	{
		if (empty($aName))
			throw new \InvalidArgumentException();
		
		$this->_name = $aName;
	}
	
	/**
	 * Download a feed using the assigned downloader and it is stored internally to 
	 * be processed later.
	 */
	public function downloadFeed()
	{
		echo "========== Download feeds ==================\n";
		
		$downloader = $this->getDownloader();
		if ($downloader != null)
		{
			$itemList = $downloader ->getItemList();
			
			foreach ($itemList as $item)
			{
				$content = $downloader->getItemContent ($item);
				echo "Extracting content from: $item; \n";
				//Now, the content will be stored internally, associated with their filename
				// ex: $_internalStore [$item] = $content;
			}
		}

		echo "\n";
		
		return $this;
	}
	
	/**
	 * Get the data stored internally and generate the entities into another internal 
	 * repository, (ex: could be SQLite)
	 */
	public function processContent()
	{
		// ex:
		// foreach ($storedContent as $itemID => $content) {
		//		$entities = $this->getProcessor ()->parse ($content);
		// 		save_into_internal_repository ($entities);
		// }

		echo "========== Process (parse) the extracted data ==================\n";
		
		$this->_internal_entitiesList = $this->getProcessor()->parse (null); 
		foreach ($this->_internal_entitiesList as $entity)
		{
			echo sprintf ("Discovered entity: %s; %s; ", $entity->getTitle(), $entity->getUrl());
			foreach ($entity->getTags() as $tag)
				echo sprintf ("%s, ", $tag);
			
			echo "\n";
		}
		
		echo "\n";
		
		return $this;
	}
	
	/**
	 * Store the data into the final repository
	 */
	public function store()
	{		
		echo "========== Store the captured data ==================\n";
		
		$storeProvider = $this->getStoreProvider();
		// This code should store the processed entities into the final repository
		foreach ($this->_internal_entitiesList as $entity)
		{
			echo sprintf ("Storing '%s'\n", $entity->getTitle());
		}

		echo "\n";
		
		return true;
	}

	/**
	 * Extract the name, downloaders y others variables from the parameters. The expected section will starts with the name
	 * of channel and containing the assignation for downloaders, etc..
	 */
	public function fromConfiguration ($parameters)
	{
		// The method extracts the data from the parameters
		// and set the internal values.
		
		// Simulate a creation of a downloader
		$this->setDownloader ( (new FileSystemDownloader ())->fromConfiguration(null) );// Simulating a configuration
		// Simulate a processor
		$this->setProcessor ( (new XmlProcessor ())->fromConfiguration (null) ); // Simulating a configuration
		// Simulate a store provider
		$this->setStoreProvider ( (new MySQLStoreProvider ())->fromConfiguration (null) ); // Simulating a configuration
		
		return $this;		
	}
}
