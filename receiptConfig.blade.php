
@extends('layouts.backend')
@section('content')
<form action="" method="post" id="shared-form" enctype='multipart/form-data'>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <div class="row">
                <div class="col-12" align="right">
                    <div class="card">
                        <div class="card-body">
                            <b>{{ __('config.save_all') }} | </b><button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-save"></i> {{ __('system.save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            
                @include('config.salesRecpConfig')
                
                @include('config.purchaseRecpConfig')
            </div>
        </div>
    </div>
    
    

    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label"><b>{{ __('config.show_receipt') }}</b></label>
                                    <hr>
                                    <label class="form-label r_text">{{ __('config.warnshow') }}</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label g_text"><b><i class="fas fa-cart-plus"></i> {{ __('product.purchase') }}</b></label>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_pur_title" >{{ __('config.pur_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="pur_title" name="pur_title"  aria-label="pur_title" aria-describedby="addon_pur_title" value="{{ getReceiptConf()->pur_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_po_title" >{{ __('config.po_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="po_title" name="po_title"  aria-label="po_title" aria-describedby="addon_po_title" value="{{ getReceiptConf()->po_title }}">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label g_text"><b><i class="fas fa-cash-register" ></i> {{ __('sale.sales') }}</b></label>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_sales_title" >{{ __('config.sale_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="sales_title" name="sales_title"  aria-label="sales_title" aria-describedby="addon_sales_title" value="{{ getReceiptConf()->sales_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_f_tax_title" >{{ __('config.f_tax_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="f_tax_title" name="f_tax_title"  aria-label="f_tax_title" aria-describedby="addon_f_tax_title" value="{{ getReceiptConf()->f_tax_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_deli_title" >{{ __('config.deli_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="deli_title" name="deli_title"  aria-label="deli_title" aria-describedby="addon_deli_title" value="{{ getReceiptConf()->deli_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_vat_title" >{{ __('config.vat_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="vat_title" name="vat_title"  aria-label="vat_title" aria-describedby="addon_vat_title" value="{{ getReceiptConf()->vat_title }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label g_text"><b><i class="fas fa-file-invoice"></i> {{ __('sale.s_invoice_and_invoice') }}</b></label>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_s_invoice_title" >{{ __('config.s_invoice_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="s_invoice_title" name="s_invoice_title"  aria-label="s_invoice_title" aria-describedby="addon_s_invoice_title" value="{{ getReceiptConf()->s_invoice_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_default_s_invoice_paper_size" >{{ __('config.default_s_invoice_paper_size') }}</span>
                                                </div>
                                                <select class="form-control" id="s_invoice_paper_size" name="s_invoice_paper_size">
                                                    <option value="a4" {{ getReceiptConf()->s_invoice_paper_size == 'a4' ? 'selected' : '' }}>A4</option>
                                                    <option value="a5" {{ getReceiptConf()->s_invoice_paper_size == 'a5' ? 'selected' : '' }}>A5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_invoice_title" >{{ __('config.invoice_title') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="invoice_title" name="invoice_title"  aria-label="invoice_title" aria-describedby="addon_invoice_title" value="{{ getReceiptConf()->invoice_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_default_invoice_paper_size" >{{ __('config.default_invoice_paper_size') }}</span>
                                                </div>
                                                <select class="form-control" id="invoice_paper_size" name="invoice_paper_size">
                                                    <option value="a4" {{ getReceiptConf()->invoice_paper_size == 'a4' ? 'selected' : '' }}>A4</option>
                                                    <option value="a5" {{ getReceiptConf()->invoice_paper_size == 'a5' ? 'selected' : '' }}>A5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label g_text"><b><i class="fas fa-users"></i> {{ __('config.users') }}</b></label>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_emp_title" >{{ __('config.emp') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="emp_title" name="emp_title"  aria-label="emp_title" aria-describedby="addon_emp_title" value="{{ getReceiptConf()->employee_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_cus_title" >{{ __('config.cus') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="cus_title" name="cus_title"  aria-label="cus_title" aria-describedby="addon_cus_title" value="{{ getReceiptConf()->customer_title }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text less-input-group" id="addon_supp_title" >{{ __('config.supp') }}</span>
                                                </div>
                                                <input type="text" class="form-control" id="supp_title" name="supp_title"  aria-label="supp_title" aria-describedby="addon_supp_title" value="{{ getReceiptConf()->supplier_title }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-dark" onclick="configRecp()"><i class="fas fa-file-invoice"></i> <b class="w_text">{{ __('config.receipt_config') }}</b></a> <span class="r_text"> <-- {{ __('config.all_save_only_their_zone') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('config.receiptCfModal')
@include('config.footerModal')
@endsection
@section('script')
<script>
$(function(){
    var route_store = "{{ url('settingSystem/saveRecp') }}"
    var route_index = "{{ url('settingSystem/processer') }}"
    table = $('#dtTable').DataTable({
       processing: true,
       serverSide: true,
       autoWidth: false,
       ajax: { 
           url: route_index,
           global: false,
       },
       columns: [{
               data: 'DT_RowIndex',
               name: 'DT_RowIndex',
               searchable: false,
           },
           {
               data: 'trans_type',
               name: 'trans_type'
           },
           {
               data: 'receipt_type',
               name: 'receipt_type' 
           },
           {
               data: 'receipt_paper_size',
               name: 'receipt_paper_size'
           },
           {
               data: 'receipt_block',
               name: 'receipt_block'
           },
           {
               data: 'receipt_pro_1',
               name: 'receipt_pro_1'
           },
           {
               data: 'receipt_pro_2',
               name: 'receipt_pro_2'
           },
           {
               data: 'receipt_pro_3',
               name: 'receipt_pro_3'
           },
           {
               data: 'receipt_pro_4',
               name: 'receipt_pro_4'
           },
           {
               data: 'edit',
               name: 'edit',
               orderable: false,
               searchable: false
           }
       ],
   });


    $("#shared-form").validate({
        submitHandler: function (form) {
            formData = new FormData(form);
            $.ajax({
                type: form.method,
                url: route_store,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.success)
                    {
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

    $("#footerForm").validate({
        submitHandler: function (form) {
            formData = new FormData(form);
            $.ajax({
                type: form.method,
                url: "{{ url('settingSystem/editFooter') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.success)
                    {
                        $('#footerModal').modal('hide')
                        table.ajax.reload()
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

    $("#receiptCfForm").validate({
        submitHandler: function (form) {
            formData = new FormData(form);
            $.ajax({
                type: form.method,
                url: "{{ url('settingSystem/updateReceiptConf') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.success)
                    {
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

    $("#recpLogo").change(function() {
        if(this.checked) {
            $("#example").contents().find("#company_logo").removeClass("disNone")
        }else{
            $("#example").contents().find("#company_logo").addClass("disNone")
        }
    })

    $("#recpName").change(function() {
        if(this.checked) {
            $("#example").contents().find("#recp_name").removeClass("disNone")
        }else{
            $("#example").contents().find("#recp_name").addClass("disNone")
        }
    })

    $("#recpDetail").change(function() {
        if(this.checked) {
            $("#example").contents().find("#recp_detail").removeClass("disNone")
        }else{
            $("#example").contents().find("#recp_detail").addClass("disNone")
        }
    })

    $("#recpEmp").change(function() {
        if(this.checked) {
            $("#example").contents().find("#recp_emp").removeClass("disNone")
        }else{
            $("#example").contents().find("#recp_emp").addClass("disNone")
        }
    })

    $("#recpDate").change(function() {
        if(this.checked) {
            $("#example").contents().find("#recp_date").removeClass("disNone")
        }else{
            $("#example").contents().find("#recp_date").addClass("disNone")
        }
    })

    $("#recpTime").change(function() {
        if(this.checked) {
            $("#example").contents().find("#recp_time").removeClass("disNone")
        }else{
            $("#example").contents().find("#recp_time").addClass("disNone")
        }
    })

    $("#recpProcesser").change(function() {
        if(this.checked) {
            $("#example").contents().find("#recp_procname").removeClass("disNone")
        }else{
            $("#example").contents().find("#recp_procname").addClass("disNone")
        }
    })

    $("#recpProcAdd").change(function() {
        if(this.checked) {
            $("#example").contents().find("#recp_procadd").removeClass("disNone")
        }else{
            $("#example").contents().find("#recp_procadd").addClass("disNone")
        }
    })
})
function editData(id)
{
    $.ajax({
        type: "GET",
        url: "{{ url('settingSystem/footerDetail') }}"+"/"+id,
        dataType: "json",
        success: function (response) {
            console.log(response)
            $('#id').val(response.footer.id)
            $('#receipt_block').val(response.footer.receipt_block).selectpicker('refresh')
            changeBlock()
            $('#receipt_pro_1').val(response.footer.receipt_pro_1)
            $('#receipt_pro_2').val(response.footer.receipt_pro_2)
            $('#receipt_pro_3').val(response.footer.receipt_pro_3)
            $('#receipt_pro_4').val(response.footer.receipt_pro_4)
            $('#transType').html(response.transType)
            $('#receiptType').html(response.receiptType)
            $('#paperSize').html(response.footer.receipt_paper_size)
            $('#footerModal').modal('show')
        }
    });
}

function changeBlock()
{
    var type = $('#transType').val()
    var sales = $('#salesReceipt').val()
    var pur = $('#purReceipt').val()
    var inv = $('#invoiceReceipt').val()
    if(type == 'invoice'){
        var size = $('#subPaperSize').val()
    }else{
        var size = $('#paperSize').val()
    }
    var receipt_block = $('#receipt_block').val()
    document.getElementById("example").src = "{{ url('settingSystem/receiptExam')}}"+"/"+type+"/"+size+"/"+sales+"/"+pur+"/"+inv+"/"+receipt_block
    if(receipt_block == 1){
        $('#pro_1').removeClass('disNone')
        $('#pro_2').addClass('disNone')
        $('#pro_3').addClass('disNone')
        $('#pro_4').addClass('disNone')
    }else if(receipt_block == 2){
        $('#pro_1').removeClass('disNone')
        $('#pro_2').removeClass('disNone')
        $('#pro_3').addClass('disNone')
        $('#pro_4').addClass('disNone')
    }else if(receipt_block == 3){
        $('#pro_1').removeClass('disNone')
        $('#pro_2').removeClass('disNone')
        $('#pro_3').removeClass('disNone')
        $('#pro_4').addClass('disNone')
    }else{
        $('#pro_1').removeClass('disNone')
        $('#pro_2').removeClass('disNone')
        $('#pro_3').removeClass('disNone')
        $('#pro_4').removeClass('disNone')
    }
}

function configRecp()
{
    selectReceiptType()
    $('#receiptCfModal').modal('show')
}

function selectReceiptType()
{
    var type = $('#transType').val()
    var sales = $('#salesReceipt').val()
    var pur = $('#purReceipt').val()
    if(type == 'invoice'){
        var size = $('#subPaperSize').val()
    }else{
        var size = $('#paperSize').val()
    }
    var inv = $('#invoiceReceipt').val()
    $.ajax({
        type: "GET",
        url: "{{ url('settingSystem/receiptDetail') }}"+"/"+type+"/"+size+"/"+sales+"/"+pur+"/"+inv,
        dataType: "json",
        success: function (response) {
            console.log(response)
            $('#recpFont').val(response.receipt.fontSize)
            // alert(response.receipt.logo)
            response.receipt.logo == 1 ? $('#recpLogo').prop('checked',true) : $('#recpLogo').prop('checked',false);
            response.receipt.name == 1 ? $('#recpName').prop('checked',true) : $('#recpName').prop('checked',false)
            response.receipt.detail == 1 ? $('#recpDetail').prop('checked',true) : $('#recpDetail').prop('checked',false)
            response.receipt.date == 1 ? $('#recpDate').prop('checked',true) : $('#recpDate').prop('checked',false)
            response.receipt.time == 1 ? $('#recpTime').prop('checked',true) : $('#recpTime').prop('checked',false)
            response.receipt.emp == 1 ? $('#recpEmp').prop('checked',true) : $('#recpEmp').prop('checked',false)
            response.receipt.partner == 1 ? $('#recpProcesser').prop('checked',true) : $('#recpProcesser').prop('checked',false)
            response.receipt.partner_detail == 1 ? $('#recpProcAdd').prop('checked',true) : $('#recpProcAdd').prop('checked',false)
            if(size == 'a5'){
                $('#recpLogo').prop('disabled', true)
            }else{
                $('#recpLogo').prop('disabled', false)
            }
            if(type == 'sales'){
                $('#labCus').removeClass('disNone')
                $('#labSup').addClass('disNone')
                $('#showCus').removeClass('disNone')
                $('#showCusAdd').removeClass('disNone')
                $('#showSupp').addClass('disNone')
                $('#showSuppAdd').addClass('disNone')
                $('#divPaper').removeClass('disNone')
                $('#divSubPaper').addClass('disNone')
            }else if(type == 'invoice'){
                $('#labCus').removeClass('disNone')
                $('#labSup').addClass('disNone')
                $('#showCus').removeClass('disNone')
                $('#showCusAdd').removeClass('disNone')
                $('#showSupp').addClass('disNone')
                $('#showSuppAdd').addClass('disNone')
                $('#divPaper').addClass('disNone')
                $('#divSubPaper').removeClass('disNone')
            }else{
                $('#labCus').addClass('disNone')
                $('#labSup').removeClass('disNone')
                $('#showCus').addClass('disNone')
                $('#showCusAdd').addClass('disNone')
                $('#showSupp').removeClass('disNone')
                $('#showSuppAdd').removeClass('disNone')
                $('#divPaper').removeClass('disNone')
                $('#divSubPaper').addClass('disNone')
            }
            $('#footerslipText').val(response.slipFooter)
            document.getElementById("example").src = "{{ url('settingSystem/receiptExam')}}"+"/"+type+"/"+size+"/"+sales+"/"+pur
            if(size == 'a4' || size =='a5'){
                if(type == 'sales'){
                    $('#salesDiv').removeClass('disNone')
                    $('#purDiv').addClass('disNone')
                    $('#invoiceDiv').addClass('disNone')
                    
                }else if(type == 'invoice'){
                    $('#salesDiv').addClass('disNone')
                    $('#purDiv').addClass('disNone')
                    $('#invoiceDiv').removeClass('disNone')
                }else{
                    $('#salesDiv').addClass('disNone')
                    $('#purDiv').removeClass('disNone')
                    $('#invoiceDiv').addClass('disNone')
                }
                $('#transDiv').removeClass('col-6')
                $('#transDiv').addClass('col-4')
                $('#paperDiv').removeClass('col-6')
                $('#paperDiv').addClass('col-4')
                $('#slipFDiv').addClass('disNone')
                $('#notSlipDiv').removeClass('disNone')
                
                $('#receipt_block').val(response.footer.receipt_block).selectpicker('refresh')
                changeBlock()
                $('#receipt_pro_1').val(response.footer.receipt_pro_1)
                $('#receipt_pro_2').val(response.footer.receipt_pro_2)
                $('#receipt_pro_3').val(response.footer.receipt_pro_3)
                $('#receipt_pro_4').val(response.footer.receipt_pro_4)
            }else{
                $('#salesDiv').addClass('disNone')
                $('#purDiv').addClass('disNone')
                $('#invoiceDiv').addClass('disNone')
                $('#transDiv').addClass('col-6')
                $('#transDiv').removeClass('col-4')
                $('#paperDiv').addClass('col-6')
                $('#paperDiv').removeClass('col-4')
                $('#slipFDiv').removeClass('disNone')
                $('#notSlipDiv').addClass('disNone')
            }
            // $('#example').html(response.example)
        },
        error: function (err) {
            show_error();
            console.log(err.responseText);
        }
    });
}

function setSlipFooter()
{
    var slip_text = $('#footerslipText').val()
    $("#example").contents().find("#slipFooter").html(slip_text)
}

function setPro1()
{
    var receipt_pro_1 = $('#receipt_pro_1').val()
    $("#example").contents().find("#receipt_pro_1").html(receipt_pro_1)
}
function setPro2()
{
    var receipt_pro_2 = $('#receipt_pro_2').val()
    $("#example").contents().find("#receipt_pro_2").html(receipt_pro_2)
}
function setPro3()
{
    var receipt_pro_3 = $('#receipt_pro_3').val()
    $("#example").contents().find("#receipt_pro_3").html(receipt_pro_3)
}
function setPro4()
{
    var receipt_pro_4 = $('#receipt_pro_4').val()
    $("#example").contents().find("#receipt_pro_4").html(receipt_pro_4)
}
</script>
@endsection