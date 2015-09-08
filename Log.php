<?php  

class Log
{
	private $filename;
	private $handle;
	
	public function __construct($prefix = "log")
	{
		// $this->filename = $prefix . "-" . date('Y-m-d') . '.log';
		$this->setFilename($prefix);

		$this->handle = fopen($this->filename, 'a');	
	}

	protected function setFilename($prefix)
	{
		// Set the date
        $date = date('Y-m-d');
        // Set the filename with user defined prefix.
        if (is_string($prefix)) {
            return $this->filename = "$prefix-" . $date . ".log";
        } else {
            die("NO string for set filename");
        }
	}

	public 

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
	
	public function __destruct ()
	{
		if (isset($this->handle)) {
			fclose($this->handle);
		}
	}
	
}

?>