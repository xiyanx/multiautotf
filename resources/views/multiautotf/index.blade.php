@extends('templates.base')
@section('header')
<style>
        /* Custom CSS */
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6; */
        }

        .table-header th {
            flex: 1;
        }
    </style>
@endsection
@section('content')
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Multi Auto Tf</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Menu</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Multi Auto Tf</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">

                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" id="tambahData" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_1">Tambah Data</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">

            </div>
        </div>
        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table  table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Effective Date</th>
                            <th scope="col">Trx ID</th>
                            <th scope="col">Transfer Type</th>
                            <th scope="col">Debited Account</th>
                            <th scope="col">Beneficiary Id</th>
                            <th scope="col">Credited Account</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Trx Purpose</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Charges Type</th>
                            <th scope="col">Charges Account</th>
                            <th scope="col">Remark 1</th>
                            <th scope="col">Remark 2</th>
                            <th scope="col">RVC Bank Code</th>
                            <th scope="col">RVC Bank Name</th>
                            <th scope="col">RVC Name</th>
                            <th scope="col">Cust Type</th>
                            <th scope="col">Cust Residence</th>
                            <th scope="col">Trx Code</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table> -->

                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Header ID</th>
                        <th>Tanggal Create</th>
                        <th>Tanggal Transfer</th>
                        <th>Rek Debit</th>
                        <th>Nama Rekening</th>
                        <th>Total Transfer</th>
                    </tr>
                </thead>
                @foreach($data as $key => $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td><a href="detail/{{$value->id}}">{{$value->header_id}}</td>
                    <td>{{$value->effective_date}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Rp. {{ number_format($total_transfer, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" id="kt_block_ui_1_target">
                <div class="modal-header">
                    <h3 class="modal-title">Form Excel</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab_transaction_info">Transaction Info</a>
                    </li>
                </ul>
                <form type="POST" enctype='multipart/form-data' id="formUploadExcel">
                    <input type="hidden" name="debited_account_fund" id="debited_account_fund" value="<?= $debited_account_fund ?>">
                    <input type="hidden" name="debited_account_charge" id="debited_account_charge" value="<?= $debited_account_charge ?>">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab_transaction_info" role="tabpanel">
                            <div class="row">
                                <div id="mainFrame" class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <table class="table" id="dynamicAddRemove">
                                            <tr>
                                                <th>Fund</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control account_fund_msg" type="text" placeholder="" name="account0" id="account0" data-id="0"
                                                    value="<?= $debited_account_fund ?>" maxlength="10"/>
                                                    <h5  style="color: red;" id="account_fund_msg0"></h5>
                                                </td>
                                                <td><input class="groupchek1 form-check-input mt-3" type="checkbox" value="status" id="status" name="status" data-id="0"/></td>
                                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Account</button></td>
                                            </tr>
                                        </table>
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-4">
                                                Fund
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control account_fund_msg" type="text" placeholder="" name="account0" id="account0" data-id="0"
                                                        value="<?= $debited_account_fund ?>" />
                                                        <h5  style="color: red;" id="account_fund_msg0"></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-4">
                                                    Status
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="groupchek1 form-check-input mt-3" type="checkbox" value="status" id="status" name="status" data-id="0"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="col-4">
                                                    Action
                                                </div>
                                                <div class="col-8">
                                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Account</button>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table" id="chargeAddRemove">
                                            <tr>
                                                <th>Charge</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control account_charge_msg" type="text" placeholder="" name="account_charge0" id="account_charge0" data-id="0"
                                                    value="<?= $debited_account_charge ?>" maxlength="10"/>
                                                <h5  style="color: red;" id="account_charge_msg0"></h5>
                                                </td>
                                                <td><input class="groupchek2 form-check-input mt-3" type="checkbox" value="status" id="status_charge" name="status_charge" data-id="0"/></td>
                                                <td><button type="button" name="add" id="dynamic_ar_charge" class="btn btn-outline-primary">Add Account</button></td>
                                            </tr>
                                        </table>
                                        <!-- <div class="row">
                                            <div class="col-md-4">
                                                Charge
                                            </div>
                                            <div class="col-md-2">
                                                Status
                                            </div>
                                            <div class="col-md-3">
                                                Action
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div id="mainFrame1"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="submitbtn">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="btnClose">Close</button>

                </div>
            </div>
            </form>
    </div>
</div>
<!--begin::Footer-->

@endsection
@section('footer')
<script>
var target = document.querySelector("#kt_block_ui_1_target");
var blockUI = new KTBlockUI(target);
var table;

$(document).on('click', '#tambahData', function(){
    $('#mainFrame').load('/load-frame-proses1');
    $('#mainFrame1').empty();
})

var i = 1;
    $("#dynamic-ar").click(function () {
        let count = i++;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="account'+count+'" id="account'+count+'" data-id="'+count+'" placeholder="Enter Account" class="form-control account_fund_msg" /><h5  style="color: red;" id="account_fund_msg'+count+'"></h5></td><td><input class="groupchek1 form-check-input mt-3 lock_column" type="checkbox" value="status" id="status" data-id="'+count+'" name="status'+count+'"/></td><td><button type="button" data-id="'+count+'"  class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        
        $(this).parents('tr').remove();
    });
    
var ii = 1;
    $("#dynamic_ar_charge").click(function () {
        let count = ii++;
        $("#chargeAddRemove").append('<tr><td><input type="text" name="account_charge'+count+'" id="account_charge'+count+'" data-id="'+count+'" placeholder="Enter Account" class="form-control  account_charge_msg" /><h5  style="color: red;" id="account_charge_msg'+count+'"></h5></td><td><input class="groupchek2 form-check-input mt-3 lock_column" type="checkbox" value="status" id="status_charge" data-id="'+count+'" name="status_charge'+count+'"/></td><td><button type="button" data-id="'+count+'"  class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        
        $(this).parents('tr').remove();
    });

$(document).on('keyup', '.account_fund_msg', function(){
    const value = $(this).val();
    const id  = $(this).data('id');

    let length = value.length;
        if(length < 1) {
            $('#account_fund_msg'+ id).html('**Account Fund is missing')
        } else if(length < 10) {
            $('#account_fund_msg'+ id).html('Account Fund minimal 10 karakter')
        } else {
            $('#account_fund_msg'+ id).html('')
        }
})

$(document).on('keyup', '.account_charge_msg', function(){
    const value = $(this).val();
    const id  = $(this).data('id');

    let length = value.length;
        if(length < 1) {
            $('#account_charge_msg'+ id).html('**Account Charge is missing')
        } else if(length < 10) {
            $('#account_charge_msg'+ id).html('Account Charge minimal 10 karakter')
        } else {
            $('#account_charge_msg'+ id).html('')
        }
})



$(document).on('click', '#status', function () {
    const id = $(this).data('id');
    const value= $("#account"+id).val();
    $('#debited_account_fund').val(value);
    const checkboxes = document.querySelectorAll('.groupchek1');
    console.log(checkboxes)
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        checkboxes.forEach(c => {
          if (c !== checkbox) {
            c.checked = false;
          }
        });
      });
    });

})

$(document).on('click', '#status_charge', function () {
    const id = $(this).data('id');
    const value= $("#account_charge"+id).val();
    $('#debited_account_charge').val(value);
    const checkboxes = document.querySelectorAll('.groupchek2');
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        checkboxes.forEach(c => {
          if (c !== checkbox) {
            c.checked = false;
          }
        });
      });
    });

})


  

