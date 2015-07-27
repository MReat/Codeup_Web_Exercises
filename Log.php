<?php  

class Log
{
	public $filename;
	public $handle;
	
	function __construct($prefix = "log")
	{
		$this->filename = $prefix . "-" . date('Y-m-d') . '.log';
		$this->handle = fopen($this->filename, 'a');	
	}

	public function logMessage($logLevel, $message)
	{
		fwrite($this->handle, PHP_EOL . "[{$logLevel}] {$message}");
	}

	public function info($message)
	{
		return $this->logMessage("INFO", $message);
	}

	public function error($message)
	{
		return $this->logMessage("ERROR", $message);
	}
	
	function __destruct ()
	{
		fclose($this->handle);
	}
	
}

?>