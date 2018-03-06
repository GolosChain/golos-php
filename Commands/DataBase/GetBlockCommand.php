<?php


namespace GolosPHP\Commands\DataBase;


class GetBlockCommand extends CommandAbstract
{
    /** @var string */
    protected $method = 'get_block';

    /** @var array */
    protected $queryDataMap = [
        '0' => ['integer'], //block_id
    ];
}