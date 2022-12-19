@extends('admin.layout.master')

@push('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        .map_canvas-1 {
            width: 800px !important;
            height: 800px !important;
        }
    </style>
@endpush
@section('content')
    <div class="card-body">

        <form action="{{ route('statistics.filterByDate') }}" method="GET">
            <p>Từ ngày: <input type="text" id="datepicker1" name="date1"></p>
            <p>Đến ngày: <input type="text" id="datepicker2" name="date2"></p><br>
            <button type="submit" id="btn">Lọc</button>
        </form>



        <div class="map_canvas">
            <canvas id="myChart" width="auto" height="100"></canvas>
        </div>

        <h2>Đơn hàng </h2>
        <h4>Tổng số đơn: {{ $countOrder }}</h4>
        <h4>Doanh thu: {{ $sumOrder }}</h4>





        <h4>Top sản phẩm bán chạy</h4>
        <table class="table table-hover table-centered mb-0">
            <thead>
                <tr>
                    <th>Tên</th>

                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topSale as $key)
                    <tr>
                        <td>{{ $key->product_name }}</td>
                        <td><span class="badge badge-primary">{{ $key->quantityy }}</span></td>
                        <td>{{ $key->totall }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <h2>Biểu đồ sản phẩm </h2>
        <div class="map_canvas-1">
            <canvas id="myChartDonut"></canvas>
        </div>


    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script>
        $(function() {
            $("#datepicker1").datepicker();
        });

        $(function() {
            $("#datepicker2").datepicker();
        });
        $(document).ready(function() {
            $('#btn').click(function() {
                var date1 = $('#datepicker1').val();
                alert(date1);
            });
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Doanh thu theo ngày',
                    data: <?php echo json_encode($prices); ?>,
                    backgroundColor: [
                        'rgba(31, 58, 147, 1)',
                        'rgba(37, 116, 169, 1)',
                        'rgba(92, 151, 191, 1)',
                        'rgb(200, 247, 197)',
                        'rgb(77, 175, 124)',
                        'rgb(30, 130, 76)'
                    ],
                    borderColor: [
                        'rgba(31, 58, 147, 1)',
                        'rgba(37, 116, 169, 1)',
                        'rgba(92, 151, 191, 1)',
                        'rgb(200, 247, 197)',
                        'rgb(77, 175, 124)',
                        'rgb(30, 130, 76)'
                    ],
                    borderWidth: 1
                }]
            },
            // options: {
            //     scales: {
            //         y: {
            //             max: 200,
            //             min: 0,
            //             ticks: {
            //                 stepSize: 50
            //             }
            //         }
            //     },
            //     plugins: {
            //         title: {
            //             display: false,
            //             text: 'Custom Chart Title'
            //         },
            //         legend: {
            //             display: false,
            //         }
            //     }
            // }
        });


        var ctx1 = document.getElementById('myChartDonut').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labelsDonut); ?>,
                datasets: [{
                    label: 'Doanh thu theo ngày',
                    data: <?php echo json_encode($pricesDonut); ?>,
                    backgroundColor: [
                        'rgba(31, 58, 147, 1)',
                        'rgb(200, 247, 197)',
                        'rgba(37, 116, 169, 1)',
                        'rgba(92, 151, 191, 1)',
                        'rgb(77, 175, 124)',
                        'rgb(30, 130, 76)'
                    ],

                    hoverOffset: 4,

                }]
            },
        });
        ctx1.style.width = '128px',
        ctx1.style.height = '128px'
        // options: {
        //     scales: {
        //         y: {
        //             max: 200,
        //             min: 0,
        //             ticks: {
        //                 stepSize: 50
        //             }
        //         }
        //     },
        //     plugins: {
        //         title: {
        //             display: false,
        //             text: 'Custom Chart Title'
        //         },
        //         legend: {
        //             display: false,
        //         }
        //     }
        // }
    </script>
@endpush
