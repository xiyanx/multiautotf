<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;

use App\Models\SettingModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\ApiResource;

class ApiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = SettingModel::all();

        return new ApiResource(true, 'List Data', $data);
    }
    public function show($id)
    {
        $data_input = DB::table('tb_setting_multi_auto')
        ->select('tb_setting_multi_auto.id', 'tb_trx_multi_auto.*')
        ->join('tb_trx_multi_auto','tb_setting_multi_auto.id','=','tb_trx_multi_auto.id_setting')
        ->where('tb_setting_multi_auto.id','=',$id)
        ->get();

        return new ApiResource(true, 'Detail Data!', $data_input);
    }
}