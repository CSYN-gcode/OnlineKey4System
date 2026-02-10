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

@extends($layout)
@section('title', 'Dashboard')

{{-- CONTENT PAGE--}}
@section('content_page')
<div class="content-wrapper">
    <!--Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="energy-dash" style="display: none;">
                    <div class="card l-bg-red-dark card-hover">
                        <a class="text-white" href="{{ route('dashboard-energy') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-charging-station"></i>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-list"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Energy - Dashboard</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="water-dash" style="display: none;">
                    <div class="card l-bg-light-blue-dark card-hover">
                        <a class="text-white" href="{{ route('dashboard-water') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-tint"></i>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-list"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Water - Dashboard</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="ink-dash" style="display: none;">
                    <div class="card l-bg-black-dark card-hover">
                        <a class="text-white" href="{{ route('dashboard-ink') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-fill-drip"></i>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-list"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Ink - Dashboard</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="paper-dash" style="display: none;">
                    <div class="card l-bg-green-dark card-hover">
                        <a class="text-white" href="{{ route('dashboard-paper') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-file"></i>&nbsp;&nbsp;&nbsp;<i class="fas fa-clipboard-list"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Paper - Dashboard</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="energy-nav" style="display: none;">
                    <div class="card l-bg-red-dark card-hover">
                        <a class="text-white" href="{{ route('energy_consumption') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-charging-station"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Energy Consumption</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="water-nav" style="display: none;">
                    <div class="card l-bg-light-blue-dark card-hover">
                        <a class="text-white" href="{{ route('water_consumption') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-tint"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Water Consumption</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="ink-sg-nav" style="display: none;">
                    <div class="card l-bg-black-dark card-hover">
                        <a class="text-white" href="{{ route('ink_consumption_sg') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-fill-drip"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Ink Consumption - SG</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="ink-prod-nav" style="display: none;">
                    <div class="card l-bg-black-dark card-hover">
                        <a class="text-white" href="{{ route('ink_consumption_prod') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-fill-drip"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Ink Consumption - PROD</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                {{-- ITEM --}}
                <div class="col-xl-2 col-lg-2 mt-4" id="paper-nav" style="display: none;">
                    <div class="card l-bg-green-dark card-hover">
                        <a class="text-white" href="{{ route('paper_consumption') }}">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-file"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Paper Consumption</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <span class="totalWorkloads"></span>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-4x fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
{{-- JS CONTENT --}}
@section('js_content')
@endsection
