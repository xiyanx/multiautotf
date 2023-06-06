<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    protected $table = 'tb_setting_multi_auto';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'ft',
        'statement_type',
        'corporate_id',
        'header_id',
        'effective_date',
        'dependency_header_id',
        'charges_type',
        'statement_type',
        'null2',
        'currency',
        'remarks_1',
        'remarks_2',
        'business_type'
    ];
}
