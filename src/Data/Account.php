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

    public function reputation() {
        if(!is_numeric($this->reputation)) return 0;
        $rep = "" . $this->reputation;
        $neg = (substr($rep, 0, 1) === '-');
        $rep = $neg ? substr($rep, 1) : $rep;
        $out = log10($rep);
        $out = max($out - 9, 0);
        $out = ($neg ? -1 : 1) * $out;
        $out = $out * 9 + 25;
        return (int) $out;
    }

    public function profileImage() {
        if($this->json_metadata && isset($this->json_metadata['profile']) && isset($this->json_metadata['profile']['profile_image'])) {
            return $this->json_metadata['profile']['profile_image'];
        }
        return null;
    }

}
