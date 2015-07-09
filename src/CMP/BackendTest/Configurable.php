<?php 
/**
 * Video Share: A Backend Framework for CMProductions's Test
 * ==================================================================
 * by Ernesto Giralt (egiralt@gmail.com), July/2015
 *
 * This code has been made only demonstrative intentions and the author is not liable for
 * its use or application beyond the stated purpose.
 */

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