<header id="header" class="header-section">
    <div class="header-container">
        <h1 class="header-title">Your sailing adventure starts here!</h1>
        <div class="experience">
            <h3 class="experience-title">Experience required</h3>
            <p>Know how to swim</p>
            <p>Above 18 years old</p>
            <p>Have boat driving lisence upto 40ft</p>
        </div>

        <div class="swiper-container myHeaderSwiper">
            <div class="swiper-wrapper">
                <?php
                $query = $pdo->prepare("SELECT * FROM trips");
                $query->execute();
                $trips = $query->fetchAll();
                foreach ($trips as $trip) {
                    $trip_title = $trip['trip_title'];
                    $trip_image = $trip['trip_image'];
                    $trip_id = $trip['id'];
                ?>
                <div class="swiper-slide">
                    <img src="pictures\<?php echo $trip_image ?>" alt="<?php echo $trip_title ?>">

                    <div>
                        <br>
                        <h3><?php echo $trip_title ?></h3>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <br>
            <br>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <br>
</header>