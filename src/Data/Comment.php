<?php

namespace Greymass\SteemPHP\Data;

class Comment extends Model {

    protected static $typeMap = array(
        // Datetime
        'active' => 'Greymass\SteemPHP\Utils\Datetime',
        'cashout_time' => 'Greymass\SteemPHP\Utils\Datetime',
        'created' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_payout' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'max_cashout_time' => 'Greymass\SteemPHP\Utils\Datetime',
        // Currencies
        'curator_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
        'max_accepted_payout' => 'Greymass\SteemPHP\Utils\Currency',
        'pending_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
        'promoted' => 'Greymass\SteemPHP\Utils\Currency',
        'total_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
        'total_pending_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
    );

}
