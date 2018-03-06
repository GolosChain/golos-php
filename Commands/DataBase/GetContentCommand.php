<?php


namespace GolosPHP\Commands\DataBase;


class GetContentCommand extends CommandAbstract
{
    /** @var string */
    protected $method = 'get_content';

    /** @var array */
    protected $queryDataMap = [
        '0' => ['string'], //author
        '1' => ['string'], //permlink
    ];
}