<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    use HasFactory;
    
    protected $table = 'tb_trx_multi_auto';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'effective_date',
        'trx_id',
        'transfer_type',
        'debited_account',
        'beneficiary_id',
        'amount',
        'trx_purpose',
        'currency',
        'charges_type',
        'remark_1',
        'remark_2',
        'rcv_bank_code',
        'rcv_bank_name',
        'rcv_name',
        'cust_type',
        'cust_residence',
        'trx_code',
        'email',
        'status_proses',
        'id_setting',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
