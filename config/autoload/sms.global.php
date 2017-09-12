<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2017 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Popov
 * @package Popov_Sms
 * @author Serhii Popov <popow.sergiy@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
return [
    'sms' => [
        /*'type' => 'twilio',
        'from' => "+15748895284", // twilio number
        'options' => [
            // mode: sandbox or prod
            'mode' => 'prod',
            'account_sid' => 'AC7d1a91a8a4736dcdb183135b97424db5',
            'auth_token' => 'fa7f5b7538ffb89823230646d4c78f82',
        ]*/
        'type' => 'cyta',
        'options' => [
            'username' => 'SMSSERVICE',
            'secret_key' => 'f8ee7aaa099d454cb2f5ec45e6bc376d',
        ]
    ]
];