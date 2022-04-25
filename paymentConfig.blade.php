@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <label class="form-label"><b>{{ __('config.payment_type') }}</b></label>
                <hr>
                <form action="" method="post" id="paymentForm" enctype='multipart/form-data'>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <input class="form-control" id="paymentType" name="paymentType" placeholder="{{ __('config.payment_input') }}"> 
                        </div>
                        <div class="col-4" align="right">
                            <button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-save"></i> {{ __('system.save') }}</button>
                        </div>
                    </div>
                </form>
                
              
                
                <div class="row justify-content-center">
                    <div class="col-12">
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-inverse table-border-style table-striped text-center" id="paymentTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('config.last_transactor') }}</th>
                                        <th>{{ __('system.payment_type') }}</th>
                                        <th>{{ __('system.edit') }}</th>
                                        <th>{{ __('system.delete') }}</th>
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
    </div>
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <label class="form-label"><b>{{ __('config.payment_type') }}</b></label>
                <hr>
                <div class="row">
                    <div class="col-12" align="right">
                        <button onclick="addBank()" class="btn btn-success btn-sm">{{ __('system.add') }}</button>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-12">
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-inverse table-border-style table-striped text-center" id="bankTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('profile.account') }}</th>
                                        <th>{{ __('system.bank_account_name') }}</th>
                                        <th>{{ __('profile.account_number') }}</th>
                                        <th>{{ __('system.edit') }}</th>
                                        <th>{{ __('system.delete') }}</th>
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
    </div>
</div>

@include('config.paymentModal')
@include('config.bankModal')
@endsection
@section('script')
<script>
var payment_index = "{{ route('payments.index') }}"
var payment_store = "{{ route('payments.store') }}"
var bank_index = "{{ route('banks.index') }}"
var bank_store = "{{ route('banks.store') }}"
$(function () {
    paymentTable = $('#paymentTable').DataTable({
       processing: true,
       serverSide: true,
       autoWidth: false,
       ajax: { 
           url: payment_index,
           global: false,
       },
       columns: [
           {
               data: 'transactor',
               name: 'transactor'
           },
           {
               data: 'name',
               name: 'name' 
           },
           {
               data: 'edit',
               name: 'edit',
               orderable: false,
               searchable: false
           },
           {
               data: 'delete',
               name: 'delete',
               orderable: false,
               searchable: false
           }
       ],
    })

    bankTable = $('#bankTable').DataTable({
       processing: true,
       serverSide: true,
       autoWidth: false,
       ajax: { 
           url: bank_index,
           global: false,
       },
       columns: [
           {
               data: 'bank_name',
               name: 'bank_name'
           },
           {
               data: 'bank_account_name',
               name: 'bank_account_name' 
           },
           {
               data: 'bank_account_number',
               name: 'bank_account_number' 
           },
           {
               data: 'edit',
               name: 'edit',
               orderable: false,
               searchable: false
           },
           {
               data: 'delete',
               name: 'delete',
               orderable: false,
               searchable: false
           }
       ],
    })

    $("#paymentForm").validate({
        submitHandler: function (form) {
            formData = new FormData(form);
            $.ajax({
                type: 'post',
                url: payment_store,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.success)
                    {
                        $('#paymentType').val('')
                        paymentTable.ajax.reload()
                        show_success();
                    }else{
                        show_warning(response.message);
                    }
                },
                error: function (err) {
                    show_error();
                    console.log(err.responseText);
                }
            });
        }
    })

    $("#editPayment").validate({
        submitHandler: function (form) {
            formData = new FormData(form);
            $.ajax({
                type: 'post',
                url: payment_store,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.success)
                    {
                        $('#paymentModal').modal('hide')
                        $('#paymentType').val('')
                        paymentTable.ajax.reload()
                        show_success();
                    }else{
                        show_warning(response.message);
                    }
                },
                error: function (err) {
                    show_error();
                    console.log(err.responseText);
                }
            });
        }
    })

    $("#bankForm").validate({
        submitHandler: function (form) {
            formData = new FormData(form);
            $.ajax({
                type: 'post',
                url: bank_store,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.success)
                    {
                        $('#bankModal').modal('hide')
                        bankTable.ajax.reload()
                        show_success();
                    }else{
                        show_warning(response.message);
                    }
                },
                error: function (err) {
                    show_error();
                    console.log(err.responseText);
                }
            });
        }
    })
})

function editData(id) {
    $('#paymentForm').trigger('reset');
    $.ajax({
        url: payment_index +'/'+ id +'/edit',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data)
            $('#editPaymentType').val(data.payment.name)
            $('#id').val(data.payment.id)
            $('#paymentModal').modal('show');
        },
        error: function (err) {
            console.log(err.responseText);
        }
    })
}

function deleteData(id){
    url = payment_index+'/'+id+'/destroy';
    deleteAll(id, url, paymentTable);
}

function addBank()
{
    $('#bankModal').modal('show')
}

function editBankData(id){
    $('#bankForm').trigger('reset');
    $.ajax({
        url: bank_index +'/'+ id +'/edit',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data)
            $('#bank_id').val(data.bank.id)
            $('#bank').val(data.bank.bank_account_id).selectpicker('refresh')
            $('#bank_account_name').val(data.bank.bank_account_name)
            $('#bank_account_number').val(data.bank.bank_account_number)
            $('#branch').val(data.bank.branch)
            $('#detail').val(data.bank.detail)
            $('#origin_photo').val(data.bank.photo);
            if(data.bank.photo){
                $('#show_pic').html('<div id="lightgallery"><a target="_blank" href="'+l_asset+data.bank.photo+'"><img src="'+l_asset+data.bank.photo+'" class="img-fluid"></a></div>');
            }else{
                $('#show_pic').html('<img src="'+l_asset+'images/nophoto.png" class="img-fluid">');
            }
            $('#bankModal').modal('show');
        },
        error: function (err) {
            console.log(err.responseText);
        }
    })
}
function deleteBankData(id){
    url = bank_index+'/'+id+'/destroy';
    deleteAll(id, url, bankTable);
}
</script>
@endsection