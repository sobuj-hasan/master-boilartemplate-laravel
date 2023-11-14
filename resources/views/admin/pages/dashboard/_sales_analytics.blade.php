<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 header-style">Sales Analytics</h4>

                <div class="mt-1">
                    <ul class="list-inline main-chart mb-0">
                        <li class="list-inline-item chart-border-left me-0 border-0">
                            <h3 class="text-primary">$<span data-plugin="counterup">00</span><span
                                    class="text-muted d-inline-block font-size-15 ms-3">Revenue of
                                    {{ date('Y') }}</span></h3>
                        </li>
                        <li class="list-inline-item chart-border-left me-0">
                            <h3><span data-plugin="counterup">00</span><span
                                    class="text-muted d-inline-block font-size-15 ms-3">Sales of
                                    {{ date('Y') }}</span>
                            </h3>
                        </li>
                    </ul>
                </div>
                <canvas id="myChart" height="100px"></canvas>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labels = 120;
        var exploreserviceorder = 20;
        var packageorder = 20;
        var contentorder = 10;


        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            data: {
                labels: labels,
                datasets: [{
                        type: 'line',
                        fill: {
                            target: 'origin',
                            below: '#5b73e8'
                        },
                        label: 'Explore Service Order',
                        data: 20,
                        borderWidth: 1
                    },
                    {
                        type: 'bar',
                        label: 'Package Order',
                        data: 20,
                        borderWidth: 1
                    },
                    {
                        type: 'line',
                        label: 'Content Order',
                        data: 10,
                        borderWidth: 5
                    }
                ]
            },

        });
    </script>
@endpush
