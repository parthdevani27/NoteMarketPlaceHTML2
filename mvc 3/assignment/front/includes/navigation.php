


        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="site-nav-wrapper">

                    <div class="navbar-header">

                        <!-- Mobile Menu Open Button -->
                        <span id="mobile-nav-open-btn">&#9776;</span>

                        <!-- Logo -->
                        <a class="navbar-brand" href="home-page.php">
                            <img src="images/pre-login/logo.png" alt="logo">
                        </a>
                    </div>

          
                    <!-- Mobile Menu -->
                    <div id="mobile-nav">
                      <a href="home-page.php">
                       <img id="mobile-logo" src="images/pre-login/logo.png" alt="logo"></a>
                        <!-- Mobile Menu Close Button -->
                        <span id="mobile-nav-close-btn">&times;</span>

                        <div id="mobile-nav-content">
                            <ul>
                                <li><a href="search-page.php">search notes</a><br><br></li>
                                <li> <a href="Dashboard%20Page.php">sell your notes</a><br><br></li>
                                <li><a href="buyer-request-page.php">buyer request</a><br><br></li>
                                <li> <a href="faq-page.php">FAQ</a><br><br></li>
                                <li><a href="contact-page.php">Contact us</a><br><br></li>     
                                <li><a class="nav-dropdown-3" role="button"><?php
											if(isset($_SESSION['Email'])){
												$id = $_SESSION['ID'];
												$path = profilePicPath($id);
												$path = "../front/$path";
											} else {
												$img = defaultprofilePic();
												$path = "member/$img";
											}
											
												echo "<img style='border-radius: 60px;'  width='60px' height='60px' src='$path' alt='img' class='img-responsive'>";
										?></a><br><br></li>    
										      <div class="mobile-dropdown-content-3">
													<a href="user-profile.php">My Profile</a><br><br>
											<a href="downloads.php">My Download</a><br><br>
											<a href="soldnotes.php">My Sold Notes</a><br><br>
											<a href="rejected_notes.php">My Rejected Notes</a><br><br>
											<a href="change-pwd.php">Change Password</a><br><br>
										
										</div>
                               <li>	<form action="includes/logout.php">
					<button type='submit' class='btn-header'>Logout</button></form>
							</li>
                               
 
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
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
                      <a href="search-page.php" <?php if($page == 'search'){echo "class='active'";} ?>>search notes</a>
                    </li>
                    <li>
                      <a href="Dashboard%20Page.php" <?php if($page == 'dashboard'){echo "class='active'";} ?>>sell your notes</a>
                    </li>
              
				
                    <li>
                      <a href="buyer-request-page.php" <?php if($page == 'buyerrequest'){echo "class='active'";} ?>>buyer request</a>
                    </li>
           
                    <li>
                     
                      <a href="faq-page.php" <?php if($page == 'faq'){echo "class='active'";} ?>>FAQ</a>
                    </li>
                    
                    <li>
                      <a href="contact-page.php" <?php if($page == 'contact'){echo "class='active'";} ?>>Contact us</a>
                    </li>
                    <li>
                    	
									<div class="dropdown">
										<button id="homedropdown" style="background-color: transparent;"  class="dropbtn">
										<?php
											if(isset($_SESSION['Email'])){
												$id = $_SESSION['ID'];
												$path = profilePicPath($id);
											} else {
													$img = defaultprofilePic();
													$path = "member/$img";
												
											}
											
												echo "<img class='user-profile-img' style='border-radius: 60px;'  width='60px' height='60px' src='$path' alt='img' class='img-responsive'>";
										?>
										 
										  
										   
										    
										      </button>
										<div class="dropdown-content">
											<a href="user-profile.php" <?php if($page == 'userprofile'){echo "class='active-dropdown'";} ?>>My Profile</a>
											
											<a href="downloads.php" <?php if($page == 'download'){echo "class='active-dropdown'";} ?>>My Download</a>
											
											<a href="soldnotes.php" <?php if($page == 'sold'){echo "class='active-dropdown'";} ?>>My Sold Notes</a>
											
											<a href="rejected_notes.php" <?php if($page == 'rejected'){echo "class='active-dropdown'";} ?>>My Rejected Notes</a>
											
											<a href="change-pwd.php">Change Password</a>
											
											<a href="includes/logout.php" style="color:#6255a5;">
											<?php
											if(isset($_SESSION['Email'])){
												echo "Logout";
											} else {
												echo "Login";
											}
											?>
											</a>

										</div>
									</div>
								
                    </li>
                  
                     <li><form action="includes/logout.php">
                     <?php 
						if(isset($_SESSION['Email'])){
							echo "<button type='submit' class='btn-header'>Logout</button>";
						} else {
							echo "<button type='submit' class='btn-header'>Login</button>";
						}
						 
						?>
                      </form>
                    </li>
                  </ul>     
              </nav>
            </div>
          </div>
        </header> 
        <main>
           
        </main>
    </div>
	