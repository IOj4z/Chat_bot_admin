@extends('layouts.layout')

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Количество мероприятий</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
{{--                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
            </div>
        </div>
        <div class="card-body">
            <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 435px;" width="435" height="250" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Средний процент посещения участников</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
{{--                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
            </div>
        </div>
        <div class="card-body">
            <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 435px;" width="435" height="250" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts')
    <script>

        let ctx = document.querySelector('#barChart').getContext('2d');
        const labels = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];
        const NUMBER_CFG = {count: labels.length, min: -100, max: 100};
        const data = {
            labels: labels,
            datasets: [
                {
                label: 'Мероприятия',
                data: NUMBER_CFG,
                backgroundColor: [
                    'rgba(255, 205, 86, 0.9)',
                ],
                borderWidth: 1
            },
                {
                label: 'Участники',
                data: [NUMBER_CFG,11, 33, 23, 52, 5, 3, 63],
                backgroundColor: [
                    'rgba(12, 42, 86, 0.9)',
                ],
                borderWidth: 1
            }
            ]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            },
        };

        const stackedBar = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });

/*
        let ctx2 = document.querySelector('#barChart2').getContext('2d');
        const labels2 = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];
        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'Участьники',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.9)',
                ],
                // borderColor: [
                //     'rgb(75, 192, 192)',
                // ],
                borderWidth: 1
            }]
        };
        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        const stackedBar2 = new Chart(ctx2, {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });*/
    </script>
@endsection
