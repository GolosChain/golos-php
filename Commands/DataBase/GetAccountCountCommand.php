<?php


namespace GolosPHP\Commands\DataBase;


class GetAccountCountCommand extends CommandAbstract
{
    /** @var string */
    protected $method = 'get_account_count';

    /** @var array */
    protected $queryDataMap = [];
}