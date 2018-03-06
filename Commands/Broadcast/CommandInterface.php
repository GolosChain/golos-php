<?php


namespace GolosPHP\Commands\Broadcast;

use GolosPHP\Commands\CommandQueryDataInterface;

interface CommandInterface
{
    /**
     * @param CommandQueryDataInterface $commandQueryData
     * @return mixed
     */
    public function execute(CommandQueryDataInterface $commandQueryData);

    /**
     * @return array
     */
    public function getQueryDataMap();
}