<?php

namespace Riotinto\Bankbca\Facades;

use Illuminate\Support\Facades\Facade;

class BankBca extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bankbca';
    }
}