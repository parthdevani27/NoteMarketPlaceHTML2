


        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="site-nav-wrapper">

                    <div class="navbar-header">

                        <!-- Mobile Menu Open Button -->
                        <span id="mobile-nav-open-btn">&#9776;</span>

                        <!-- Logo -->
                        <a class="navbar-brand" href="#home">
                            <img src="img/assets/logo.png" alt="logo">
                        </a>
                    </div>

          
                    <!-- Mobile Menu -->
                    <div id="mobile-nav">
                       <img id="mobile-logo" src="img/assets/logo.png" alt="logo">
                        <!-- Mobile Menu Close Button -->
                        <span id="mobile-nav-close-btn">&times;</span>

                        <div id="mobile-nav-content">
                            <ul>
                                <li><a href="dashboard.php">Deshboard</a><br><br></li>
                                <li><a class="nav-dropdown" role="button">Notes</a><br><br></li>                     <div class="mobile-dropdown-content">
											<a href="note-under-review.php">Note under review<br><br></a>
											<a href="Published-notes.php">Published note<br><br></a>
											<a href="download-notes.php">Download notes<br><br></a>
											<a href="rejected-notes.php">Rejected notes<br><br></a>
										</div>  
                                <li><a class="navlink" href="member.php">Member</a><br><br></li>
                                <li><a class="navlink" href="spam-report.php">Reports</a><br><br></li>
                                <li><a class="nav-dropdown-2" role="button">Setting</a><br><br></li>                     <div class="mobile-dropdown-content-2">
											<a href="Manage-administrator.php">Manage Administrator<br><br></a>
											<a href="manage-category.php">Manage Category<br><br></a>
											<a href="manage-type.php">Manage Type<br><br></a>
											<a href="manage-country.php">Manage Country<br><br></a>
										</div> 
                               	
                              				
                               
                               
                                <li><a class="nav-dropdown-3" role="button"><?php
											if(isset($_SESSION['Email'])){
												$id = $_SESSION['ID'];
												$path = profilePicPath($id);
												$path = "../front/$path";
											} else {
												$img = defaultprofilePic();
												$path = "../front/member/$img";
											}
											
												echo "<img style='border-radius: 60px;'  width='60px' height='60px' src='$path' alt='img' class='img-responsive'>";
										?></a><br><br></li>    
										      <div class="mobile-dropdown-content-3">
											<a href="my-profile.php">Update Profile<br><br></a>
											<a href="change-pwd.php">Change Password<br><br></a>
										</div>
                               <li>	<form action="includes/logout.php">
					<button type='submit' class='btn btn-block btn-general btn-logout-mobile'>Logout</button></form>
							</li>
                               
 
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </nav>























<div class="wrapper">
		<header class="site-header navbar-header navbar-fixed-top" role="navigation">
			<div class="header-wrapper">
				<div class="logo-wrapper">
					<a href="#" title="Site Logo">
						<img src="img/assets/logo.png" alt="img" class="img-responsive">
					</a>
				</div>
				<div class="navigation-wrapper">
					<nav class="main-nav">
						<ul class="menu-navigation">
							<li>
							<a class="navlink <?php if($page == 'dashboard'){echo "active";} ?>" href="dashboard.php" >Deshboard</a>
							</li>
							<li>
								<a>	<div class="dropdown">
										<button class="dropbtn"><a href="#">Notes</a></button>
										<div class="dropdown-content">
											<a href="note-under-review.php" <?php if($page == 'underreview'){echo "class='active-dropdown'";} ?>>Note under review</a>
											
											<a href="Published-notes.php" <?php if($page == 'published'){echo "class='active-dropdown'";} ?>>Published note</a>
											
											<a href="download-notes.php" <?php if($page == 'download'){echo "class='active-dropdown'";} ?>>Download notes</a>
											
											<a href="rejected-notes.php" <?php if($page == 'rejected'){echo "class='active-dropdown'";} ?>>Rejected notes</a>

										</div>
									</div>
									</a>
							</li>
							<li>
								<a class="navlink <?php if($page == 'member'){echo "active";} ?>" href="member.php">Member</a>
							</li>
							<li>
								<a class="navlink <?php if($page == 'spam'){echo "active";} ?>" href="spam-report.php" <?php if($page == 'spam'){echo "active";} ?>>Reports</a>
							</li>

							<li>
								<a>
									<div class="dropdown">
										<button class="dropbtn"><a href="#">Setting</a></button>
										<div class="dropdown-content addwidth">
										
											<a href="manage-system-configuration.php" <?php if($page == 'managesystem'){echo "class='active-dropdown'";} ?>>Manage System Configuration</a>
											
											<a href="Manage-administrator.php" <?php if($page == 'manageadmin'){echo "class='active-dropdown'";} ?>>Manage Administrator</a>
											
											<a href="manage-category.php" <?php if($page == 'managecat'){echo "class='active-dropdown'";} ?>>Manage Category</a>
											
											<a href="manage-type.php" <?php if($page == 'managetype'){echo "class='active-dropdown'";} ?>>Manage Type</a>
											
											<a href="manage-country.php" <?php if($page == 'managecountry'){echo "class='active-dropdown'";} ?>>Manage Country</a>
											</div>

									
									</div>
									
								</a>
							</li>

							<li>
								
									<div class="dropdown">
									
											<?php
											if(isset($_SESSION['Email'])){
												$id = $_SESSION['ID'];
												$path = profilePicPath($id);
												$path = "../front/$path";
											} else {
												$img = defaultprofilePic();
												$path = "../front/member/$img";
											}
											
												echo "<img style='border-radius: 60px;'  width='60px' height='60px' src='$path' alt='img' class='img-responsive'>";
										?>
										<div class="dropdown-content">
											<a href="my-profile.php" <?php if($page == 'profile'){echo "class='active-dropdown'";} ?>>Update Profile</a>
											<a href="change-pwd.php">Change Password</a>
											<a href="../front/includes/logout.php" class="add-color">LOGOUT</a>

										</div>
									</div>
								
							</li>
							<li>	<form action="includes/logout.php">
					<button type='submit' class='btn btn-block btn-general btn-logout'>Logout</button></form>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		 <main>
            <section class="first-section"><h2></h2></section>
            <section class="second-section"><h2>
            	
            </h2></section>
        </main>
	</div>