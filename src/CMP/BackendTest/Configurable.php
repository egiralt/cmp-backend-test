<?php 

namespace CMP\BackendTest;

/**
 * Declares a class as able to get their data from the configuration file.
 */
interface Configurable
{
	/**
	 * A method used to get the data directly from the configuration. The implementers should expect
	 * specifically sections or names to get their values, or fail if not found.  
	 */
	function fromConfiguration ($parameters);
}