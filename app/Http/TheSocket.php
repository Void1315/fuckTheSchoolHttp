<?php 
namespace App\Http;
class TheSocket
{
	function __construct($stuData)
	{
		$this->address = '101.201.71.119';
		$this->prot = 8888;
		$this->socket = null;
		$this->result = null;
		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($this->socket === false) {
			echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
		} else {
			$this->result = socket_connect($this->socket, $this->address, $this->prot);
			@socket_write($this->socket, $stuData, strlen($stuData));
		}
	}
	function getReturnData()
	{
		@$buffer = socket_read($this->socket, 1024);
		return $buffer;
	}
}
// $obj = new TheSocket('111,111');
// $obj->getReturnData();



