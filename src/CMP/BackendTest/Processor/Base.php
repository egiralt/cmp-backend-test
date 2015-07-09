<?php

namespace CMP\BackendTest\Processor;

use CMP\BackendTest\CMPResource;

abstract class Base extends CMPResource implements Processor
{
	/**
	 * @return CMP\BackendTest\Entity\Video 
	 */
	abstract public function parse ($content); 
	
}
