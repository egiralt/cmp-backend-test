<?php
/**
 * Video Share: A Backend Framework for CMProductions's Test
 * ==================================================================
 * by Ernesto Giralt (egiralt@gmail.com), July/2015
 *
 * This code has been made only demonstrative intentions and the author is not liable for
 * its use or application beyond the stated purpose.
 */

namespace CMP\BackendTest\Channel;

use CMP\BackendTest\Downloader\Downloader;
use CMP\BackendTest\Processor\Processor;
use CMP\BackendTest\StoreProvider\StoreProvider;
use CMP\BackendTest\CMPResource;

/**
 * Formally: a base clase to implement a channel, but it can´t be used to instance but to create new types of 
 * channels, with custom behaviour. Use StandardChannel to make instances with a "normal" behaviour
 */
abstract class Base extends CMPResource implements FeedChannel
{
	
	protected $_downloader;
	protected $_processor;
	protected $_storeProvider;
	protected $_name;	

	/**
	 * Extract the content using the downloader. It is stored internally into a Processor Object 
	 */
    abstract public function downloadFeed();
    
    abstract public function processContent();

    abstract public function store();
    

    /**
     * Set the downloader for this channel
     */
    public function setDownloader(Downloader $aDownloader)
    {
    	$this->_downloader = $aDownloader;
    	
    	return $this;
    }
    
    /**
     * Get the current instance of the downloader
     */
    public function getDownloader()
    {
        return $this->_downloader;
    }

    /**
     * Get the assigned processor 
     */
    public function getProcessor()
    {
        return $this->_processor;
    }
    
    /**
     * Generate
     */
    public function setProcessor(Processor $aProcessor)
    {
    	$this->_processor = $aProcessor;
    	
    	return $this;
    }
    
    public function getStoreProvider()
    {
        return $this->_storeProvider;
    }

    public function setStoreProvider(StoreProvider $aProvider)
    {
        $this->_storeProvider = $aProvider;
        
        return $this;
    }

    public function getName ()
    {
    	return $this->_name;
    }
}
