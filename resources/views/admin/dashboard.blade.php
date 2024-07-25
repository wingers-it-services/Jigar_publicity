@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

<!--************
                                                                                                                            Content body start
                                                                                                                *************-->
<div class="content-body ">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-inline-block mb-4 ms--12 position-relative donut-chart-sale">
                            <span class="donut1" data-peity='{ "fill": ["rgb(192, 255, 134)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>{{ $totalIndustries }}/100</span>
                            <small class="text-primary">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M64 32C46.3 32 32 46.3 32 64l0 240 0 48 0 80c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-128 0-151.8c0-18.2-19.4-29.7-35.4-21.1L352 215.4l0-63.2c0-18.2-19.4-29.7-35.4-21.1L160 215.4 160 64c0-17.7-14.3-32-32-32L64 32z" />
                                </svg>
                            </small>
                            <span class="circle bg-primary"></span>
                        </div>
                        <h2 class="fs-24 text-black font-w600 mb-0">{{ $totalIndustries }}</h2>
                        <span class="fs-14">No. Of Industries</span>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-inline-block mb-4 ms--12 position-relative donut-chart-sale">
                            <span class="donut1" data-peity='{ "fill": ["rgb(255, 195, 210)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>{{ $totalIndustryCategories }}/100</span>
                            <small class="text-primary">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z" />
                                </svg>
                            </small>
                            <span class="circle bg-danger"></span>
                        </div>
                        <h2 class="fs-24 text-black font-w600 mb-0">{{ $totalIndustryCategories }}</h2>
                        <span class="fs-14">Industry Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-inline-block mb-4 ms--12 position-relative donut-chart-sale">
                            <span class="donut1" data-peity='{ "fill": ["rgb(238, 252, 255)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>{{ $totalIndustrialAreas }}/100</span>
                            <small class="text-primary">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm96 288l288 0c17.7 0 32-14.3 32-32l0-68.2c0-7.6-2.7-15-7.7-20.8l-65.8-76.8c-12.1-14.2-33.7-15-46.9-1.8l-21 21c-10 10-26.4 9.2-35.4-1.6l-39.2-47c-12.6-15.1-35.7-15.4-48.7-.6L135.9 215c-5.1 5.8-7.9 13.3-7.9 21.1l0 84c0 17.7 14.3 32 32 32z" />
                                </svg>
                            </small>
                            <span class="circle bg-info"></span>
                        </div>
                        <h2 class="fs-24 text-black font-w600 mb-0">{{ $totalIndustrialAreas }}</h2>
                        <span class="fs-14">Industrial Areas</span>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-inline-block mb-4 ms--12 position-relative donut-chart-sale">
                            <span class="donut1" data-peity='{ "fill": ["rgb(242, 255, 253)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>{{ $totalUsers }}/100</span>
                            <small class="text-primary">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                            </small>
                            <span class="circle bg-success"></span>
                        </div>
                        <h2 class="fs-24 text-black font-w600 mb-0">{{ $totalUsers }}</h2>
                        <span class="fs-14">Active Users</span>
                    </div>
                </div>
            </div>
            <div class="col-xl col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-inline-block mb-4 ms--12 position-relative donut-chart-sale">
                            <span class="donut1" data-peity='{ "fill": ["rgb(242, 255, 253)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>{{ $totalAds }}/100</span>
                            <small class="text-primary">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM229.5 173.3l72 144c5.9 11.9 1.1 26.3-10.7 32.2s-26.3 1.1-32.2-10.7L253.2 328l-90.3 0-5.4 10.7c-5.9 11.9-20.3 16.7-32.2 10.7s-16.7-20.3-10.7-32.2l72-144c4.1-8.1 12.4-13.3 21.5-13.3s17.4 5.1 21.5 13.3zM208 237.7L186.8 280l42.3 0L208 237.7zM392 256a24 24 0 1 0 0 48 24 24 0 1 0 0-48zm24-43.9l0-28.1c0-13.3 10.7-24 24-24s24 10.7 24 24l0 96 0 48c0 13.3-10.7 24-24 24c-6.6 0-12.6-2.7-17-7c-9.4 4.5-19.9 7-31 7c-39.8 0-72-32.2-72-72s32.2-72 72-72c8.4 0 16.5 1.4 24 4.1z" />
                                </svg>
                            </small>
                            <span class="circle bg-success"></span>
                        </div>
                        <h2 class="fs-24 text-black font-w600 mb-0">{{ $totalAds }} Ads</h2>
                        <span class="fs-14">Total Advertisement</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="text-black fs-20 mb-0">Payment Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="media align-items-center border border-warning rounded p-3 mb-md-4 mb-3">
                            <div class="d-inline-block me-3 position-relative donut-chart-sale2">
                                <span class="donut2" data-peity='{ "fill": ["rgb(255, 148, 50)", "rgba(255, 255, 255, 1)"],   "innerRadius": 27, "radius": 10}'>{{ $paidStatus }}/10</span>
                                <small class="text-primary">
                                    {{ $paidStatus }}
                                </small>
                            </div>
                            <div>
                                <h4 class="fs-18 text-black mb-0">Completed</h4>
                            </div>
                        </div>
                        <div class="media align-items-center border border-info rounded p-3 mb-md-4 mb-3">
                            <div class="d-inline-block me-3 position-relative donut-chart-sale2">
                                <span class="donut2" data-peity='{ "fill": ["rgb(30, 167, 197)", "rgba(255, 255, 255, 1)"],   "innerRadius": 27, "radius": 10}'>{{ $pendingStatus }}/10</span>
                                <small class="text-primary">
                                    {{ $pendingStatus }}
                                </small>
                            </div>
                            <div>
                                <h4 class="fs-18 text-black mb-0">Pending</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Status Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-legend"></div>
                        <div id="animating-donut" class="ct-chart ct-golden-section chartlist-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
