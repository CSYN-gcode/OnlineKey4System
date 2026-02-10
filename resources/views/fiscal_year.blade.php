
@include('shared.css_links.css_links')
<!DOCTYPE html>
<html>
    <title>Fiscal Year Transition - Do not close!</title>
<body>
    {{-- <span id="fiscalYear"></span>
    <span id="month"></span> --}}

    <div class="col-12 text-center" style="margin-top: 10%">
        <hr>
        <h4 style="font-weight: bold;">
           CURRENT FISCAL YEAR
        </h4><br>
        {{-- <h1>Do not close!</h1> --}}
        <hr>
        <span id="fiscalYear" style="font-weight: bold;"></span><br>
        <span id="month"></span>
    </div>
</body>

</html>

@include('shared.js_links.js_links')
<script type="text/javascript">
    $(document).ready(function () {
        // CurrentFiscalYear(); 
        GetCurrentFiscalYear();

        function checkFY() {

            var date = new Date();
            // var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        
            var firstDayOfMonth = date.getDate();
            var month = date.getMonth() + 1;

            // console.log(firstDayOfMonth);

            var d = new Date();
            var current_time = d.toLocaleString("en-US", {
                timeZone: 'Asia/Manila',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            // if(month == 4 && firstDayOfMonth == 1) { // old code by chelvin 
            if(month == 4 && firstDayOfMonth == 6) { // new code by clark 04032023
                if(current_time == '12:00:00 AM') {
                    TransitionFY();
                }
            }
        }

        setInterval(checkFY, 1000);
    });
</script>

