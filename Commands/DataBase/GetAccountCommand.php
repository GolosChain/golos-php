<?php


namespace GolosPHP\Commands\DataBase;


class GetAccountCommand extends CommandAbstract
{
    /** @var string */
    protected $method = 'get_accounts';

    /** @var array */
    protected $queryDataMap = [
        '0' => ['array'], //authors
    ];
}