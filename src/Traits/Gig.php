<?php

namespace Skima\Giglogistics\Traits;


trait Gig
{
    public function createWallet($id)
    {
        $data = Wallet::create([
            'user_id' => $id,
            'wallet_credit' => '0',
            'wallet_debit' => '0',
            'wallet_balance' => '0'
        ]);

        return $data;
    }
}
