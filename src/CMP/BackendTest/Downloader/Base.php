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

use CMP\BackendTest\CMPResource;

/**
 * A clase used to give a formal definition to a Downloader. The subclasses will define the way to get the items and their contents. 
 */
abstract class Base extends CMPResource implements Downloader
{
	abstract public function getItemContent($fileName);
	
	abstract public function getItemList();
}
