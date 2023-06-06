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
                <table class="table  table-striped table-bordered" id="table">
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
                <form type="POST" enctype='multipart/form-data' id="formUploadExcel">
                    <div id="mainFrame"></div>
                </form>
                    <div id="mainFrame1"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="btnClose">Close</button>

                </div>
            </div>
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