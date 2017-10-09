<?php

/*
 * Created by tpay.com
 */

namespace tpayLibs\examples;

use tpayLibs\src\_class_tpay\Utilities\TException;
use tpayLibs\src\_class_tpay\TransactionApi;

include_once 'config.php';
include_once 'loader.php';

class TransactionApiExample extends TransactionApi
{
    private $trId;

    public function __construct()
    {
        $this->merchantSecret = 'demo';
        $this->merchantId = 1010;
        $this->trApiKey = '75f86137a6635df826e3efe2e66f7c9a946fdde1';
        $this->trApiPass = 'p@$$w0rd#@!';
        parent::__construct();
    }

    public function getTransaction()
    {
        /**
         * Get info about transaction
         */

        $transactionId = $this->trId;

        try {
            $transaction = $this->setTransactionID($transactionId)->get();
            print_r($transaction);
        } catch (TException $e) {
            var_dump($e);
        }

    }

    public function createTransaction()
    {
        /**
         * Create new transaction
         */

        $config = array(
            'kwota'               => 999.99,
            'opis'                => 'Transaction description',
            'crc'                 => '100020003000',
            'wyn_url'             => 'http://example.pl/examples/TransactionApiExample.php?transaction_confirmation',
            'wyn_email'           => 'shop@example.com',
            'pow_url'             => 'http://example.pl/examples/TransactionApiExample.php',
            'email'               => 'customer@example.com',
            'imie'                => 'Jan123',
            'nazwisko'            => 'Kowalski',
            'grupa'               => isset($_POST['grupa']) ? (int)$_POST['grupa'] : 150,
            'akceptuje_regulamin' => 1,
        );
        try {
            $res = $this->create($config);
            $this->trId = $res['title'];
            echo '<a href="https://secure.tpay.com/?gtitle=' . $this->trId . '">go to payment</a>';

        } catch (TException $e) {
            var_dump($e);
        }

    }

}

(new TransactionApiExample())->createTransaction();
