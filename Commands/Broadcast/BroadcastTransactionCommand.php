<?php


namespace GolosPHP\Commands\Broadcast;

/**
 * Class BroadcastTransactionCommand
 *
 * This call will return before the transaction is included in a block.
 *
 * @package GolosPHP\Commands\Broadcast
 */
class BroadcastTransactionCommand extends CommandAbstract
{
    protected $method       = 'broadcast_transaction';
    protected $queryDataMap = [
        '0:ref_block_num'    => ['integer'],
        '0:ref_block_prefix' => ['integer'],
        '0:expiration'       => ['string'],
        '0:operations:*:0'   => ['string'],
        '0:operations:*:1'   => ['array'],
        '0:extensions'       => ['array'],
        '0:signatures'       => ['array']
    ];
}