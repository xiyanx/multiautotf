<?php

namespace App\Imports;

use App\Models\SupplierModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupplierImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['name'] != "") {
            return new SupplierModel([
                'currency' => $row['currency'],
                'type' => $row['type'],
                'code' => $row['code'],
                'name' => $row['name'],
                'address' => $row['address'],
                'city' => $row['city'],
                'state' => $row['state'],
                'country' => $row['country'],
                'contact_person' => $row['contact_person'],
                'contact_no' => $row['contact_no'],
                'bank_name' => $row['bank_name'],
                'bank_address' => $row['bank_address'],
                'bank_city' => $row['bank_city'],
                'bank_state' => $row['bank_state'],
                'bank_country' => $row['bank_country'],
                'swift_code' => $row['swift_code'],
                'acct_no' => $row['acct_no'],
                'acct_name' => $row['acct_name'],
            ]);
        }
        
    }
}
