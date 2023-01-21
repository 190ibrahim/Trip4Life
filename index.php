<?php require "includes/head.php"; ?>


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
<section id="trips" style="background-color:#F9F5EB;">
    <div class="trip">


        <div class="row row1">
            <div class="col">
                <h5>The Galapagos Islands, Ecuador</h5>
                <img class="rounded float-start trip-img" src="pictures\galapagos.png" alt="galapagos">

                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.

            </div>
        </div>
        <div class="row row1">
            <div class="col">
                <h5>The Whitsunday Islands, Australia</h5>
                <img class="rounded float-start trip-img" src="pictures\theWhitsundayIslands.png"
                    alt="theWhitsundayIslands">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.

            </div>
        </div>
        <div class="row row1">
            <div class="col"">
                    <h5>Zanzibar Island, Tanzania</h5>
                    <img class=" rounded float-start trip-img" src="pictures\zanzibarIsland.png" alt="zanzibarIsland">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>

        <div class="row row1">
            <div class="col">
                <h5>The Greek Isles</h5>
                <img class="rounded float-start trip-img" src="pictures\theGreekIsles.png" alt="theGreekIsles">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>

        <div class="row row1">
            <div class="col">
                <h5>The Adriatic Coast, Croatia</h5>
                <img class="rounded float-start trip-img" src="pictures\theAdriaticCoast.png" alt="theAdriaticCoast">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>

        <div class="row row1">
            <div class="col">
                <h5>The Bay of Islands, New Zealand</h5>
                <img class="rounded float-start trip-img" src="pictures\theBayofIslands.png" alt="theBayofIslands">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>

        <div class="row row1">
            <div class="col">
                <h5>French Polynesia, Tahiti</h5>
                <img class="rounded float-start trip-img" src="pictures\frenchPolynesia.png" alt="frenchPolynesia">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>

        <div class="row row1">
            <div class="col">
                <h5>The British Virgin Islands</h5>
                <img class="rounded float-start trip-img" src="pictures\theBritishVirginIslands.png"
                    alt="theBritishVirginIslands">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>
        <div class="row row1">
            <div class="col">
                <h5>Lycian Coast, Turkey</h5>
                <img class="rounded float-start trip-img" src="pictures\lycianCoast.png" alt="lycianCoast">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>
    </div>
</section>


<!---------  OUR boats  ----------->

<section id="boats" style="background-color: #607EAA;">
    <div class="our-boats">
        <h2> Our boats</h2>
    </div>
    <div class="trip">
        <div class="row row1">
            <div class="col">
                <h2>Bavaria C45</h2>
                <img class="rounded float-start trip-img" src="pictures\bavariac45.png" alt="bavariac45">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.

            </div>
        </div>
        <div class="row row1">
            <div class="col">
                <h2>Beneteau 46.1</h2>
                <img class="rounded float-start trip-img" src="pictures\beneteau46.png" alt="beneteau46.1">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.

            </div>
        </div>
        <div class="row row1">
            <div class="col"">
                    <h2>Dufour 530 Grand Large</h2>
                    <img class=" rounded float-start trip-img" src="pictures\dufour530GrandLarge.png"
                alt="dufour530GrandLarge">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>

        <div class="row row1">
            <div class="col">
                <h2>Fountaine Pajot Isla 40</h2>
                <img class="rounded float-start trip-img" src="pictures\fountainePajotIsla40.png"
                    alt="fountainePajotIsla40">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                est laborum.
            </div>
        </div>
    </div>
</section>

<!--------------- Book trips ---------------->


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