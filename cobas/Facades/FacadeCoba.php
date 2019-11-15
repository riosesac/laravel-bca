<?php

namespace Riotinto\Cobas\BankBca\Facades;

use Bankbca\BcaHttp;
use Riotinto\Bankbca\BankBcaFactory;
use Riotinto\Bankbca\BankBcaManager;
use Riotinto\Bankbca\Facades\BankBca;
use Riotinto\Cobas\Bankbca\AbstractCobaCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

class FacadeCoba extends AbstractCobaCase
{
    use FacadeTrait;

    protected function getFacadeAccessor()
    {
        return 'bankbca';
    }

    protected function getFacadeClass()
    {
        return BankBca::class;
    }

    protected function getFacadeRoot()
    {
        return BankBcaManager::class;
    }
}