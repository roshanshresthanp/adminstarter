<?php
$title = "Contact Us";                   
include "header.php";                 
?>


<!-- Banner -->
<section class="banner" style="background-image: url('images/banner.jpg');">
	<div class="container">
		<div class="banner-wrap">
			<h1>Contact Us</h1>
		</div>
	</div>
</section>
<!-- Banner End -->


<!-- Contact Us -->
<section class="contact-us pt pb">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInLeft" data-wow-duration="1s">
					<i class="las la-envelope-open-text"></i>
					<span>Email Us</span>
					<p>support@gmail.com</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInDown center" data-wow-duration="1s">
					<i class="las la-phone-volume"></i>
					<span>Call Us</span>
					<p>+977 123 456 789</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInDown center" data-wow-duration="1.5s">
					<i class="las la-map-signs"></i>
					<span>Address</span>
					<p>Kathmandu, Nepal</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="contact-box wow bounceInRight" data-wow-duration="1s">
					<i class="las la-clock"></i>
					<span>Opening Time</span>
					<p>10:00AM - 5:00PM</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="contact-form mt wow bounceInLeft center" data-wow-duration="1s">
					<h3>Drop us a message for any query</h3>
					<form action="" method="get">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Your Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Your Email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="phone" class="form-control" placeholder="Your Phone">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="subject" class="form-control" placeholder="Your Subject">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="message" class="form-control" placeholder="Your Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="contact-btn">
									<button type="submit" class="btn btn-danger">Send Message</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="map mt wow bounceInRight center" data-wow-duration="1s">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.9212530847535!2d85.30833201458272!3d27.68882863291339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1918e77a958d%3A0x8adb3649babf6b7e!2sNectar%20Digit%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1627899300607!5m2!1sen!2snp" width="100%" height="484" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact Us End -->


<?php include_once "footer.php";?>