<?php

namespace GolosPHP\Tools\ChainOperations;

use GolosPHP\Commands\Single\BroadcastTransactionCommand;
use GolosPHP\Commands\Single\BroadcastTransactionSynchronousCommand;
use GolosPHP\Commands\CommandQueryData;
use GolosPHP\Connectors\ConnectorInterface;
use GolosPHP\Tools\Auth;
use GolosPHP\Tools\Transaction;

class OpVote
{
    /**
     * @param ConnectorInterface $connector
     * @param string             $voter
     * @param string             $publicWif
     * @param string             $author
     * @param string             $permlink
     * @param integer            $weight
     *
     * @return mixed
     * @throws \Exception
     */
    public static function do(ConnectorInterface $connector, $voter, $publicWif, $author, $permlink, $weight)
    {
        $chainName = $connector->getPlatform();
        /** @var CommandQueryData $tx */
        $tx = Transaction::init($connector);
        $tx->setParamByKey(
            '0:operations:0',
            [
                'vote',
                [
                    'voter'    => $voter,
                    'author'   => $author,
                    'permlink' => $permlink,
                    'weight'   => $weight
                ]
            ]
        );

        $command = new BroadcastTransactionCommand($connector);////        echo '<pre>' . var_dump($commandQueryData->getParams(), $properties2) . '<pre>'; die; //FIXME delete it
        Transaction::sign($chainName, $tx, ['posting' => $publicWif]);

        $answer = $command->execute(
            $tx
        );

        return $answer;
    }

    /**
     * @param ConnectorInterface $connector
     * @param string             $voter
     * @param string             $publicWif
     * @param string             $author
     * @param string             $permlink
     * @param integer            $weight
     *
     * @return array|object
     * @throws \Exception
     */
    public static function doSynchronous(ConnectorInterface $connector, $voter, $publicWif, $author, $permlink, $weight)
    {
        $chainName = $connector->getPlatform();
        /** @var CommandQueryData $tx */
        $tx = Transaction::init($connector);
        $tx->setParamByKey(
            '0:operations:0',
            [
                'vote',
                [
                    'voter'    => $voter,
                    'author'   => $author,
                    'permlink' => $permlink,
                    'weight'   => $weight
                ]
            ]
        );

        $command = new BroadcastTransactionSynchronousCommand($connector);////        echo '<pre>' . var_dump($commandQueryData->getParams(), $properties2) . '<pre>'; die; //FIXME delete it
        Transaction::sign($chainName, $tx, ['posting' => $publicWif]);

        $answer = $command->execute(
            $tx
        );

        return $answer;
    }


}