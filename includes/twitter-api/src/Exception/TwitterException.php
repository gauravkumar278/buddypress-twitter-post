<?php

/**
 * tmhOAuth
 *
 * An OAuth library written in PHP.
 * The library supports file uploading using multipart/form as well as general
 * REST requests. OAuth authentication is sent using an Authorization Header.
 *
 * @author themattharris
 * @version 0.8.4
 *
 * 06 Aug 2014
 */
class TwitterException extends Exception
{
    public function __toString()
    {
        return "Twitter API Response: [{$this->code}] {$this->message} (" . __CLASS__ . ") ";
    }
}
