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
