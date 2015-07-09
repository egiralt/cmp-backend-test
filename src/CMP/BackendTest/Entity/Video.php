<?php
/**
 * Video Share: A Backend Framework for CMProductions's Test
 * ==================================================================
 * by Ernesto Giralt (egiralt@gmail.com), July/2015
 *
 * This code has been made only demonstrative intentions and the author is not liable for
 * its use or application beyond the stated purpose.
 */

namespace CMP\BackendTest\Entity;

final class Video extends Base
{
	private $_title;
	private $_url;
	private $_tags;
	
	function __construct($title = null, $url = null, $tags = null)
	{
		$this->_title = $title;
		$this->_url = $url;
		$this->_tags = $tags;
	}
	
	public function getTitle ()
	{
		return $this->_title;
	}
	
	public function setTitle ($aTitle)
	{
		$this->_title = $aTitle;
		
		return $this;
	}
	
	public function getUrl ()
	{
		return $this->_url;
	}
	
	public function setUrl ($aUrl)
	{
		$this->_url = aUrl;
	}
	
	public function getTags ()
	{
		return $this->_tags;
	}
	
	public function setTags ($tags)
	{
		$this->_tags = $tags;
	}
	
	
	
	
	
	
	
}
