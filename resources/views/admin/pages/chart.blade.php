@extends('admin.layouts.master')
@section('content')
@include('admin.layouts.sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quan sát dữ liệu qua biểu đồ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Biểu đồ đơn hàng theo ngày</h5>
                        <!-- Line Chart -->
                        <canvas id="lineChart" style="max-height: 400px;"></canvas>
                        @php
                        $chartData = [];
                        foreach ($orders as $order) {
                        $chartData[] = [
                        'date' => $order->date,
                        'count' => $order->count,
                        ];
                        }
                        @endphp
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                            const chartData = @json($chartData);
                            const labels = chartData.map(item => item.date);
                            const data = chartData.map(item => item.count);

                            new Chart(document.querySelector('#lineChart'), {
                            type: 'line',
                            data: {
                            labels: labels,
                            datasets: [{
                            label: 'Line Chart',
                            data: data,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                            }]
                            },
                            options: {
                            scales: {
                            y: {
                            beginAtZero: true
                            }
                            }
                            }
                            });
                            });
                        </script>
                        <!-- End Line CHart -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Biểu đồ bài viết theo chủ đề</h5>
                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        @php
                        $chartDataColumn = [];
                        foreach ($postCounts as $postCount) {
                        $topic = App\Models\Topic::find($postCount->topic_id);
                        $chartDataColumn[] = [
                        'value' => $postCount->count,
                        'name' => $topic->title , // Sử dụng tên danh mục thay vì ID
                        ];
                        }
                        @endphp
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const chartData = @json($chartDataColumn);

                                const labels = chartData.map(item => item.name);
                                const data = chartData.map(item => item.value);
                                const backgroundColors = [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ];
                                const borderColors = [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ];
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Bar Chart',
                                            data: data,
                                            backgroundColor: backgroundColors,
                                            borderColor: borderColors,
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- End Bar CHart -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thống kê doanh thu theo ngày</h5>
                        <!-- Area Chart -->
                        <div id="areaChart"></div>
                        @php
                        $dates = [];
                        $revenues = [];
                        foreach ($revenueByDate as $item) {
                        $dates[] = $item->date;
                        $revenues[] = $item->revenue;
                        }
                        @endphp
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const dates = @json($dates);
                                const revenues = @json($revenues);
                                series: [{
                                name: "Doanh thu",
                                data: revenues
                                }],
                                    new ApexCharts(document.querySelector("#areaChart"), {
                                series: [{
                                name: "Doanh thu",
                                data: revenues
                                }],
                                chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                enabled: false
                                }
                                },
                                dataLabels: {
                                enabled: false
                                },
                                stroke: {
                                curve: 'straight'
                                },
                                subtitle: {
                                text: 'Biểu đồ doanh thu',
                                align: 'left'
                                },
                                labels: dates,
                                xaxis: {
                                type: 'datetime',
                                },
                                yaxis: {
                                opposite: true
                                },
                                legend: {
                                horizontalAlign: 'left'
                                }
                                }).render();
                                });
                        </script>
                        <!-- End Area Chart -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Doughnut Chart</h5>

                        <!-- Doughnut Chart -->
                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                        @php
                        $chartDataDoughnut = [];
                        foreach ($productCounts as $productCount) {
                        $category = App\Models\Category::find($productCount->category_id);
                        $chartDataDoughnut[] = [
                        'value' => $productCount->count,
                        'name' => $category->title , // Sử dụng tên danh mục thay vì ID
                        ];
                        }
                        @endphp
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const chartData = @json($chartDataDoughnut);
                                const chart = echarts.init(document.querySelector("#trafficChart"));
                                chart.setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: chartData
                                    }]
                                });
                            });
                        </script>
                        <!-- End Doughnut CHart -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection