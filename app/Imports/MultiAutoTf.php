<?php

namespace App\Imports;

use App\Models\BankModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MultiAutoTf implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row["effective_date"] != "") {
            return new BankModel([
                "effective_date" => $row["effective_date"],
                "trx_id" => $row["trx_id"],
                "transfer_type" => $row["transfer_type"],
                "debited_account" => $row["debited_account"],
                "beneficiary_id" => $row["beneficiary_id"],
                "credited_account" => $row["credited_account"],
                "amount" => $row["amount"],
                "trx_purpose" => $row["trx_purpose"],
                "currency" => $row["currency"],
                "charges_type" => $row["charges_type"],
                "charges_account" => $row["charges_account"],
                "remark_1" => $row["remark_1"],
                "remark_2" => $row["remark_2"],
                "rcv_bank_code" => $row["rcv_bank_code"],
                "rcv_bank_name" => $row["rcv_bank_name"],
                "rcv_name" => $row["rcv_name"],
                "cust_type" => $row["cust_type"],
                "cust_residence" => $row["cust_residence"],
                "trx_code" => $row["trx_code"],
                "email" => $row["email"]
            ]);
        }
             
        
    }
}
