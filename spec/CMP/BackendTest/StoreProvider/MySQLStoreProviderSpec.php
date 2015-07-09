<?php

namespace spec\CMP\BackendTest\StoreProvider;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use CMP\BackendTest\Entity\Video;
use CMP\BackendTest\StoreProvider\MySQLStoreProvider;


class MySQLStoreProviderSpec extends ObjectBehavior
{
	
    function it_is_able_to_store_entities()
    {
    	// Build any entity
    	$entity = new Video (MySQLStoreProvider::ANY_TITLE, MySQLStoreProvider::ANY_URL, array ("tag1", "tag2"));
    	// Store and fetch
        $this->storeEntity($entity);
        $testEntity = $this->fetchEntity ($entity->getUrl()); // Search & fetch by URL
        // Check the returned value
        $testEntity->shouldHaveType ("CMP\BackendTest\Entity\Video");
        // Check the completeness of the entity
        $testEntity->getTitle()->shouldBe (MySQLStoreProvider::ANY_TITLE);
        $testEntity->getUrl()->shouldBe (MySQLStoreProvider::ANY_URL);
        $testEntity->getTags()->shouldContain("tag1");                
    }
}
