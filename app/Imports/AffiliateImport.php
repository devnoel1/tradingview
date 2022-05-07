<?php

namespace App\Imports;

use App\Models\Affiliate;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AffiliateImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Affiliate([
            'first_name' => $row['fname'],
            'last_name' => $row['lname'],
            'email' => $row['email'],
            'country' => $row['country'],
            'ip_address' => '0.0.0.0',
            'phone' => $row['phone'],
            'affiliate_user_id' => $row['owner_id'],
            'group_id' => $row['group_id'],
            'external_id' => $row['external_id'],
        ]);
    }
}
