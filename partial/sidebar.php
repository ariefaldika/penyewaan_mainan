<aside class="sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div class="profile-image">
                            <img src="../plugins/images/users/hanna.jpg" alt="user-img" class="img-circle">
                            <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-danger">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> <?php echo $namaUsers ?></a></p>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="side-menu">
                        <li>
                            <a class="waves-effect" href="barang.php" aria-expanded="false"><i class="icon-basket fa-fw"></i> <span class="hide-menu"> Stok Barang </span></a>
                        </li>
                        <li>
                            <a class="waves-effect" href="upload.php" aria-expanded="false"><i class="icon-envelope-letter fa-fw"></i> <span class="hide-menu"> Upload File </span></a>
                        </li>
                        <li>
                            <a class="waves-effect" href="summary.php" aria-expanded="false"><i class="icon-notebook fa-fw"></i> <span class="hide-menu"> History </span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>