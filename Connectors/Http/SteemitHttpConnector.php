<?php

namespace GolosPHP\Connectors\Http;



class SteemitHttpConnector extends HttpConnectorAbstract
{
    /**
     * @var string
     */
    protected $platform = self::PLATFORM_STEEMIT;

    /**
     * https or http server
     *
     * @var string
     */
    protected $nodeURL = 'https://api.steemit.com';
}