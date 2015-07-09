<?php

namespace CMP\BackendTest\Channel;

/**
 * The formalization structure for a channel:
 * A channel is the entity which provides all the configurations to download
 * the feed using a DownloaderProvider, process the content using a Processor and store the definition 
 * using a StoreProvider
 * 
 */
interface FeedChannel
{
	
	/**
	 * Extract the content using the downloader. It is stored internally into a Processor Object 
	 */
    function downloadFeed();
    
    /**
     * 
     */
    function processContent();

    /**
     * 
     */
    public function store();
    
    /**
     * 
     */
    function getName ();
}
