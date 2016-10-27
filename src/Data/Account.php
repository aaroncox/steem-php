<?php

namespace Greymass\SteemPHP\Data;

class Account extends Model {

    protected static $typeMap = array(
        // Currencies
        'balance' => 'Greymass\SteemPHP\Utils\Currency',
        'sbd_balance' => 'Greymass\SteemPHP\Utils\Currency',
        'savings_balance' => 'Greymass\SteemPHP\Utils\Currency',
        'savings_sbd_balance' => 'Greymass\SteemPHP\Utils\Currency',
        'vesting_balance' => 'Greymass\SteemPHP\Utils\Currency',
        'vesting_shares' => 'Greymass\SteemPHP\Utils\Currency',
        'vesting_withdraw_rate' => 'Greymass\SteemPHP\Utils\Currency',
        // Datetime
        'created' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_account_recovery' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_active_proved' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_account_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_bandwidth_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_market_bandwidth_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_post' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_root_post' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_owner_proved' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_owner_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_vote_time' => 'Greymass\SteemPHP\Utils\Datetime',
        'next_vesting_withdrawal' => 'Greymass\SteemPHP\Utils\Datetime',
        'reset_request_time' => 'Greymass\SteemPHP\Utils\Datetime',
        'savings_sbd_seconds_last_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'savings_sbd_last_interest_payment' => 'Greymass\SteemPHP\Utils\Datetime',
        'sbd_seconds_last_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'sbd_last_interest_payment' => 'Greymass\SteemPHP\Utils\Datetime',
        // Keys
        'active' => 'Greymass\SteemPHP\Utils\Key',
        'posting' => 'Greymass\SteemPHP\Utils\Key',
        'owner' => 'Greymass\SteemPHP\Utils\Key',
    );

}
