@extends('layouts.backend')
@section('content')
<form action="" method="post" id="shared-form" enctype='multipart/form-data'>
<div class="row justify-content-center">
    <div class="col-sm-10 col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12" align="right">
                        <b>{{ __('config.save_all') }} | </b><button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-save"></i> {{ __('system.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <label class="form-label"><b>{{ __('config.quick_report') }}</b></label>
                        <hr>
                        @include('config.dashboardSales')
                        <hr>
                        @include('config.dashboardPurchase')
                        <hr>
                        @include('config.dashboardStock')
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <label class="form-label"><b>{{ __('config.show_detail_report') }}</b></label>
                        <hr>
                        
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label g_text"><i class="fas fa-clipboard-list"></i> {{ __('config.all_report') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showReportTime" name="showReportTime" value="1" {{ $repCon->show_datetime == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showReportTime">{{ __('config.show_time') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showReportEmp" name="showReportEmp" value="1" {{ $repCon->show_user == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showReportEmp">{{ __('config.show_emp') }}</label>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __('config.font_size') }} Slip</label>
                                <input type="number" class="form-control" id="reportSlipFontSize" name="reportSlipFontSize" value="{{ $repCon->slip_font_size }}"> 
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __('config.font_size') }} A4</label>
                                <input type="number" class="form-control" id="reportA4FontSize" name="reportA4FontSize" value="{{ $repCon->a4_font_size }}"> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label g_text"><i class="fas fa-shopping-cart"></i> {{ __('config.show_stock_report') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showProdCost" name="showProdCost" value="1" {{ $repCon->stock_cost == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showProdCost">{{ __('config.show_product_cost') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showProdPrice" name="showProdPrice" value="1" {{ $repCon->stock_price == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showProdPrice">{{ __('config.show_product_price') }}</label>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label g_text"><i class="fas fa-cart-plus"></i> {{ __('config.purchase_report') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showPurVat" name="showPurVat" value="1" {{ $repCon->pur_vat == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showPurVat">{{ __('config.show_purchase_vat') }}</label>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label g_text"><i class="fas fa-cash-register" ></i> {{ __('config.sales_report') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showSalesCost" name="showSalesCost" value="1" {{ $repCon->sales_cost == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showSalesCost">{{ __('config.show_cost') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showSalesVat" name="showSalesVat" value="1" {{ $repCon->sales_vat == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showSalesVat">{{ __('config.show_sales_vat') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showDiscount" name="showDiscount" value="1" {{ $repCon->sales_discount == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showDiscount">{{ __('config.show_discount') }}</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="form-checkbox" id="showProfit" name="showProfit" value="1" {{ $repCon->sales_profit == 1 ? 'checked' : '' }}>
                                <label class="form-label" for="showProfit">{{ __('config.show_profit') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
</form>
@endsection
@section('script')
<script>
$(function(){
    var route_store = "{{ url('settingSystem/saveReportConfig') }}"
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

    $('#salesInfoDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#salesDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#salesDialyPdf').prop('checked' , false)
            $('#salesDialyCsv').prop('checked' , false)
        }
    })

    $('#salesInfoMonthly').click(function(){
        if($(this).prop("checked") == true){
            $('#salesMonthlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#salesMonthlyPdf').prop('checked' , false)
            $('#salesMonthlyCsv').prop('checked' , false)
        }
    })

    $('#salesInfoYearly').click(function(){
        if($(this).prop("checked") == true){
            $('#salesYearlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#salesYearlyPdf').prop('checked' , false)
            $('#salesYearlyCsv').prop('checked' , false)
        }
    })

    $('#salesProdDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#sumProdDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumProdDialyPdf').prop('checked' , false)
            $('#sumProdDialyCsv').prop('checked' , false)
        }
    })

    $('#salesProdDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#sumProdDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumProdDialyPdf').prop('checked' , false)
            $('#sumProdDialyCsv').prop('checked' , false)
        }
    })

    $('#salesProdMonthly').click(function(){
        if($(this).prop("checked") == true){
            $('#sumProdMonthlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumProdMonthlyPdf').prop('checked' , false)
            $('#sumProdMonthlyCsv').prop('checked' , false)
        }
    })

    $('#salesProdYearly').click(function(){
        if($(this).prop("checked") == true){
            $('#sumProdYearlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumProdYearlyPdf').prop('checked' , false)
            $('#sumProdYearlyCsv').prop('checked' , false)
        }
    })

    $('#salesRecpDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#sumRecpDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumRecpDialyPdf').prop('checked' , false)
            $('#sumRecpDialyCsv').prop('checked' , false)
        }
    })

    $('#salesRecpMonthly').click(function(){
        if($(this).prop("checked") == true){
            $('#sumRecpMonthlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumRecpMonthlyPdf').prop('checked' , false)
            $('#sumRecpMonthlyCsv').prop('checked' , false)
        }
    })

    $('#salesRecpYearly').click(function(){
        if($(this).prop("checked") == true){
            $('#sumRecpYearlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumRecpYearlyPdf').prop('checked' , false)
            $('#sumRecpYearlyCsv').prop('checked' , false)
        }
    })

    $('#purInfoDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#purInfoDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#purInfoDialyPdf').prop('checked' , false)
            $('#purInfoDialyCsv').prop('checked' , false)
        }
    })

    $('#purInfoMonthly').click(function(){
        if($(this).prop("checked") == true){
            $('#purInfoMonthlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#purInfoMonthlyPdf').prop('checked' , false)
            $('#purInfoMonthlyCsv').prop('checked' , false)
        }
    })

    $('#purInfoYearly').click(function(){
        if($(this).prop("checked") == true){
            $('#purInfoYearlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#purInfoYearlyPdf').prop('checked' , false)
            $('#purInfoYearlyCsv').prop('checked' , false)
        }
    })

    $('#purSumDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#purSumDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#purSumDialyPdf').prop('checked' , false)
            $('#purSumDialyCsv').prop('checked' , false)
        }
    })

    $('#purSumMonthly').click(function(){
        if($(this).prop("checked") == true){
            $('#purSumMonthlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#purSumMonthlyPdf').prop('checked' , false)
            $('#purSumMonthlyCsv').prop('checked' , false)
        }
    })

    $('#purSumYearly').click(function(){
        if($(this).prop("checked") == true){
            $('#purSumYearlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#purSumYearlyPdf').prop('checked' , false)
            $('#purSumYearlyCsv').prop('checked' , false)
        }
    })
    
    $('#purRecpDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#sumPurRecpDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumPurRecpDialyPdf').prop('checked' , false)
            $('#sumPurRecpDialyCsv').prop('checked' , false)
        }
    })

    $('#purRecpMonthly').click(function(){
        if($(this).prop("checked") == true){
            $('#sumPurRecpMonthlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumPurRecpMonthlyPdf').prop('checked' , false)
            $('#sumPurRecpMonthlyCsv').prop('checked' , false)
        }
    })

    $('#purRecpYearly').click(function(){
        if($(this).prop("checked") == true){
            $('#sumPurRecpYearlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#sumPurRecpYearlyPdf').prop('checked' , false)
            $('#sumPurRecpYearlyCsv').prop('checked' , false)
        }
    })

    $('#stockInfo').click(function(){
        if($(this).prop("checked") == true){
            $('#stockPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#stockPdf').prop('checked' , false)
            $('#stockCsv').prop('checked' , false)
        }
    })

    $('#topSalesDialy').click(function(){
        if($(this).prop("checked") == true){
            $('#topSalesDialyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#topSalesDialyPdf').prop('checked' , false)
            $('#topSalesDialyCsv').prop('checked' , false)
        }
    })

    $('#topSalesMonthly').click(function(){
        if($(this).prop("checked") == true){
            $('#topSalesMonthlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#topSalesMonthlyPdf').prop('checked' , false)
            $('#topSalesMonthlyCsv').prop('checked' , false)
        }
    })

    $('#topSalesYearly').click(function(){
        if($(this).prop("checked") == true){
            $('#topSalesYearlyPdf').prop('checked' , true)
        }
        else if($(this).prop("checked") == false){
            $('#topSalesYearlyPdf').prop('checked' , false)
            $('#topSalesYearlyCsv').prop('checked' , false)
        }
    })
})
</script> 
@endsection