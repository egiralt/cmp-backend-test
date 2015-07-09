# Backend Framework for Video Import

## Installation
Use *git clone* to download the files into your own space. The full command is:

```bash

git clone git@github.com:egiralt/cmp-backend-test.git

```

## How to run the code
It has developed a launcher class (*CMP\BackendTest\Launcher*) to handle the configuration and run the entire framework. The constructor 
of this class receives as a parameter the name of the channel feed to be downloaded, and then in the *run* method, it reads the configuration 
to identify the structure of the relationships among the classes.


```php
        $app = new CMP\BackendTest\Launcher ("glorf");
        $app->run();
```

It is designed as part of the framework, so that it can be used by other classes. In the root path there is an script (*import*) that you can run to use the 
code from the command line:

```
	php import glorf
	
```

## Framework design

### Classes design
The code is divided into several classes that builds the infrastructure to read the feeds and save them into the repository. 
 * **Content processor**: To parse and extract the values for the videos. The content could be any stream of XML, JSON, or another third party format.
 * **Store provider**: The classes to handle the final repositories where the entities extracted from feeds are saved. The repositories could be: MySQL, Couchbase, Cassandra, binary files, ...
 * **Downloaders**: Identify the sources where the content are stored and how to get them. A source could be an FTP, folder in the filesystem, an HTTP server, etc.
 * **Feed channels**: This concept was designed to brings together the downloaders, processors and store providers and be able to configure specifics instances for differents formats, repositories or feed sources. Each channel has a name to identify it, and it will be used with the Launcher's constructor to run the application

 These concepts were designed using a pattern that follows the following structure:
 * An interface that models the methods needed to implement the functionalities:
   *  *CMP\BackendTest\Channel\FeedChannel* to implement channels
   *  *CMP\BackendTest\Downloader\Downloader* to implement downloaders
   *  *CMP\BackendTest\Processor\Processor* to implement content processors
   *  *CMP\BackendTest\StoreProvider\StoreProvider* to implement repositories to store the video's data
 *  A base class (*CMP\BackendTest\CMPResource*) as the super class for all the others  (downloaders, store providers, channels and processors). This class implements *CMP\BackendTest\Configurable* to provide the subclasses with methods to extract the configuration values of each one

Finally, a simple data object (*CMP\BackendTest\Entity\Video*) to store the data extracted from the feed files and used to pass the datao to store providers. This class has not any other functionality (see https://en.wikipedia.org/wiki/Data_transfer_object).
 
It was decided for a generic model based on interfaces and inheritance to allow the application can read from any source, any format and store it in any kind of database or repository.
 
### The proccess 
 The entire process is designed as a sequential workflow: first download all, then do the analysis and ultimately store the extracted data (see the *run* method of class *Launcher*) to allow the possibility of developing parallel processes or multitasking, for example : reading several channels at once, or process high volume of video feeds on a deferred basis.
 
## The configuration file
 The file that is provided only suggests the type of format to be followed to maintain the independence of the design framework. The code has not implemented the reading of this file.
 
 ```yaml
 configuration:
  channels:
    glorf:
      type: StandardChannel
      processor:  GlorfProcessor
      downloader: FileSystemDownloader
      downloader_parameters: ["/feed-exports", ".glorf"]
    flub:
      type: StandardChannel
      processor: XmlProcessor
      downloader: FileSystemDownloader
      downloader_parameters: ["/feed-exports", ".glorf"]
  
  store:
    provider: MySQLProvider
    channels: [glorf, flub]

 ```
 
## What could be next?

**Improve the Store Provider**: It could be a more interesting and inclusive process, for example: the design could incorporate some management and editing video capabilities like: 
  * Download the video using the URL provided and generate diferents version for several screen sizes & formats: e.g. OGG, MPG, for cellular phones, Youtube, etc.
  * Add watermarks
  * Add subtitles or legends
 
**Generate reports**: The *import* application could be part of a daily or weekly batch.. in that case would be important to receive the process's feedback through email or HTML files with the full reports and logs.

**Add exceptions and more try/catch**: The code has more "design" than "implementation", OK.. but, ... code is code!

