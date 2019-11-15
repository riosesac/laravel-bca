<?php

namespace Riotinto\Cobas\Bankbca;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Riotinto\Bankbca\BankBcaServiceProvider;

abstract class AbstractCobaCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return BankBcaServiceProvider::class;
    }
}