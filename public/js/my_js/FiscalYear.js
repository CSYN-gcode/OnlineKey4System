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
                // $('#selFiscalYearEnergy').val(fiscalYear);

                // $('#fiscalYearId').val(fiscalYear);
                // $('#txtFiscalYearId').val(fiscalYear);
            }
            else {
                $('#fiscalYearId').val(0);
            }
        }
    });
}