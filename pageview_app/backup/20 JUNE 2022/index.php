<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Views</title>
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="./sidebar.css" />
    <!-- bootstrap css  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <!-- select css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>
<?php
include("./database/database.php");
?>

<body>

    <script>
        function searchView() {

            console.log(" Log is working fine ")

            let exam_ids = $("#exam_ids").val()
            console.log(" I an the value ")
            console.log("")

            exam_ids = $("#exam_ids").val().toString();
            let class_ids = $("#class_ids").val().toString();
            let device_ids = $("#device_ids").val().toString();
            let package_ids = $("#package_ids").val().toString();

            console.log(exam_ids);
            console.log(class_ids);
            console.log(device_ids);
            console.log(package_ids);

            let ajaxdata = {
                exam_ids: exam_ids,
                class_ids: class_ids,
                device_ids: device_ids,
                package_ids: package_ids

            }


            $.get("../pageview_app/ajax/get_users_views.php", {
                data: ajaxdata
            }, (data) => {
                console.log(data)
                let table = $('#nikk').DataTable();
                
                table.clear().draw();
                console.log(table);
                let jsonObject = JSON.parse(data);
                var result = [];
                for (let i = 0; i < jsonObject.length; i++) {
                    result.push(jsonObject[i])
                }

                if (Array.isArray(result) == true) {
                    table.rows.add(result).draw();
                    console.log(" Yes our variable is array so what's the problem with datatable ")
                } else {
                    console.log("Oh !! Nikhil problem with you man ...")
                }
                table.draw();
  		 $('select').selectpicker('refresh');

            })
        }
    </script>


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
            <!-- this is the content part  -->
            <div class="contene-part col-md-12" id="secondpart">

                <div class="optnscontainer mt-1 mb-5" style="width: 100%">
                    <h5 class="card-title">Filter Data</h5>
                    <div class="row  mb-4 mt-4">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Class</label>
                                <div class="col-sm-8">
                                    <select class="selectpicker" id="class_ids" multiple>
                                        <?php
                                        $q = "select id,class from class";
                                        $result = $conn2->query($q);
                                        while ($row = mysqli_fetch_assoc($result)) {

                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['class']; ?></option>

                                        <?php } ?>

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Device</label>
                                <div class="col-sm-8">
                                    <select class="selectpicker" id="device_ids" multiple>
                                        <option value="1">Mobile</option>
                                        <option value="2">Others</option>
                                        <option value="3">Web</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- This is the Second Row  -->
                    <div class="row  mb-3">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Exam </label>
                                <div class="col-sm-8">
                                    <select class="selectpicker" id="exam_ids" multiple>
                                        <?php
                                        $q = "select id,exam from exam";
                                        $result = $conn1->query($q);
                                        while ($row = mysqli_fetch_assoc($result)) {

                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['exam']; ?></option>

                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Package</label>
                                <div class="col-sm-8">
                                    <select class="selectpicker" id="package_ids" multiple>
                                        <option value=1>Mustard</option>
                                        <option value=2>Ketchup</option>
                                        <option value=3>Relish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- This is the third row -->
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="row mb-5 srchbtnrow">
                        <div class="col-md-8"></div>
                        <div class="col-md-3" onclick="searchView()">
                            <button class="btn btn-secondary btn-block w-5"> Search Views</button>
                        </div>

                    </div>
                </div>

                <hr>
                <!-- From here start the table coding  -->
                <table id="nikk" class="display mytbl" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <!-- <th>First Visit Time</th> -->
                            <th>Target Year</th>
                            <!-- <th>Package</th> -->
                            <th>Course</th>
                            <th>Registered Date</th>
                            <!-- <th>Last Visit Time</th> -->
                            <th>Total Page Views</th>
                            <!-- <th>Unique Page Views</th> -->
                        </tr>
                    </thead>
                </table>


            </div>

        </div>
    </div>





    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>-->
    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->

    <script>
        // self executing function here
        (function() {
            $('select').selectpicker({
                liveSearch: true
            });
            $('select').selectpicker('refresh');

            let data = [];
            let cols = [{
                    data: "id"
                },
                {
                    data: "name"
                },
                {
                    data: "mobile"
                },
                {
                    data: "target_year"
                },
                {
                    data: "exam_id"
                },
                {
                    data: "registered_time"
                },
                {
                    data: "total_count"
                }
            ]

            function fun() {
                return {
                    "class_ids": $("#class_ids").val().toString(),
                    "exam_ids": $("#exam_ids").val().toString()
                }
            }

            let mytbl = $('#nikk').DataTable({
                ajax: {
                    url: "../pageview_app/ajax/get_users_views.php",
                    type: "POST",
                    data: fun(),
                },
                columns: cols,
                scrollX: true,
                "pageLength": 30
            });


        })();
        // Self executing function 
    </script>
</body>
<?php
$conn2->close();
$conn1->close();
?>

</html>