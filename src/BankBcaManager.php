<?php

namespace Riotinto\Bankbca;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class BankBcaManager extends AbstractManager
{
    private $factory;

    public function __construct(Repository $config, BankBcaFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    protected function getConfigName()
    {
        return 'bankbca';
    }

    public function getFactory()
    {
        return $this->factory;
    }
}