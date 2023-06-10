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
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Detail Page</h1>
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
                <div class="row">
                <div class="col-md-6">
                    <div class="row-sm-2">
                        <span>Fund A/C : </span>
                        <a href="#">{{$data_setting['debited_account_fund']}}</a>
                    </div>
                    <div class="row-sm-2">
                        <span>Header ID : </span>
                        <a href="#">{{$data_setting['header_id']}}</a>
                    </div>
                    <div class="row-sm-2">
                        <span>Statement Type : </span>
                        <a href="#">{{$data_setting['statement_type']}}</a>
                    </div>
                    <div class="row-sm-2">
                        <span>Remark 1 : </span>
                        <a href="#">{{$data_setting['remarks_1']}}</a>
                    </div>
                </div>
            
                <div class="col-md-6">
                        <div class="row-sm-2">
                            <span>Charge A/C : </span>
                            <a href="#">{{$data_setting['debited_account_charge']}}</a>
                        </div>
                        <div class="row-sm-2">
                            <span>Corporate ID : </span>
                            <a href="#">{{$data_setting['corporate_id']}}</a>
                        </div>
                        <div class="row-sm-2">
                            <span>Tot. Amount : </span>
                            <a href="#">Rp. {{ number_format($total_transfer, 0, ',', '.') }}</a>
                        </div>
                        <div class="row-sm-2">
                            <span>Remark 2 : </span>
                            <a href="#">{{$data_setting['remarks_2']}}</a>
                        </div>
                </div>
                <table id="showBooksIn" class="table table-bordered">
                <thead>
                    <tr>
                        <th>TRX ID</th>
                        <th>Credited A/C</th>
                        <th>Amount</th>
                        <th>Remark 1</th>
                        <th>Remark 2</th>
                        <th>Rcv Bank Code</th>
                        <th>RCV Bank Name</th>
                    </tr>
                </thead>
                @foreach($data_input as $row)
                <tr>
                    <td>{{$row->effective_date}}</td>
                    <td>{{$row->credited_account}}</td>
                    <td>Rp. {{ number_format($row->amount, 0, ',', '.') }}</td>
                    <td>{{$row->remark_1}}</td>
                    <td>{{$row->remark_2}}</td>
                    <td>{{$row->rcv_bank_code}}</td>
                    <td>{{$row->rcv_bank_name}}</td>
                </tr>
                @endforeach
            </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection