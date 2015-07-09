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

use CMP\BackendTest\Configurable;

/**
 * Class used to manage the feeds stored in folders in the hard disk.. 
 */
class FileSystemDownloader extends Base implements Downloader
{
	
	protected $_feedFolder;

	/**
	 * Read the content of a file a return the content like an stream
	 */
    public function getItemContent($fileName)
    {
        return "a_value_or_string_to_test_the_content";
    }

    public function getItemList()
    {
    	// Mocking the result
        $result = array (
        	$this->_feedFolder."/video_1_08_jul_2015.xml",
        	$this->_feedFolder."/video_2_08_jul_2015.xml",
        	$this->_feedFolder."/video_3_08_jul_2015.xml"        		
        );
        
        return $result;
    }
    
    /**
     * Extract the folder and other
     */
    public function fromConfiguration ($parameters)
    {
		$this->_feedFolder = "/feed-exports";  

		return $this;
    }
}
