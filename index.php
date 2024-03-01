t<!DOCTYPE html>
	<html lang="en">
	

<head>
		<title>Book Store</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">

	    <link rel="stylesheet" type="text/css" href="css/normalize.css">
	    <link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
	    <link rel="stylesheet" type="text/css" href="css/vendor.css">
	    <link rel="stylesheet" type="text/css" href="style.css">

		<!-- script
		================================================== -->
		<script src="js/modernizr.js"></script>

	</head>

<body>

<div id="header-wrap">
	
	<div class="top-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="social-links">
						<ul>
							<li>
								<a href="#"><i class="icon icon-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-youtube-play"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-behance-square"></i></a>
							</li>
						</ul>
					</div><!--social-links-->
				</div>
				<?php
				include('connect.php');
				
				if (isset($_COOKIE['id'])) {
					$id = $_COOKIE['id'];
					
				
					// Prepare the SQL query
					$sql = "SELECT * FROM pub_signup WHERE id = ?";
					
					$stmt = $conn->prepare($sql);
				
					if (!$stmt) {
						die("Error in query preparation: " . $conn->error);
					}
				
					// Bind the parameter
					$stmt->bind_param('s', $id);
				
					// Execute the query
					if (!$stmt->execute()) {
						die("Error executing query: " . $stmt->error);
					}
				
					// Get the result
					$result = $stmt->get_result();
				
					// Fetch the data
					$row = $result->fetch_assoc();
				
					// Close the statement
					$stmt->close();
				}
				
				$conn->close();
				?>

                <?php
				include('connect.php');
				
				if (isset($_COOKIE['u_id'])) {
					$id = $_COOKIE['u_id'];
					
				
					// Prepare the SQL query
					$sql = "SELECT * FROM signup WHERE u_id = ?";
					
					$stmt = $conn->prepare($sql);
				
					if (!$stmt) {
						die("Error in query preparation: " . $conn->error);
					}
				
					// Bind the parameter
					$stmt->bind_param('s', $id);
				
					// Execute the query
					if (!$stmt->execute()) {
						die("Error executing query: " . $stmt->error);
					}
				
					// Get the result
					$result = $stmt->get_result();
				
					// Fetch the data
					$row = $result->fetch_assoc();
				
					// Close the statement
					$stmt->close();
				}
				
				$conn->close();
				?>
				
				<div class="col-md-6">
					<div class="right-element">
						<?php
							if (isset($_COOKIE['id'])) {
								echo '<a href="pubdash.php">Dashboard</a>';
								} elseif(isset($_COOKIE['u_id'])) {
								echo '<a href="user.php">Dashboard</a>';
								}else{echo '<a href="login.php">Signin</a>';}
						?>
						
						
						<link rel="stylesheet" href="styles3.css">

								
							</div>
						</div>

					</div><!--top-right-->
				</div>
				
			</div>
		</div>
	</div><!--top-content-->

	<header id="header">
		<div class="container">
			<div class="row">

				<div class="col-md-2">
					<div class="main-logo">
						<a href="index.php"><img src="images\main-logo1.png" alt="logo"></a>
					</div>

				</div>

				<div class="col-md-10">
					
					<nav id="navbar">
						<div class="main-menu stellarnav">
							<ul class="menu-list">
								
								<li class="menu-item"><a href="audiobook.php" class="nav-link" data-effect="About">Audiobooks</a></li>
								
								<li class="menu-item"><a href="allpage2.php" class="nav-link" data-effect="Shop">Books</a></li>
								<li class="menu-item"><a href="review.php" class="nav-link" data-effect="Articles">Reviews</a></li>
								<li class="menu-item"><a href="#contact" class="nav-link" data-effect="Contact">Contact</a></li>
							</ul>

							<div class="hamburger">
				                <span class="bar"></span>
				                <span class="bar"></span>
				                <span class="bar"></span>
				            </div>

						</div>
					</nav>

				</div>

			</div>
		</div>
	</header>
		
