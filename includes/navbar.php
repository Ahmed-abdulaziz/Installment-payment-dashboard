
   <!-- Header-->
   <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">ابو صبح</a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                       

                        

                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h3> <?php
                                    if(isset($_SESSION['name'])){

                                        echo $_SESSION['name'];
                                        
                                    }?>
                                    
                            </h3>  
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="admin.php?do=edit&id=<?php echo $_SESSION['id'];?>"><i class="fa fa -cog"></i>الاعدادات</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>تسجيل خروج</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- Header-->