</div>
<!--************
                                                                                                                Content body end
                                                                                                    *************-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchPaymentStatus();

        function fetchPaymentStatus() {
            fetch("{{ route('get-payment-status') }}")
                .then(response => response.json())
                .then(data => {
                    updatePieChart(data);
                    createLegend();
                })
                .catch(error => {
                    console.error('Error fetching payment status:', error);
                });
        }

        function updatePieChart(data) {
            var chartData = {
                series: [data.paid, data.pending]
            };

            var options = {
                donut: true,
                donutWidth: 60,
                startAngle: 180,
                showLabel: true,
                // Define colors for the slices
                colors: ['#FF5733', '#FFC300'], // Example colors, replace with your preferred colors
                // Animation settings
                animation: {
                    // On load animation
                    drawInitial: {
                        type: 'easeOut',
                        duration: 1000
                    }
                }
            };

            var chart = new Chartist.Pie('#animating-donut', chartData, options);

            chart.on('draw', function(data) {
                if (data.type === 'slice') {
                    var pathLength = data.element._node.getTotalLength();

                    data.element.attr({
                        'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
                    });

                    if (data.index === 0) {
                        var animationDefinition = {
                            'stroke-dashoffset': {
                                id: 'anim' + data.index,
                                dur: 1000,
                                from: -pathLength + 'px',
                                to: '0px',
                                easing: Chartist.Svg.Easing.easeOutQuint,
                            }
                        };

                        data.element.attr({
                            'stroke-dashoffset': -pathLength + 'px'
                        });

                        data.element.animate(animationDefinition, true);
                    }
                }
            });
        }

        function createLegend() {
            var legendContainer = document.getElementById('chart-legend');
            legendContainer.innerHTML = '';

            var legendItems = [{
                    color: '#87CEEB', // Green color for 'Paid'
                    label: 'Paid'
                },
                {
                    color: '#37D1BF', // Sky blue color for 'Pending'
                    label: 'Pending'
                }
            ];

            legendItems.forEach(function(item) {
                var legendItem = document.createElement('div');
                legendItem.style.display = 'flex';
                legendItem.style.alignItems = 'center';
                legendItem.style.marginBottom = '5px';

                var colorBox = document.createElement('div');
                colorBox.style.width = '10px';
                colorBox.style.height = '10px';
                colorBox.style.backgroundColor = item.color;
                colorBox.style.marginRight = '10px';

                var label = document.createElement('span');
                label.textContent = item.label;

                legendItem.appendChild(colorBox);
                legendItem.appendChild(label);
                legendContainer.appendChild(legendItem);
            });
        }
    });
</script>

<style>
    .ct-chart .ct-series.ct-series-a .ct-bar, .ct-chart .ct-series.ct-series-a .ct-line, .ct-chart .ct-series.ct-series-a .ct-point, .ct-chart .ct-series.ct-series-a .ct-slice-donut {
    stroke: #87CEEB;
}

.ct-chart .ct-label {
    fill: darkblue;
    color: darkblue;
    font-size: 0.75rem;
    line-height: 1;
}
</style>

@endsection