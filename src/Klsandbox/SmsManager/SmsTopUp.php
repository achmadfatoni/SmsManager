<?php

namespace Klsandbox\SmsManager;

use Illuminate\Console\Command;

class SmsTopUp extends Command
{
    protected $name = 'sms:topup';
    protected $description = 'Send pending notifications. Supports email and sms.';

    protected function getArguments()
    {
        return [['unused-key' => 'amount']];
    }

    public function fire()
    {
        $this->comment('top up ');

        $balance = SmsBalance::first();

        if (!$balance) {
            $this->error('Sms Balance not found');

            return;
        }

        $amount = $this->argument('amount');

        $balance->TopUp($amount, 'Top Up From Console');
    }
}
