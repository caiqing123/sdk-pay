<?php
namespace TianQi\PaySDK\Traits;

use TianQi\PaySDK\Lib\XML;

trait XMLParams
{
	public function __toString()
	{
		return $this->toString(); 
	}

	public function toString()
	{
		return XML::toString($this);
	}
}