</div><!--header-wrap-->

<section id="billboard">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<button class="prev slick-arrow">
					<i class="icon icon-arrow-left"></i>
				</button>

				<div class="main-slider pattern-overlay">
					<div class="slider-item">
						<div class="banner-content">
							<h2 class="banner-title">I AM MALALA</h2>
							<p>I AM MALALA is the remarkable tale of a family uprooted by global terrorism, of the fight for girls' education, of a father who, himself a school owner, championed and encouraged his daughter to write and attend school, and of brave parents who have a fierce love for their daughter in a society that prizes sons.</p>
							<div class="btn-wrap">
								<a href="https://en.wikipedia.org/wiki/I_Am_Malala" class="btn btn-outline-accent btn-accent-arrow">Read More<i class="icon icon-ns-arrow-right"></i></a>
							</div>
						</div><!--banner-content--> 
						<img src="images/main-banner01.jpg" alt="banner" class="banner-image">
					</div><!--slider-item-->

					<div class="slider-item">
						<div class="banner-content">
							<h2 class="banner-title">WINGS OF FIRE</h2>
							<p>Wings of Fire is the autobiography of the former President of India, Dr. Abdul Kalam. Kalam went from being a humble boy in South India to developing India’s nuclear weapons and becoming President. Through this autobiography, the reader gains a glimpse into pre-partition India.</p>
							<div class="btn-wrap">
								<a href="https://en.wikipedia.org/wiki/Wings_of_Fire_(autobiography)" class="btn btn-outline-accent btn-accent-arrow">Read More<i class="icon icon-ns-arrow-right"></i></a>
							</div>
						</div><!--banner-content--> 
						<img src="images/main-banner02.jpeg" alt="banner" class="banner-image">
					</div><!--slider-item-->

				</div><!--slider-->
					
				<button class="next slick-arrow">
					<i class="icon icon-arrow-right"></i>
				</button>
				
			</div>
		</div>
	</div>
	
</section>

<section id="client-holder" data-aos="fade-up">
	<div class="container">
		<div class="row">
			<div class="inner-content">
				<div class="logo-wrap">
					<div class="grid">
						<a href="#"><img src="images/client-image1.png" alt="client"></a>
						<a href="#"><img src="images/client-image2.png" alt="client"></a>
						<a href="#"><img src="images/client-image3.png" alt="client"></a>
						<a href="#"><img src="images/client-image4.png" alt="client"></a>
						<a href="#"><img src="images/client-image5.png" alt="client"></a>
					</div>
				</div><!--image-holder-->
			</div>
		</div>
	</div>
</section>

<section id="featured-books">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			<div class="section-header align-center">
				<div class="title">
					<span>Some quality items</span>
				</div>
				<h2 class="section-title">Featured Books</h2>
			</div>

			<div class="product-list" data-aos="fade-up">
				<div class="row">

					<div class="col-md-3">
						<figure class="product-style">
							<img src="uploads/51rS+6OVm-L.jpg" alt="Books" class="product-item"></a>
								
							<figcaption>
								<h3>Five Point Someone</h3>
								<p>Chetan Bhagat</p>
								<div class="item-price"><p>&#8377; 110</p></div>
							</figcaption>
						</figure>
					</div>
				
					<div class="col-md-3">
						<figure class="product-style">
							<img src="uploads/51wbVQTpTgL._SY445_SX342_.jpg" alt="Books" class="product-item"></a>
								
							<figcaption>
								<h3>Wings of Fire</h3>
								<p>A P J Abdul Kalam</p>
								<div class="item-price"><p>&#8377; 400</p></div>
							</figcaption>
						</figure>
					</div>

					<div class="col-md-3">
						<figure class="product-style">
							<img src="uploads/81Kngo7JwzL._SY522_.jpg" alt="Books" class="product-item"></a>
							
							<figcaption>
								<h3>Gitanjali</h3>
								<p>Rabindranath Tagore</p>
								<div class="item-price"><p>&#8377;100</p></div>
							</figcaption>
						</figure>
					</div>
									
					<div class="col-md-3">
						<figure class="product-style">
							<img src="uploads/51u6gOqlKmL._SY445_SX342_.jpg" alt="Books" class="product-item"></a>
								
							<figcaption>
								<h3>I AM MALALA</h3>
								<p>Malala Yousfzai</p>
								<div class="item-price"><p>&#8377;100</p></div>
							</figcaption>
						</figure>
					</div>

			    </div><!--ft-books-slider-->				
			</div><!--grid-->


			</div><!--inner-content-->
		</div>
		
		<div class="row">
			<div class="col-md-12">

				<div class="btn-wrap align-right">
					<a href="allpage2.php" class="btn-accent-arrow">View all products <i class="icon icon-ns-arrow-right"></i></a>
				</div>
				
			</div>		
		</div>
	</div>
