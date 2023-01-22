<?php require "includes/head.php"; ?>

<!---------  HEADER  ----------->
<header id="header" class="header-section">
    <h1 class="header-title">Your sailing adventure starts here!</h1>
    <div class="experience">
        <h3 class="experience-title">Experience required</h3>
        <p>Know how to swim</p>
        <p>Above 18 years old</p>
        <p>Have boat driving lisence upto 40ft</p>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel-container">
        <div class="carousel">
            <?php
            $query = $pdo->prepare("SELECT * FROM trips");
            $query->execute();
            $trips = $query->fetchAll();
            foreach ($trips as $trip) {
                $trip_title = $trip['trip_title'];
                $trip_image = $trip['trip_image'];
                $trip_id = $trip['id'];
            ?>
            <div class="carousel-item active">
                <img src="pictures\<?php echo $trip_image
                                        ?>" alt="<?php echo $trip_title
                                                    ?>">
                <div class="carousel-caption">
                    <h3><?php echo $trip_title
                            ?></h3>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

        <div></div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!---------  OUR TRIPS  ----------->

<?php include "trips.php"; ?>

<!---------  OUR boats  ----------->

<?php include "boats.php"; ?>

<!--------------- Book trips ---------------->
<?php include "show_trips.php"; ?>

<section id="booktrip" style="background-color: #F9F5EB;">
    <div class="booktrip">
        <div class="our-boats">
            <h2> Book trip</h2>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM trips";
            $select_all_trips_query = $pdo->prepare($query);
            $select_all_trips_query->execute();
            $trip =  $select_all_trips_query->fetchAll();
            foreach ($trip as $row) {
                $trip_id = $row['id'];
                $trip_title = $row['trip_title'];
                $trip_image = $row['trip_image'];
                $trip_price = $row['trip_price'];
                $trip_status = $row['trip_status'];
                if ($trip_status == 'Active') { ?>

            <div class="col-lg-3 col-md-4 col-sm-6 col-4 booktrip-card">
                <div class="card card-custom">
                    <img src="pictures\<?php echo $trip_image ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $trip_title ?></h5>
                        <p class="card-text"><?php echo $trip_price ?>$ / week</p>
                        <a href="book_trip.php?trip_id=<?php echo $trip_id ?>" class="btn btn-primary">Book
                            Now</a>
                    </div>
                </div>
            </div>

            <?php }
            } ?>
        </div>
    </div>
</section>

<?php require "includes/footer.php"; ?>