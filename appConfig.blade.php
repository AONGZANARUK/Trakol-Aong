@extends('layouts.backend')
@section('content')
@php
    $nophoto = 'images/nophoto.png';
@endphp
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10">
                <form action="" method="post" id="shared-form" enctype='multipart/form-data'>
                    <input type="hidden" id="origin_company_logo" name="origin_company_logo" value="{{ getSystemInfo()->company_logo }}">
                    <input type="hidden" id="origin_lineQr" name="origin_lineQr" value="{{ getSystemInfo()->line_qr }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12" align="right">
                                    <b>{{ __('config.save_all') }} | </b><button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-save"></i> {{ __('system.save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <label class="form-label"><b>{{ __('config.general_config') }}</b></label>
                            <hr>
                           wecfewfewfewfewfew

                            <div class="row">
                                <div class="col-3">
                                    <label class="form-label">{{ __('config.system_shop_name') }}</label>
                                </div>
                                <div class="col-9">
                                    <input class="form-control" onkeypress="serialKey()" {{ getSystemInfo()->company_name == 'Trakool POS Demo' ? '' : 'readonly'}} id="companyName" name="companyName" value="{{ getSystemInfo()->company_name }}" required>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" style="margin-top:20px;" class="form-control disNone" id="serialNumber" name="serialNumber" placeholder="Serial Number">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" style="margin-top:20px;" class="form-control disNone" id="serialPassword" name="serialPassword" placeholder="Serial Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-3">
                                    <label class="form-label">{{ __('config.address') }}</label>
                                </div>
                                <div class="col-9">
                                    <textarea class="form-control" id="address" name="address">{{ getSystemInfo()->address }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                
                                <div class="col-3 col-sm-3">
                                    <label class="form-label">{{ __('config.tax_id') }}</label>
                                </div>
                                <div class="col-9 col-sm-3">
                                    <input type="text" class="form-control" id="tax_id" name="tax_id" value="{{ getSystemInfo()->tax_id }}">
                                </div>
                                <div class="col-3 col-sm-2">
                                    <label class="form-label">{{ __('config.phone') }}</label>
                                </div>
                                <div class="col-9 col-sm-4">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ getSystemInfo()->phone_number }}">
                                </div>
                            </div>  
                            <br>
                            <div class="row">
                                <div class="col-3 col-sm-3">
                                    <label class="form-label">{{ __('config.email') }}</label>
                                </div>
                                <div class="col-9 col-sm-3" style="margin-bottom: 20px;">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ getSystemInfo()->email }} ">
                                </div>
                                <div class="col-3 col-sm-2">
                                    <label class="form-label">{{ __('config.facebook') }}</label>
                                </div>
                                <div class="col-9 col-sm-4">
                                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ getSystemInfo()->facebook }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-3 col-sm-3">
                                    <label class="form-label">{{ __('config.line') }}</label>
                                </div>
                                <div class="col-9 col-sm-3" style="margin-bottom: 20px;">
                                    <input type="text" class="form-control" id="line_id" name="line_id" value="{{ getSystemInfo()->line_id }}">
                                </div>
                                <div class="col-3 col-sm-2">
                                    <label class="form-label">{{ __('config.what_app') }}</label>
                                </div>
                                <div class="col-9 col-sm-4 custom-file">
                                    <input type="text" class="form-control" id="whatApp" name="whatApp">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-3 col-xl-3">
                                    <label class="form-label">{{ __('config.line_qrcode') }}</label>
                                </div>
                                <div class="col-9 col-xl-3" style="margin-bottom: 20px;">
                                    <input type="file" class="form-control" id="lineQr" name="lineQr">
                                    <br>
                                    <img id="showingLineQr" src="{{ getSystemInfo()->line_qr ? asset(getSystemInfo()->line_qr) : asset($nophoto) }}" class="img-thumbnail">
                                    <div id="showLineQr"></div>
                                </div>
                                <div class="col-3 col-xl-2">
                                    <label class="form-label">{{ __('config.photo') }}</label>
                                </div>
                                <div class="col-9 col-xl-4">
                                    <input type="file" class="form-control" id="company_logo" name="company_logo">
                                    <br>
                                    <img id="showingComImg" src="{{ getSystemInfo()->company_logo ? asset(getSystemInfo()->company_logo) : asset($nophoto) }}" class="img-thumbnail">
                                    <div id=showComImg></div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <label class="form-label"><b>{{ __('config.ma_config') }}</b></label>
                            <hr>
                            <div class="row">
                                <div class="col-3 col-sm-3">
                                    <label class="form-label">{{ __('config.ma_code') }}</label>
                                </div>
                                <div class="col-9 col-sm-3" style="margin-bottom:20px;">
                                    <input class="form-control" id="ma_code" name="ma_code" {{ getSystemInfo()->ma_code == 'TRAKOOL' ? '' : 'readonly'}} value="{{ getSystemInfo()->ma_code }}"> 
                                </div>
                                <div class="col-3 col-sm-2">
                                    <label class="form-label">{{ __('system.status') }}</label>
                                </div>
                                <div class="col-9 col-sm-4">
                                    <label class="form-label">{{ getSystemInfo()->ma_status }} </label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-3 col-sm-3">
                                    <label class="form-label">{{ __('config.activa_date') }}</label>
                                </div>
                                <div class="col-9 col-sm-3">
                                    <label class="form-label">{{ dateFormat(getSystemInfo()->created_at) }}</label>
                                </div>
                                <div class="col-3 col-sm-2">
                                    <label class="form-label">{{ __('config.ma_expire') }}</label>
                                </div>
                                <div class="col-9 col-sm-4">
                                    <label class="form-label">{{ dateFormat(getSystemInfo()->ma_date) }} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>
@endsection
@section('script')
<script>
$(function(){
    var route_store = "{{ url('settingSystem/saveApp') }}"
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
                        if(response.company_name != 'Trakool POS Demo')
                        {
                            $('#companyName').prop('readonly', true);
                        }
                        if(response.ma_code != 'TRAKOOL')
                        {
                            $('#ma_code').prop('readonly', true);
                        }
                        $('#showingComImg').hide()
                        $('#showComImg').html('<img src="'+l_asset+response.company_logo+'" class="img-fluid">')
                        $('#showingLineQr').hide()
                        $('#showLineQr').html('<img src="'+l_asset+response.line_qr+'" class="img-fluid">')
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

function serialKey()
{
    $('#serialNumber').removeClass('disNone')
    $('#serialPassword').removeClass('disNone')
}
</script> 
@endsection