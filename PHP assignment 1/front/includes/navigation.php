<nav class="mobile-menu">
<label for="show-menu" class="show-menu"><span>	<img src="images/pre-login/logo.png" alt="img" class="img-responsive"></span><div id="mobile-menu-btn">&#9776;</div></label>

	<input type="checkbox" id="show-menu">
		<ul id="menu">
		<li><a href="#">Dashboard</a></li>
		<li>			<a href="#">Notes</a>		</li>
		<li>			<a href="#">Members</a>		</li>
		<li><a href="#">Reports</a></li>
		<li><a href="#">Settings</a></li>
		<li><a href="#"><img src="images/User-Profile/reviewer-1.png" alt="img" class="img-responsive"></a></li>
		<li><a href="#"><a href="#"><button type="submit" class="btn btn-block  btn-mobile-logout">Logout</button></a></a></li>
	</ul>
	<div class="mobile-menu-close-btn"></div>
</nav>
	<div class="wrapper">
        <header class="site-header">
          <div class="header-wrapper">
            <div class="logo-wrapper">
              <a href="#" title="Site Logo">
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
                      <a href="add-note-page.php">sell your notes</a>
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
                      <a href="#"> <img src="images/User-Profile/reviewer-1.png" alt="img" class="img-responsive"></a>
                    </li>
                     <li>
                     <?php 
						if(isset($_SESSION['Email'])){
							echo "<a href='includes/logout.php'><button type='button' class='btn btn-block btn-header'>Logout</button></a>";
						} else {
							echo "<a href='login-page.php'><button type='button' class='btn btn-block btn-header'>Login</button></a>";
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
	