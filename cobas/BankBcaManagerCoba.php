<?php

namespace Riotinto\Cobas\Bankbca;

use Bankbca\BcaHttp;
use Illuminate\Contracts\Config\Repository;
use Mockery;
use Riotinto\Bankbca;
use Riotinto\Bankbca\BankBcaFactory;
use Riotinto\Bankbca\BankBcaManager;

class BankBcaManagerCoba extends AbstractCobaCase
{
    public function cobaCreateConnection()
    {
        $config = ['path' => __DIR__];

        $manager = $this->getManager($config);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('bankbca.default')->andReturn('bankbca');

        $this->assertSame([], $manager->getConnections());

        $return = $manager->connection();

        $this->assertInstanceOf(BcaHttp::class, $return);

        $this->assertArrayHasKey('bankbca', $manager->getConnections());
    }

    protected function getManager(array $config)
    {
        $this->repository = Mockery::mock(Repository::class);

        $this->factory = Mockery::mock(BankBcaFactory::class);

        $manager = new BankBcaManager($this->repository,$this->factory);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('bankbca.connections')->andReturn(['bankbca' => $config]);

        $config['name'] = 'bankbca';

        $manager->getFactory()->shouldReceive('make')->once()
            ->with($config)->andReturn(Mockery::mock(BcaHttp::class));

        return $manager;
    }
}
