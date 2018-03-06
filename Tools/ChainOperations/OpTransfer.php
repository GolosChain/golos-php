<?php

namespace GolosPHP\Tools\ChainOperations;

use GolosPHP\Commands\Broadcast\BroadcastTransactionCommand;
use GolosPHP\Commands\Broadcast\BroadcastTransactionSynchronousCommand;
use GolosPHP\Commands\CommandQueryData;
use GolosPHP\Connectors\ConnectorInterface;
use GolosPHP\Tools\Transaction;

class OpTransfer
{
    /**
     * @param ConnectorInterface $connector
     * @param string             $from
     * @param string             $privateActiveWif
     * @param string             $to
     * @param string             $amountWithAsset
     * @param string             $memo
     *
     * @return mixed
     * @throws \Exception
     */
    public static function do(ConnectorInterface $connector, $privateActiveWif, $from, $to, $amountWithAsset, $memo)
    {
        $chainName = $connector->getPlatform();
        /** @var CommandQueryData $tx */
        $tx = Transaction::init($connector);
        $tx->setParamByKey(
            '0:operations:0',
            [
                'transfer',
                [
                    'from'   => $from,
                    'to'     => $to,
                    'amount' => $amountWithAsset,
                    'memo'   => $memo
                ]
            ]
        );

        $command = new BroadcastTransactionCommand($connector);
        Transaction::sign($chainName, $tx, ['active' => $privateActiveWif]);

        $answer = $command->execute(
            $tx
        );

        return $answer;
    }

    /**
     * @param ConnectorInterface $connector
     * @param string             $from
     * @param string             $privateActiveWif
     * @param string             $to
     * @param string             $amountWithAsset
     * @param string             $memo
     *
     * @return mixed
     * @throws \Exception
     */
    public static function doSynchronous(ConnectorInterface $connector, $privateActiveWif, $from, $to, $amountWithAsset, $memo)
    {
        $chainName = $connector->getPlatform();
        /** @var CommandQueryData $tx */
        $tx = Transaction::init($connector);
        $tx->setParamByKey(
            '0:operations:0',
            [
                'transfer',
                [
                    'from'   => $from,
                    'to'     => $to,
                    'amount' => $amountWithAsset,
                    'memo'   => $memo
                ]
            ]
        );

        $command = new BroadcastTransactionSynchronousCommand($connector);
        Transaction::sign($chainName, $tx, ['active' => $privateActiveWif]);

        $answer = $command->execute(
            $tx
        );

        return $answer;
    }


}