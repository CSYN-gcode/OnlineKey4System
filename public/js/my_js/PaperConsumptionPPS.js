function GetCurrentFYPaperDataPPS() {
    $.ajax({
        url: 'get_current_paper_data_pps',
        method: 'get',
        dataType: 'json',
        data: {
            fiscal_year: $('#selFiscalYearPaperPPS').val()
        },
        success: function (response) {
            var currentYear = Number(response['currentYear']);
            var nextYear = currentYear + 1;

            var data = response['result'];
            console.log('gg');
            var datas = [];
            var targets = [];
            var actuals = [];
            for(var x = 0; x < data.length; x++) {
                monthData = data[x].month;
                targetData = data[x].target;
                actualData = data[x].actual;

                datas.push(monthData);
                targets.push(targetData);
                actuals.push(actualData);
            }
      
            var sumTarget = targets.reduce(function(a, b){
                return a + b;
            }, 0);


            //===== DATA FOR APRIL --- DASHBOARD =======//
            if(jQuery.inArray(4, datas) != -1) {
                // console.log('First IF april');
                const checkMonth = (element) => element == 4;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF april');

                    var aprilTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF april');
                         $('.april-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);

                         aprilTarget = data[datas.findIndex(checkMonth)].target;
                     } else {
                        // console.log('Third ELSE april');
                        $('.april-paper-pps-current-fy-target').html('-');
                     }

                     var aprilActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF april');
            
                        aprilActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilCummulative = sumTarget - aprilTarget + aprilActual;
                        var aprilCummulative = aprilCummulative.toFixed(2);
                        
                        var aprilDifference = aprilTarget - aprilActual;
                        var aprilDifference = aprilDifference.toFixed(2);

                        $('.april-paper-pps-actual-target').html(aprilDifference);
                        
                        $('.april-paper-pps-tricolor').html(aprilCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.april-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE april');
                        $('.april-paper-pps-tricolor').html('-');
                        $('.april-paper-pps-current-fy-actual').html('-');
                     }
                } else {
                    // console.log('Second ELSE april');
                    // $('.april-paper-pps-actual-target').html('-');
                    $('.april-paper-pps-current-fy-target').html('-');
                    $('.april-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE april');
                $('.april-paper-pps-actual-target').html('-');
                $('.april-paper-pps-tricolor').html('-');
                $('.april-paper-pps-current-fy-target').html('-');
                $('.april-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR APRIL --- DASHBOARD =======//
        
            //===== DATA FOR MAY --- DASHBOARD =======//
            if(jQuery.inArray(5, datas) != -1) {
                // console.log('First IF may');
                const checkMonth = (element) => element == 5;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF may');

                    var mayTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF may');

                        mayTarget = data[datas.findIndex(checkMonth)].target;

                         $('.may-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE may');
                        $('.may-paper-pps-current-fy-target').html('-');
                     }

                     var mayActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF may');
            
                        mayActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayTarget = aprilTarget + mayTarget;
                        var aprilMayActual = aprilActual + mayActual;

                        var mayCummulative = sumTarget - aprilMayTarget + aprilMayActual;
                        var mayCummulative = mayCummulative.toFixed(2);
                       
                        var mayDifference = mayTarget - mayActual;
                        var mayDifference = mayDifference.toFixed(2);

                        $('.may-paper-pps-actual-target').html(mayDifference);
                        $('.may-paper-pps-tricolor').html(mayCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.may-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE may');
                        $('.may-paper-pps-tricolor').html('-');
                        $('.may-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE may');
                    $('.may-paper-pps-current-fy-target').html('-');
                    $('.may-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE may');
                $('.may-paper-pps-actual-target').html('-');
                $('.may-paper-pps-tricolor').html('-');
                $('.may-paper-pps-current-fy-target').html('-');
                $('.may-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR MAY --- DASHBOARD =======//

            //===== DATA FOR JUNE --- DASHBOARD =======//
            if(jQuery.inArray(6, datas) != -1) {
                // console.log('First IF june');
                const checkMonth = (element) => element == 6;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF june');

                    var juneTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF june');
                        juneTarget = data[datas.findIndex(checkMonth)].target;

                         $('.june-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE june');
                        $('.june-paper-pps-current-fy-target').html('-');
                     }

                     var juneActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF june');
                        
                        juneActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneTarget = aprilMayTarget + juneTarget;
                        var aprilMayJuneActual = aprilMayActual + juneActual;

                        var juneCummulative = sumTarget - aprilMayJuneTarget + aprilMayJuneActual;
                        var juneCummulative = juneCummulative.toFixed(2);

                        var juneDifference = juneTarget - juneActual;
                        var juneDifference = juneDifference.toFixed(2);

                        $('.june-paper-pps-actual-target').html(juneDifference);
                        $('.june-paper-pps-tricolor').html(juneCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.june-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE june');
                        $('.june-paper-pps-tricolor').html('-');
                        $('.june-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE june');
                    $('.june-paper-pps-current-fy-target').html('-');
                    $('.june-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE june');
                $('.june-paper-pps-actual-target').html('-');
                $('.june-paper-pps-tricolor').html('-');
                $('.june-paper-pps-current-fy-target').html('-');
                $('.june-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR JUNE --- DASHBOARD =======//

            //===== DATA FOR JULY --- DASHBOARD =======//
            if(jQuery.inArray(7, datas) != -1) {
                // console.log('First IF july');
                const checkMonth = (element) => element == 7;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF july');

                    var julyTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF july');
                        julyTarget = data[datas.findIndex(checkMonth)].target;

                         $('.july-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE july');
                        $('.july-paper-pps-current-fy-target').html('-');
                     }

                     var julyActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF july');
            
                        julyActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyTarget = aprilMayJuneTarget + julyTarget;
                        var aprilMayJuneJulyActual = aprilMayJuneActual + julyActual;

                        var julyCummulative = sumTarget - aprilMayJuneJulyTarget + aprilMayJuneJulyActual;
                        var julyCummulative = julyCummulative.toFixed(2);

                        var julyDifference = julyTarget - julyActual;
                        var julyDifference = julyDifference.toFixed(2);

                        $('.july-paper-pps-actual-target').html(julyDifference);
                        $('.july-paper-pps-tricolor').html(julyCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.july-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE july');
                        $('.july-paper-pps-tricolor').html('-');
                        $('.july-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE july');
                    $('.july-paper-pps-current-fy-target').html('-');
                    $('.july-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE july');
                $('.july-paper-pps-actual-target').html('-');
                $('.july-paper-pps-tricolor').html('-');
                $('.july-paper-pps-current-fy-target').html('-');
                $('.july-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR JULY --- DASHBOARD =======//

            //===== DATA FOR AUGUST --- DASHBOARD =======//
            if(jQuery.inArray(8, datas) != -1) {
                // console.log('First IF august');
                const checkMonth = (element) => element == 8;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF august');

                    var augustTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF august');

                        augustTarget = data[datas.findIndex(checkMonth)].target

                         $('.august-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE august');
                        $('.august-paper-pps-current-fy-target').html('-');
                     }

                     var augustActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF august');
            
                        augustActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustTarget = aprilMayJuneJulyTarget + augustTarget;
                        var aprilMayJuneJulyAugustActual = aprilMayJuneJulyActual + augustActual;
                        
                        var augustCummulative = sumTarget - aprilMayJuneJulyAugustTarget + aprilMayJuneJulyAugustActual;
                        var augustCummulative = augustCummulative.toFixed(2);

                        var augustDifference = augustTarget - augustActual;
                        var augustDifference = augustDifference.toFixed(2);

                        $('.august-paper-pps-actual-target').html(augustDifference);
                        $('.august-paper-pps-tricolor').html(augustCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.august-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE august');
                        $('.august-paper-pps-tricolor').html('-');
                        $('.august-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE august');
                    $('.august-paper-pps-current-fy-target').html('-');
                    $('.august-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE august');
                $('.august-paper-pps-actual-target').html('-');
                $('.august-paper-pps-tricolor').html('-');
                $('.august-paper-pps-current-fy-target').html('-');
                $('.august-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR AUGUST --- DASHBOARD =======//

            //===== DATA FOR SEPTEMBER --- DASHBOARD =======//
            if(jQuery.inArray(9, datas) != -1) {
                // console.log('First IF september');
                const checkMonth = (element) => element == 9;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF september');

                    var septemberTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF september');

                        septemberTarget = data[datas.findIndex(checkMonth)].target;

                         $('.september-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE september');
                        $('.september-paper-pps-current-fy-target').html('-');
                     }

                     var septemberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF september');
                        
                        septemberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberTarget = aprilMayJuneJulyAugustTarget + septemberTarget;
                        var aprilMayJuneJulyAugustSeptemberActual = aprilMayJuneJulyAugustActual + septemberActual;

                        var septemberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberTarget + aprilMayJuneJulyAugustSeptemberActual;
                        var septemberCummulative = septemberCummulative.toFixed(2);

                        var septemberDifference = septemberTarget - septemberActual;
                        var septemberDifference = septemberDifference.toFixed(2);

                        $('.september-paper-pps-actual-target').html(septemberDifference);
                        $('.september-paper-pps-tricolor').html(septemberCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.september-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE september');
                        $('.september-paper-pps-tricolor').html('-');
                        $('.september-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE september');
                    $('.september-paper-pps-current-fy-target').html('-');
                    $('.september-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE september');
                $('.september-paper-pps-actual-target').html('-');
                $('.september-paper-pps-tricolor').html('-');
                $('.september-paper-pps-current-fy-target').html('-');
                $('.september-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR SEPTEMBER --- DASHBOARD =======//

            //===== DATA FOR OCTOBER --- DASHBOARD =======//
            if(jQuery.inArray(10, datas) != -1) {
                // console.log('First IF october');
                const checkMonth = (element) => element == 10;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF october');

                    var octoberTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF october');

                        octoberTarget = data[datas.findIndex(checkMonth)].target;

                         $('.october-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE october');
                        $('.october-paper-pps-current-fy-target').html('-');
                     }

                     var octoberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF october');
                        
                        octoberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberTarget = aprilMayJuneJulyAugustSeptemberTarget + octoberTarget;
                        var aprilMayJuneJulyAugustSeptemberOctoberActual = aprilMayJuneJulyAugustSeptemberActual + octoberActual;

                        var octoberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberTarget + aprilMayJuneJulyAugustSeptemberOctoberActual;
                        var octoberCummulative = octoberCummulative.toFixed(2);

                        var octoberDifference = octoberTarget - octoberActual;
                        var octoberDifference = octoberDifference.toFixed(2);

                        $('.october-paper-pps-actual-target').html(octoberDifference);
                        $('.october-paper-pps-tricolor').html(octoberCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.october-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE october');
                        $('.october-paper-pps-tricolor').html('-');
                        $('.october-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE october');
                    $('.october-paper-pps-current-fy-target').html('-');
                    $('.october-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE october');
                $('.october-paper-pps-actual-target').html('-');
                $('.october-paper-pps-tricolor').html('-');
                $('.october-paper-pps-current-fy-target').html('-');
                $('.october-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR OCTOBER --- DASHBOARD =======//

            //===== DATA FOR NOVEMBER --- DASHBOARD =======//
            if(jQuery.inArray(11, datas) != -1) {
                // console.log('First IF november');
                const checkMonth = (element) => element == 11;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF november');

                    var novemberTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF november');
                        novemberTarget = data[datas.findIndex(checkMonth)].target;

                         $('.november-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE november');
                        $('.november-paper-pps-current-fy-target').html('-');
                     }

                     var novemberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF november');
                        novemberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget = aprilMayJuneJulyAugustSeptemberOctoberTarget + novemberTarget;
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberActual = aprilMayJuneJulyAugustSeptemberOctoberActual + novemberActual;

                        var novemberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberActual;
                        var novemberCummulative = novemberCummulative.toFixed(2);

                        var novemberDifference = novemberTarget - novemberActual;
                        var novemberDifference = novemberDifference.toFixed(2);

                        $('.november-paper-pps-actual-target').html(novemberDifference);
                        $('.november-paper-pps-tricolor').html(novemberCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.november-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE november');
                        $('.november-paper-pps-tricolor').html('-');
                        $('.november-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE november');
                    $('.november-paper-pps-current-fy-target').html('-');
                    $('.november-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE november');
                $('.november-paper-pps-actual-target').html('-');
                $('.november-paper-pps-tricolor').html('-');
                $('.november-paper-pps-current-fy-target').html('-');
                $('.november-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR NOVEMBER --- DASHBOARD =======//

            //===== DATA FOR DECEMBER --- DASHBOARD =======//
            if(jQuery.inArray(12, datas) != -1) {
                // console.log('First IF december');
                const checkMonth = (element) => element == 12;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF december');

                    var decemberTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF december');
                        decemberTarget = data[datas.findIndex(checkMonth)].target;

                         $('.december-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE december');
                        $('.december-paper-pps-current-fy-target').html('-');
                     }

                     var decemberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF december');
                        
                        decemberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget + decemberTarget; 
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberActual + decemberActual; 

                        var decemberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual;
                        var decemberCummulative = decemberCummulative.toFixed(2);
                        
                        var decemberDifference = decemberTarget - decemberActual;
                        var decemberDifference = decemberDifference.toFixed(2);

                        $('.december-paper-pps-actual-target').html(decemberDifference);
                        $('.december-paper-pps-tricolor').html(decemberCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.december-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE december');
                        $('.december-paper-pps-tricolor').html('-');
                        $('.december-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE december');
                    $('.december-paper-pps-current-fy-target').html('-');
                    $('.december-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE december');
                $('.december-paper-pps-actual-target').html('-');
                $('.december-paper-pps-tricolor').html('-');
                $('.december-paper-pps-current-fy-target').html('-');
                $('.december-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR DECEMBER --- DASHBOARD =======//


            //===== DATA FOR JANUARY --- DASHBOARD =======//
            if(jQuery.inArray(1, datas) != -1) {
                // console.log('First IF January');
                const checkMonth = (element) => element == 1;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF January');
                 
                    var januaryTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        januaryTarget = data[datas.findIndex(checkMonth)].target;

                        $('.january-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);

                            
                     } else {
                        // console.log('Third ELSE January');
                        $('.january-paper-pps-current-fy-target').html('-');
                     }

                    // console.log(januaryActual);

                    var januaryActual = 0;

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF January');
                        januaryActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget + januaryTarget;
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual + januaryActual;

                        var januaryCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual;
                        var januaryCummulative = januaryCummulative.toFixed(2);

                        var januaryDifference = januaryTarget - januaryActual;
                        var januaryDifference = januaryDifference.toFixed(2);

                        $('.january-paper-pps-actual-target').html(januaryDifference);

                        var checkCummulative = januaryCummulative;

                        checkCummulative =  checkCummulative.toString();

                        if(checkCummulative != 'NaN') {
                            // console.log('asd');
                            $('.january-paper-pps-tricolor').html(januaryCummulative);
                        } else {
                            // console.log('asda');
                            $('.january-paper-pps-tricolor').html('-');
                        }
                       
                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.january-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        $('.january-paper-pps-tricolor').html('-');
                        $('.january-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE January');
                    $('.january-paper-pps-current-fy-target').html('-');
                    $('.january-paper-pps-current-fy-actual').html('-');
                }
            } else {
                console.log('First ELSE January');
                $('.january-paper-pps-actual-target').html('-');
                $('.january-paper-pps-tricolor').html('-');
                $('.january-paper-pps-current-fy-target').html('-');
                $('.january-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR JANUARY --- DASHBOARD =======//

          


            //===== DATA FOR FEBRUARY --- DASHBOARD =======//
            if(jQuery.inArray(2, datas) != -1) {
                // console.log('First IF february');
                const checkMonth = (element) => element == 2;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF february');

                    var februaryTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF february');
                        februaryTarget = data[datas.findIndex(checkMonth)].target;
                        
                         $('.february-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE february');
                        $('.february-paper-pps-current-fy-target').html('-');
                       
                     }

                     var februaryActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF february');
            
                        februaryActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget + februaryTarget;
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual + februaryActual;
                        
                        var februaryCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual;
                        var februaryCummulative = februaryCummulative.toFixed(2);

                        var checkCummulative = februaryCummulative;

                        checkCummulative =  checkCummulative.toString();

                        var februaryDifference = februaryTarget - februaryActual;
                        var februaryDifference = februaryDifference.toFixed(2);

                        $('.february-paper-pps-actual-target').html(februaryDifference);

                        if(checkCummulative != 'NaN') {
                            // console.log('asd');
                            $('.february-paper-pps-tricolor').html(februaryCummulative);
                        } else {
                            // console.log('asda');
                            $('.february-paper-pps-tricolor').html('-');
                        }

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.february-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE february');
                        $('.february-paper-pps-tricolor').html('-');
                        $('.february-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE february');
                    $('.february-paper-pps-current-fy-target').html('-');
                    $('.february-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE february');
                $('.february-paper-pps-actual-target').html('-');
                $('.february-paper-pps-tricolor').html('-');
                $('.february-paper-pps-current-fy-target').html('-');
                $('.february-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR FEBRUARY --- DASHBOARD =======//

            //===== DATA FOR MARCH --- DASHBOARD =======//
            if(jQuery.inArray(3, datas) != -1) {
                // console.log('First IF march');
                const checkMonth = (element) => element == 3;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF march');

                    var marchTarget = 0;
                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF march');
                        marchTarget = data[datas.findIndex(checkMonth)].target;

                         $('.march-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE march');
                        $('.march-paper-pps-current-fy-target').html('-');
                     }

                     var marchActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF march');
                        marchActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget + marchTarget;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual + marchActual;

                        var marchCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual;
                        var marchCummulative = marchCummulative.toFixed(2);

                        var checkCummulative = marchCummulative;

                        checkCummulative =  checkCummulative.toString();


                        var marchDifference = marchTarget - marchActual;
                        var marchDifference = marchDifference.toFixed(2);
                        
                        $('.march-paper-pps-actual-target').html(marchDifference); 

                        if(checkCummulative != 'NaN') {
                            // console.log('asd');
                            $('.march-paper-pps-tricolor').html(marchCummulative);
                        } else {
                            // console.log('asda');
                            $('.march-paper-pps-tricolor').html('-');
                        }

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }
 
                         $('.march-paper-pps-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE march');
                        $('.march-paper-pps-tricolor').html('-');
                        $('.march-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE march');
                    $('.march-paper-pps-current-fy-target').html('-');
                    $('.march-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE march');
                $('.march-paper-pps-actual-target').html('-');
                $('.march-paper-pps-tricolor').html('-');
                $('.march-paper-pps-current-fy-target').html('-');
                $('.march-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR MARCH --- DASHBOARD =======//


            if(sumTarget != 0 && sumTarget != null) {
                var sumTarget = sumTarget.toFixed(2);
                $('.total-paper-pps-current-fy-target').html(sumTarget); 
            } else {
                $('.total-paper-pps-current-fy-target').html('-'); 
            }

            var sumActual = actuals.reduce(function(a, b){
                return a + b;
            }, 0);

            if(sumActual != 0 && sumActual != null) {
                var sumActual = sumActual.toFixed(2);
                $('.total-paper-pps-current-fy-actual').html(sumActual); 
            } else {
                $('.total-paper-pps-current-fy-actual').html('-'); 
            }

           var difference = sumTarget - sumActual;
           var difference = difference.toFixed(2);

           if(difference != 0) {
            $('.total-paper-pps-actual-target').html(difference);
            $('.total-paper-pps-tricolor').html(difference);
        } else {
            $('.total-paper-pps-actual-target').html('-');
            $('.total-paper-pps-tricolor').html('-');
            
        }

            $('.april-paper-pps-current-fy').html('April ' + currentYear);
            $('.may-paper-pps-current-fy').html('May ' + currentYear);
            $('.june-paper-pps-current-fy').html('June ' + currentYear);
            $('.july-paper-pps-current-fy').html('July ' + currentYear);
            $('.august-paper-pps-current-fy').html('August ' + currentYear);
            $('.september-paper-pps-current-fy').html('September ' + currentYear);
            $('.october-paper-pps-current-fy').html('October ' + currentYear);
            $('.november-paper-pps-current-fy').html('November ' + currentYear);
            $('.december-paper-pps-current-fy').html('December ' + currentYear);
            $('.january-paper-pps-current-fy').html('January ' + nextYear);
            $('.february-paper-pps-current-fy').html('February ' + nextYear);
            $('.march-paper-pps-current-fy').html('March ' + nextYear); 
        }
    });
}