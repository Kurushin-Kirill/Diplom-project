<nav>
        <div class="nav-container">
            <div class="nav-refs">
                <div class="nav-logo">
                    <a href="index.php">
                        <img src="./Img/MOODY STUDIO.png" alt="problem">
                    </a>
                </div>
                <div class="nav-buttons">
                    <ul>
                        <?php 
                            if(isset($_SESSION['user']['rights'])=='user' || isset($_SESSION['user']['rights'])=='admin') {
                                
                        ?>  
                            <li><a href="include/logout.php">Log out</a></li>
                            <li><a href="./cart.php"><img src="./Img/basketclean.png" alt="problem"></a></li>
                        <?php  } else { ?>
                            <li><a href="#" class="nav-modal-open" id="button">Sign in</a></li>
                            <li><a href="#" class="nav-modal2-open">Registration</a></li>
                        <?php } ?>
                        <li><a href="#"><img src="./Img/loop.png" alt="problem"></a></li>
                    </ul>
                </div>
            </div>
            <div class="nav-menu">
                <div class="nav-categories">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="category.php">store</a></li>
                        <li><a href="">accessories</a></li>
                        <li><a href="">brand</a></li>
                        <li><a href="">pages</a></li>
                        <li><a href="">about us</a></li>
                        <li><a href="">news</a></li>
                        <li><a href="">contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="nav-modal">
                <img src="./Img/cross.png" class="nav-modal-cross" alt="problem">
                <div class="reg-title">
                    <div class="reg-welcome">Welcome!</div>
                    <div class="reg-features">Enter your email and password if you have already registered.</div>
                </div>
                <?php 
                    if(isset( $_SESSION['message'])){
                        echo '<p class="session-aut-text">' . $_SESSION['message'] . '</p>';
                    }
                    unset( $_SESSION['message']);
                ?>
                <form class="aut-form" enctype="multipart/form-data" method="post" action="include/aut.php">
                    <input class="nav-input" type="email" name="email" placeholder="Email">
                    <input class="nav-input" type="password" name="password" placeholder="Password">
                    <input class="nav-reg-btn" type="submit" value="Send">
                </form>
            </div>

            <div class="nav-modal2">
                <img src="./Img/cross.png" class="nav-modal2-cross" alt="problem">
                <div class="reg-title">
                    <div class="reg-welcome">Welcome!</div>
                    <div class="reg-features">Register to access the site's features</div>
                </div>
                <?php 
                if(isset( $_SESSION['message'])){
                    echo '<p class="session-reg-text">' . $_SESSION['message'] . '</p>';
                }
                unset( $_SESSION['message']);
                ?>
                <form class="reg-form" enctype="multipart/form-data" method="post" action="include/reg.php">
                    <div><input class="nav-input" type="email" name="email" placeholder="E-mail"></div>
                    <div><input class="nav-input" type="tel" name="phone" placeholder="Phone"></div>
                    <div><input class="nav-input" type="text" name="name" placeholder="Name"></div>
                    <div><input class="nav-input" type="password" name="password" placeholder="Password"></div>
                    <div><input class="nav-input" type="password" name="repeat_password" placeholder="Repeat at password"></div>
                    <input class="nav-reg-btn" type="submit" value="Send">
                </form>
            </div>
            <div class="nav-overlay"></div>
        </div>
    </nav>