<?php namespace Fitz\Sessions;

use Fitz\Abstracts\Properties\SessionTrait;
use Fitz\Abstracts\SessionInterface;

class Session implements SessionInterface
{

    use SessionTrait;

    public function __construct()
    {
        @session_start();
        $this->sessionId = $this->getSessionId();
    }

    public function getSessionId()
    {
        return session_id();
    }

    public function __toString()
    {
        return $this->getSessionId();
    }
}