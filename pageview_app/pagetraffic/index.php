<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Views</title>
    <link rel="stylesheet" href="../index.css" />
    <link rel="stylesheet" href="../sidebar.css" />
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <!-- select css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<?php
include("../database/database.php");
?>

<body>




    <div class="container-fluid">
        <div class="row">
            <!-- this is sidebar  -->
            <!-- <div class="sidebar col-md-2" style="padding: 0px;">
                <div id="sidebarmain">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="index.php">User Views</a></li>
                    <li><a href="pageview.php">Page Views</a></li>

                </div>
            </div> -->
            <!-- second Part  -->
            <div class="contene-part col-md-12" id="secondpart">
                <div class="card-body">
                    <h5 class="card-title">Active Users & Traffic </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Let's have a Look </h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Today Active </h6>
                                </th>
                                <th>
                                    <h6>Yesterday Active</h6>
                                </th>
                                <th>
                                    <h6>Today Traffic</h6>
                                </th>
                                <th>
                                    <h6>Yesterday Traffic</h6>
                                </th>
                            </tr>
                            <tr>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>8000 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>86000 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>803400 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>80400 </a></h3>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- This is the second card for the traffic using the exam  -->

                <div class="card-body">
                    <h5 class="card-title">Exam Wise Traffic </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Let's have a Look </h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <h6>NEET</h6>
                                </th>
                                <th>
                                    <h6>JEE</h6>
                                </th>
                                <th>
                                    <h6>AP-EAMCET-MPC</h6>
                                </th>
                                <th>
                                    <h6>BITSAT </h6>
                                </th>
                                <th>
                                    <h6>Neet & JEE</h6>
                                </th>
                                <th>
                                    <h6>TS-EAMCET-MPC</h6>
                                </th>
                                <th>
                                    <h6>AP-EAMCET-BiPC</h6>
                                </th>
                                <th>
                                    <h6>TS-EAMCET-BiPC</h6>
                                </th>
                            </tr>
                            <tr>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>8000 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>86000 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>803400 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>80400 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>80400 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>80400 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>80400 </a></h3>
                                </td>
                                <td class="count_td">
                                    <h3 class="text-danger "><a>80400 </a></h3>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- Third part to show the topmost visited pages  -->
                <div class="card-body">
                    <h5 class="card-title">Top Most Visited Pages </h5>
                    <table class="table table-bordered" id="tati">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Page Name </h6>
                                </th>
                                <th>
                                    <h6>Views </h6>
                                </th>

                            </tr>
                        </thead>

                    </table>
                </div>
                <hr>

                <div class="card-body">
                    <div id="top_x_div" style="width: 1000px ; height: 500px;"></div>
                </div>
                <hr>
                <div class="card-body">
                    <div id="" style="width: 800px; height: 500px;"></div>
                </div>

                <!-- <div id="top_x_div" style="width: 800px; height: 500px;"></div> -->

            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- My scripts starts from here  -->
    <script>
        (function() {


            let cols = [{
                    data: "Max Visit "
                },
                {
                    data: "Low Visit  "
                }
            ]
            let mytbl = $('#tati').DataTable({

                columns: cols,
                "paging": true,
                "filter": false,
                "info": true,
                "lengthChange": true,
                "order": [
                    [1, "desc"]
                ]
            });


            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawStuff);
            var livedata = null;
            $.get("../ajax/get_page_views.php", (json) => {

                livedata = JSON.parse(json)
            })

            function drawStuff() {
                console.log(livedata)
                var data = new google.visualization.arrayToDataTable(livedata);

                var options = {
                    width: 1000,
                    legend: {
                        position: 'none'
                    },
                    chart: {
                        title: 'Page Count ( Views )',
                        subtitle: 'popularity by percentage'
                    },
                    axes: {
                        x: {
                            0: {
                                side: 'top',
                                label: 'White to move'
                            } // Top x-axis.
                        }
                    },
                    bar: {
                        groupWidth: "90%"
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                // Convert the Classic options to Material options.
                chart.draw(data, google.charts.Bar.convertOptions(options));
            };
        })();
    </script>

</body>
<?php
$conn2->close();
$conn1->close();
?>

</html>