<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\BankModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MultiAutoTf;
use DataTables;

class MultiAutoTfController extends Controller
{
    // =============================================================================================================================
    public function index(Request $request)
    {
        return view('multiautotf.index');
    }
     // =======================================================================================================================================================================
     public function UploadMultiAutoTfExcel(Request $request)
     {
         DB::table('tb_trx_multi_auto')->truncate();
         $data =  Excel::import(new MultiAutoTf, $request->file);
         return response()->json(['code' => '200', 'message'=> 'Berhasil mengupload data']);
     }
    //  =============================================================================================================================================================
    public function LoadDataTrxMultiAutoAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = BankModel::where('deleted_at', null);
            return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function($row){
                //     $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                //     return $actionBtn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
    }
    // =======================================================================================================================================================================
    public function ExportMultiAutoTfTxt(Request $request)
    {
        $data = DB::table('tb_trx_multi_auto')->get();
        $txt = "0|FT|MD|KBBUNIONMA|00000001|20230327|||OUR||00008|IDR|B|06|KUNCI KENCANA|15 MAR\n";
        foreach ($data as $key => $value) {
            $txt .= "1|" . $value->trx_id . "|" . $value->transfer_type . "|" . $value->debited_account . "|" . $value->beneficiary_id . "|" . $value->credited_account . "|" . $value->amount . "|" . $value->trx_purpose . "|" . $value->charges_type . "|" . $value->charges_account . "|" . $value->remark_1 . "|" . $value->remark_2 . "|" . $value->rcv_bank_code . "|" . $value->rcv_bank_name . "|" . $value->rcv_name . "|" . $value->cust_type . "|" . $value->cust_residence . "|" . $value->trx_code . "|" . $value->email . "\n";
        }
        $now = new \DateTime();
        $date = $now->format('Y-m-d');

        $file = "MultiAutoTf_{$date}.txt";
        $destinationPath = public_path() . "/log/";
        $file = $destinationPath . $file;
        file_put_contents($file, $txt);
        return response()->download($file)->deleteFileAfterSend(true);
    }
}