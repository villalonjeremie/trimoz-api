<?php
namespace Trimoz\Permutation\Redis;

use Predis;
use Trimoz\Permutation\Library\Exception\RedisException;

class ClientConnection {
    private $clientConnection;

    public function __construct()
    {
        $host = getenv('SERVER_REDIS_IP') ?? '127.0.0.1';
        $port = getenv('SERVER_PORT_REDIS') ?? '6379';

        try {
            $this->clientConnection = new Predis\Client($host.':'.$port);
            $this->clientConnection->connect();

            if (!$this->clientConnection->isConnected()){
               throw new RedisException('Not Connected to Server Redis');
            };
        } catch (RedisException $e) {
            $e->addToResponse($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->clientConnection;
    }
}