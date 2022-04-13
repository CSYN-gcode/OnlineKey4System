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
            // console.log(datas);
            //===== DATA FOR JANUARY --- DASHBOARD =======//
            if(jQuery.inArray(1, datas) != -1) {
                // console.log('First IF January');
                const checkMonth = (element) => element == 1;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF January');

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                         $('.january-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE January');
                        $('.january-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF January');
            
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
                        // console.log('Fourth ELSE January');

                        $('.january-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE January');
                    $('.january-paper-pps-current-fy-target').html('-');
                    $('.january-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE January');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF february');
                         $('.february-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE february');
                        $('.february-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF february');
            
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

                        $('.february-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE february');
                    $('.february-paper-pps-current-fy-target').html('-');
                    $('.february-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE february');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF march');
                         $('.march-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE march');
                        $('.march-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF march');
            
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

                        $('.march-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE march');
                    $('.march-paper-pps-current-fy-target').html('-');
                    $('.march-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE march');
                $('.march-paper-pps-current-fy-target').html('-');
                $('.march-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR MARCH --- DASHBOARD =======//

            //===== DATA FOR APRIL --- DASHBOARD =======//
            if(jQuery.inArray(4, datas) != -1) {
                // console.log('First IF april');
                const checkMonth = (element) => element == 4;

                 if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF april');

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF april');
                         $('.april-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE april');
                        $('.april-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF april');
            
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

                        $('.april-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE april');
                    $('.april-paper-pps-current-fy-target').html('-');
                    $('.april-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE april');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF may');
                         $('.may-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE may');
                        $('.may-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF may');
            
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

                        $('.may-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE may');
                    $('.may-paper-pps-current-fy-target').html('-');
                    $('.may-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE may');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF june');
                         $('.june-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE june');
                        $('.june-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF june');
            
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

                        $('.june-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE june');
                    $('.june-paper-pps-current-fy-target').html('-');
                    $('.june-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE june');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF july');
                         $('.july-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE july');
                        $('.july-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF july');
            
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

                        $('.july-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE july');
                    $('.july-paper-pps-current-fy-target').html('-');
                    $('.july-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE july');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF august');
                         $('.august-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE august');
                        $('.august-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF august');
            
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

                        $('.august-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE august');
                    $('.august-paper-pps-current-fy-target').html('-');
                    $('.august-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE august');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF september');
                         $('.september-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE september');
                        $('.september-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF september');
            
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

                        $('.september-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE september');
                    $('.september-paper-pps-current-fy-target').html('-');
                    $('.september-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE september');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF october');
                         $('.october-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE october');
                        $('.october-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF october');
            
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

                        $('.october-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE october');
                    $('.october-paper-pps-current-fy-target').html('-');
                    $('.october-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE october');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF november');
                         $('.november-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE november');
                        $('.november-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF november');
            
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

                        $('.november-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE november');
                    $('.november-paper-pps-current-fy-target').html('-');
                    $('.november-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE november');
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

                     if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF december');
                         $('.december-paper-pps-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                     } else {
                        // console.log('Third ELSE december');
                        $('.december-paper-pps-current-fy-target').html('-');
                     }

                     if(data[datas.findIndex(checkMonth)].actual != null) {
                        // console.log('Fourth IF december');
            
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

                        $('.december-paper-pps-current-fy-actual').html('-');
                     }

                } else {
                    // console.log('Second ELSE december');
                    $('.december-paper-pps-current-fy-target').html('-');
                    $('.december-paper-pps-current-fy-actual').html('-');
                }
            } else {
                // console.log('First ELSE december');
                $('.december-paper-pps-current-fy-target').html('-');
                $('.december-paper-pps-current-fy-actual').html('-');
            }
            //===== DATA FOR DECEMBER --- DASHBOARD =======//

            var sumTarget = targets.reduce(function(a, b){
                return a + b;
            }, 0);

            if(sumTarget != 0 && sumTarget != null) {
                $('.total-paper-pps-current-fy-target').html(sumTarget); 
            } else {
                $('.total-paper-pps-current-fy-target').html('-'); 
            }

            var sumActual = actuals.reduce(function(a, b){
                return a + b;
            }, 0);

            if(sumActual != 0 && sumActual != null) {
                $('.total-paper-pps-current-fy-actual').html(sumActual); 
            } else {
                $('.total-paper-pps-current-fy-actual').html('-'); 
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