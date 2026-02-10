function GetFiscalYear() {
    $.ajax({
        url: "get_fiscal_year",
        method: "get",
        dataType: "json",
        success: function (response) {
            var fiscalYear = response['fiscal_year'];
            if (fiscalYear > 0) {
                $('#fiscalYearId').val(fiscalYear);
                $('#txtFiscalYearId').val(fiscalYear);
                $('#fiscalYearIdSemiAdmin').val(fiscalYear);
                $('#txtFiscalYearIdSemiAdmin').val(fiscalYear);
            }
            else {
                $('#fiscalYearId').val(0);
                $('#txtFiscalYearId').val(0);
                $('#fiscalYearIdSemiAdmin').val(0);
                $('#txtFiscalYearIdSemiAdmin').val(0);
            }
        }
    });
}

function TransitionFY() {
    $.ajax({
        url: "transition_fy",
        method: "get",
        dataType: "json",
    });   
}

function GetCurrentFiscalYear() {
    $.ajax({
        url: "get_current_fy",
        method: "get",
        dataType: "json",
        success: function (response) {
            var fiscalYear = response['fiscal_year'];
            var monthNow = response['current_month'];
            if (fiscalYear > 0) {
                $('#fiscalYear').html('FY: ' + fiscalYear);
                $('#month').html('Current Month: ' + monthNow)
            }
            else {
                $('#fiscalYear').html('');
            }
        }
    });   
}