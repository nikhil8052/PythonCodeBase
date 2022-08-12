<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <!-- select css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- ChartList CDNS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="./css/index.css">


</head>

<body>

    <script>
        // Global Variables 
        var examWiseGlobalData = undefined
        var todoData = undefined
        let paidUsersData = undefined
        let freeUsersData = undefined
        var pdLineChartVar = undefined
        var pdBarChartVar = undefined
        var overallChartVar = undefined
        var neetGC = undefined
        var jeeGC = undefined
        var neet_jeeGC = undefined
        var ts_emcet_mpcGC = undefined
    </script>

    <div class="container-fluid">
        <!-- Analys the performance  -->

        <!-- Yearly-Count First Row showing the year wise count -->
        <div class="row mb-3 bcffffff">
            <div class="col-md-12">
                <div class="card border" style="width: 100%;">
                    <div class="card-body border">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <button class="btn btn-dark" style="float: right;" data-toggle="modal" data-target="#snapshotmodal"> Take Snapshot </button>
                                <button class="btn btn-dark" style="float: right;margin-right:20px;" onclick="loadTodoData(this)" data-toggle="modal" data-target="#todomodal"> Todo List </button>
                            </div>
                        </div>
                        <h5 class="card-title">Yearly Count </h5>
                        <div class="row">
                            <div class="col-md-3 mb-2 ">
                                <div class="card bs" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title" id="y1">2019</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mt-4 text-success">Total Users</h6>
                                                <h4 class=" text-danger" id="y1c">0</h4>

                                            </div>
                                            <div class="col-md-6">
                                                <img src="./icons/ycicon1.png" alt="" class="img-fluid zoomit " value="1" style="cursor:pointer;height:80px" onclick="loadExamMonthData(1)" data-bs-toggle="modal" data-bs-target="#exampleModal" />
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2 ">
                                <div class="card bs" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title " id="y2">2020</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mt-4 text-success">Total Users</h6>
                                                <h4 class=" text-danger" id="y2c">0</h4>

                                            </div>
                                            <div class="col-md-6">
                                                <img src="./icons/ycicon2.png" alt="" class="img-fluid zoomit " value="1" style="cursor:pointer;height:80px" onclick="loadExamMonthData(1)" data-bs-toggle="modal" data-bs-target="#exampleModal" />
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2 ">
                                <div class="card bs" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title " id="y3">2021</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mt-4 text-success">Total Users</h6>
                                                <h4 class=" text-danger" id="y3c">0</h4>

                                            </div>
                                            <div class="col-md-6">
                                                <img src="./icons/ycicon3.webp" alt="" class="img-fluid zoomit " value="1" style="cursor:pointer;height:80px" onclick="loadExamMonthData(1)" data-bs-toggle="modal" data-bs-target="#exampleModal" />
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2 ">
                                <div class="card bs" style="width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title " id="y4"> 2022 <small class="text-success">(Current Year)</small> </h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mt-4 text-success">Total Users</h6>
                                                <h4 class=" text-danger" id="y4c">0</h4>

                                            </div>
                                            <div class="col-md-6">
                                                <img src="./icons/ycicon4.png" alt="" class="img-fluid zoomit " value="1" style="cursor:pointer;height:80px" onclick="loadExamMonthData(1)" data-bs-toggle="modal" data-bs-target="#exampleModal" />
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>





                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- First Graph for Overall Data  -->
    <div class="card border">
        <div class="card-body border">
            <h5 class="card-title">Overall Data Graph Overview</h5>
            <!-- All the filters are here  -->
            <div class="row border m-2 p-2">
                <div class="col-md-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" onchange="zoomEffectToggle(this)" id="zoom_effect_btn1">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Zoom Effect</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Pie Chart </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Bar Chart</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Line Chart</label>
                    </div>

                </div>

            </div>
            <!-- First-Row For Overall-1 Data  -->
            <div class="row  border">
                <!-- For Python Image  -->
                <!-- <div class="mm col-md-12" style="margin-left: 0px ;">
                        <img src="./images/overall/output.png" alt="" class="img-fluid zoomit1" />
                    </div> -->


                <!-- For Live-Chart Build Database Graph -->
                <div class="mm col-md-12" style="margin-left: 0px ;">
                    <div>
                        <!-- Overall-Canvas -->
                        <canvas id="overall" height="80"></canvas>
                    </div>

                </div>

            </div>

            <!-- Second Row For All Exam Wise Data  -->
            <!-- <div class="row  border">
                    <div class="col-md-12">
                        <img src="./images/neet/neet.png" alt="" class="img-fluid zoomit1" />
                    </div>
                </div> -->

        </div>
    </div>


    <!-- ------------------------------------------------------------------------------------------------- -->
    <!-- Start Of Card For Showing the all Exam Performance  -->

    <!-- EXAMS -->
    <div class="row border">
        <div class="col-md-12 border">
            <div class="card border mt-3 mb-4">
                <div class="card-body border" style="width: 100%;">
                    <!-- Exams-Graphs  -->
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">All Exam Deep Analysis</h5>
                        </div>
                        <div class="col-md-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="card" style="width:100%;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-md-4 col-form-label font-weight-bold ">Select Year</label>
                                                        <div class="col-md-8">
                                                            <select class="selectpicker form-control" onchange="examFiltersChanged(this)" style="width: 100%;" id="esy">
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-md-4 col-form-label font-weight-bold ">Select Month</label>
                                                    <div class="col-md-8">
                                                        <select class="selectpicker form-control" id="esm" onchange="examFiltersChanged(this)" style="width: 100%;">
                                                            <option value="1">January </option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row border p-3">
                        <div class="col-md-1" style="border: 1px solid #F1F2F3 ; border-radius:20px ; margin-right:2px ;background-color:#F1F2F3">
                            <div style="text-align:center;"> <small style="font-size: 10px; "><b>NEET</b></small></div>
                            <div style="text-align:center;"> <small id="t1">0</small></div>
                        </div>

                        <div class="col-md-1" style="border: 1px solid #F1F2F3 ; border-radius:20px ; margin-right:2px ;background-color:#F1F2F3">
                            <div style="text-align:center;"> <small style="font-size: 10px; "><b>JEE</b></small></div>
                            <div style="text-align:center;"> <small id="t2"> 0</small></div>
                        </div>

                        <div class="col-md-1" style="border: 1px solid #F1F2F3 ; border-radius:20px ; margin-right:2px ;background-color:#F1F2F3">
                            <div style="text-align:center;"> <small style="font-size: 10px; "><b>NEET & JEE</b></small></div>
                            <div style="text-align:center;"> <small id="t3">0</small></div>
                        </div>

                        <div class="col-md-1" style="border: 1px solid #F1F2F3 ; border-radius:20px ; margin-right:2px ;background-color:#F1F2F3">
                            <div style="text-align:center;"> <small style="font-size: 10px; "><b>TS-EAMCET-MPC</b></small></div>
                            <div style="text-align:center;"> <small id="t4">0</small></div>
                        </div>



                    </div>
                    <!-- Exam-Graph-Row-1  -->
                    <div class="row">

                        <div class="col-md-6 border p-3">

                            <div class="row">
                                <div class="col-md-4">
                                    <h5>NEET Analysis </h5>
                                </div>
                                <div class="col-md-8">

                                </div>
                            </div>
                            <hr>
                            <!-- Neet-Canvas -->
                            <canvas id="neet_gc" height="80"></canvas>
                        </div>
                        <div class="col-md-6 border p-3">
                            <h5>JEE Analysis </h5>
                            <hr>
                            <!-- Neet-Canvas -->
                            <canvas id="jee_gc" height="80"></canvas>
                        </div>
                    </div>
                    <!-- Exam-Graph-Row-2  -->
                    <div class="row">
                        <div class="col-md-6 border p-3">
                            <h5>Neet & JEE Analysis </h5>
                            <hr>
                            <!-- Neet-Jee-Canvas -->
                            <canvas id="neetjee_gc" height="80"></canvas>
                        </div>
                        <div class="col-md-6 border p-3">
                            <h5>TS-EAMCET-MPC</h5>
                            <hr>
                            <!-- Neet-Jee-Canvas -->
                            <canvas id="tsemcetmpc_gc" height="80"></canvas>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- MODEL Code Starts From Here  -->
    <!-- Modal -->
    <!-- This is the model to show the one exam deep analysis  -->
    <!-- M1 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable " style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row" style="width: 100%;">
                        <div class="col-md-6">
                            <h5 class="modal-title exam_mdl_ttl" id="exampleModalLabel">NEET Students Analysis</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <select class="selectpicker" onchange="manageUserModalTables(this)" style="float:right;">
                                <option value="1">Build Graph</option>
                                <option value="2">Paid Users </option>
                                <option value="3">Free Users</option>
                                <option value="4">Absent Users</option>
                                <option value="5">Total Users </option>
                                <option value="6">Notify Users</option>
                                <option value="0">Month Wise </option>
                                <option value="2">Reset </option>
                            </select>
                        </div>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="height: 65vh; overflow-y:scroll;">
                    <!-- Modal Row For Advance Filters  -->
                    <!-- <div class="row mb-3" style="display: none;">
                            <div class="col-md-12 btn-group">
                                <button class="btn btn-primary btn-sm mr-2" value="1" onclick="manageUserModalTables(this)"> Build Graph</button>
                                <button class="btn btn-primary btn-sm mr-2" value="2" onclick="manageUserModalTables(this)"> Paid Users </button>
                                <button class="btn btn-primary btn-sm mr-2" value="3" onclick="manageUserModalTables(this)"> Free Users </button>
                                <button class="btn btn-primary btn-sm mr-2" value="4" onclick="manageUserModalTables(this)"> Absent Users </button>
                                <button class="btn btn-primary btn-sm mr-2" value="5" onclick="manageUserModalTables(this)"> Total Users </button>
                                <button class="btn btn-primary btn-sm mr-2" value="6" onclick="manageUserModalTables(this)"> Notify Users </button>
                                <button class="btn btn-primary btn-sm mr-2" value="0" onclick="manageUserModalTables(this)"> Reset</button>
                            </div>
                        </div>
                        <hr> -->

                    <table id="exam_tbl" class="table table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Total Users</th>
                                <th>Active Users</th>
                                <th>Inactive Users</th>
                                <th>Performance</th>
                            </tr>
                        </thead>
                    </table>




                    <!-- Table for Showing the Free Users  -->
                    <div class="row" id="free_users">
                        <!-- Lets Select the Filter  -->
                        <div class="row m-1 mb-4 border" style="width: 100%;">
                            <div class="col-md-9 p-3">
                                <div class="btn-group btn-group-sm " role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-dark" value="1" onclick="monthChangedFree(this)">Jan</button>
                                    <button type="button" class="btn btn-outline-dark" value="2" onclick="monthChangedFree(this)">Feb</button>
                                    <button type="button" class="btn btn-outline-dark" value="3" onclick="monthChangedFree(this)">Mar</button>
                                    <button type="button" class="btn btn-outline-dark" value="4" onclick="monthChangedFree(this)">Aprl</button>
                                    <button type="button" class="btn btn-outline-dark" value="5" onclick="monthChangedFree(this)">May</button>
                                    <button type="button" class="btn btn-outline-dark" value="6" onclick="monthChangedFree(this)">Jun</button>
                                    <button type="button" class="btn btn-outline-dark" value="7" onclick="monthChangedFree(this)">July</button>
                                    <button type="button" class="btn btn-outline-dark" value="8" onclick="monthChangedFree(this)">Aug</button>
                                    <button type="button" class="btn btn-outline-dark" value="9" onclick="monthChangedFree(this)">Sep</button>
                                    <button type="button" class="btn btn-outline-dark" value="10" onclick="monthChangedFree(this)">Oct</button>
                                    <button type="button" class="btn btn-outline-dark" value="11" onclick="monthChangedFree(this)">Nov</button>
                                    <button type="button" class="btn btn-outline-dark" value="12" onclick="monthChangedFree(this)">Dec</button>
                                </div>
                            </div>
                            <div class="col-md-3 p-3 bg-dark">
                                <h5><i id="insertMonth" class="text-white">Please Select Month</i></h5>
                            </div>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Free Users Analysis</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Let's have a Look </h6>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6>Total Users</h6>
                                        </th>
                                        <th>
                                            <h6>Total Active</h6>
                                        </th>

                                        <th>
                                            <h6>Inactive Users</h6>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="freeUserTblBdy">
                                    <tr>
                                        <td class="count_td">
                                            <h3 class="text-danger "><a id="ftc">243</a></h3>
                                        </td>
                                        <td class="count_td">
                                            <h3 class="text-danger "><a id="ftac">2683</a></h3>
                                        </td>
                                        <td class="count_td">
                                            <h3 class="text-danger "><a id="ftinc">2463</a></h3>
                                        </td>
                                    </tr>
                                </tbody>


                            </table>
                        </div>
                    </div>

                    <!-- Table for Showing the Paid Users  -->
                    <div class="row" id="paid_users">
                        <!-- Lets Selec Paid-Month-Filter t the Filter  -->
                        <div class="row m-1 mb-4 border" id="pdmfil" style="width: 100%;">
                            <div class="col-md-9 p-3">
                                <div class="btn-group btn-group-sm " role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-dark" value="1" onclick="monthChangedPaid(this)">Jan</button>
                                    <button type="button" class="btn btn-outline-dark" value="2" onclick="monthChangedPaid(this)">Feb</button>
                                    <button type="button" class="btn btn-outline-dark" value="3" onclick="monthChangedPaid(this)">Mar</button>
                                    <button type="button" class="btn btn-outline-dark" value="4" onclick="monthChangedPaid(this)">Aprl</button>
                                    <button type="button" class="btn btn-outline-dark" value="5" onclick="monthChangedPaid(this)">May</button>
                                    <button type="button" class="btn btn-outline-dark" value="6" onclick="monthChangedPaid(this)">Jun</button>
                                    <button type="button" class="btn btn-outline-dark" value="7" onclick="monthChangedPaid(this)">July</button>
                                    <button type="button" class="btn btn-outline-dark" value="8" onclick="monthChangedPaid(this)">Aug</button>
                                    <button type="button" class="btn btn-outline-dark" value="9" onclick="monthChangedPaid(this)">Sep</button>
                                    <button type="button" class="btn btn-outline-dark" value="10" onclick="monthChangedPaid(this)">Oct</button>
                                    <button type="button" class="btn btn-outline-dark" value="11" onclick="monthChangedPaid(this)">Nov</button>
                                    <button type="button" class="btn btn-outline-dark" value="12" onclick="monthChangedPaid(this)">Dec</button>
                                </div>
                            </div>
                            <div class="col-md-3 p-3 bg-dark">
                                <h5><i id="insertMonth1" class="text-white">Please Select Month</i></h5>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="card-title">Paid Users Analysis</h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-12 mt-3 border p-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" onclick="pdAdvanceFilters(this)" value="1">
                                            <label class="form-check-label cursor-pointer" for="inlineRadio1">See Table View </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" onclick="pdAdvanceFilters(this)" value="4">
                                            <label class="form-check-label cursor-pointer" for="inlineRadio1">Bar Graph</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" onclick="pdAdvanceFilters(this)" value="2">
                                            <label class="form-check-label cursor-pointer" for="inlineRadio2">Line Graph</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" onclick="pdAdvanceFilters(this)" value="0">
                                            <label class="form-check-label cursor-pointer" for="inlineRadio4">Month Wise </label>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Let's have a Look </h6>
                            </div>

                            <!-- This Paid Table for Showing the Counts Paid-First-Table -->
                            <table class="table table-bordered" id="pdFirstTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6>Total Users</h6>
                                        </th>
                                        <th>
                                            <h6>Total Active</h6>
                                        </th>

                                        <th>
                                            <h6>Inactive Users</h6>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="paidUserTblBdy">
                                    <tr>
                                        <td class="count_td">
                                            <h4 class="text-secondary "><a id="pdt">243</a></h4>
                                        </td>
                                        <td class="count_td">
                                            <h4 class="text-success"><a id="pdtc">2683</a></h4>
                                        </td>
                                        <td class="count_td">
                                            <h4 class="text-danger "><a id="pdtina">2463</a></h4>
                                        </td>
                                    </tr>
                                </tbody>


                            </table>

                            <!--  Paid-Second-Table for Showing the Month and the Values  -->
                            <table id="paidSecondTbl" class="table table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Total Users</th>
                                        <th>Active Users</th>
                                        <th>Inactive Users</th>

                                    </tr>
                                </thead>
                            </table>

                            <!-- Paid Users Paid-Bar-Chart  -->

                            <div>
                                <canvas id="pd_bar_chart" height="80"></canvas>
                            </div>

                            <!-- Paid Users Paid-Line-Chart  -->
                            <div>
                                <canvas id="pd_line_chart" height="80"></canvas>
                            </div>
                            <!-- <div id="pd_line_chart"></div> -->

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- This is the second modal for the snapshot and email verification  -->
    <!-- M2 -->
    <div>
        <!-- Second-Modal -->
        <div class="modal fade" id="snapshotmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Email Verification </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group" id="email_id_div">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">Please enter your Email ID we will send you snapshot of current state.</small>
                            </div>
                            <div class="form-group" style="display: none;" id="email_otp_div">
                                <label for="exampleInputEmail1">Enter OTP</label>
                                <input type="email" class="form-control" id="eotpi" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">Please enter your Email ID we will send you snapshot of current state.</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <li style="float:right;" id="send_btn" value="1" onclick="takeSnapshot(this)" class="btn btn-primary btn-sm">Send OTP </li>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- todo-modal -->
    <!-- M3 -->
    <div>

        <!-- Modal -->
        <div class="modal fade" id="todomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width:90%;max-height:80vh">
                <div class="modal-content" style="height: 80vh;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rizee Todo List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="width: 100%">
                            <div class="card-body p-0">
                                <div class="row ">
                                    <div class="col-md-3 p-0 m-0">
                                        <div class="m-0 p-0" style="width: 100%;">
                                            <ul class="list-group" id="todoul">
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p id="todocontent"></p>
                                    </div>
                                    <div class="col-md-3">fgfg</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- LINKS -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./myscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <script src="../plugins/zoom-master/jquery.zoom.js"></script>
    <script src="../plugins/zoom-master/jquery.zoom.min.js"></script>
    <script>
        // Document Ready Starts From Here
        $(document).ready(function() {

            let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

            // Load-Neet load-grpahs
            function loadExamWiseGraphData() {
                $.getJSON("./datasets/neetjee_examwise_graphs_data.json", (data) => {

                    var neet_exam = []
                    var jee_exam = []
                    var neetjee_exam = []
                    var ts_emcet_mpc = []
                    window.examWiseGlobalData = data

                    console.log(" Jee json ", data[2020]['JEE']['monthly_count_arr'])
                    // Fill-Neet
                    for (let i = 0; i < data[2020]['NEET']['monthly_count_arr'].length; i++) {
                        var one = {
                            'x': i,
                            'y': data[2020]['NEET']['monthly_count_arr'][i]
                        }

                        one1 = {
                            'x': i,
                            'y': data[2020]['JEE']['monthly_count_arr'][i]
                        }

                        one2 = {
                            'x': i,
                            'y': data[2020]['Neet&JEE']['monthly_count_arr'][i]
                        }
                        one3 = {
                            'x': i,
                            'y': data[2020]['TS-EAMCET-MPC']['monthly_count_arr'][i]
                        }
                        neetjee_exam.push(one2)
                        ts_emcet_mpc.push(one3)
                        jee_exam.push(one1)
                        neet_exam.push(one)

                    }


                    window.neetGC.data.datasets[0].data = neet_exam
                    window.jeeGC.data.datasets[0].data = jee_exam
                    window.neet_jeeGC.data.datasets[0].data = neetjee_exam
                    window.ts_emcet_mpcGC.data.datasets[0].data = ts_emcet_mpc
                    window.neetGC.update()
                    window.jeeGC.update()
                    window.ts_emcet_mpcGC.update()
                    window.neet_jeeGC.update()

                })
            }

            // load the graph data Graph-Data
            function loadGraphData() {
                $.getJSON("./datasets/neetjee_graphs_global_data.json", (data) => {
                    loadExamWiseGraphData()
                    injectedData = []
                    $('#y1c').html(data[2019]['count'])
                    $('#y2c').html(data[2020]['count'])
                    $('#y3c').html(data[2021]['count'])
                    $('#y4c').html(data[2022]['count'])
                    console.log(data['overall_month_counts'])
                    // for (let i = 0; i < 13; i++) {
                    //     one={'x':i,'y':i+234}
                    //     injectedData.push(one)
                    // }
                    for (let i = 0; i < data['overall_month_counts'].length; i++) {
                        one = {
                            'x': i,
                            'y': data['overall_month_counts'][i]
                        }
                        injectedData.push(one)
                    }


                    window.overallChartVar.data.datasets[0].data = injectedData.slice(11, 40)
                    console.log(injectedData)
                    window.overallChartVar.update()

                })
            }
            loadGraphData()


            // Chart.js
            var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

            var data = {
                labels: labels,
                datasets: [{
                        barPercentage: 0.9,
                        categoryPercentage: 1,
                        label: 'Total Users ',
                        backgroundColor: 'rgb(0, 171, 244)',
                        borderColor: 'rgb(0, 171, 244)',
                        data: [30, 10, 5, 2, 20, 30, 45, 23, 53, 34, 34, 64],
                    },
                    {
                        barPercentage: 0.9,
                        categoryPercentage: 1,
                        label: 'Active Users',
                        backgroundColor: '#30ec08',
                        borderColor: '#30ec08',
                        data: [20, 103, 45, 24, 240, 30, 454, 243, 55, 34, 34, 64],
                    },
                    {
                        barPercentage: 0.9,
                        categoryPercentage: 1,
                        label: 'Inactive Users ',
                        backgroundColor: '#ee2128',
                        borderColor: '#ee2128',
                        data: [10, 103, 45, 24, 20, 30, 54, 23, 535, 34, 34, 64],
                    }
                ]
            };

            var data1 = {
                labels: labels,
                datasets: [{
                        label: 'Total Users ',
                        backgroundColor: 'rgb(0, 171, 244)',
                        borderColor: 'rgb(0, 171, 244)',
                        borderWidth: '1.5',
                        data: [0, 10, 5, 2, 20, 30, 45, 23, 53, 34, 34, 64],


                    },
                    {
                        label: 'Active Users ',
                        backgroundColor: '#30ec08',
                        borderColor: '#30ec08',
                        borderWidth: '1.5',
                        data: [0, 310, 52, 42, 2420, 350, 455, 223, 53, 34, 34, 64],
                    },
                    {
                        label: 'Inactive Users',
                        backgroundColor: '#ee2128',
                        borderColor: '#ee2128',
                        borderWidth: '1.5',
                        data: [0, 310, 52, 42, 2420, 350, 455, 223, 53, 34, 34, 64],
                    }
                ]
            };

            // Neet-Config
            var neet_gc_config = {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        borderColor: 'green',
                        borderWidth: 1,
                        radius: 0,
                        data: [],
                        fill: true
                    }]
                },
                options: {
                    animation,
                    interaction: {
                        intersect: false
                    },
                    plugins: {
                        legend: false
                    },
                    scales: {
                        x: {
                            type: 'linear'
                        }

                    }
                }
            };

            // Jee-Config
            var jee_gc_config = {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        borderColor: 'blue',
                        borderWidth: 1,
                        radius: 0,
                        data: [],
                        fill: true
                    }]
                },
                options: {
                    animation,
                    interaction: {
                        intersect: false
                    },
                    plugins: {
                        legend: false
                    },
                    scales: {
                        x: {
                            type: 'linear'
                        }
                    }
                }
            };
            // Neet-Jee-Config
            var neet_jee_gc_config = {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        borderColor: 'blue',
                        borderWidth: 1,
                        radius: 0,
                        data: [],
                        fill: true
                    }]
                },
                options: {
                    animation,
                    interaction: {
                        intersect: false
                    },
                    plugins: {
                        legend: false
                    },
                    scales: {
                        x: {
                            type: 'linear'
                        }
                    }
                }
            };

            // ts_emcet_mpc_config
            var ts_emcet_mpc_config = {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        borderColor: 'blue',
                        borderWidth: 1,
                        radius: 0,
                        data: [],
                        fill: true
                    }]
                },
                options: {
                    animation,
                    interaction: {
                        intersect: false
                    },
                    plugins: {
                        legend: false
                    },
                    scales: {
                        x: {
                            type: 'linear'
                        }
                    }
                }
            };

            var config = {
                type: 'bar',
                data: data,
                options: {}
            };

            var config1 = {
                type: 'line',
                data: data1,
                options: {
                    elements: {
                        point: {
                            radius: 0
                        }
                    }
                }
            };




            window.pdBarChartVar = new Chart(
                document.getElementById('pd_bar_chart'),
                config
            );

            window.pdLineChartVar = new Chart(
                document.getElementById('pd_line_chart'),
                config1
            );

            window.overallChartVar = new Chart(
                document.getElementById('overall'),
                overallConfig
            );

            window.neetGC = new Chart(
                document.getElementById('neet_gc'),
                neet_gc_config
            );
            window.jeeGC = new Chart(
                document.getElementById('jee_gc'),
                jee_gc_config
            );
            window.neet_jeeGC = new Chart(
                document.getElementById('neetjee_gc'),
                neet_jee_gc_config
            );
            window.ts_emcet_mpcGC = new Chart(
                document.getElementById('tsemcetmpc_gc'),
                ts_emcet_mpc_config
            );



            $('#paid_users').hide()
            $('#free_users').hide()




            let mytbl = $('#exam_tbl').DataTable({
                columnDefs: [{
                    "targets": 4,
                    "data": 'teamLogo',
                    "render": function(data, type, row, meta) {
                        if (row[4] == 1) {
                            return '<img src="./icons/performance_up.png" alt="' + data + '"height="20" width="20"/>';

                        } else {
                            return '<img src="./icons/performance_down1.jfif" alt="' + data + '"height="20" width="20"/>';

                        }
                    }
                }],
                searching: false,
                paging: false,
                info: false,
                filter: false,
                lengthChange: true
            });


            // Paid Second Table for Months and Counts 
            let pdsecond = $('#paidSecondTbl').DataTable({
                searching: false,
                paging: false,
                info: false,
                filter: false,
                lengthChange: true
            });







        });

        // FUNS
        // Refresh all the grpah when the filters change
        function refreshExamGraphs(data, month) {
            var neet_exam = []
            var jee_exam = []
            var neetjee_exam = []
            var ts_emcet_mpc = []
            var total1 = 0
            var total2 = 0
            var total3 = 0
            var total4 = 0

            let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

            sel_month_val = $("#esm").val()
            str_month = months[sel_month_val - 1]

            // Fill-Neet-Month
            for (let i = 0; i < data['NEET']['monthly_count'][str_month]['datewise_count_arr'].length; i++) {
                total1 = total1 + data['NEET']['monthly_count'][str_month]['datewise_count_arr'][i]
                total2 = total2 + data['JEE']['monthly_count'][str_month]['datewise_count_arr'][i]
                total3 = total3 + data['Neet&JEE']['monthly_count'][str_month]['datewise_count_arr'][i]
                total4 = total4 + data['TS-EAMCET-MPC']['monthly_count'][str_month]['datewise_count_arr'][i]
                var one1 = {
                    'x': i,
                    'y': data['NEET']['monthly_count'][str_month]['datewise_count_arr'][i]
                }

                // Fill-Jee-Month
                var one2 = {
                    'x': i,
                    'y': data['JEE']['monthly_count'][str_month]['datewise_count_arr'][i]
                }

                one3 = {
                    'x': i,
                    'y': data['Neet&JEE']['monthly_count'][str_month]['datewise_count_arr'][i]
                }

                one4 = {
                    'x': i,
                    'y': data['TS-EAMCET-MPC']['monthly_count'][str_month]['datewise_count_arr'][i]
                }

                neetjee_exam.push(one3)
                jee_exam.push(one2)
                neet_exam.push(one1)
                ts_emcet_mpc.push(one4)


            }
            $('#t1').html(total1)
            $('#t2').html(total2)
            $('#t3').html(total3)
            $('#t4').html(total4)


            window.neetGC.data.datasets[0].data = neet_exam
            window.jeeGC.data.datasets[0].data = jee_exam
            window.neet_jeeGC.data.datasets[0].data = neetjee_exam
            window.ts_emcet_mpcGC.data.datasets[0].data = ts_emcet_mpc


            window.neetGC.update()
            window.jeeGC.update()
            window.neet_jeeGC.update()
            window.ts_emcet_mpcGC.update()



        }



        // Load-Change
        function examFiltersChanged(e) {
            let sel_year = $("#esy").val()
            let data = window.examWiseGlobalData
            let selYearData = data[sel_year]
            month = $("#esm").val()

            refreshExamGraphs(selYearData, month)

        }

        // All The Functions are defined here 
        function zoomEffectToggle(e) {
            let val = $('#zoom_effect_btn')[0].checked
            let val1 = $('#zoom_effect_btn1')[0].checked
            if (val == true) {
                $('.zoomit')
                    .wrap('<span style="display:inline-block"></span>')
                    .css('display', 'block')
                    .parent()
                    .zoom();
            } else {
                $('.zoomit')
                    .wrap('')
                    .css('display', '')
                    .parent()
                    .trigger('zoom.destroy');

            }

            if (val1 == true) {
                $('.zoomit1')
                    .wrap('<span style="display:inline-block"></span>')
                    .css('display', 'block')
                    .parent()
                    .zoom();
            } else {
                $('.zoomit1')
                    .wrap('')
                    .css('display', '')
                    .parent()
                    .trigger('zoom.destroy');

            }


        }

        // Load Todo data
        function loadTodoData(e) {

            $.get("./datasets/todo.json", (data) => {
                let ul = $("#todoul")
                window.todoData=data
                for (let i = 0; i < data.length; i++) {
                    let name = data[i]['name']
                    let id = data[i]['id']
                    let str = `<li class="list-group-item" value='${id}' onclick="todoChanged(this)">${name}</li>`
                    ul.append(str)

                }
            })

        }

        function todoChanged(e) {
            let li = $("li")
            for (let i = 0; i < li.length; i++) {
                $(li[i]).removeClass("active")
            }
            $(e).addClass("active")
            console.log(e.value )
            let content=todoData[e.value]['content']
            $('#todocontent').html(content)

        }


        function pdAdvanceFilters(e) {
            let sel_val = e.value

            if (sel_val == 1) {
                $("#pdFirstTbl").hide()
                $("#pd_bar_chart").hide()
                $("#pdmfil").hide()
                $("#pd_line_chart").hide()
                $("#paidSecondTbl").show()
            } else if (sel_val == 0) {
                $("#paidSecondTbl").hide()
                $("#pd_bar_chart").hide()
                $("#pd_line_chart").hide()
                $("#pdmfil").show()
                $("#pdFirstTbl").show()
            } else if (sel_val == 4) {
                $("#paidSecondTbl").hide()
                $("#pdFirstTbl").hide()
                $("#pdmfil").hide()
                $("#pd_line_chart").hide()
                $("#pd_bar_chart").show()
            } else if (sel_val == 2) {
                $("#paidSecondTbl").hide()
                $("#pdFirstTbl").hide()
                $("#pdmfil").hide()
                $("#pd_bar_chart").hide()
                $("#pd_line_chart").show()
            }
        }



        // Load the Paid Users Month Wise Count 
        function loadPaidMonthWiseCount() {
            $.get("./ajax/paid_users_monthwise_count.php", function(data) {
                let table = $('#paidSecondTbl').DataTable();
                table.clear().draw();
                window.paidUsersData = JSON.parse(data)
                // Build the graph 
                loadPaidLineChart()
                loadPaidBarChart()
                let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

                let result = []

                for (let i = 0; i < months.length; i++) {
                    if (i != 0) {
                        let one_obj = []
                        one_obj.push(months[i])
                        one_obj.push(window.paidUsersData[i]['total'])
                        one_obj.push(window.paidUsersData[i]['active'])
                        one_obj.push(window.paidUsersData[i]['absent'])
                        console.log("One object in the table ... ", one_obj)
                        result.push(one_obj)
                    }

                }

                table.rows.add(result).draw();


            })
        }

        // Load the Free Users Month Wise Count 
        function loadFreeMonthWiseCount() {
            $.get("./ajax/free_users_monthwise_count.php", function(data) {
                freeUsersData = JSON.parse(data)


            })
        }

        // Load the Line Grpah Load-Paid
        function loadPaidLineChart() {
            console.log(" Yah I am form line grpah ")
            var data = window.paidUsersData
            console.log(" This is the all data ", data)
            let totalLine = []
            let activeLine = []
            let absentLine = []
            for (const i in data) {
                totalLine.push(data[i]['total'])
                activeLine.push(data[i]['active'])
                absentLine.push(data[i]['absent'])
            }
            window.pdLineChartVar.data.datasets[0].data = totalLine
            window.pdLineChartVar.data.datasets[1].data = activeLine
            window.pdLineChartVar.data.datasets[2].data = absentLine
            console.log(" This is the active ")
            console.log(activeLine)
            console.log(" THis is the absent ")
            console.log(absentLine)
            window.pdLineChartVar.update()
        }
        // Load the Bar Grpah Load-Paid
        function loadPaidBarChart() {

            let data = window.paidUsersData

            let totalLine = []
            let activeLine = []
            let absentLine = []
            for (const i in data) {
                totalLine.push(data[i]['total'])
                activeLine.push(data[i]['active'])
                absentLine.push(data[i]['absent'])
            }
            window.pdBarChartVar.data.datasets[0].data = totalLine
            window.pdBarChartVar.data.datasets[1].data = activeLine
            window.pdBarChartVar.data.datasets[2].data = absentLine
            window.pdBarChartVar.update()
        }

        function takeSnapshot(e) {
            if (e.value == '1') {
                console.log($("#send_btn").val())
                $("#send_btn").val(2)
                $("#send_btn").html("Verify Email")
                $("#email_otp_div").css("display", "block")
                $("#email_id_div").css("display", "none")

                // Send the OTP to the User 
                $.get("http://127.0.0.1:5000/getotp", (data) => {
                    window.gotp = data
                })

            } else {

                //   This is the code for all the  canvas 
                let neet = $("#neet_gc")[0]
                console.log(" This is the nee canvas ")
                console.log(neet)
                console.log(neet.toDataURL("image/png"))



                // var entered_otp = $("#eotpi").val()
                // if (entered_otp == window.gotp['otp']) {
                //     alert(" Fine ")
                // } else {
                //     alert(" You Entered the Wrong OTP.Please try again...")
                // }
            }


        }
        // Load the Exam-Wise Month wise Count SS
        function loadExamMonthData(id) {

            $.getJSON("./datasets/neetjee_graphs_global_data.json", (data) => {
                console.log(data)
            })

            // Update-Modal-Title
            let examsVar = ['', "NEET Users Analysis", "JEE Users Analysis", "AP-EAMCET-MPC"]

            $('.exam_mdl_ttl').html(examsVar[id])

            $.get("./ajax/load_month_and_count.php", function(data) {
                let table = $('#exam_tbl').DataTable();

                $('#paidSecondTbl').hide();
                $('#exam_tbl').hide()
                $('#pdFirstTbl').hide()
                $('#pd_bar_chart').hide();
                $('#pdmfil').hide();
                $('#paid_users').show();

                table.clear().draw();
                let jsonObject = JSON.parse(data);

                var result = [];
                for (let i = 0; i < jsonObject.length; i++) {
                    result.push(jsonObject[i])
                }
                table.rows.add(result).draw();
                if (Array.isArray(result) == true) {
                    // table.rows.add(result).draw();
                    console.log(" Yes our variable is array so what's the problem with datatable ")
                } else {
                    console.log("Oh !! Nikhil problem with you man ...")
                }

                loadPaidMonthWiseCount()
                loadFreeMonthWiseCount()

            })
        }

        // Once User Change the Month Value Display the Selected Month
        function monthChangedFree(e) {
            let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            let sel_val = e.value
            $("#insertMonth").html(months[sel_val - 1])
            $("#insertMonth1").html(months[sel_val - 1])
            let data = freeUsersData[sel_val]
            $("#ftc").html(data['total'])
            $("#ftac").html(data['active'])
            $("#ftinc").html(data['absent'])

        }
        // Once User Change the Month Value Display the Selected Month
        function monthChangedPaid(e) {
            let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            let sel_val = e.value
            $("#insertMonth").html(months[sel_val - 1])
            $("#insertMonth1").html(months[sel_val - 1])
            data = window.paidUsersData[sel_val]
            $("#pdt").html(data['total'])
            $("#pdtc").html(data['active'])
            $("#pdtina").html(data['absent'])
        }

        // Manage the Datatables Inside the Modal 
        function manageUserModalTables(e) {

            let value = e.value
            // show all the Active Users 
            if (value == 2) {
                $('#exam_tbl').hide()
                $('#free_users').hide()
                $('#paid_users').show()
            } else if (value == 3) {
                $('#exam_tbl').hide()
                $('#paid_users').hide()
                $('#free_users').show()
            } else if (value == 0) {
                $('#paid_users').hide()
                $('#free_users').hide()
                $('#exam_tbl').show()
            }
        }
    </script>

</body>

</html>