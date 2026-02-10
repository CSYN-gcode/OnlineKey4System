function GetPastFy(cboElement){
    let result = '<option value="0" selected disabled> -- Select Fiscal Year -- </option>';
    $.ajax({
        url: 'get_past_fy',
        method: 'get',
        dataType: 'json',
        beforeSend: function(){
            result = '<option value="0" selected disabled> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function(response){
            result = '';
            if(response['past_fiscal_year'].length > 0){ // true
                result = '<option value="0" selected disabled> Select Fiscal Year </option>';
                for(let index = 0; index < response['past_fiscal_year'].length; index++){
                    result += '<option value="' + response['past_fiscal_year'][index].id + '">' + response['past_fiscal_year'][index].fiscal_year + '</option>';
                }
            }
            else{
                result = '<option value="0" selected disabled> No record found </option>';
            }
            cboElement.html(result);
        }
    });
}


//============================== ADD USER ==============================
function SelectPastfy(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };
   
	$.ajax({
        url: "past_fy_export",
        method: "get",
        data: $('#formExportPastFy').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnDownloadPastFyIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnPastFy").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving user failed!');
                
                if(response['error']['past_fy_id'] === undefined){
                    $("#selPastFy").removeClass('is-invalid');
                    $("#selPastFy").attr('title', '');
                }
                else{
                    $("#selPastFy").addClass('is-invalid');
                    $("#selPastFy").attr('title', response['error']['past_fy_id']);
                }
            }
            else
            //  if(response['result'] == 1)
             {
                $("#modalpastfy").modal('hide');
                $("#formExportPastFy")[0].reset();
                $("#selPastFy").select2('val', '0');
                toastr.success('Succesfull!');
                // dataTableUsers.draw(); // reload the tables after insertion
            }

            $("#iBtnDownloadPastFyIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnPastFy").removeAttr('disabled');
            $("#iBtnDownloadPastFyIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnDownloadPastFyIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnPastFy").removeAttr('disabled');
            $("#iBtnDownloadPastFyIcon").addClass('fa fa-check');
        }
    });
}