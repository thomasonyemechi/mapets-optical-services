<div class="header">
    <!-- navbar -->
    <nav class="navbar-default navbar navbar-expand-lg">
        <a id="nav-toggle" href="#">
            <i class="fe fe-menu"></i>
        </a>
        <b style="margin-left: 5px; font-size: 20px;">Mapet Optical Services</b>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->

          <form class="d-flex align-items-center"  action="search.php" >
                <span class="position-absolute ps-3 search-icon">
                    <i class="fe fe-search"></i>
                </span>
                <input type="search" name="q" class="form-control form-control-sm ps-6" placeholder="Search User" />
            </form>
        </div>
        <!--Navbar nav -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">

            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="../assets/images/avatar/avatar-8.jpg" class="rounded-circle" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="../assets/images/avatar/avatar-8.jpg" class="rounded-circle" />
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1"><?= ucwords($me['lastname'].' '.$me['firstname']) ?></h5>
                                <p class="mb-0 text-muted"><?= $me['email'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
<!--                     <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-user me-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i> Settings
                            </a>
                        </li>
                    </ul> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="fe fe-power me-2"></i> Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>