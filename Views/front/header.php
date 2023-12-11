<?php
        if (isset($_SESSION['username'])) {
         if (!$_SESSION['verified']) { ?>
         <script>
			 alert('compte non verifié')
			 </script>
        <?php
        }
       
        }
         ?>
		 <?php
        if(isset($_SESSION['message'])){
        ?>
        <script>alert('compte verifié');</script>
        <?php
        unset($_SESSION['message']);
        } ?>
<div class="tm-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-3 tm-site-name-container">
                <a href="#" class="tm-site-name">Holiday</a>    
            </div>
            <div class="col-lg-10 col-md-8 col-sm-9">
                <div class="mobile-menu-icon">
                    <i class="fa fa-bars"></i>
                </div>
                <nav class="tm-nav">
                    <ul>
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="smallbu.php" >Products</a></li>
                        <?php
                            if (isset($_SESSION['username'])) {
                        ?>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="Offres.php">Offres</a></li>
                            
                            <li class="dropdown">
                            <a href="#" class="tm-dropdown-toggle">My Interactions <i class="fa fa-angle-down"></i></a>
                            <ul class="drop">
                                <a href="favoris.php">Favoris</a>
                                <a href="tickets.php">Tickets</a>
                                <a href="mesLivraisons.php">Livraisons</a>
                                <a href="reservations.php">Reservations</a>
                                <a href="logout.php">Logout</a>
                            </ul>
                        </li>

                            <li><a href="profile.php">Hello <?php echo $_SESSION['nom_prenom_user'] ?></a></li>
                                
                        <?php } else { ?>
                            <li><a href="sign-in.php">Sign In</a></li>
                            <li><a href="sign-up.php">Sign Up</a></li>
                        <?php } ?>
                    </ul>
                </nav>        
            </div>              
        </div>
    </div>      
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hide the dropdown by default
    var dropdownMenu = document.querySelector('.drop');
    if (dropdownMenu) {
        dropdownMenu.style.display = 'none';
    }

    // Toggle the dropdown on clicking the dropdown toggle
    var dropdownToggle = document.querySelector('.tm-dropdown-toggle');
    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function() {
            dropdownMenu.style.display = (dropdownMenu.style.display === 'none') ? 'block' : 'none';
        });
    }
});
</script>
