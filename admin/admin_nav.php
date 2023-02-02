    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Trip4Life</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <a class="nav-link" href="index.php#user_table"> Users</a>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="index.php#trips"> Trips</a>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="index.php#bookings"> Bookings </a>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="index.php#dashboard"> Dashboard </a>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $_SESSION['firstname']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link profile-link"
                                    href="../profile.php?profile_id=<?php echo $_SESSION['user_id']; ?>">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link profile-link" href="../logout.php">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a id="toggle-dark-mode" class="nav-link active dark-mode-button" aria-current="page"><i
                                class="fas fa-moon"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>