<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->

        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <h2 class="text-white m-0">Mapet</h2>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="nav-icon fe fe-home me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pos/index.php">
                    <i class="nav-icon fe fe-shopping-bag me-2"></i> Point Of Sales
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="adduser.php">
                    <i class="nav-icon fe fe-user me-2"></i> Add User
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="userprofile.php">
                    <i class="nav-icon fe fe-user me-2"></i> Manage Users
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link   collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#appointment" aria-expanded="false" aria-controls="appointment">
                    <i class="nav-icon fe fe-home me-2"></i> Manage Appointment
                </a>
                <div id="appointment" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link " href="appointment.php">
                                Create Appointment
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#">
                                All Appointment
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#">
                                Today's Appointment
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="searchcard.php">
                    <i class="nav-icon fe fe-search me-2"></i> Today Cards
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="glassorders.php">
                    <i class="nav-icon fe fe-book me-2"></i> Glass (Pending)
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="completeglassorder.php">
                    <i class="nav-icon fe fe-user-check me-2"></i> Glass (Completed)
                </a>
            </li>


        </ul>

    </div>
</nav>