<?php 

namespace CMP\BackendTest;

abstract class CMPResource implements Configurable
{
	abstract public function fromConfiguration ($parameters);
}