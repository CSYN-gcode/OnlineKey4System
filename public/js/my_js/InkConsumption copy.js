//============= GET ENERGY DATA FOR DASHBOARD ===================================================
function GetCurrentFYInkData() {
    $.ajax({
        method: "get",
        url: "get_current_ink_data",
        data: {
            fiscal_year: $('#selFiscalYearInk').val()
        },
        dataType: "json",
        success: function(response) {
            var pastYear = response['pastFY'];
            var pastYear = Number(pastYear);
            var currentYear = response['currentFY'];
            var currentYear = Number(currentYear);
            //=========
            var iconPastMarch = response['iconPastMarch'];
            var iconCurrentApril = response['iconCurrentApril'];
            var iconCurrentMay = response['iconCurrentMay'];
            var iconCurrentJune = response['iconCurrentJune'];
            var iconCurrentJuly = response['iconCurrentJuly'];
            var iconCurrentAugust = response['iconCurrentAugust'];
            var iconCurrentSeptember = response['iconCurrentSeptember'];
            var iconCurrentOctober = response['iconCurrentOctober'];
            var iconCurrentNovember = response['iconCurrentNovember'];
            var iconCurrentDecember = response['iconCurrentDecember'];
            var iconCurrentJanuary = response['iconCurrentJanuary'];
            var iconCurrentFebruary = response['iconCurrentFebruary'];
            var iconCurrentMarch = response['iconCurrentMarch'];
            //=========

            //=========
            var pastMarchTarget = response['marchTargetPastFy'];
            var pastMarchActual = response['marchActualPastFy'];

            var currentAprilTarget = response['aprilTargetCurrentFy'];
            var currentAprilActual = response['aprilActualCurrentFy'];

            var currentMayTarget = response['mayTargetCurrentFy'];
            var currentMayActual = response['mayActualCurrentFy'];

            var currentJuneTarget = response['juneTargetCurrentFy'];
            var currentJuneActual = response['juneActualCurrentFy'];

            var currentJulyTarget = response['julyTargetCurrentFy'];
            var currentJulyActual = response['julyActualCurrentFy'];

            var currentAugustTarget = response['augustTargetCurrentFy'];
            var currentAugustActual = response['augustActualCurrentFy'];
            var currentSeptemberTarget = response['septemberTargetCurrentFy'];
            var currentSeptemberActual = response['septemberActualCurrentFy'];
            var currentOctoberTarget = response['octoberTargetCurrentFy'];
            var currentOctoberActual = response['octoberActualCurrentFy'];
            var currentNovemberTarget = response['novemberTargetCurrentFy'];
            var currentNovemberActual = response['novemberActualCurrentFy'];
            var currentDecemberTarget = response['decemberTargetCurrentFy'];
            var currentDecemberActual = response['decemberActualCurrentFy'];
            var currentJanuaryTarget = response['januaryTargetCurrentFy'];
            var currentJanuaryActual = response['januaryActualCurrentFy'];
            var currentFebruaryTarget = response['februaryTargetCurrentFy'];
            var currentFebruaryActual = response['februaryActualCurrentFy'];
            var currentMarchTarget = response['marchTargetCurrentFy'];
            var currentMarchActual = response['marchActualCurrentFy'];
            //========

            // console.log(currentYear + 1);
            if(currentYear != null) {
                $('.april-ink-current-fy').html('April ' + currentYear); 
                $('.may-ink-current-fy').html('May ' + currentYear); 
                $('.june-ink-current-fy').html('June ' + currentYear); 
                $('.july-ink-current-fy').html('July ' + currentYear); 
                $('.august-ink-current-fy').html('August ' + currentYear); 
                $('.september-ink-current-fy').html('September ' + currentYear); 
                $('.october-ink-current-fy').html('October ' + currentYear); 
                $('.november-ink-current-fy').html('November ' + currentYear); 
                $('.december-ink-current-fy').html('December ' + currentYear); 
                $('.january-ink-current-fy').html('January ' + (currentYear + 1)); 
                $('.february-ink-current-fy').html('February ' + (currentYear + 1)); 
                $('.march-ink-current-fy').html('March ' + (currentYear + 1)); 
            } else {
                $('.april-ink-current-fy').html(' ');
                $('.may-ink-current-fy').html(' ');
                $('.june-ink-current-fy').html(' ');
                $('.july-ink-current-fy').html(' ');
                $('.august-ink-current-fy').html(' ');
                $('.september-ink-current-fy').html(' ');
                $('.october-ink-current-fy').html(' ');
                $('.november-ink-current-fy').html(' ');
                $('.december-ink-current-fy').html(' ');
                $('.january-ink-current-fy').html(' ');
                $('.february-ink-current-fy').html(' ');
                $('.march-ink-current-fy').html(' ');
            }

            //===== CURRENT FY MONTHS =============
            if(currentAprilTarget != null) {
                $('.april-ink-target').html(currentAprilTarget); 
            } else {
                $('.april-ink-target').html('-'); 
            }

            if(currentAprilActual == 0 || currentAprilActual == null) {
                $('.april-ink-actual').html('-'); 
                $('.ink-actual-tricolor-april').html('-');

            } else if(currentAprilActual != null) {
                $('.april-ink-actual').html(currentAprilActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentApril);
                $('.ink-actual-tricolor-april').html(currentAprilActual);
                
            }  

            //=======
            if(currentMayTarget != null) {
                $('.may-ink-target').html(currentMayTarget); 
            } else {
                $('.may-ink-target').html('-'); 
            }

            if(currentMayActual == 0 || currentMayActual == null) {
                $('.may-ink-actual').html('-'); 
                $('.ink-actual-tricolor-may').html('-');

                
            } else if(currentMayActual != null){
                $('.may-ink-actual').html(currentMayActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentMay);
                $('.ink-actual-tricolor-may').html(currentMayActual);
            }

            //=======
            if(currentJuneTarget != null) {
                $('.june-ink-target').html(currentJuneTarget); 
            } else {
                $('.june-ink-target').html('-'); 
            }

            if(currentJuneActual == 0 || currentJuneActual == null) {
                $('.june-ink-actual').html('-'); 
                $('.ink-actual-tricolor-june').html('-');

                
            } else if(currentJuneActual != null) {
                $('.june-ink-actual').html(currentJuneActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJune);
                $('.ink-actual-tricolor-june').html(currentJuneActual);
            }

            //=======
            if(currentJulyTarget != null) {
                $('.july-ink-target').html(currentJulyTarget); 
            } else {
                $('.july-ink-target').html('-'); 
            }

            if(currentJulyActual == 0 || currentJulyActual == null) {
                $('.july-ink-actual').html('-'); 
                $('.ink-actual-tricolor-july').html('-');

                
            } else if(currentJulyActual != null) {
                $('.july-ink-actual').html(currentJulyActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJuly);
                $('.ink-actual-tricolor-july').html(currentJulyActual);

            }

            //=======
            if(currentAugustTarget != null) {
                $('.august-ink-target').html(currentAugustTarget); 
            } else {
                $('.august-ink-target').html('-'); 
            }

            if(currentAugustActual == 0 || currentAugustActual == null) {
                $('.august-ink-actual').html('-'); 
                $('.ink-actual-tricolor-august').html('-');
                
            } else if(currentAugustActual != null) {
                $('.august-ink-actual').html(currentAugustActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentAugust);
                $('.ink-actual-tricolor-august').html(currentAugustActual);
            }

            //=======
            if(currentSeptemberTarget != null) {
                $('.september-ink-target').html(currentSeptemberTarget); 
            } else {
                $('.september-ink-target').html('-'); 
            }

            if(currentSeptemberActual == 0 || currentSeptemberActual == null) {
                $('.september-ink-actual').html('-'); 
                $('.ink-actual-tricolor-september').html('-');
                
            } else if(currentSeptemberActual != null) {
                $('.september-ink-actual').html(currentSeptemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentSeptember);
                $('.ink-actual-tricolor-september').html(currentSeptemberActual);
            }

            //=======
            if(currentOctoberTarget != null) {
                $('.october-ink-target').html(currentOctoberTarget); 
            } else {
                $('.october-ink-target').html('-'); 
            }

            if(currentOctoberActual == 0 || currentOctoberActual == null) {
                $('.october-ink-actual').html('-'); 
                $('.ink-actual-tricolor-october').html('-');
                
            } else if(currentOctoberActual != null) {
                $('.october-ink-actual').html(currentOctoberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentOctober);
                $('.ink-actual-tricolor-october').html(currentOctoberActual);
            }

            //=======
            if(currentNovemberTarget != null) {
                $('.november-ink-target').html(currentNovemberTarget); 
            } else {
                $('.november-ink-target').html('-'); 
            }

            if(currentNovemberActual == 0 || currentNovemberActual == null) {
                $('.november-ink-actual').html('-'); 
                $('.ink-actual-tricolor-november').html('-');
                
            } else if(currentNovemberActual != null) {
                $('.november-ink-actual').html(currentNovemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentNovember);
                $('.ink-actual-tricolor-november').html(currentNovemberActual);
            }

            //=======
            if(currentDecemberTarget != null) {
                $('.december-ink-target').html(currentDecemberTarget); 
            } else {
                $('.december-ink-target').html('-'); 
            }

            if (currentDecemberActual == 0 || currentDecemberActual == null) {
                $('.december-ink-actual').html('-'); 
                $('.ink-actual-tricolor-december').html('-');
            }
            else if(currentDecemberActual != null) {
                $('.december-ink-actual').html(currentDecemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentDecember);
                $('.ink-actual-tricolor-december').html(currentDecemberActual);
            //   console.log(currentDecemberActual);
            } 

            //=======
             if(currentJanuaryTarget != null) {
                $('.january-ink-target').html(currentJanuaryTarget); 
            } else {
                $('.january-ink-target').html('-'); 
            }

            if(currentJanuaryActual == 0 || currentJanuaryActual == null) {
                $('.january-ink-actual').html('-'); 
                $('.ink-actual-tricolor-january').html('-');
                
            } else if(currentJanuaryActual != null) {
                $('.january-ink-actual').html(currentJanuaryActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJanuary);
                $('.ink-actual-tricolor-january').html(currentJanuaryActual);
            }

            //=======
            if(currentFebruaryTarget != null) {
                $('.february-ink-target').html(currentFebruaryTarget); 
            } else {
                $('.february-ink-target').html('-'); 
            }

            if(currentFebruaryActual == 0 || currentFebruaryActual == null) {
                $('.february-ink-actual').html('-'); 
                $('.ink-actual-tricolor-february').html('-');
                
            } else if(currentFebruaryActual != null) {
                $('.february-ink-actual').html(currentFebruaryActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentFebruary);
                $('.ink-actual-tricolor-february').html(currentFebruaryActual);
            }

             //=======
             if(currentMarchTarget != null) {
                $('.march-ink-target').html(currentMarchTarget); 
            } else {
                $('.march-ink-target').html('-'); 
            }

            if(currentMarchActual == 0 || currentMarchActual == null) {
                $('.march-ink-actual').html('-'); 
                $('.ink-actual-tricolor-march').html('-');
            } else if(currentMarchActual != null) {
                $('.march-ink-actual').html(currentMarchActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentMarch);
                $('.ink-actual-tricolor-march').html(currentMarchActual);
            }
            //===== CURRENT FY MONTHS =============

            var currentAprilTargetNum = null;
            var currentMayTargetNum = null;
            var currentJuneTargetNum = null;
            var currentJulyTargetNum = null;
            var currentAugustTargetNum = null;
            var currentSeptemberTargetNum = null;
            var currentOctoberTargetNum = null;
            var currentNovemberTargetNum = null;
            var currentDecemberTargetNum = null;
            var currentJanuaryTargetNum = null;
            var currentFebruaryTargetNum = null;
            var currentMarchTargetNum = null;

            if(currentAprilTarget != null) {
                var currentAprilTargetNum = Number(currentAprilTarget.replace(/,/g, ''));
                // console.log(currentAprilTarget);
            } 
            if (currentMayTarget != null) {
                var currentMayTargetNum = Number(currentMayTarget.replace(/,/g, ''));
                // console.log(currentMayTarget);
            }
            if (currentJuneTarget != null) {
                var currentJuneTargetNum = Number(currentJuneTarget.replace(/,/g, ''));
            }
            if (currentJulyTarget != null) {
                var currentJulyTargetNum = Number(currentJulyTarget.replace(/,/g, ''));
            }
            if (currentAugustTarget != null) {
                var currentAugustTargetNum = Number(currentAugustTarget.replace(/,/g, ''));
            }
            if (currentSeptemberTarget != null) {
                var currentSeptemberTargetNum = Number(currentSeptemberTarget.replace(/,/g, ''));
            }
            if (currentOctoberTarget != null) {
                var currentOctoberTargetNum = Number(currentOctoberTarget.replace(/,/g, ''));
            }
            if (currentNovemberTarget != null) {
                var currentNovemberTargetNum = Number(currentNovemberTarget.replace(/,/g, ''));
            }
            if (currentDecemberTarget != null) {
                var currentDecemberTargetNum = Number(currentDecemberTarget.replace(/,/g, ''));
            }
            if (currentJanuaryTarget != null) {
                var currentJanuaryTargetNum = Number(currentJanuaryTarget.replace(/,/g, ''));
            }
            if (currentFebruaryTarget != null) {
                var currentFebruaryTargetNum = Number(currentFebruaryTarget.replace(/,/g, ''));
            }
            if (currentMarchTarget != null) {
                var currentMarchTargetNum = Number(currentMarchTarget.replace(/,/g, ''));
            }
          
             var totalTargetNum = currentAprilTargetNum + currentMayTargetNum + currentJuneTargetNum + currentJulyTargetNum + currentAugustTargetNum + currentSeptemberTargetNum + currentOctoberTargetNum + currentNovemberTargetNum + currentDecemberTargetNum + currentJanuaryTargetNum + currentFebruaryTargetNum + currentMarchTargetNum;


            var data = response['inkConsumption'];
            var targetCount = [];
            var actualCount = [];

            for(var x = 0; x < data.length; x++) {
                targetData = data[x].target;
                actualData = data[x].actual;
               
                targetCount.push(Number(targetData));
                actualCount.push(Number(actualData));
              
            }
            
            // console.log(targetCount.length);

             var targetAve = totalTargetNum / targetCount.length;
             var targetAverage = targetAve.toLocaleString('en');
            //  console.log(totalTargetNum);

            var targetAverage = targetAve.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
            //  var totalTargetNumFormatted = totalTargetNum.toLocaleString('en');

            // if(totalTargetNumFormatted != 0) {
            //     $('#total-ink-target').html(totalTargetNumFormatted);
            // }
            // else {
            //     $('#total-ink-target').html('-');
            // }

            if(targetCount.length != 0) {
                $('.total-ink-target').html(targetAverage);
            }
            else {
                $('.total-ink-target').html('-');
            }

            var currentAprilActualNum = null;
            var currentMayActualNum = null;
            var currentJuneActualNum = null;
            var currentJulyActualNum = null;
            var currentAugustActualNum = null;
            var currentSeptemberActualNum = null;
            var currentOctoberActualNum = null;
            var currentNovemberActualNum = null;
            var currentDecemberActualNum = null; 
            var currentJanuaryActualNum = null;
            var currentFebruaryActualNum = null;
            var currentMarchActualNum = null;

            if(currentAprilActual != null) {
                var currentAprilActualNum = Number(currentAprilActual.replace(/,/g, ''));
            }
            if(currentMayActual != null) {
                var currentMayActualNum = Number(currentMayActual.replace(/,/g, ''));
            }
            if(currentJuneActual != null) {
                var currentJuneActualNum = Number(currentJuneActual.replace(/,/g, ''));
            }
            if(currentJulyActual != null) {
                var currentJulyActualNum = Number(currentJulyActual.replace(/,/g, ''));
            }
            if(currentAugustActual != null) {
                var currentAugustActualNum = Number(currentAugustActual.replace(/,/g, ''));
            }
            if(currentSeptemberActual != null) {
                var currentSeptemberActualNum = Number(currentSeptemberActual.replace(/,/g, ''));
            }
            if(currentOctoberActual != null) {
                var currentOctoberActualNum = Number(currentOctoberActual.replace(/,/g, ''));
            }
            if(currentNovemberActual != null) {
                var currentNovemberActualNum = Number(currentNovemberActual.replace(/,/g, ''));
            }
            if(currentDecemberActual != null) {
                var currentDecemberActualNum = Number(currentDecemberActual.replace(/,/g, ''));
            }
            if(currentJanuaryActual != null) {
                var currentJanuaryActualNum = Number(currentJanuaryActual.replace(/,/g, ''));
            }
            if(currentFebruaryActual != null) {
                var currentFebruaryActualNum = Number(currentFebruaryActual.replace(/,/g, ''));
            }
            if(currentMarchActual != null) {
                var currentMarchActualNum = Number(currentMarchActual.replace(/,/g, ''));
            }

            var totalActualNum = currentAprilActualNum + currentMayActualNum + currentJuneActualNum + currentJulyActualNum + currentAugustActualNum + currentSeptemberActualNum + currentOctoberActualNum + currentNovemberActualNum + currentDecemberActualNum + currentJanuaryActualNum + currentFebruaryActualNum + currentMarchActualNum;


            var actualAve = totalActualNum / actualCount.length;

            // var totalActualNumFormatted = totalActualNum.toLocaleString('en');
            // var actualAve = actualAve.toFixed(0);
            var actualAverage = actualAve.toLocaleString('en');
            var aveDiff = targetAve - actualAve;
            // console.log(aveDiff);
            var actualAverage = actualAve.toLocaleString('en');
            // var aveDiff = aveDiff.toLocaleString('en');
            var actualAverage = actualAve.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");

            var aveDiff = aveDiff.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");

            // var aveDiff = parseFloat(aveDiff).toFixed(2);
            
            // console.log(aveDiff);

            if(actualCount.length != 0) {
                $('.diff-ink-ave').html(aveDiff);                           
            } else {
                $('.diff-ink-ave').html('-');                           
            }


            if(actualCount.length != 0) {
                $('#total-ink-actual').html(actualAverage);
            }
            else {
                $('#total-ink-actual').html('-');
            }

            if(actualCount.length != 0) {
                $('.ink-actual-tricolor-total').html(actualAverage);
            }
            else {
                $('.ink-actual-tricolor-total').html('-');
            }
        },

        error: function(data, xhr, status) {
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        },
    });
}