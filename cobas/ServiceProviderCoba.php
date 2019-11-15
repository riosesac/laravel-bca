<?php

namespace Odenktools\Tests\Bca;

use Bca\BcaHttp;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Riotinto\Bankbca\BankBcaFactory;
use Riotinto\Bankbca\BankBcaManager;

class ServiceProviderTest extends AbstractCobaCase
{
    use ServiceProviderTrait;

    public function cobaPusherFactoryIsInjectable()
    {
        $this->assertIsInjectable(BankBcaFactory::class);
    }

    public function cobaPusherManagerIsInjectable()
    {
        $this->assertIsInjectable(BankBcaManager::class);
    }

    public function cobaBindings()
    {
        $this->assertIsInjectable(BcaHttp::class);
        $original = $this->app['bankbca.connection'];
        $this->app['bankbca']->reconnect();
        $new = $this->app['bankbca.connection'];
        $this->assertNotSame($original, $new);
        $this->assertEquals($original, $new);
    }
}
