<?php


namespace App\Services;


class DudeLog
{
    use CustomLogTrait;

    public function logIt()
    {
        $this->logger->info('We log it');
    }

    public function logItWithMagicalGetLogger()
    {
        $this->getLogger()->info('Magic log !');
    }


}