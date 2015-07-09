<?php
namespace CMP\BackendTest;

use CMP\BackendTest\Exception\NoConfigFileException;
use CMP\BackendTest\Channel\StandardChannel;
use CMP\BackendTest\Downloader\FileSystemDownloader;

/**
 * Code used only with phpspec.. 
 */
if (!defined("__ROOT_PATH__"))
	define ("__ROOT_PATH__", realpath (__DIR__."/../../.."));

/**
 * Main class. Use for start the aplication
 */
class Launcher {
	
	private $_channelList = array();
	private $_channelToImport;
	
	/**
	 * Main constructor
	 */
	public function __construct($channelToImport = null)
	{
		if (empty($channelToImport))
			throw new \InvalidArgumentException();
		
		$this->_channelToImport = $channelToImport;		
	}
	
	/**
	 * Read the configuration settings in the default file.
	 *  
	 * @throws NoConfigFileException if file doesn´t exist
	 * @return boolean true if all is OK
	 */
	public function readConfig() {
		$result = true; // Be positive!
		
		$config_filepath = ( __ROOT_PATH__ . '/config/parameters.yml' );
				
		if (!file_exists ( $config_filepath )) // but, Fail fast!
			throw new NoConfigFileException ();
		
		try {
			// Read the config file and try to fill the differents objects with the
			// values and configurations (channels, processors.. etc) instances
			
			// In order to test the application, we generate son mock objects
			$this->_channelList = array (
					(new StandardChannel ('glorf'))->fromConfiguration (null),
					(new StandardChannel ('flub'))->fromConfiguration (null) // Simulating a configuration
			);
			
		} catch ( \Exception $e ) {
			// TODO: Include a Log (Log4PHP) to trace this error
			$result = false;
		}
		
		return $result;
	}
	
	/**
	 * @param $channelName string
	 * @return CMP\BackendTest\Channel\BaseChannel 
	 * @throws \InvalidArgumentException
	 */
	public function findChannel($channelName) {
		
		if (empty($channelName))
			throw new \InvalidArgumentException();
		
		// The function will need to find the name in the channel chain. This will be simulated
		// returning an instance of StandardChannel, "manually" 
		return $this->_channelList[0];
		
	}
	
	/**
	 * Main method. This code will take the command line parameters and will create
	 * the diferents objects to import the feed. The configuration will be used to create
	 * te appropiate "Links" between all the objects
	 */
	public function run ()
	{
		if ($this->readConfig())
		{
			$channel = $this->findChannel ($this->_channelToImport);
			// The channel instance have all the capabilities to complete all the task, so this 
			// design allows to be "threadable":  If any of the phases fails, all the process will fail (atomic)
			$channel
				->downloadFeed()
				->processContent()
				->store();			
		}		
	}

}
