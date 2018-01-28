<?php


namespace GolosPHP\Commands\Login;

/**
 * Class LoginCommand
 * This must be called prior to requesting other APIs. Other APIs may not be accessible until the client has
 * sucessfully authenticated.
 *
 *
 * @package GolosPHP\Commands\Login
 */
class LoginCommand extends CommandAbstract
{
    protected $method       = 'login';
    protected $queryDataMap = [
        0 => ['string'],
        1 => ['string']
    ];
}