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
        $ceklastdata = SettingModel::orderBy('id', 'desc')->first();
        if($ceklastdata && $ceklastdata->header_id != "")
        {
            $debited_account_fund = $ceklastdata->debited_account_fund;
            $debited_account_charge = $ceklastdata->debited_account_charge;
        } else {
            $debited_account_fund = "";
            $debited_account_charge = "";
        }
        
        $total_transfer = DB::table('tb_setting_multi_auto')
        ->select('tb_trx_multi_auto.amount')
        ->join('tb_trx_multi_auto','tb_setting_multi_auto.id','=','tb_trx_multi_auto.id_setting')
        ->sum('amount');
        return view('multiautotf.index', compact('data'), ['debited_account_fund' => $debited_account_fund, 'debited_account_charge' => $debited_account_charge, 'total_transfer' => $total_transfer]);
    }
     // =======================================================================================================================================================================
     public function UploadMultiAutoTfExcel(Request $request)
     {
       
        //return response()->json(['code' => '400', 'data' => $request->all()]);
        if($request->state == "1") {
            // DB::table('tb_trx_multi_auto')->truncate();
            $data = Excel::import(new MultiAutoTf, $request->file);
            return response()->json(['code' => '200', 'message'=> 'Berhasil mengupload data', 'state' => 1]);
         } else {
            $id = SettingModel::insertGetId([
                'statement_type' => $request->statement_type,
                'debited_account_fund' => $request->debited_account_fund,
                'debited_account_charge' => $request->debited_account_charge,
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

                // total berhasil di upload
                $total_berhasil_upload = BankModel::where(['status_proses' => 1, 'id_setting' => null])->count();
                $total_berhasil_upload = str_pad($total_berhasil_upload, 5, "0", STR_PAD_LEFT);
                
                $save = BankModel::where(['status_proses' => 1, 'id_setting' => null])->update([
                    'id_setting' => $id,
                    'status_proses' => 2
                ]);
                if($save) {
                    $now = new \DateTime();
                    $date = $now->format('Y-m-d');
                    $date1 = $now->format('Ymd');
                    $date2 = $now->format('ym');
                    // tanggal bulan nomor urut

                    $header_id = str_pad($request->header_id, 5, "0", STR_PAD_LEFT);
                    $business_type = "0".$request->business_type;


                   
                    $arrget = ["id","charges_account"];

                    if($request->trx_id != "") { 
                        array_push($arrget,"$request->trx_id");
                    }
                    if($request->transfer_type != "") { 
                        array_push($arrget,"$request->transfer_type");
                    }
                    if($request->debited_account1 != "") { 
                        array_push($arrget,"$request->debited_account1");
                    }  
                    if($request->beneficiary_id != "") { 
                        array_push($arrget,"$request->beneficiary_id");
                    }
                    if($request->credited_account != "") { 
                        array_push($arrget,"$request->credited_account");
                    }
                    if($request->amount != "") { 
                        array_push($arrget,"$request->amount");
                    }
                    if($request->trx_purpose != "") { 
                        array_push($arrget,"$request->trx_purpose");
                    }
                    if($request->charges_type != "") { 
                        array_push($arrget,"charges_type");
                    }
                    if($request->charges_account != "") { 
                        array_push($arrget,"$request->charges_account");
                    }
                    if($request->remarks_11 != "") { 
                        array_push($arrget,"remark_1");
                    }
                    if($request->remarks_22 != "") { 
                        array_push($arrget,"remark_2");
                    }
                    if($request->rcv_bank_code != "") { 
                        array_push($arrget,"$request->rcv_bank_code");
                    }
                    if($request->rcv_bank_name != "") { 
                        array_push($arrget,"$request->rcv_bank_name");
                    }
                    if($request->rcv_name != "") { 
                        array_push($arrget,"$request->rcv_name");
                    }
                    if($request->cust_type != "") { 
                        array_push($arrget,"$request->cust_type");
                    }
                    if($request->cust_residence != "") { 
                        array_push($arrget,"$request->cust_residence");
                    }
                    if($request->trx_code != "") { 
                        array_push($arrget,"$request->trx_code");
                    }
                    if($request->email != "") { 
                        array_push($arrget,"$request->email");
                    }

                    $data = DB::table('tb_trx_multi_auto')->select($arrget)->where("status_proses" ,2)->where("id_setting" , '!=', null)->get();
                    $txt = "0|FT|$request->statement_type|$request->corporate_id|$header_id|$date1||$request->debited_account_fund|$request->charges_type|$request->debited_account_charge|$total_berhasil_upload|$request->currency|B|$business_type|$request->remarks_1|$request->remarks_2\n";
                    foreach ($data as $key => $value) {
                        DB::table('tb_trx_multi_auto')->where('id', $value->id)->update([
                            'status_proses' => 3
                        ]);
                        if(in_array('trx_id', $arrget)) {
                           $trx_id = str_pad($value->trx_id, 18, "0", STR_PAD_LEFT);
                           $txt .= "1|" . $trx_id; 
                        } else {
                            $txt .= "1|"; 
                        }

                        if(in_array('transfer_type', $arrget)) {
                            $txt .= "|" . $value->transfer_type;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('debited_account1', $arrget)) {
                            $txt .= "|" . $value->debited_account1;
                        } else {
                            $txt .= "|";
                        }
                        
                        if(in_array('beneficiary_id', $arrget)) {
                            $txt .= "|" .  $value->beneficiary_id;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('credited_account', $arrget)) {
                            $txt .= "|" .  $value->credited_account;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('amount', $arrget)) {
                            $amount = str_pad($value->amount, 13, "0", STR_PAD_LEFT);
                            $txt .= "|" . $amount.".00";
                        } else {
                            $txt .= "|";
                        }
                        
                        if(in_array('trx_purpose', $arrget)) {
                            $txt .= "|" .  $value->trx_purpose;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('charges_type', $arrget)) {
                            $txt .= "|" .  $value->charges_type."||";
                        } else {
                            $txt .= "|||";
                        }
                         
                        if(in_array('charges_account', $arrget)) {
                            $txt .= "|" .  $value->charges_account;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('remark_1', $arrget)) {
                            $txt .= "|" .  $value->remark_1;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('remark_2', $arrget)) {
                            $txt .= "|" .  $value->remark_2;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('rcv_bank_code', $arrget)) {
                            $txt .= "|" .  $value->rcv_bank_code;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('rcv_bank_name', $arrget)) {
                            $txt .= "|" .  $value->rcv_bank_name;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('rcv_name', $arrget)) {
                            $txt .= "|" .  $value->rcv_name;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('cust_type', $arrget)) {
                            $txt .= "|" .  $value->cust_type;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('cust_residence', $arrget)) {
                            $txt .= "|" .  $value->cust_residence;
                        } else {
                            $txt .= "|";
                        }

                        if(in_array('trx_code', $arrget)) {
                            $txt .= "|" .  $value->trx_code;
                        } else {
                            $txt .= "|";
                        }
                        
                        if(in_array('email', $arrget)) {
                            $txt .= "|" .  $value->email ."\n";
                        } else {
                            $txt .= "|\n";
                        }
                        
                       
                       
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
        $request->validate([
            'addMoreInputFields.*.debited_account_fund' => 'required'
        ]);
     
        foreach ($request->addMoreInputFields as $key => $value) {
            Student::create($value);
        }
     
        return back()->with('success', 'New subject has been added.');
    }
    // =======================================================================================================================================================================
    public function LoadFrameProses1(Request $request)
    {
        return view('multiautotf.frame.proses1');
    }
    // =======================================================================================================================================================================
    public function LoadFrameProses3(Request $request)
    {
        return view('multiautotf.frame.proses3');
    }
    // =======================================================================================================================================================================
    public function LoadFrameProses2(Request $request)
    {
        $ceklastdata = SettingModel::orderBy('id', 'desc')->first();
        $now = new \DateTime();
        $date = $now->format('Y-m-d');
        $date2 = $now->format('ym');
        if($ceklastdata && $ceklastdata->header_id != "")
        {
                if($ceklastdata && $ceklastdata->effective_date == $date)
                {
                        $header_id_hidden = $ceklastdata->header_id + 1;
                        $header_id_show = $ceklastdata->header_id + 1;
                        $header_id_show = str_pad($header_id_show, 8, "0", STR_PAD_LEFT);
                        $corporate_id = $ceklastdata->corporate_id;
                        $debited_account_fund = $ceklastdata->debited_account_fund;
                        $debited_account_charge = $ceklastdata->debited_account_charge;
                } else {
                        $header_id_hidden = 1;
                        $header_id_show = 1;
                        $header_id_show = str_pad($header_id_show, 3, "0", STR_PAD_LEFT);
                        $header_id_show = str_pad($date2.$header_id_show, 8, "0", STR_PAD_LEFT);
                        $corporate_id = $ceklastdata->corporate_id;
                        $debited_account_fund = $ceklastdata->debited_account_fund;
                        $debited_account_charge = $ceklastdata->debited_account_charge;
                }
        } else {
                $header_id_show = 1;
                $header_id_show = str_pad($header_id_show, 3, "0", STR_PAD_LEFT);
                $header_id_show = str_pad($date2.$header_id_show, 8, "0", STR_PAD_LEFT);
                $corporate_id = "";
                $debited_account_fund = "";
                $debited_account_charge = "";
        }
        return view('multiautotf.frame.proses2', ['header_id_show' => $header_id_show, 'corporate_id' => $corporate_id, 'debited_account_fund' => $debited_account_fund, 'debited_account_charge' => $debited_account_charge, 'date_now'=> $date]);
    }
    // =======================================================================================================================================================================
    public function DetailPage($id)
    {
        $data_setting = SettingModel::find($id);
        
        $data_input = DB::table('tb_setting_multi_auto')
        ->select('tb_setting_multi_auto.id', 'tb_trx_multi_auto.*')
        ->join('tb_trx_multi_auto','tb_setting_multi_auto.id','=','tb_trx_multi_auto.id_setting')
        ->where('tb_setting_multi_auto.id','=',$id)
        ->get();

        $total_transfer = DB::table('tb_setting_multi_auto')
        ->select('tb_trx_multi_auto.amount')
        ->join('tb_trx_multi_auto','tb_setting_multi_auto.id','=','tb_trx_multi_auto.id_setting')
        ->sum('amount');

        return view('multiautotf.detail', ['data_setting' => $data_setting, 'data_input' => $data_input, 'total_transfer' => $total_transfer]);
    }

}