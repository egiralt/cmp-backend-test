<?php

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
