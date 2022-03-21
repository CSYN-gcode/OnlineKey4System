// Reset Form values function
function resetFormValues() {
    // Reset values
    // $("#formAddEnergyTarget")[0].reset();
    $('select[name="month"]', $("#formAddEnergyTarget")).val(0).trigger('change');
    $('input[name="energy_target"]', $("#formAddEnergyTarget")).val(0);
    

    // $('select[name="customer"]', $("#formAddCustomerClaim")).val(0).trigger('change');
    // $('select[name="sender_name"]', $("#formAddCustomerClaim")).val(0).trigger('change');
    // $('select[name="contributor"]', $("#formAddCustomerClaim")).val(0).trigger('change');
    // $('select[name="validity"]', $("#formAddCustomerClaim")).val(0).trigger('change');
    // $('select[name="product_classification"]', $("#formAddCustomerClaim")).val(0).trigger('change');
    // $('select[name="automotive"]', $("#formAddCustomerClaim")).val(0).trigger('change');
    // $('select[name="defect_category_class"]', $("#formAddCustomerClaim")).val(0).trigger('change');

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    // $("div").find('input[type="date"]').attr('title', '');

    // $('#chkActualDateReceivedClaim').attr('checked', false);
    // $('#txtAddActualDateReceivedOfClaim').attr('disabled', true);
    // $('#chkdateReturnClaim').attr('checked', false);
    // $('#txtAddDateReturnOfClaimSample').attr('disabled', true);
}

// Reset values when modal(Modal) is closed
$("#modalEnergyTarget").on('hidden.bs.modal', function () {
    resetFormValues();
});


function resetWaterFormValues() {
    $('select[name="month"]', $("#formAddWaterTarget")).val(0).trigger('change');
    $('select[name="factory"]', $("#formAddWaterTarget")).val(0).trigger('change');
    $('input[name="water_target"]', $("#formAddWaterTarget")).val(0);

    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
}

// $("#modalWaterTarget").on('hidden.bs.modal', function () {
    
//     resetWaterFormValues();
// });
