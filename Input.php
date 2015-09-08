<?php

// class InvalidArgumentException  extends Exception {}
// class OutOfRangeException extends Exception {}
// class DomainException extends Exception {}
// class LengthException extends Exception {}
// class RangeException extends Exception {}


class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
            return (isset($_REQUEST[$key])) ?  true : false; 

    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
            return self::has($key) ? $_REQUEST[$key] : NULL;
    }

    public static function getString($key, $min=1, $max=200) 
    {
        
        $value = trim(static::get($key));

        if(!is_string($value) || ((!is_numeric($min) && (!is_numeric($max))))) {
            throw new InvalidArgumentException('Inputs are not in correct format');
        }
        
        if(!isset($key)) {
            throw new OutOfRangeException('Please insert key value.');
        }

        if(!is_string($value)) {
            throw new DomainException('Wrong format. Entry must be a string');
        }

        if($value < $min || $value > $max) {
            throw new LengthException('Input is not withing exected range.');
        }

        if(!isset($value)){
            throw new Exception('Input can not be null.');
        }

        return $value;
    }

    public static function getNumber($key, $min=1, $max=20) 
    {
        $value = str_replace(',', '', static::get($key));

        if(!is_string($value) || ((!is_numeric($min) && (!is_numeric($max))))) {
            throw new InvalidArgumentException('Inputs are not in correct format');
        }
        
        if(!isset($key)) {
            throw new OutOfRangeException('Please insert key value.');
        }

        if(!is_numeric($value)) {
            throw new DomainException('Wrong format. Entry must be a number');
        }

        if($value < $min || $value > $max) {
            throw new RangeException('Input is not withing exected range.');
        }

        if(!isset($value)){
            throw new Exception('Input can not be null.');
        }

        return $value;
    }

    public static function getDate($key) 
    {
        $value = static::get($key);
        $format = 'Y-m-d';
        
        $dateObject = DateTime::createFromFormat($format, $value);

        if($dateObject) {
            $dateString = $dateObject->date;
            return $dateObject->date;
        } else {
            throw new Exception('This must be a valid date.');
        }

    }


    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