</section>




<section id="quotation" class="align-center">
	<div class="inner-content">
		<h2 class="section-title divider">Quote of the day</h2>
		<blockquote data-aos="fade-up">
			<q>“The more that you read, the more things you will know. The more that you learn, the more places you’ll go.”</q>
			<div class="author-name">Dr. Seuss</div>			
		</blockquote>
	</div>		
</section>



						



<section id="latest-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="section-header align-center">
					<div class="title">
						<span>Read our articles</span>
					</div>
					<h2 class="section-title">Latest Articles</h2>
				</div>

				<div class="row">

					<div class="col-md-4">

						<article class="column" data-aos="fade-up">

							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img1.jpg" alt="post" class="post-image">			
								</a>
							</figure>

							<div class="post-item">	
								<div class="meta-date">Mar 30, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-down">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img2.jpg" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">	
								<div class="meta-date">Mar 29, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-up">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img3.jpg" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">		
								<div class="meta-date">Feb 27, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>

				</div>

				<div class="row">

					<div class="btn-wrap align-center">
						<a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All Articles<i class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>

			</div>	
		</div>
	</div>
</section>



<footer id="footer">
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				
				<div class="footer-item">
					<div class="company-brand">
						<img src="images/main-logo1.png" alt="logo" class="footer-logo">
						<p>WHERE BIBLIOPHILES MEET HEAVEN!</p>
					</div>
				</div>
				
			</div>

			<div class="col-md-2">

				

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>Discover</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="index.php">Home</a>
						</li>
						<li class="menu-item">
							<a href="allpage2.php">Books</a>
						</li>
						<li class="menu-item">
							<a href="audiobook.php">Audiobooks</a>
						</li>
						<li class="menu-item">
							<a href="review.php">Reviews</a>
						</li>
						
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>My account</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="login.php">Sign In</a>
						</li>
						
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>Help</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">Help center</a>
						</li>
						<li class="menu-item">
							<a href="#">Report a problem</a>
						</li>
						<li class="menu-item">
							<a href="#">Suggesting edits</a>
						</li>
						<li class="menu-item">
							<a href="#">Contact us</a>
						</li>
					</ul>
				</div>

			</div>

		</div>
		<!-- / row -->

	</div>
</footer>

<div id="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="copyright">
					<div class="row">

						<div class="col-md-6">
							<p>© 2022 All rights reserved.</a></p>
						</div>

						<div class="col-md-6">
							<div class="social-links align-right">
								<ul>
									<li>
										<a href="#"><i class="icon icon-facebook"></i></a>
									</li>
									<li>
										<a href="#"><i class="icon icon-twitter"></i></a>
									</li>
									<li>
										<a href="#"><i class="icon icon-youtube-play"></i></a>
									</li>
									<li>
										<a href="#"><i class="icon icon-behance-square"></i></a>
									</li>
								</ul>
							</div>
						</div>

					</div>
				</div><!--grid-->

			</div><!--footer-bottom-content-->
		</div>
	</div>
</div>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>

</body>


</html>	