<?php


namespace App\Services;


use Psr\Log\LoggerInterface;

trait CustomLogTrait
{
    private $logger;

    /**
     * @required
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}