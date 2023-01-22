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