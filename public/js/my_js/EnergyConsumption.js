// function AddEnergyConsumptionTarget() {
//     toastr.options = {
//         "closeButton": false,
//         "debug": false,
//         "newestOnTop": true,
//         "progressBar": true,
//         "positionClass": "toast-top-right",
//         "preventDuplicates": false,
//         "onclick": null,
//         "showDuration": "300",
//         "hideDuration": "3000",
//         "timeOut": "3000",
//         "extendedTimeOut": "3000",
//         "showEasing": "swing",
//         "hideEasing": "linear",
//         "showMethod": "fadeIn",
//         "hideMethod": "fadeOut",
//     };

//     $.ajax({
//         url: "insert_energy_target",
//         method: "post",
//         data: $('#formAddEnergyTarget').serialize(),
//         dataType: "json",
//         beforeSend: function () {
//             $("#iBtnAddEnergyTargetIcon").addClass('fa fa-spinner fa-pulse');
//             $("#btnAddEnergyTarget").prop('disabled', 'disabled');
//         },
//         success: function (response) {
//             if (response['validation'] == 'hasError') {
//                 toastr.error('Saving failed!');
//                 if (response['error']['month'] === undefined) {
//                     $("#txtSelectAddMonth").removeClass('is-invalid');
//                     $("#txtSelectAddMonth").attr('title', '');
//                 }
//                 else {
//                     $("#txtSelectAddMonth").addClass('is-invalid');
//                     $("#txtSelectAddMonth").attr('title', response['error']['month']);
//                 }

//                 if (response['error']['energy_target'] === undefined) {
//                     $("#txtAddEnergyTarget").removeClass('is-invalid');
//                     $("#txtAddEnergyTarget").attr('title', '');
//                 }
//                 else {
//                     $("#txtAddEnergyTarget").addClass('is-invalid');
//                     $("#txtAddEnergyTarget").attr('title', response['error']['energy_target']);
//                 }
//             } else if (response['result'] == 1) {
//                 $("#modalEnergyTarget").modal('hide');

//                 dataTableEnergyConsumptions.draw(); // reload the tables after insertion
//                 toastr.success('Save success!');
//             }
//             else if (response['result'] == 2) {
//                 toastr.warning('You already have a record for this month, please edit');
//                 // dataTableUsers.draw(); // reload the tables after insertion
//             }

//             $("#iBtnAddEnergyTargetIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnAddEnergyTarget").removeAttr('disabled');
//             $("#iBtnAddEnergyTargetIcon").addClass('fa fa-check');
//         },
//         error: function (data, xhr, status) {
//             toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//             $("#iBtnAddEnergyTargetIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnAddEnergyTarget").removeAttr('disabled');
//             $("#iBtnAddEnergyTargetIcon").addClass('fa fa-check');
//         }
//     });
// }

