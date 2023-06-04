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
        <form type="POST" enctype='multipart/form-data' id="formUploadExcel">
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
                    <div class="mb-10">
                        <label class="form-label">Input</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Effective Date</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" placeholder="Pick a date" id="effective_date"
                                        name="effective_date" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Corporate ID</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" placeholder="" id="corporate_id"
                                        name="corporate_id" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Header ID</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" placeholder="" id="header_id"
                                        name="header_id" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Dependency Header ID</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" placeholder="" id="dependency_header_id"
                                        name="dependency_header_id" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Statement Type</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-select" aria-label="Select example" id="statement_type"
                                        name="statement_type">
                                        <option>Open this option</option>
                                        <option value="1">Single Debit</option>
                                        <option value="2">Multi Debit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Currency</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-select" aria-label="Select example" id="statement_type"
                                        name="statement_type">
                                        <option>Open this option</option>
                                        <option value="1">IDR</option>
                                        <option value="2">USD</option>
                                        <option value="3">JPY</option>
                                        <option value="4">AUD</option>
                                        <option value="5">GBP</option>
                                        <option value="6">SGD</option>
                                        <option value="7">HKD</option>
                                        <option value="8">EUR</option>
                                        <option value="9">CNY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Charges Type</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-select" aria-label="Select example" id="statement_type"
                                        name="statement_type">
                                        <option>Open this option</option>
                                        <option value="1">Default</option>
                                        <option value="2">Beneficiary</option>
                                        <option value="3">Sharing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Remarks 1</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" placeholder="" id="remarks_1"
                                        name="remarks_1" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Remarks 2</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" type="text" placeholder="" id="remarks_2"
                                        name="remarks_2" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="" class="form-label mt-4">Business Type</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-select" aria-label="Select example" id="statement_type"
                                        name="statement_type">
                                        <option>Open this option</option>
                                        <option value="1">Pertanian</option>
                                        <option value="2">Pertambangan dan Penggalian</option>
                                        <option value="3">Industri Pengolahan</option>
                                        <option value="4">Listrik, Gas dan Air Minum</option>
                                        <option value="5">Bangunan / Konstruksi</option>
                                        <option value="6">Perdangan, Hotel dan Restoran</option>
                                        <option value="7">Angkutan dan Komunikasi</option>
                                        <option value="8">Keuangan, Persewaan dan Jasa Perusahaan</option>
                                        <option value="9">Jasa</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Effective Date</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" placeholder="Pick a date" id="effective_date"
                                                name="effective_date" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Transaction ID</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Transfer type</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Debited Account</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Beneficiary ID</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Credited Account</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Amount</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Trx Purpose</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Currency</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Charges Account</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Remarks 1</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Remarks 2</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Rcv Bank Code</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Rcv Bank Name</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Rcv Name</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Cust Type</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Cust Residence</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="" class="form-label mt-4">Trx Code</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="form-select" aria-label="Select example" id="statement_type"
                                                name="statement_type">
                                                <option>Open this option</option>
                                                <option value="1">Single Debit</option>
                                                <option value="2">Multi Debit</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" id="exportButton">Export</button>
                    <a href="{{ route('export.file') }}" class="btn btn-primary">Export File</a>

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
$(document).ready(function() {
    $('#exportButton').click(function() {
        $.ajax({
            url: '{{ route('ExportMultiAutoTfTxt') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Handle success response here
                console.log('Export completed.');
            },
            error: function(xhr, status, error) {
                // Handle error response here
                console.error(error);
            }
        });
    });
    $("#effective_date").flatpickr();
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
            console.log(response);
            // if ($.isEmptyObject(response.error)) {

            //     if (response.code == "200") {
            //        table.draw();

            //         toastr.success("Berhasil mengupload data!");
            //         $('#file').val('');
            //         blockUI1.release();
            //         var myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById(
            //             'UploadExcel'));
            //         myModal.hide();
            //     } else {
            //         alert('Gagal upload data')

            //     }


            // } else {
            //     alert('Gagal upload data')
            // }

        },
        error: function(error) {

            console.log(error);
        }
    });

}));
</script>

@endsection