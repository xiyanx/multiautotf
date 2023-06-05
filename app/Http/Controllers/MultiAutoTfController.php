<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\BankModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MultiAutoTf;
use DataTables;

class MultiAutoTfController extends Controller
{
    // =============================================================================================================================
    public function index(Request $request)
    {
        $data = SettingModel::all();
        return view('multiautotf.index', compact('data'));
    }
     // =======================================================================================================================================================================
     public function UploadMultiAutoTfExcel(Request $request)
     {
         if($request->state == "1") {
            // DB::table('tb_trx_multi_auto')->truncate();
            $data =  Excel::import(new MultiAutoTf, $request->file);
            $data = DB::table('tb_trx_multi_auto')->get();
            return response()->json(['code' => '200', 'message'=> 'Berhasil mengupload data', 'state' => 1]);
         } else {
            
            $id = SettingModel::insertGetId([
                'statement_type' => $request->statement_type,
                'corporate_id' => $request->corporate_id,
                'header_id' => $request->header_id,
                'effective_date' => $request->effective_date,
                'dependency_header_id' => $request->dependency_header_id,
                'currency' => $request->currency,
                'remarks_1' => $request->remarks_1,
                'remarks_2' => $request->remarks_2,
                'business_type' => $request->business_type,
                'charges_type' => $request->charges_type
              
            ]);
            if($id) {
                $save = BankModel::where(['status_proses' => 1, 'id_setting' => null])->update([
                    'id_setting' => $id,
                    'status_proses' => 2
                ]);
                if($save) {
                    $now = new \DateTime();
                    $date = $now->format('Y-m-d');
                    $date1 = $now->format('Ymd');
                    $date2 = $now->format('ymd');
                    // tanggal bulan nomor urut
                    $header_id = str_pad($date2+$request->header_id, 8, "0", STR_PAD_LEFT);
                    $business_type = "0".$request->business_type;
                    $data = DB::table('tb_trx_multi_auto')->where("status_proses" ,2)->where("id_setting" , '!=', null)->get();
                    $txt = "0|FT|$request->statement_type|$request->corporate_id|$header_id|$date1|||$request->charges_type||00008|$request->currency|B|$business_type|".strtoupper(date("d M"))."\n";
                    foreach ($data as $key => $value) {
                        DB::table('tb_trx_multi_auto')->where('id', $value->id)->update([
                            'status_proses' => 3
                        ]);
                        $trx_id = str_pad($value->trx_id, 18, "0", STR_PAD_LEFT);
                        $amount = str_pad($value->amount, 13, "0", STR_PAD_LEFT);
                        $txt .= "1|" . $trx_id . "|" . $value->transfer_type . "|" . $value->debited_account . "|" . $value->beneficiary_id . "|" . $value->credited_account . "|" . $amount.".00" . "|" . $value->trx_purpose . "|" . $value->charges_type . "|" . $value->charges_account . "|" . $value->remark_1 . "|" . $value->remark_2 . "|" . $value->rcv_bank_code . "|" . $value->rcv_bank_name . "|" . $value->rcv_name . "|" . $value->cust_type . "|" . $value->cust_residence . "|" . $value->trx_code . "|" . $value->email . "\n";
                    }
                    $filename = "MultiAutoTransfer-{$date}.txt";
                    $destinationPath = public_path() . "/log/";
                    $file = $destinationPath . $filename;
                    file_put_contents($file, $txt);
                    return response()->json(['code' => '200', 'filename'=> $filename, 'state' => 2]);
                }
            }

         }
         
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
        $now = new \DateTime();
        $date = $now->format('Y-m-d');
        $date1 = $now->format('Ymd');
        // tanggal bulan nomor urut
        
        $data = DB::table('tb_trx_multi_auto')->get();
        $txt = "0|FT|MD|KBBUNIONMA|00000001|".$date1."|||OUR||00008|IDR|B|06|KUNCI KENCANA|15 MAR\n";
        foreach ($data as $key => $value) {
            $txt .= "1|" . $value->trx_id . "|" . $value->transfer_type . "|" . $value->debited_account . "|" . $value->beneficiary_id . "|" . $value->credited_account . "|" . $value->amount . "|" . $value->trx_purpose . "|" . $value->charges_type . "|" . $value->charges_account . "|" . $value->remark_1 . "|" . $value->remark_2 . "|" . $value->rcv_bank_code . "|" . $value->rcv_bank_name . "|" . $value->rcv_name . "|" . $value->cust_type . "|" . $value->cust_residence . "|" . $value->trx_code . "|" . $value->email . "\n";
        }
        $filename = "MultiAutoTransfer-{$date}.txt";
        $destinationPath = public_path() . "/log/";
        $file = $destinationPath . $filename;
        file_put_contents($file, $txt);
        return response()->json(['code' => '200', 'filename'=> $filename]);
    }
    // =======================================================================================================================================================================
    public function ExportFileDowload(Request $request)
    {
        $filename = $request->get('name');
        $destinationPath = public_path() . "/log/";
        $file = $destinationPath. $filename;
        return response()->download($file)->deleteFileAfterSend(true);
    }
    // =======================================================================================================================================================================
    public function store(Request $request)
    {
        print_r($request->all());die;
        $validatedData = $request->all();
        // cek last data
        $ceklastdata = SettingModel::orderBy('id', 'desc')->first();
        if($ceklastdata && $ceklastdata->no_trx != "")
        {
            $no_trx = $ceklastdata->no_trx + 1;
        } else {
            $no_trx = 1;
        }
        $save = SettingModel::create([
            'no_trx' => $no_trx,
            'ft' => '',
            'statement_type' => '',
            'corporate_id' => '',
            'header_id' => '',
            'effective_date' => '',
            'dependency_header_id' => '',
            'null1' => '',
            'null2' => '',
            'currency' => '',
            'remarks_1' => '',
            'remarks_2' => '',
            'business_type' => ''
          
        ]);

        SettingModel::insert($validatedData);

        return response()->json(['code' => '200', 'message'=> 'Berhasil mengupload data']);
    }
    // =======================================================================================================================================================================
    public function LoadFrameProses1(Request $request)
    {
        return view('multiautotf.frame.proses1');
    }
    // =======================================================================================================================================================================
    public function LoadFrameProses2(Request $request)
    {
        $ceklastdata = SettingModel::orderBy('id', 'desc')->first();
        if($ceklastdata && $ceklastdata->header_id != "")
        {
                $header_id = $ceklastdata->header_id + 1;
                $corporate_id = $ceklastdata->corporate_id;
        } else {
                $header_id = 1;
        }
        return view('multiautotf.frame.proses2',['header_id' => $header_id], ['corporate_id' => $corporate_id]);
    }
}