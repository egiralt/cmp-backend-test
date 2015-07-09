<?php 
/**
 * Video Share: A Backend Framework for CMProductions's Test
 * ==================================================================
 * by Ernesto Giralt (egiralt@gmail.com), July/2015
 *
 * This code has been made only demonstrative intentions and the author is not liable for 
 * its use or application beyond the stated purpose.
 */

namespace CMP\BackendTest\Downloader;

interface Downloader
{

	/**
	 * Get an item from the resource, database, media, etc, used as source using the ID to 
	 * find it. Example: a primary key for a database, or a filename, etc.
	 */
	function getItemContent($itemId);
	
	/**
	 * Build a list (array) of identifiers in order to be processed later
	 */
	function getItemList();
	
	
}