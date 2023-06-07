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
                        <label for="" class="form-label mt-4">Effective Date</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 " type="checkbox" value="effective_date" id="effective_date1" name="effective_date1"  disabled/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Transaction ID</label>
                    </div>
                    <div class="col-8">
                        <div class="form-check">
                            <input class="form-check-input mt-3 lock_column" type="checkbox" value="trx_id"
                                id="trx_id" name="trx_id" checked/>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Transfer type</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="transfer_type" id="transfer_type" name="transfer_type" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Debited Account</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="debited_account" id="debited_account" name="debited_account"/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Beneficiary ID</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="beneficiary_id" id="beneficiary_id" name="beneficiary_id" disabled/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Credited Account</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="credited_account"
                            id="credited_account" name="credited_account" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Amount</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="amount" id="amount" name="amount" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Trx Purpose</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="trx_purpose" id="trx_purpose" name="trx_purpose" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Currency</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 " type="checkbox" value="currency" id="currency1" name="currency1" disabled/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Charges Type</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 " type="checkbox" value="charges_type" id="charges_type" name="charges_type" disabled/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Charges Account</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3" type="checkbox" value="charges_account" id="charges_account" name="charges_account" disabled/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Remarks 1</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="remarks_1" id="remarks_11" name="remarks_11" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Remarks 2</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="remarks_2" id="remarks_22" name="remarks_22" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Rcv Bank Code</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="rcv_bank_code" id="rcv_bank_code" name="rcv_bank_code" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Rcv Bank Name</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="rcv_bank_name" id="rcv_bank_name" name="rcv_bank_name" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Rcv Name</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="rcv_name" id="rcv_name" name="rcv_name" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Cust Type</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="cust_type" id="cust_type" name="cust_type" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Cust Residence</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="cust_residence" id="cust_residence" name="cust_residence" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Trx Code</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="trx_code" id="trx_code" name="trx_code" checked/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <label for="" class="form-label mt-4">Email</label>
                    </div>
                    <div class="col-8">
                        <input class="form-check-input mt-3 lock_column" type="checkbox" value="email" id="email" name="email" checked/>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#dependency_header_id').prop('disabled', true);
        $('#currency').prop('disabled', true);
        $("#effective_date").flatpickr();
    })

</script>
