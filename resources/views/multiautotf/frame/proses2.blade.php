<input type="hidden" id="state" name="state" value="2">
<div class="row">
    <div class="col-md-4">
        <div class="row mb-3">
            <div class="col-4">
                <label for="" class="form-label mt-4">Effective Date</label>
            </div>
            <div class="col-8">
                <input class="form-control" placeholder="Pick a date" id="effective_date" name="effective_date" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="" class="form-label mt-4">Corporate ID</label>
            </div>
            <div class="col-8">
                <input class="form-control" type="text" placeholder="" id="corporate_id" name="corporate_id"
                    value="<?= $corporate_id ?>" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="" class="form-label mt-4">Header ID</label>
            </div>
            <div class="col-8">
                <input class="form-control" type="text" placeholder="" id="header_id" name="header_id"
                    value="<?= $header_id ?>" />
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
                <select class="form-select" aria-label="Select example" id="statement_type" name="statement_type">
                    <option value="SD">Single Debit</option>
                    <option value="MD">Multi Debit</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="" class="form-label mt-4">Currency</label>
            </div>
            <div class="col-8">
                <select class="form-select" aria-label="Select example" id="currency" name="currency">
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
                <select class="form-select" aria-label="Select example" id="charges_type" name="charges_type">
                    <option value="OUR">Default</option>
                    <option value="BEN">Beneficiary</option>
                    <option value="SHA">Sharing</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="" class="form-label mt-4">Remarks 1</label>
            </div>
            <div class="col-8">
                <input class="form-control" type="text" placeholder="" id="remarks_1" name="remarks_1" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="" class="form-label mt-4">Remarks 2</label>
            </div>
            <div class="col-8">
                <input class="form-control" type="text" placeholder="" id="remarks_2" name="remarks_2" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="" class="form-label mt-4">Business Type</label>
            </div>
            <div class="col-8">
                <select class="form-select" aria-label="Select example" id="business_type" name="business_type">
                    <option value="6">Perdangan, Hotel dan Restoran</option>
                    <option value="1">Pertanian</option>
                    <option value="2">Pertambangan dan Penggalian</option>
                    <option value="3">Industri Pengolahan</option>
                    <option value="4">Listrik, Gas dan Air Minum</option>
                    <option value="5">Bangunan / Konstruksi</option>
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
                        <label for="" class="form-label mt-4">Lock Column</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="lock_column" id="lock_column" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Effective Date</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="effective_date1" id="effective_date1" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Transaction ID</label>
                    </div>
                    <div class="col-8">
                        <div class="form-check" style="margin-top: 0.9em;">
                            <input class="form-check-input" type="checkbox" value="transaction_id"
                                id="transaction_id" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Transfer type</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="transfer_type" id="transfer_type" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Debited Account</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="debited_account" id="debited_account" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Beneficiary ID</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="beneficiary_id" id="beneficiary_id" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Credited Account</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="credited_account"
                            id="credited_account" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Amount</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="amount" id="amount" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Trx Purpose</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="trx_purpose" id="trx_purpose" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Currency</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="currency1" id="currency1" />
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Charges Account</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="charges_account" id="charges_account" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Remarks 1</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="remarks_11" id="remarks_11" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Remarks 2</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="remarks_22" id="remarks_22" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Rcv Bank Code</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="rcv_bank_code" id="rcv_bank_code" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Rcv Bank Name</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="rcv_bank_name" id="rcv_bank_name" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Rcv Name</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="rcv_name" id="rcv_name" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Cust Type</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="cust_type" id="cust_type" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Cust Residence</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="cust_residence" id="cust_residence" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Trx Code</label>
                    </div>
                    <div class="col-8" style="margin-top: 0.9em;">
                        <input class="form-check-input" type="checkbox" value="trx_code" id="trx_code" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#dependency_header_id').prop('disabled', true);
        $('#currency').prop('disabled', true);
        $("#effective_date").flatpickr();
        $('#lock_column').change(function() {
                if ($(this).is(':checked')) {
                    $('#effective_date1').prop('disabled', true);
                    $('#transaction_id').prop('disabled', true);
                    $('#transfer_type').prop('disabled', true);
                    $('#debited_account').prop('disabled', true);
                    $('#beneficiary_id').prop('disabled', true);
                    $('#credited_account').prop('disabled', true);
                    $('#amount').prop('disabled', true);
                    $('#trx_purpose').prop('disabled', true);
                    $('#currency1').prop('disabled', true);
                    $('#charges_account').prop('disabled', true);
                    $('#remarks_11').prop('disabled', true);
                    $('#remarks_22').prop('disabled', true);
                    $('#rcv_bank_code').prop('disabled', true);
                    $('#rcv_bank_name').prop('disabled', true);
                    $('#rcv_name').prop('disabled', true);
                    $('#cust_type').prop('disabled', true);
                    $('#cust_residence').prop('disabled', true);
                    $('#trx_code').prop('disabled', true);
                } else {
                    $('#effective_date1').prop('disabled', false);
                    $('#transaction_id').prop('disabled', false);
                    $('#transfer_type').prop('disabled', false);
                    $('#debited_account').prop('disabled', false);
                    $('#beneficiary_id').prop('disabled', false);
                    $('#credited_account').prop('disabled', false);
                    $('#amount').prop('disabled', false);
                    $('#trx_purpose').prop('disabled', false);
                    $('#currency1').prop('disabled', false);
                    $('#charges_account').prop('disabled', false);
                    $('#remarks_11').prop('disabled', false);
                    $('#remarks_22').prop('disabled', false);
                    $('#rcv_bank_code').prop('disabled', false);
                    $('#rcv_bank_name').prop('disabled', false);
                    $('#rcv_name').prop('disabled', false);
                    $('#cust_type').prop('disabled', false);
                    $('#trx_code').prop('disabled', false);
                }
            });
    })

</script>
