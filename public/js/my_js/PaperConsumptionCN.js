function GetCurrentFYPaperDataCN() {
    $.ajax({
        url: 'get_current_paper_data_cn',
        method: 'get',
        dataType: 'json',
        data: {
            fiscal_year: $('#selFiscalYearPaperCN').val()
        },
        success: function (response) {
            var currentYear = Number(response['currentYear']);
            var nextYear = currentYear + 1;

            var data = response['result'];
            // console.log(data);
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
            // console.log(targets);

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
                        aprilTarget = data[datas.findIndex(checkMonth)].target;

                         $('.april-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE april');
                        $('.april-paper-cn-current-fy-target').html('-');
                     }

                     var aprilActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF april');
                        aprilActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilCummulative = sumTarget - aprilTarget + aprilActual;

                        var aprilDifference = aprilTarget - aprilActual;

                        $('.april-paper-cn-actual-target').html(aprilDifference);
                        $('.april-paper-cn-tricolor').html(aprilCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.april-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE april');
                        $('.april-paper-cn-tricolor').html('-');
                        $('.april-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE april');
                    $('.april-paper-cn-current-fy-target').html('-');
                    $('.april-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE april');
                $('.april-paper-cn-tricolor').html('-');
                $('.april-paper-cn-current-fy-target').html('-');
                $('.april-paper-cn-current-fy-actual').html('-');
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

                         $('.may-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE may');
                        $('.may-paper-cn-current-fy-target').html('-');
                     }

                     var mayActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF may');
                        mayActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayTarget = aprilTarget + mayTarget;
                        var aprilMayActual = aprilActual + mayActual;

                        var mayCummulative = sumTarget - aprilMayTarget + aprilMayActual;

                        var mayDifference = mayTarget - mayActual;

                        $('.may-paper-cn-actual-target').html(mayDifference);
                        $('.may-paper-cn-tricolor').html(mayCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.may-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE may');
                        $('.may-paper-cn-tricolor').html('-');
                        $('.may-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE may');
                    $('.may-paper-cn-current-fy-target').html('-');
                    $('.may-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE may');
                $('.may-paper-cn-current-fy-target').html('-');
                $('.may-paper-cn-tricolor').html('-');
                $('.may-paper-cn-current-fy-actual').html('-');
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
                         $('.june-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE june');
                        $('.june-paper-cn-current-fy-target').html('-');
                     }

                     var juneActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF june');
                        juneActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneTarget = aprilMayTarget + juneTarget;
                        var aprilMayJuneActual = aprilMayActual + juneActual;

                        var juneCummulative = sumTarget - aprilMayJuneTarget + aprilMayJuneActual;

                        var juneDifference = juneTarget - juneActual;

                        $('.june-paper-cn-actual-target').html(juneDifference);
                        $('.june-paper-cn-tricolor').html(juneCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.june-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE june');
                        $('.june-paper-cn-tricolor').html('-');
                        $('.june-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE june');
                    $('.june-paper-cn-current-fy-target').html('-');
                    $('.june-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE june');
                $('.june-paper-cn-tricolor').html('-');
                $('.june-paper-cn-current-fy-target').html('-');
                $('.june-paper-cn-current-fy-actual').html('-');
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

                         $('.july-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE july');
                        $('.july-paper-cn-current-fy-target').html('-');
                     }

                     var julyActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF july');

                        julyActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyTarget = aprilMayJuneTarget + julyTarget;
                        var aprilMayJuneJulyActual = aprilMayJuneActual + julyActual;

                        var julyCummulative = sumTarget - aprilMayJuneJulyTarget + aprilMayJuneJulyActual;

                        var julyDifference = julyTarget - julyActual;
                                    
                        $('.july-paper-cn-actual-target').html(julyDifference);
                        $('.july-paper-cn-tricolor').html(julyCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.july-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE july');
                        $('.july-paper-cn-tricolor').html('-');
                        $('.july-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE july');
                    $('.july-paper-cn-current-fy-target').html('-');
                    $('.july-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE july');
                $('.july-paper-cn-tricolor').html('-');
                $('.july-paper-cn-current-fy-target').html('-');
                $('.july-paper-cn-current-fy-actual').html('-');
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

                        augustTarget = data[datas.findIndex(checkMonth)].target;

                         $('.august-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE august');
                        $('.august-paper-cn-current-fy-target').html('-');
                     }

                     var augustActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF august');

                        augustActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustTarget = aprilMayJuneJulyTarget + augustTarget;
                        var aprilMayJuneJulyAugustActual = aprilMayJuneJulyActual + augustActual;
                        
                        var augustCummulative = sumTarget - aprilMayJuneJulyAugustTarget + aprilMayJuneJulyAugustActual;

                        var augustDifference = augustTarget - augustActual;

                        $('.august-paper-cn-actual-target').html(augustDifference);
                        $('.august-paper-cn-tricolor').html(augustCummulative);


                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.august-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE august');
                        $('.august-paper-cn-actual-target').html('-');
                        $('.august-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE august');
                    $('.august-paper-cn-current-fy-target').html('-');
                    $('.august-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE august');
                $('.august-paper-cn-current-fy-target').html('-');
                $('.august-paper-cn-current-fy-actual').html('-');
                $('.august-paper-cn-actual-target').html('-');
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
                         $('.september-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE september');
                        $('.september-paper-cn-current-fy-target').html('-');
                     }

                     var septemberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF september');

                        septemberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberTarget = aprilMayJuneJulyAugustTarget + septemberTarget;
                        var aprilMayJuneJulyAugustSeptemberActual = aprilMayJuneJulyAugustActual + septemberActual;

                        var septemberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberTarget + aprilMayJuneJulyAugustSeptemberActual;

                        var septemberDifference = septemberTarget - septemberActual;

                        $('.september-paper-cn-actual-target').html(septemberDifference);
                        $('.september-paper-cn-tricolor').html(septemberCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.september-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE september');
                        $('.september-paper-cn-tricolor').html('-');
                        $('.september-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE september');
                    $('.september-paper-cn-current-fy-target').html('-');
                    $('.september-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE september');
                $('.september-paper-cn-tricolor').html('-');
                $('.september-paper-cn-current-fy-target').html('-');
                $('.september-paper-cn-current-fy-actual').html('-');
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

                         $('.october-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE october');
                        $('.october-paper-cn-current-fy-target').html('-');
                     }

                     var octoberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF october');

                        octoberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberTarget = aprilMayJuneJulyAugustSeptemberTarget + octoberTarget; 
                        var aprilMayJuneJulyAugustSeptemberOctoberActual = aprilMayJuneJulyAugustSeptemberActual + octoberActual; 

                        var octoberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberTarget + aprilMayJuneJulyAugustSeptemberOctoberActual;

                        var octoberDifference = octoberTarget - octoberActual;

                        $('.october-paper-cn-actual-target').html(octoberDifference);
                        $('.october-paper-cn-tricolor').html(octoberCummulative);
                        
                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.october-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE october');
                        $('.october-paper-cn-tricolor').html('-');
                        $('.october-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE october');
                    $('.october-paper-cn-current-fy-target').html('-');
                    $('.october-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE october');
                $('.october-paper-cn-tricolor').html('-');
                $('.october-paper-cn-current-fy-target').html('-');
                $('.october-paper-cn-current-fy-actual').html('-');
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
                         $('.november-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE november');
                        $('.november-paper-cn-current-fy-target').html('-');
                     }

                     var novemberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF november');

                        novemberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget = aprilMayJuneJulyAugustSeptemberOctoberTarget + novemberTarget;
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberActual = aprilMayJuneJulyAugustSeptemberOctoberActual + novemberActual;

                        var novemberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberActual;

                        var novemberDifference = novemberTarget - novemberActual;

                        $('.november-paper-cn-actual-target').html(novemberDifference);
                        $('.november-paper-cn-tricolor').html(novemberCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.november-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE november');
                        $('.november-paper-cn-tricolor').html('-');
                        $('.november-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE november');
                    $('.november-paper-cn-current-fy-target').html('-');
                    $('.november-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE november');
                $('.november-paper-cn-tricolor').html('-');
                $('.november-paper-cn-current-fy-target').html('-');
                $('.november-paper-cn-current-fy-actual').html('-');
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
                         $('.december-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE december');
                        $('.december-paper-cn-current-fy-target').html('-');
                     }

                     var decemberActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF december');

                        decemberActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget + decemberTarget;
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberActual + decemberActual;

                        var decemberCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual;

                        var decemberDifference = decemberTarget - decemberActual;

                        $('.december-paper-cn-actual-target').html(decemberDifference);
                        $('.december-paper-cn-tricolor').html(decemberCummulative);

                    

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.december-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE december');
                        $('.december-paper-cn-tricolor').html('-');
                        $('.december-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE december');
                    $('.december-paper-cn-current-fy-target').html('-');
                    $('.december-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE december');
                $('.december-paper-cn-tricolor').html('-');
                $('.december-paper-cn-current-fy-target').html('-');
                $('.december-paper-cn-current-fy-actual').html('-');
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
                         $('.january-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE January');
                        $('.january-paper-cn-current-fy-target').html('-');
                     }

                     var januaryActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF January');

                        januaryActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget + januaryTarget;
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual + januaryActual;

                        var januaryCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual;

                        var januaryDifference = januaryTarget - januaryActual;

                        console.log(januaryActual);
 
                        $('.january-paper-cn-actual-target').html(januaryDifference);
                        $('.january-paper-cn-tricolor').html(januaryCummulative);

                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.january-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE January');
                        $('.january-paper-cn-tricolor').html('-');
                        $('.january-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE January');
                    $('.january-paper-cn-current-fy-target').html('-');
                    $('.january-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE January');
                $('.january-paper-cn-tricolor').html('-');
                $('.january-paper-cn-current-fy-target').html('-');
                $('.january-paper-cn-current-fy-actual').html('-');
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
                         $('.february-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE february');
                        $('.february-paper-cn-current-fy-target').html('-');
                     }

                     var februaryActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF february');

                        februaryActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget + februaryTarget;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual + februaryActual;

                        var februaryCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual;

                        var februaryDifference = februaryTarget - februaryActual;

                        $('.february-paper-cn-actual-target').html(februaryDifference);
                        $('.february-paper-cn-tricolor').html(februaryCummulative);
                        
                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.february-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE february');
                        $('.february-paper-cn-tricolor').html('-');
                        $('.february-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE february');
                    $('.february-paper-cn-current-fy-target').html('-');
                    $('.february-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE february');
                $('.february-paper-cn-tricolor').html('-');
                $('.february-paper-cn-current-fy-target').html('-');
                $('.february-paper-cn-current-fy-actual').html('-');
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
                         $('.march-paper-cn-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE march');
                        $('.march-paper-cn-current-fy-targe1.22t').html('-');
                     }

                     var marchActual = 0;
                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF march');

                        marchActual = data[datas.findIndex(checkMonth)].actual;

                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget + marchTarget;
                        
                        var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual = aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual + marchActual;

                        var marchCummulative = sumTarget - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual;

                        var marchDifference = marchTarget - marchActual;
                        
                        $('.march-paper-cn-actual-target').html(marchDifference);
                        $('.march-paper-cn-tricolor').html(marchCummulative);


                        var icon = '';
                        if(data[datas.findIndex(checkMonth)].target > data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target == data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (data[datas.findIndex(checkMonth)].target < data[datas.findIndex(checkMonth)].actual) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                         $('.march-paper-cn-current-fy-actual').html(data[datas.findIndex(checkMonth)].actual + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                     } else {
                        // console.log('Fourth ELSE march');
                        $('.march-paper-cn-tricolor').html('-');
                        $('.march-paper-cn-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE march');
                    $('.march-paper-cn-current-fy-target').html('-');
                    $('.march-paper-cn-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE march');
                $('.march-paper-cn-tricolor').html('-');
                $('.march-paper-cn-current-fy-target').html('-');
                $('.march-paper-cn-current-fy-actual').html('-');
            }
            //===== DATA FOR MARCH --- DASHBOARD =======//

            
            if(sumTarget != 0 && sumTarget != null) {
                $('.total-paper-cn-current-fy-target').html(sumTarget);
            } else {
                $('.total-paper-cn-current-fy-target').html('-');
            }


            var sumActual = actuals.reduce(function(a, b){
                return a + b;
            }, 0);

            if(sumActual != 0 && sumActual != null) {
                $('.total-paper-cn-current-fy-actual').html(sumActual);
            } else {
                $('.total-paper-cn-current-fy-actual').html('-');
            }

            var difference = sumTarget - sumActual;

            $('.total-paper-cn-actual-target').html(difference);
            $('.total-paper-cn-tricolor').html(difference);

            $('.april-paper-cn-current-fy').html('April ' + currentYear);
            $('.may-paper-cn-current-fy').html('May ' + currentYear);
            $('.june-paper-cn-current-fy').html('June ' + currentYear);
            $('.july-paper-cn-current-fy').html('July ' + currentYear);
            $('.august-paper-cn-current-fy').html('August ' + currentYear);
            $('.september-paper-cn-current-fy').html('September ' + currentYear);
            $('.october-paper-cn-current-fy').html('October ' + currentYear);
            $('.november-paper-cn-current-fy').html('November ' + currentYear);
            $('.december-paper-cn-current-fy').html('December ' + currentYear);
            $('.january-paper-cn-current-fy').html('January ' + nextYear);
            $('.february-paper-cn-current-fy').html('February ' + nextYear);
            $('.march-paper-cn-current-fy').html('March ' + nextYear);
        }
    });
}
