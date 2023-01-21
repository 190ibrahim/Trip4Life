<?php
include "admin_header.php";
?>


<body>
    <?php include "admin_nav.php"; ?>
    <br>

    <div id="dashboard" class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-warning mb-3 card-custom">
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-users mr-2"></i>
                        <h4 class="m-0">Users</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">23</h5>
                        <div class="d-flex justify-content-between">
                            <a href="customers.php" class="btn btn-light card-link d-inline-block mr-2">View Details</a>
                            <a href="add_user.php" class="btn btn-light card-link d-inline-block">Add User</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-primary mb-3 card-custom">
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-bus d-inline-block mr-2"></i>
                        <h4 class="m-0 text-custom d-inline-block">Trips</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-custom">12</h5>
                        <div class="d-flex justify-content-between">
                            <a href="trips.php" class="btn btn-light card-link d-inline-block mr-2">View Details</a>
                            <a href="add_trip.php" class="btn btn-light card-link d-inline-block">Add Trip</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card text-white bg-success mb-3 card-custom">
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-book  mr-2"></i>
                        <h4 class="m-0">Bookings</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-custom">23</h5>
                        <div class="d-flex justify-content-between">
                            <a href="bookings.php" class="btn btn-light card-link d-inline-block mr-2">View Details</a>
                            <a href="add_booking.php" class="btn btn-light card-link d-inline-block">Add Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Google chart -->
    <div id="dashboard" class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-chart-bar mr-2"></i>
                        <h3 class="m-0">Chart Title</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-container">
                            <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['bar']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Data', 'All', 'Active', 'Unactive'],
                                    ['Users', 100, 40, 60],
                                    ['Trips', 100, 40, 60],
                                    ['Bookings', 100, 10, 90],
                                ]);

                                var options = {
                                    chart: {
                                        title: '',
                                        subtitle: '',
                                    }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                            </script>
                            <div id="columnchart_material" class="google-visualization-bar-chart-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "users.php"; ?>


    <?php include "trips.php"; ?>


    <?php include "bookings.php"; ?>


    <?php
    include "admin_footer.php";
    ?>