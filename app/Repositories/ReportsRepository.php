<?php

namespace App\Repositories;

use App\Models\User;

class ReportsRepository
{
    public function getTopFiveCustomers()
    {
        return User::query()
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();
    }
}
