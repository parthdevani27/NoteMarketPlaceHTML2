
<link rel="shortcut icon" href="../../admin/css/add-type.css">
<nav class="mobile-menu">
<label for="show-menu" class="show-menu"><span>	<a href="home-page.php"><img src="images/pre-login/logo.png" alt="img" class="img-responsive"></a></span><div id="mobile-menu-btn">&#9776;</div></label>

	<input type="checkbox" id="show-menu">
		<ul id="menu">
		<li><a href="search-page.php">search notes</a></li>
		<li><a href="add-note-page.php">sell your notes</a>		</li>
		<li><a href="buyer-request-page.php">buyer request</a>		</li>
		<li><a href="faq-page.php">FAQ</a></li>
		<li><a href="contact-page.php">Contact us</a></li>
		<li><a href="#"><img src="images/User-Profile/reviewer-1.png" alt="img" class="img-responsive"></a></li>
		<li>
			  <?php 
						if(isset($_SESSION['Email'])){
							echo "<a href='includes/logout.php'><button type='button' class='btn-header'>Logout</button></a>";
						} else {
							echo "<a href='login-page.php'><button type='button' class='btn-header'>Login</button></a>";
						}
						 
			?>
		</li>
		
		
		
		
	</ul>
	<div class="mobile-menu-close-btn"></div>
</nav>
	<div class="wrapper">
        <header class="site-header">
          <div class="header-wrapper">
            <div class="logo-wrapper">
              <a href="home-page.php" title="Site Logo">
                <img src="images/pre-login/logo.png" alt="top-logo" class="img-responsive">
              </a>
            </div>
            <div class="navigation-wrapper">
              <nav class="main-nav">  
                 <ul class="menu-navigation">
                    <li>
                      <a href="search-page.php">search notes</a>
                    </li>
                    <li>
                      <a href="Dashboard%20Page.php">sell your notes</a>
                    </li>
              
				
                    <li>
                      <a href="buyer-request-page.php">buyer request</a>
                    </li>
           
                    <li>
                     
                      <a href="faq-page.php">FAQ</a>
                    </li>
                    
                    <li>
                      <a href="contact-page.php">Contact us</a>
                    </li>
                    <li>
                    	
									<div class="dropdown">
										<button id="homedropdown" style="background-color: transparent;"  class="dropbtn">
										<?php
											if(isset($_SESSION['Email'])){
												$id = $_SESSION['ID'];
												$path = profilePicPath($id);
											} else {
												$path = "images/User-Profile/defaultprofile.jpg";
											}
											
												echo "<img style='border-radius: 60px;'  width='60px' height='60px' src='images/User-Profile/defaultprofile.jpg' alt='img' class='img-responsive'>";
										?>
										 
										  
										   
										    
										      </button>
										<div class="dropdown-content">
											<a href="user-profile.php">My Profile</a>
											<a href="downloads.php">My Download</a>
											<a href="soldnotes.php">My Sold Notes</a>
											<a href="rejected_notes.php">My Rejected Notes</a>
											<a href="change-pwd.php">Change Password</a>
											<a href="includes/logout.php" style="color:#6255a5;">Logout</a>

										</div>
									</div>
								
                    </li>
                  
                     <li>
                     <?php 
						if(isset($_SESSION['Email'])){
							echo "<a href='includes/logout.php'><button type='button' class='btn-header'>Logout</button></a>";
						} else {
							echo "<a href='login-page.php'><button type='button' class='btn-header'>Login</button></a>";
						}
						 
						?>
                      
                    </li>
                  </ul>     
              </nav>
            </div>
          </div>
        </header> 
        <main>
           
        </main>
    </div>
	