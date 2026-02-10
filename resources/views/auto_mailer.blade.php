@include('shared.css_links.css_links')
<style>
    ::-webkit-scrollbar {
        display: none !important;
    }

    hr {
        border: 1px solid black;
        width: 25%;
    }

    html,
    body {
        margin: 0;
        height: 100%;
        overflow: hidden
    }

</style>
<title>Key 4 Monthly Resources Consumption Mailer</title>

<body>
    {{-- @php
        date_default_timezone_set('Asia/Manila');
    @endphp --}}
    <div class="col-12 text-center" style="margin-top: 10%">
        <hr>
        <h4 style="font-weight: bold;">
            Key 4 Monthly Resources Consumption Mailer
        </h4><br>
        <h1>Do not close!</h1>
        <hr>
        <span id="date"></span><br>
        <span id="time"></span>
    </div>
</body>

@include('shared.js_links.js_links')
<script type="text/javascript">
    function checkDate() {
        var date = new Date();
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        var lastDayOfMonth = lastDay.getDate();
        // return lastDayOfMonth;
        // console.log(lastDayOfMonth);

        var dateNow = date.getDate();
        var dateNow_converted = Number(dateNow);
        var lastDayOfMonth_converted = Number(lastDayOfMonth);

        // console.log(lastDayOfMonth_converted);

        var difference = lastDayOfMonth_converted - dateNow_converted;
        // console.log(lastDayOfMonth_converted);
        // console.log(dateNow_converted);
        // console.log(difference);
    
        var d = new Date();
        var current_time = d.toLocaleString("en-US", {
            timeZone: 'Asia/Manila',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });

        $("#time").html(current_time);
        // console.log(dateNow_converted);

        //SEND EMAIL DATES :  28,29,30,31,1,2,3,4,5 sometimes include 27
        if (difference == 3 || difference == 2 || difference == 1 || difference == 0 || dateNow_converted == 1 || dateNow_converted == 2 ||
            dateNow_converted == 3 || dateNow_converted == 4 || dateNow_converted == 5) {
            console.log('sending email today');
            if (current_time == '07:30:00 AM') {
                SendMail();
            }
        }

        if (dateNow_converted == 5 || dateNow_converted == 6 ||
            dateNow_converted == 7 || dateNow_converted == 8 || dateNow_converted == 9 || dateNow_converted == 10) {
            if (current_time == '07:30:00 AM') {
            SendMailCompletedData();
            }
        }
        
    }
    setInterval(checkDate, 1000);
</script>