$(document).ready(function() {
    $('#exportButton').click(function() {
        $.ajax({
            url: '{{ route('ExportMultiAutoTfTxt') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                if (response.code == "200" ) {
                    window.open("<?= url('/export-file-download') ?>?name="+response.filename);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    
    table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        order: [
            [0, 'desc']
        ],
        dom: 'Blfrtip',
        buttons: [{
            extend: 'colvis',
            collectionLayout: 'fixed columns',
            collectionTitle: 'Column visibility control'
        }],
        ajax: {
            url: "<?= url('/load-data-trx-multi-auto-ajax') ?>",
            data: function(d) {
                // d.mulai = $('#tanggal_dari_fm').val(),
                //     d.sampai = $('#tanggal_sampai_fm').val(),
                //     d.type = $('#type_fm').val(),
                //     d.kode_cabang = $('#kode_cabang_fm').val(),
                //     d.rekening = $('#rekening_fm').val(),
                //     d.type_rek = $('#type_rek_fm').val(),
                //     d.mulai_trx = $('#tanggal_dari_trx_fm').val(),
                //     d.sampai_trx = $('#tanggal_sampai_trx_fm').val()
            },
        },
        searching: true,
        columns: [{
                data: 'id',
                render: function(data, type, row, meta) {
                    // return meta.row + meta.settings._iDisplayStart + 1;
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            }, {
                data: 'effective_date',
                name: 'effective_date'
            },
            {
                data: 'trx_id',
                name: 'trx_id'
            },
            {
                data: 'transfer_type',
                name: 'transfer_type'
            },
            {
                data: 'debited_account',
                name: 'debited_account'
            },
            {
                data: 'beneficiary_id',
                name: 'beneficiary_id'
            },
            {
                data: 'credited_account',
                name: 'credited_account'
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'trx_purpose',
                name: 'trx_purpose'
            },
            {
                data: 'currency',
                name: 'currency'
            },
            {
                data: 'charges_type',
                name: 'charges_type'
            },
            {
                data: 'charges_account',
                name: 'charges_account'
            },
            {
                data: 'remark_1',
                name: 'remark_1'
            },
            {
                data: 'remark_2',
                name: 'remark_2'
            },
            {
                data: 'rcv_bank_code',
                name: 'rcv_bank_code'
            },
            {
                data: 'rcv_bank_name',
                name: 'rcv_bank_name'
            },
            {
                data: 'rcv_name',
                name: 'rcv_name'
            },
            {
                data: 'cust_type',
                name: 'cust_type'
            },
            {
                data: 'cust_residence',
                name: 'cust_residence'
            },
            {
                data: 'trx_code',
                name: 'trx_code'
            },
            {
                data: 'email',
                name: 'email'
            }

        ],
        columnDefs: [{
                targets: 7,
                render: $.fn.dataTable.render.number(',', '.', 0, ''),
                className: 'alignRight'
            }

        ]

    });
})


$('#formUploadExcel').on('submit', (function(e) {
    e.preventDefault();
    blockUI.block();
    const varurl = "<?= url('/upload-excel-multi-auto-tf') ?>";
    $.ajax({
        url: varurl,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            console.log(response);
            blockUI.release();
             if(response.code == "200" && response.state == "1"){
                 $('#mainFrame1').load('/load-frame-proses2');
             } else if(response.code == "200" && response.state == "2"){
                 window.open("<?= url('/export-file-download') ?>?name="+response.filename);
                 table.draw();
             }

        },
        error: function(error) {

            console.log(error);
        }
    });

}));
</script>

@endsection