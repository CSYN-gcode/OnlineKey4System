@php $layout = 'layouts.super_user_layout'; @endphp

@auth
    @php
    if (Auth::user()->user_level_id == 1) {
        $layout = 'layouts.super_user_layout';
    } elseif (Auth::user()->user_level_id == 2) {
        $layout = 'layouts.admin_layout';
    } elseif (Auth::user()->user_level_id == 3) {
        $layout = 'layouts.user_layout';
    }
    @endphp
@endauth

{{-- Here I removed the @auth because the dashboard isn't loading properly --}}
@extends($layout)
@section('title', 'Blank Page')

@section('content_page')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Energy Consumption</li>
                            <li class="breadcrumb-item active">Water Consumption</li>

                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2>Chart</h2>
                    </div>
                    <div class="card-body">
                        <div class="chart border border-dark" style="max-height: 600px;">
                            {{-- <canvas id="chart"></canvas> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@section('js_content')
    <script type="text/javascript">
        $(document).ready(function() {
            // bsCustomFileInput.init();
            // $.ajax({
            //         url: 'get_chart_data',
            //         method: 'get',
            //         dataType: 'json',
            //         success: function(response) {
            //             if (response['result'] == 1) {

            //             },

            //             error: function(data, xhr, status) {
            //                 console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " +
            //                     status);
            //             }
            //         });
            // });
            var firstData = 5;

            var ctx = document.getElementById("chart").getContext("2d");
            var chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December',
                    ],
                    datasets: [{
                            backgroundColor: "black",
                            borderColor: "black",
                            borderWidth: 5,
                            data: [30, 150, 25, 20, 10, 30, 150, 10, 20, 10]
                        },
                        {
                            backgroundColor: "red",
                            borderColor: "red",
                            borderWidth: 5,
                            data: [30, 25, 150, 20, 30, 15, 5, 10, 150, 10]
                        },

                        {
                            backgroundColor: "orange",
                            borderColor: "orange",
                            borderWidth: 5,
                            data: [30, 20, 10, 150, 150, 15, 10, 10, 20, 10]
                        },
                        {
                            backgroundColor: "violet",
                            borderColor: "violet",
                            borderWidth: 5,
                            data: [30, 20, 10, 20, 150, 15, 20, 150, 20, 150]
                        },
                        {
                            backgroundColor: "blue",
                            borderColor: "blue",
                            borderWidth: 5,
                            data: [30, 20, 10, 20, 30, 150, 5, 10, 150, 10]
                        },
                        {
                            backgroundColor: "green",
                            borderColor: "green",
                            borderWidth: 5,
                            data: [30, 20, 10, 20, 30, 150, 150, 10, 20, 20]
                        },
                        {
                            backgroundColor: "pink",
                            borderColor: "pink",
                            type: 'bar',
                            borderWidth: 5,
                            data: [30, 25, 150, 20, 30, 15, 5, 10, 150, 10]
                        },

                    ]
                },
                options: {
                    responsive: true,
                    animation: {
                        x: {
                            duration: 100,
                            from: 0
                        },
                        y: {
                            duration: 100,
                            from: 500,
                            // loop: true
                        },
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 0.5,
                            to: 0,
                            loop: true
                        },
                        // borderWidth: {
                        //     duration: 100,
                        //     from: 0,
                        //     to: 5,
                        //     loop: true
                        // },
                    },
                    elements: {
                        line: {
                            fill: false
                        }
                    }
                }
            });
        });
    </script>
@endsection
