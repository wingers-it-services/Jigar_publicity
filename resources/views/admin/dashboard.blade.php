@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

<!--**********************************
                                                                                                Content body start
                                                                                    ***********************************-->
<div class="content-body ">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-inline-block mb-4 ms--12 position-relative donut-chart-sale">
                            <span class="donut1" data-peity='{ "fill": ["rgb(192, 255, 134)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>4/8</span>
                            <small class="text-primary">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.9353 18.3544C39.8731 18.1666 38.3337 13.75 32.5 13.75C25.9703 13.75 22.8666 17.9659 21.795 19.8719C20.6306 19.1822 19.1838 18.75 17.5 18.75C15.7922 18.75 14.35 19.1375 13.1275 19.7072C13.5697 16.695 13.6987 13.1119 13.7353 11.25H17.5C17.9175 11.25 18.3081 11.0413 18.54 10.6934L21.04 6.94344C21.4075 6.39156 21.2806 5.64813 20.7494 5.25031C18.3166 3.42531 15.1269 1.25 13.75 1.25C11.6137 1.25 6.95688 6.24344 5.16469 9.38C0.0584378 18.3153 0 31.925 0 32.5C0 32.8797 0.172188 33.2391 0.46875 33.4759C7.56469 39.1522 15.7519 40 20 40C23.3716 40 29.9756 39.4391 36.3306 35.6834C38.5938 34.3456 40 31.8706 40 29.2244V18.75C40 18.6156 39.9781 18.4822 39.9353 18.3544ZM37.5 29.2244C37.5 30.9912 36.565 32.6419 35.0584 33.5316C29.2162 36.9844 23.1166 37.5 20 37.5C16.9178 37.5 9.15156 36.9453 2.51094 31.8981C2.58406 29.19 3.14094 17.96 7.33531 10.62C9.09187 7.54813 12.7112 4.16312 13.7722 3.76562C14.4606 3.96406 16.4566 5.23219 18.2972 6.55125L16.8309 8.75H12.5C11.8091 8.75 11.25 9.30969 11.25 10C11.25 10.0822 11.2344 17.9659 10.185 21.6878C9.46375 22.3391 8.88656 22.9872 8.43125 23.4994C8.2175 23.7403 8.02969 23.9522 7.86594 24.1166C7.3775 24.605 7.3775 25.3959 7.86594 25.8841C8.35437 26.3722 9.14531 26.3725 9.63344 25.8841C9.82625 25.6913 10.0472 25.4441 10.3 25.1603C11.6003 23.6975 13.7756 21.25 17.5 21.25C20.5884 21.25 22.5 23.1966 22.5 25C22.5 25.6903 23.0591 26.25 23.75 26.25C24.4409 26.25 25 25.6903 25 25C25 23.8181 24.5506 22.6022 23.7313 21.5581C24.1503 20.66 26.5119 16.25 32.5 16.25C35.99 16.25 37.2228 18.39 37.5 18.9922V29.2244Z" fill="white" />
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
                            <span class="donut1" data-peity='{ "fill": ["rgb(255, 195, 210)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>3/8</span>
                            <small class="text-primary">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip1)">
                                        <path d="M32.5972 16.2892C32.396 15.8517 32.0044 15.5314 31.5358 15.4211C31.067 15.3107 30.5737 15.4225 30.1984 15.7243C29.5264 16.2647 28.6792 16.5622 27.8126 16.5623C26.7941 16.5624 25.8366 16.1663 25.1165 15.447C24.397 14.7282 24.0006 13.7706 24.0006 12.7504C24.0006 12.346 24.063 11.9035 24.1862 11.4348C24.6802 9.55445 24.6864 7.57584 24.204 5.71301C23.7158 3.82808 22.7376 2.10392 21.3752 0.727114C21.1908 0.54055 21.09 0.442581 21.09 0.442581C20.4892 -0.141565 19.5339 -0.14844 18.9257 0.427737C18.7859 0.560082 15.4647 3.72151 12.1 8.3035C7.49236 14.5779 5.15617 20.248 5.15617 25.1562C5.15617 29.1273 6.70048 32.8566 9.50457 35.6575C12.3083 38.458 16.0359 40.0002 20.0005 40.0001C23.9651 39.9999 27.6923 38.4576 30.4955 35.6575C33.2995 32.8567 34.8438 29.1551 34.8438 25.2343C34.8438 22.5407 34.0879 19.5312 32.5972 16.2892ZM22.6961 35.4472C21.9761 36.1664 21.0186 36.5624 20.0001 36.5625C18.9816 36.5626 18.0242 36.1665 17.304 35.4472C16.5845 34.7284 16.1881 33.7707 16.1881 32.7506C16.1881 30.3061 18.3931 27.2754 19.9878 25.4753C21.589 27.3136 23.8119 30.3943 23.8119 32.7821C23.8119 33.782 23.4156 34.7285 22.6961 35.4472ZM28.2871 33.4464C27.7708 33.9621 27.2144 34.423 26.6256 34.8278C26.8301 34.1729 26.9369 33.4853 26.9369 32.7821C26.9369 30.6427 25.9326 28.1741 23.9518 25.4447C22.5457 23.5071 21.1487 22.1406 21.09 22.0835C20.4893 21.4988 19.5343 21.4922 18.9256 22.0685C18.8666 22.1245 17.4638 23.4596 16.0534 25.3804C14.0691 28.0825 13.063 30.5621 13.063 32.7506C13.063 33.4673 13.1719 34.1668 13.3795 34.8313C12.7889 34.4257 12.2308 33.9636 11.7129 33.4464C9.49988 31.236 8.28112 28.2918 8.28112 25.1562C8.28112 16.7851 16.7974 7.12224 19.9336 3.84831C21.3135 5.76778 21.7861 8.27217 21.1637 10.6406C20.9725 11.3684 20.8755 12.0782 20.8755 12.7505C20.8755 14.6061 21.5973 16.349 22.908 17.658C24.2182 18.9668 25.9601 19.6876 27.8127 19.6874C28.7132 19.6874 29.6026 19.5103 30.4282 19.1748C31.2853 21.3866 31.7186 23.419 31.7186 25.2343C31.7187 28.3195 30.5 31.2359 28.2871 33.4464Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip1">
                                            <rect width="40" height="40" fill="white" />
                                        </clipPath>
                                    </defs>
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
                            <span class="donut1" data-peity='{ "fill": ["rgb(238, 252, 255)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>8/8</span>
                            <small class="text-primary">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip3)">
                                        <path d="M20 32.9688C17.4153 32.9688 15.3125 30.8659 15.3125 28.2812C15.3125 25.6966 17.4153 23.5938 20 23.5938C22.5847 23.5938 24.6875 25.6966 24.6875 28.2812C24.6875 30.8659 22.5847 32.9688 20 32.9688ZM20 26.7188C19.1384 26.7188 18.4375 27.4197 18.4375 28.2812C18.4375 29.1428 19.1384 29.8438 20 29.8438C20.8616 29.8438 21.5625 29.1428 21.5625 28.2812C21.5625 27.4197 20.8616 26.7188 20 26.7188ZM12.6373 20.7029C14.4202 20.687 16.1845 19.9548 17.8812 18.5266L15.8687 16.1359C13.593 18.0516 11.5632 18.0515 9.28742 16.1359L7.275 18.5267C8.99117 19.9711 10.775 20.7031 12.5782 20.7031C12.5979 20.7031 12.6177 20.703 12.6373 20.7029ZM32.5941 18.5994L30.6873 16.1236C28.3111 17.9535 26.259 17.9616 24.0334 16.1498L22.0605 18.5732C23.7464 19.9458 25.5029 20.632 27.2809 20.632C29.0471 20.6319 30.8346 19.9544 32.5941 18.5994ZM40 9.375H33.6466L40 2.92391V0H29.0625V3.125H35.4159L29.0625 9.57609V12.5H40V9.375ZM36.2987 15.625C36.6737 17.0209 36.875 18.4873 36.875 20C36.875 29.3049 29.3049 36.875 20 36.875C10.6951 36.875 3.125 29.3049 3.125 20C3.125 10.6951 10.6951 3.125 20 3.125C22.1183 3.125 24.146 3.51844 26.0156 4.23422V0.917344C24.0943 0.314141 22.0714 0 20 0C14.6578 0 9.63539 2.08039 5.85781 5.85781C2.08039 9.63539 0 14.6578 0 20C0 25.3422 2.08039 30.3646 5.85781 34.1422C9.63539 37.9196 14.6578 40 20 40C25.3422 40 30.3646 37.9196 34.1422 34.1422C37.9196 30.3646 40 25.3422 40 20C40 18.5101 39.8377 17.0452 39.5224 15.625H36.2987Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip3">
                                            <rect width="40" height="40" fill="white" />
                                        </clipPath>
                                    </defs>
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
                            <span class="donut1" data-peity='{ "fill": ["rgb(242, 255, 253)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>8/8</span>
                            <small class="text-primary">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.1666 19.5283C27.8064 18.2461 29.0052 16.484 29.5958 14.4879C30.1863 12.4919 30.1393 10.3612 29.4611 8.39317C28.783 6.4251 27.5076 4.71772 25.8128 3.5091C24.118 2.30048 22.0883 1.65088 20.0066 1.65088C17.925 1.65088 15.8953 2.30048 14.2005 3.5091C12.5057 4.71772 11.2303 6.4251 10.5522 8.39317C9.87403 10.3612 9.82697 12.4919 10.4175 14.4879C11.0081 16.484 12.2069 18.2461 13.8466 19.5283C10.7486 20.761 8.09109 22.8939 6.21709 25.6517C4.34309 28.4096 3.33862 31.6657 3.33331 35V36.6667C3.33331 37.1087 3.50891 37.5326 3.82147 37.8452C4.13403 38.1577 4.55795 38.3333 4.99998 38.3333H35C35.442 38.3333 35.8659 38.1577 36.1785 37.8452C36.4911 37.5326 36.6666 37.1087 36.6666 36.6667V35C36.6624 31.6673 35.6599 28.4122 33.7884 25.6546C31.9169 22.8969 29.2622 20.7631 26.1666 19.5283ZM13.3333 11.6667C13.3333 10.3481 13.7243 9.0592 14.4569 7.96287C15.1894 6.86654 16.2306 6.01206 17.4488 5.50748C18.6669 5.00289 20.0074 4.87087 21.3006 5.12811C22.5938 5.38534 23.7817 6.02028 24.714 6.95263C25.6464 7.88498 26.2813 9.07286 26.5385 10.3661C26.7958 11.6593 26.6638 12.9997 26.1592 14.2179C25.6546 15.4361 24.8001 16.4773 23.7038 17.2098C22.6075 17.9423 21.3185 18.3333 20 18.3333C18.2319 18.3333 16.5362 17.631 15.2859 16.3807C14.0357 15.1305 13.3333 13.4348 13.3333 11.6667ZM6.66665 35C6.66665 31.4638 8.0714 28.0724 10.5719 25.5719C13.0724 23.0714 16.4638 21.6667 20 21.6667C23.5362 21.6667 26.9276 23.0714 29.4281 25.5719C31.9286 28.0724 33.3333 31.4638 33.3333 35H6.66665Z" fill="white" />
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
                            <span class="donut1" data-peity='{ "fill": ["rgb(242, 255, 253)", "rgba(255, 255, 255, 1)"],   "innerRadius": 45, "radius": 10}'>8/8</span>
                            <small class="text-primary">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.1666 19.5283C27.8064 18.2461 29.0052 16.484 29.5958 14.4879C30.1863 12.4919 30.1393 10.3612 29.4611 8.39317C28.783 6.4251 27.5076 4.71772 25.8128 3.5091C24.118 2.30048 22.0883 1.65088 20.0066 1.65088C17.925 1.65088 15.8953 2.30048 14.2005 3.5091C12.5057 4.71772 11.2303 6.4251 10.5522 8.39317C9.87403 10.3612 9.82697 12.4919 10.4175 14.4879C11.0081 16.484 12.2069 18.2461 13.8466 19.5283C10.7486 20.761 8.09109 22.8939 6.21709 25.6517C4.34309 28.4096 3.33862 31.6657 3.33331 35V36.6667C3.33331 37.1087 3.50891 37.5326 3.82147 37.8452C4.13403 38.1577 4.55795 38.3333 4.99998 38.3333H35C35.442 38.3333 35.8659 38.1577 36.1785 37.8452C36.4911 37.5326 36.6666 37.1087 36.6666 36.6667V35C36.6624 31.6673 35.6599 28.4122 33.7884 25.6546C31.9169 22.8969 29.2622 20.7631 26.1666 19.5283ZM13.3333 11.6667C13.3333 10.3481 13.7243 9.0592 14.4569 7.96287C15.1894 6.86654 16.2306 6.01206 17.4488 5.50748C18.6669 5.00289 20.0074 4.87087 21.3006 5.12811C22.5938 5.38534 23.7817 6.02028 24.714 6.95263C25.6464 7.88498 26.2813 9.07286 26.5385 10.3661C26.7958 11.6593 26.6638 12.9997 26.1592 14.2179C25.6546 15.4361 24.8001 16.4773 23.7038 17.2098C22.6075 17.9423 21.3185 18.3333 20 18.3333C18.2319 18.3333 16.5362 17.631 15.2859 16.3807C14.0357 15.1305 13.3333 13.4348 13.3333 11.6667ZM6.66665 35C6.66665 31.4638 8.0714 28.0724 10.5719 25.5719C13.0724 23.0714 16.4638 21.6667 20 21.6667C23.5362 21.6667 26.9276 23.0714 29.4281 25.5719C31.9286 28.0724 33.3333 31.4638 33.3333 35H6.66665Z" fill="white" />
                                </svg>
                            </small>
                            <span class="circle bg-success"></span>
                        </div>
                        <h2 class="fs-24 text-black font-w600 mb-0">{{ $totalAds }} Ads</h2>
                        <span class="fs-14">Total Advertisement</span>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="text-black fs-20 mb-0">Payment Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="media align-items-center border border-warning rounded p-3 mb-md-4 mb-3">
                            <div class="d-inline-block me-3 position-relative donut-chart-sale2">
                                <span class="donut2" data-peity='{ "fill": ["rgb(255, 148, 50)", "rgba(255, 255, 255, 1)"],   "innerRadius": 27, "radius": 10}'>{{$paidStatus}}/10</span>
                                <small class="text-primary">
                                    {{$paidStatus}}
                                </small>
                            </div>
                            <div>
                                <h4 class="fs-18 text-black mb-0">Completed</h4>
                            </div>
                        </div>
                        <div class="media align-items-center border border-info rounded p-3 mb-md-4 mb-3">
                            <div class="d-inline-block me-3 position-relative donut-chart-sale2">
                                <span class="donut2" data-peity='{ "fill": ["rgb(30, 167, 197)", "rgba(255, 255, 255, 1)"],   "innerRadius": 27, "radius": 10}'>{{$pendingStatus}}/10</span>
                                <small class="text-primary">
                                    {{$pendingStatus}}
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
<!--**********************************
                                                                                                Content body end
                                                                                    ***********************************-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchPaymentStatus();

        function fetchPaymentStatus() {
            fetch("{{ route('get-payment-status') }}")
                .then(response => response.json())
                .then(data => {
                    updatePieChart(data);
                    createLegend(data);
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
                donutSolid: true,
                startAngle: 270,
                showLabel: true
            };

            var chart = new Chartist.Pie('#animating-donut', chartData, options);

            chart.on('draw', function(data) {
                if (data.type === 'slice') {
                    var pathLength = data.element._node.getTotalLength();

                    data.element.attr({
                        'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
                    });

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

                    data.element.animate(animationDefinition, false);
                }
            });
        }

        function createLegend(data) {
            var legendContainer = document.getElementById('chart-legend');
            legendContainer.innerHTML = '';

            var legendItems = [{
                    color: '#d70206',
                    label: 'Paid'
                },
                {
                    color: '#f4c63d',
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


@endsection