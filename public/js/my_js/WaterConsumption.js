function GetCurrentFYWaterData() {
    $.ajax({
        type: "get",
        url: "get_current_water_data",
        data: {
            fiscal_year: $('#selFiscalYearWater').val()
        },
        dataType: "json",
        success: function (response) {
            var currentYear = Number(response['currentYear']);
            var nextYear = currentYear + 1;

            var data = response['result'];
            var datas = [];
            var targets = [];
            var factoryActual = [];
            // var factoryActual2 = [];
            var factoryManpower = [];
            // var factoryManpower2 = [];

            for(var x = 0; x < data.length; x++) {
                monthData = data[x].month;
                targetData = data[x].target;

               var factory1Actual = data[x].factory_1_actual;
               var factory2Actual = data[x].factory_2_actual;
               var factory1Manpower = data[x].factory_1_manpower;
               var factory2Manpower = data[x].factory_2_manpower;

                datas.push(monthData);
                targets.push(Number(targetData));
                factoryActual.push(Number(factory1Actual) + Number(factory2Actual));
                // // factoryActual2.push(factory2Actual);

                factoryManpower.push(Number(factory1Manpower) + Number(factory2Manpower));
                // // factoryManpower2.push(factory2Manpower);
            }

            // console.log(factoryActual);
            // console.log(factoryManpower);
            // console.log(factoryActual1);
            // console.log(targets);
            // console.log(datas);

            if(jQuery.inArray(1, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 1;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    
                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.january-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.january-water-current-fy-target').html('-');
                        $('.january-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.january-water-actual-target').html(difference);
                        } else {
                            $('.january-water-actual-target').html('-');
                        }


                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.january-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.january-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.january-water-current-fy-actual').html('-');
                        $('.january-water-actual-target').html('-');
                        $('.january-water-tricolor').html('-');
                    }
                } else {
                    // console.log('Second Else ');
                    $('.january-water-current-fy-target').html('-');
                    $('.january-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.january-water-current-fy-target').html('-');
                $('.january-water-actual-target').html('-');
                $('.january-water-current-fy-actual').html('-');
                $('.january-water-tricolor').html('-');
            }

            if(jQuery.inArray(2, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 2;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.february-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.february-water-current-fy-target').html('-');
                        $('.february-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.february-water-actual-target').html(difference);
                        } else {
                            $('.february-water-actual-target').html('-');
                        }

                        
                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.february-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.february-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.february-water-current-fy-actual').html('-');
                        $('.february-water-actual-target').html('-');
                        $('.february-water-tricolor').html('-');

                    }
                } else {
                    // console.log('Second Else ');
                    $('.february-water-current-fy-target').html('-');
                    $('.february-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.february-water-current-fy-target').html('-');
                $('.february-water-current-fy-actual').html('-');
                $('.february-water-actual-target').html('-');
                $('.february-water-tricolor').html('-');

            }

            if(jQuery.inArray(3, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 3;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.march-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.march-water-current-fy-target').html('-');
                        $('.march-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.march-water-actual-target').html(difference);
                        } else {
                            $('.march-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.march-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.march-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.march-water-current-fy-actual').html('-');
                        $('.march-water-actual-target').html('-');
                        $('.march-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.march-water-current-fy-target').html('-');
                    $('.march-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.march-water-current-fy-target').html('-');
                $('.march-water-current-fy-actual').html('-');
                $('.march-water-actual-target').html('-');
                $('.march-water-tricolor').html('-');

            }

            if(jQuery.inArray(4, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 4;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.april-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.april-water-current-fy-target').html('-');
                        $('.april-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.april-water-actual-target').html(difference);
                        } else {
                            $('.april-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.april-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.april-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.april-water-current-fy-actual').html('-');
                        $('.april-water-actual-target').html('-');
                        $('.april-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.april-water-current-fy-target').html('-');
                    $('.april-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.april-water-current-fy-target').html('-');
                $('.april-water-current-fy-actual').html('-');
                $('.april-water-actual-target').html('-');
                $('.april-water-tricolor').html('-');
            }

            if(jQuery.inArray(5, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 5;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.may-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.may-water-current-fy-target').html('-');
                        $('.may-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.may-water-actual-target').html(difference);
                        } else {
                            $('.may-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.may-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.may-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.may-water-current-fy-actual').html('-');
                        $('.may-water-actual-target').html('-');
                        $('.may-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.may-water-current-fy-target').html('-');
                    $('.may-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.may-water-current-fy-target').html('-');
                $('.may-water-current-fy-actual').html('-');
                $('.may-water-actual-target').html('-');
                $('.may-water-tricolor').html('-');
            }

            if(jQuery.inArray(6, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 6;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.june-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.june-water-current-fy-target').html('-');
                        $('.june-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.june-water-actual-target').html(difference);
                        } else {
                            $('.june-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.june-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.june-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.june-water-current-fy-actual').html('-');
                        $('.june-water-actual-target').html('-');
                        $('.june-water-tricolor').html('-');

                    }
                } else {
                    // console.log('Second Else ');
                    $('.june-water-current-fy-target').html('-');
                    $('.june-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.june-water-current-fy-target').html('-');
                $('.june-water-current-fy-actual').html('-');
                $('.june-water-actual-target').html('-');
                $('.june-water-tricolor').html('-');

            }

            if(jQuery.inArray(7, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 7;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.july-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.july-water-current-fy-target').html('-');
                        $('.july-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.july-water-actual-target').html(difference);
                        } else {
                            $('.july-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.july-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.july-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.july-water-current-fy-actual').html('-');
                        $('.july-water-actual-target').html('-');
                        $('.july-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.july-water-current-fy-target').html('-');
                    $('.july-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.july-water-current-fy-target').html('-');
                $('.july-water-current-fy-actual').html('-');
                $('.july-water-actual-target').html('-');
                $('.july-water-tricolor').html('-');
            }

            if(jQuery.inArray(8, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 8;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.august-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.august-water-current-fy-target').html('-');
                        $('.august-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.august-water-actual-target').html(difference);
                        } else {
                            $('.august-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.august-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.august-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.august-water-current-fy-actual').html('-');
                        $('.august-water-actual-target').html('-');
                        $('.august-water-tricolor').html('-');

                    }
                } else {
                    // console.log('Second Else ');
                    $('.august-water-current-fy-target').html('-');
                    $('.august-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.august-water-current-fy-target').html('-');
                $('.august-water-current-fy-actual').html('-');
                $('.august-water-actual-target').html('-');
                $('.august-water-tricolor').html('-');

            }

            if(jQuery.inArray(9, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 9;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.september-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.september-water-current-fy-target').html('-');
                        $('.september-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.september-water-actual-target').html(difference);
                        } else {
                            $('.september-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.september-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.september-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.september-water-current-fy-actual').html('-');
                        $('.september-water-actual-target').html('-');
                        $('.september-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.september-water-current-fy-target').html('-');
                    $('.september-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.september-water-current-fy-target').html('-');
                $('.september-water-current-fy-actual').html('-');
                $('.september-water-actual-target').html('-');
                $('.september-water-tricolor').html('-');
            }

            if(jQuery.inArray(10, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 10;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.october-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.october-water-current-fy-target').html('-');
                        $('.october-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.october-water-actual-target').html(difference);
                        } else {
                            $('.october-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.october-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.october-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.october-water-current-fy-actual').html('-');
                        $('.october-water-actual-target').html('-');
                        $('.october-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.october-water-current-fy-target').html('-');
                    $('.october-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.october-water-current-fy-target').html('-');
                $('.october-water-current-fy-actual').html('-');
                $('.october-water-actual-target').html('-');
                $('.october-water-tricolor').html('-');

            }

            if(jQuery.inArray(11, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 11;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.november-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.november-water-current-fy-target').html('-');
                        $('.november-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;

                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.november-water-actual-target').html(difference);
                        } else {
                            $('.november-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.november-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.november-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.november-water-current-fy-actual').html('-');
                        $('.november-water-actual-target').html('-');
                        $('.november-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.november-water-current-fy-target').html('-');
                    $('.november-water-current-fy-actual').html('-');

                }

            } else {
                // console.log('First Else ');
                $('.november-water-current-fy-target').html('-');
                $('.november-water-current-fy-actual').html('-');
                $('.november-water-actual-target').html('-');
                $('.november-water-tricolor').html('-');
            }

            if(jQuery.inArray(12, datas) != -1) {
                // console.log('First IF');

                const checkMonth = (element) => element == 12;

                if(datas.findIndex(checkMonth) != -1) {
                    // console.log('Second IF');
                    

                    if(data[datas.findIndex(checkMonth)].target != null) {
                        // console.log('Third IF January');
                        $('.december-water-current-fy-target').html(data[datas.findIndex(checkMonth)].target);
                    } else {
                        // console.log('Third Else ');
                        $('.december-water-current-fy-target').html('-');
                        $('.december-water-current-fy-actual').html('-');

                     }

                    if(data[datas.findIndex(checkMonth)].factory_1_actual != null) {
                        var consumption = data[datas.findIndex(checkMonth)].factory_1_actual + data[datas.findIndex(checkMonth)].factory_2_actual;
                        var manpower = data[datas.findIndex(checkMonth)].factory_1_manpower + data[datas.findIndex(checkMonth)].factory_2_manpower;
                    
                        var actualConsumption = consumption / manpower;
                        var actualConsumption = actualConsumption.toFixed(2);

                        var difference = data[datas.findIndex(checkMonth)].target - actualConsumption;
                        var difference = difference.toFixed(2);

                        if(difference != 0 || difference != null) {
                            $('.december-water-actual-target').html(difference);
                        } else {
                            $('.december-water-actual-target').html('-');
                        }

                        var icon = '';
                        if(Number(data[datas.findIndex(checkMonth)].target) > actualConsumption) {
                            icon = '<i class="fas fa-arrow-down text-green"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) == actualConsumption) {
                            icon = '<i class="fa fa-minus text-blue"></i>';
                        } else if (Number(data[datas.findIndex(checkMonth)].target) < actualConsumption) {
                            icon = '<i class="fas fa-arrow-up text-red"></i>';
                        }

                        $('.december-water-current-fy-actual').html(actualConsumption + '&nbsp;&nbsp;&nbsp;&nbsp;' + icon);
                        $('.december-water-tricolor').html(actualConsumption);


                    } else {
                        // console.log('Fourth Else ');
                        $('.december-water-current-fy-actual').html('-');
                        $('.december-water-actual-target').html('-');
                        $('.december-water-tricolor').html('-');


                    }
                } else {
                    // console.log('Second Else ');
                    $('.december-water-current-fy-target').html('-');
                    $('.december-water-current-fy-actual').html('-');
                }

            } else {
                // console.log('First Else ');
                $('.december-water-current-fy-target').html('-');
                $('.december-water-current-fy-actual').html('-');
                $('.december-water-actual-target').html('-');
                $('.december-water-tricolor').html('-');
            }

            var sumTarget = targets.reduce(function(a, b){
                return a + b;
            }, 0);

            var average = Number(sumTarget) / targets.length;
            var average = average.toFixed(2);
            // console.log(sumTarget);

            if(sumTarget != 0 && sumTarget != null) {
                $('.total-water-current-fy-target').html(average);
            } else {
                $('.total-water-current-fy-target').html('-');
            }

            var sumActual = factoryActual.reduce(function(a, b){
                return a + b;
            }, 0);


            var sumManpower = factoryManpower.reduce(function(a, b){
                return a + b;
            }, 0);

            var waterConsumption = sumActual / sumManpower;
            // var waterConsumption = waterConsumption.toFixed(2);

            var actualAverage = Number(waterConsumption) / factoryActual.length;
            var actualAverage = actualAverage.toFixed(2);

            if(actualAverage != 0 && actualAverage != null) {
                $('.total-water-current-fy-actual').html(actualAverage);
                $('.total-water-tricolor').html(actualAverage);
            } else {
                $('.total-water-current-fy-actual').html('-');
                $('.total-water-tricolor').html('-');
            }

            
           var diffAverage = Number(average) - Number(actualAverage);
           var diffAverage = diffAverage.toFixed(2);
        
           if(diffAverage != 0 || diffAverage != null) {
                $('.total-water-actual-target').html(diffAverage);
           } else {
                $('.total-water-actual-target').html(diffAverage);
           }


            // console.log(sumTarget);

            // console.log(sumActual);
            // console.log(sumManpower);
            // console.log(factoryActual, factoryManpower);

            $('.april-water-current-fy').html('April ' + currentYear);
            $('.may-water-current-fy').html('May ' + currentYear);
            $('.june-water-current-fy').html('June ' + currentYear);
            $('.july-water-current-fy').html('July ' + currentYear);
            $('.august-water-current-fy').html('August ' + currentYear);
            $('.september-water-current-fy').html('September ' + currentYear);
            $('.october-water-current-fy').html('October ' + currentYear);
            $('.november-water-current-fy').html('November ' + currentYear);
            $('.december-water-current-fy').html('December ' + currentYear);
            $('.january-water-current-fy').html('January ' + nextYear);
            $('.february-water-current-fy').html('February ' + nextYear);
            $('.march-water-current-fy').html('March ' + nextYear);
        }
    });
}

// function GetCurrentFYWaterData1() {
//     $.ajax({
//         type: "get",
//         url: "get_current_water_data",
//         data: {
//             fiscal_year: $('#selFiscalYearWater').val()
//         },
//         dataType: "json",
//         success: function (response) {
//             var currentYear = Number(response['currentYear']);
//             var nextYear = Number(response['currentYear'] + 1);
//             var iconApril = response['iconApril']; 
//             var iconMay = response['iconMay']; 
//             var iconJune = response['iconJune']; 
//             var iconJuly = response['iconJuly']; 
//             var iconAugust = response['iconAugust']; 
//             var iconSeptember = response['iconSeptember']; 
//             var iconOctober = response['iconOctober']; 
//             var iconNovember = response['iconNovember']; 
//             var iconDecember = response['iconDecember']; 
//             var iconJanuary = response['iconJanuary']; 
//             var iconFebruary = response['iconFebruary']; 
//             var iconMarch = response['iconMarch']; 
//             var aprilWaterTarget = Number(response['aprilWaterTarget']);
//             var aprilWaterActual = Number(response['aprilWaterActual']);
//             var mayWaterTarget = Number(response['mayWaterTarget']);
//             var mayWaterActual = Number(response['mayWaterActual']);
//             var juneWaterTarget = Number(response['juneWaterTarget']);
//             var juneWaterActual = Number(response['juneWaterActual']);
//             var julyWaterTarget = Number(response['julyWaterTarget']);
//             var julyWaterActual = Number(response['julyWaterActual']);
//             var augustWaterTarget = Number(response['augustWaterTarget']);
//             var augustWaterActual = Number(response['augustWaterActual']);
//             var septemberWaterTarget = Number(response['septemberWaterTarget']);
//             var septemberWaterActual = Number(response['septemberWaterActual']);
//             var octoberWaterTarget = Number(response['octoberWaterTarget']);
//             var octoberWaterActual = Number(response['octoberWaterActual']);
//             var novemberWaterTarget = Number(response['novemberWaterTarget']);
//             var novemberWaterActual = Number(response['novemberWaterActual']);
//             var decemberWaterTarget = Number(response['decemberWaterTarget']);
//             var decemberWaterActual = Number(response['decemberWaterActual']);
//             var januaryWaterTarget = Number(response['januaryWaterTarget']);
//             var januaryWaterActual = Number(response['januaryWaterActual']);
//             var februaryWaterTarget = Number(response['februaryWaterTarget']);
//             var februaryWaterActual = Number(response['februaryWaterActual']);
//             var marchWaterTarget = Number(response['marchWaterTarget']);
//             var marchWaterActual = Number(response['marchWaterActual']);


//             $('.april-water-current-fy').html('April ' + currentYear);
//             $('.may-water-current-fy').html('May ' + currentYear);
//             $('.june-water-current-fy').html('June ' + currentYear);
//             $('.july-water-current-fy').html('July ' + currentYear);
//             $('.august-water-current-fy').html('August ' + currentYear);
//             $('.september-water-current-fy').html('September ' + currentYear);
//             $('.october-water-current-fy').html('October ' + currentYear);
//             $('.november-water-current-fy').html('November ' + currentYear);
//             $('.december-water-current-fy').html('December ' + currentYear);
//             $('.january-water-current-fy').html('January ' + nextYear);
//             $('.february-water-current-fy').html('February ' + nextYear);
//             $('.march-water-current-fy').html('March ' + nextYear);

//             if(aprilWaterTarget == 0) {
//                 $('.april-water-current-fy-target').html('-');
//             } else {
//                 $('.april-water-current-fy-target').html(aprilWaterTarget);
//             }

//             if(aprilWaterActual == 0) {
//                 $('.april-water-current-fy-actual').html('-');
//             } else {
//                 $('.april-water-current-fy-actual').html(aprilWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconApril);
//             }


//             if(mayWaterTarget == 0) {
//                 $('.may-water-current-fy-target').html('-');
//             } else {
//                 $('.may-water-current-fy-target').html(mayWaterTarget);
//             }

//             if(mayWaterActual == 0) {
//                 $('.may-water-current-fy-actual').html('-');
//             } else {
//                 $('.may-water-current-fy-actual').html(mayWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconMay);
//             }


//             if(juneWaterTarget == 0) {
//                 $('.june-water-current-fy-target').html('-');
//             } else {
//                 $('.june-water-current-fy-target').html(juneWaterTarget);
//             }

//             if(juneWaterActual == 0) {
//                 $('.june-water-current-fy-actual').html('-');
//             } else {
//                 $('.june-water-current-fy-actual').html(juneWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJune);
//             }


//             if(julyWaterTarget == 0) {
//                 $('.july-water-current-fy-target').html('-');
//             } else {
//                 $('.july-water-current-fy-target').html(julyWaterTarget);
//             }

//             if(julyWaterActual == 0) {
//                 $('.july-water-current-fy-actual').html('-');
//             } else {
//                 $('.july-water-current-fy-actual').html(julyWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJuly);
//             }


//             if(augustWaterTarget == 0) {
//                 $('.august-water-current-fy-target').html('-');
//             } else {
//                 $('.august-water-current-fy-target').html(augustWaterTarget);
//             }

//             if(augustWaterActual == 0) {
//                 $('.august-water-current-fy-actual').html('-');
//             } else {
//                 $('.august-water-current-fy-actual').html(augustWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconAugust);
//             }


//             if(septemberWaterTarget == 0) {
//                 $('.september-water-current-fy-target').html('-');
//             } else {
//                 $('.september-water-current-fy-target').html(septemberWaterTarget);
//             }

//             if(septemberWaterActual == 0) {
//                 $('.september-water-current-fy-actual').html('-');
//             } else {
//                 $('.september-water-current-fy-actual').html(septemberWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconSeptember);
//             }


//             if(octoberWaterTarget == 0) {
//                 $('.october-water-current-fy-target').html('-');
//             } else {
//                 $('.october-water-current-fy-target').html(octoberWaterTarget);
//             }

//             if(octoberWaterActual == 0) {
//                 $('.october-water-current-fy-actual').html('-');
//             } else {
//                 $('.october-water-current-fy-actual').html(octoberWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconOctober);
//             }


//             if(novemberWaterTarget == 0) {
//                 $('.november-water-current-fy-target').html('-');
//             } else {
//                 $('.november-water-current-fy-target').html(novemberWaterTarget);
//             }

//             if(novemberWaterActual == 0) {
//                 $('.november-water-current-fy-actual').html('-');
//             } else {
//                 $('.november-water-current-fy-actual').html(novemberWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconNovember);
//             }


//             if(decemberWaterTarget == 0) {
//                 $('.december-water-current-fy-target').html('-');
//             } else {
//                 $('.december-water-current-fy-target').html(decemberWaterTarget);
//             }

//             if(decemberWaterActual == 0) {
//                 $('.december-water-current-fy-actual').html('-');
//             } else {
//                 $('.december-water-current-fy-actual').html(decemberWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconDecember);
//             }


//             if(januaryWaterTarget == 0) {
//                 $('.january-water-current-fy-target').html('-');
//             } else {
//                 $('.january-water-current-fy-target').html(januaryWaterTarget);
//             }

//             if(januaryWaterActual == 0) {
//                 $('.january-water-current-fy-actual').html('-');
//             } else {
//                 $('.january-water-current-fy-actual').html(januaryWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJanuary);
//             }


//             if(februaryWaterTarget == 0) {
//                 $('.february-water-current-fy-target').html('-');
//             } else {
//                 $('.february-water-current-fy-target').html(februaryWaterTarget);
//             }

//             if(februaryWaterActual == 0) {
//                 $('.february-water-current-fy-actual').html('-');
//             } else {
//                 $('.february-water-current-fy-actual').html(februaryWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconFebruary);
//             }


//             if(marchWaterTarget == 0) {
//                 $('.march-water-current-fy-target').html('-');
//             } else {
//                 $('.march-water-current-fy-target').html(marchWaterTarget);
//             }

//             if(marchWaterActual == 0) {
//                 $('.march-water-current-fy-actual').html('-');
//             } else {
//                 $('.march-water-current-fy-actual').html(marchWaterActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconMarch);
//             }

//           var totalTarget =  aprilWaterTarget + mayWaterTarget + juneWaterTarget +  julyWaterTarget +  augustWaterTarget +  septemberWaterTarget +  octoberWaterTarget +  novemberWaterTarget +  decemberWaterTarget +  januaryWaterTarget +  februaryWaterTarget +  marchWaterTarget;
        
//           if(totalTarget == 0) {
//             $('.total-water-current-fy-target').html('-');
//           } else {
//               $('.total-water-current-fy-target').html(totalTarget);
//           }

//           var totalActual =  aprilWaterActual + mayWaterActual + juneWaterActual +  julyWaterActual +  augustWaterActual +  septemberWaterActual +  octoberWaterActual +  novemberWaterActual +  decemberWaterActual +  januaryWaterActual +  februaryWaterActual +  marchWaterActual;

//           if(totalActual == 0) {
//             $('.total-water-current-fy-actual').html('-');
//           } else {
//               $('.total-water-current-fy-actual').html(totalActual);
//           }

//         }
//     });
// }
