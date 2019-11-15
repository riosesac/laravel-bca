<?php

namespace Riotinto\Bankbca;

use Bankbca\BcaHttp;
use InvalidArgumentException;

class BankBcaFactory
{
    public function make(array $config, $options = [])
    {
        $config = $this->getConfig($config, $options);

        return $this->getClient($config, $options);
    }

    protected function getConfig(array $config, $options = array())
    {
        $keys = [
            'corp_id',
            'client_id',
            'client_secret',
            'api_key',
            'secret_key'
        ];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return array_only($config, $keys);
    }

    protected function getClient(array $auth, $options = [])
    {
        return new BcaHttp(
            $auth['corp_id'],
            $auth['client_id'],
            $auth['client_secret'],
            $auth['api_key'],
            $auth['secret_key'],
            $options
        );
    }
}