
@extends('layouts.backend')
@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                
                    
                <div class="card-header-right col-md-6">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex flex-row flex-wrap align-items-center pb-3">
                                <div class="p-2">
                                </div>

                                <div class="p-2 text-light">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <ul class="list-unstyled card-option" align="right">
                                <li style="margin-top: 30px;"><a href="#" onclick="barcodeConfig()" class="btn btn-sm btn-success btn-sm {{ userPermission('addBarConfig') }}"><i class="fas fa-plus"></i> {{ __('system.add') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <label class="form-label"><b>{{ __('config.barcode_list') }}</b></label>
                    <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-inverse table-border-style table-striped text-center" id="dtTable" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('config.barcode_form') }}</th>
                                <th>{{ __('config.barcode_name') }}</th>
                                <th>{{ __('config.emp') }}</th>
                                <th>{{ __('system.detail_edit') }}</th>
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
@include('components.shortBarcodeCf')
@endsection
@section('script')
<script>
var route_index = "{{ route('barcode.index') }}"
$(function() {
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
               data: 'form',
               name: 'form'
           },
           {
               data: 'name',
               name: 'name'
           },
           {
               data: 'emp',
               name: 'emp'
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
   });
   
    $("#config-form").validate({
        submitHandler: function (form) {
            formData = new FormData(form);
            $.ajax({
                type: form.method,
                url: "{{ url('settingSystem/saveBarcodeOption') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.success)
                    {
                        table.ajax.reload()
                        $('#barcodeCFModal').modal('hide')
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
function editData(id)
{
    $.ajax({
        type: "GET",
        url: "{{ url('settingSystem/editBarcode') }}"+"/"+id,
        dataType: "JSON",
        success: function (response) {
            console.log(response)
            $('#config-form').trigger('reset')
            $('#id').val(id)
            $('#barName').val(response.barInfo.name)
            $('#barcodeExam').html('<img src="data:image/png;base64,'+response.barcodeEx+'" alt="barcode" />')
            $('#barcodeForm').val(response.barInfo.form).selectpicker('refresh')
            $('#barcodeSize').val(response.barInfo.size)
            $('#barcodeHeigh').val(response.barInfo.height)
            $('#barcodeDisCol').val(response.barInfo.dis_column)
            $('#barcodeDisRow').val(response.barInfo.dis_row)
            response.barInfo.product_name == 1 ? $('#showName').prop('checked',true) : '';
            response.barInfo.product_price == 1 ? $('#showPrice').prop('checked',true) : '';
            response.editBar == 'disabled' ? $('#submitBar').attr('disabled', true) : $('#submitBar').removeAttr('disabled')
            $('#barcodeCFModal').modal('show')
        },
        error: function (err) {
            console.log(err.responseText);
        }
    })
}
function deleteData(id){
    url = route_index+'/'+id+'/destroy';
    deleteAll(id, url, table);
}
</script>
@endsection