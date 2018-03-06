<?php


namespace GolosPHP\Commands\Follow;

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