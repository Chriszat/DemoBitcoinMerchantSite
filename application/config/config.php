<?php

define("baseurl", "http://localhost/bitcoin/");


//VIEWS MAPPING CONFIGURATION
define("view_map",  [
    "site" => [
        "site-index",
        "wallet"
    ],

    "404" => [
        "index"
    ],

    "user" => [
        "login", //Login screen view
        "register", // Register view
        "confirmation", // Email confirmation view
        "error_confirmation" // Email error confirmation view
    ],

    "dashboard" => [
        /**
         * Note: The name bitcoin as mentioned here is 
         * used to denote all currency
         */

        "welcome", //0 user welcome page on first login 
        "cards", //1 user index page (dashboard)
        "cards", //2 Cards to be displayed on user dashboard
        "accounts", //3 use currency accounts e,g (Bitcoin, Etherem, Usd)
        "transactions", //4 users transactions view
        "buy", //5 user buy bitcoin
        "buy_bitcoin", //6 
        "bitcoin_confirm_receipt", //7 Confirmation receipt before the user can proceed to buy bitcoin
        "purchased_confirmed", //8 User purchase confirmed view
        "buy_eth", //9
        "user-profile", //10
        "edit-profile", //11
        "secondary_emails", //12
        "sell", //13 sell bitcoin view
        "sell_bitcoin",  //14 sell bitcoin amount entry view
        "sell_bitcoin_confirm_receipt", //15 confirmation reciept for selling of bitcoin
        "btc_view", //16 treeview view
        "new_address_edit", //17 Tabviews view
        "wallet_tab_view", //18 Wallet tab view
        "transaction_tab_view", //19 transaction tab view
        "address_tab_view", //20 transaction tab view
        "eth_view", //21 eth view
        "usd_view", //22 usd view
        "send_btc", //23 send btc
        "send_eth", //24 send eth
        "usd_deposit_methods", //25 usd deposit methods
        "private_deposit_with_btc", //26 deposit with btc
        "private_deposit_with_stripe", //27 deposit with stripe
        "private_deposit_with_wechat", //28 deposit with wechat
        "private_deposit_with_alipay", //29 deposit with alipay
        "private_deposit_with_western_union", //30 deposit with western union
        "mining_index", //31 bitcoin mining index
        "mining_pool", //32 bitcoin mining pool
        "mining_investments", //33 mining investments listing
        "poolconfig", //34 pool config
        "404page", //35 404 page
        "kyc", //36 kyc verification
        "index", // 37 blank index page
    ]

]);

/**
 * MAP URL TO SPECIFIED 
 * CONTROLLER AND METHOD
 */
