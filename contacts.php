<?php
  //session_start();
  include ('header.php');
  require "connection.php";
	$conn = connect();
	//$msg = "";
  include ('link.html');
?>
  <body id="contacts__page">

    <!-- Info Section


    <!-- CONTENT ================================================== -->

    <!-- section home -->
    <section class="section__home" id="section__home">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
                <div class="welcome__content">
                            <h2 class="welcome_content__title">Contact us</h2>
                        <p class="welcome_content__desc"></p>
                    </div> <!-- .welcome__content -->
            </div>
          </div> <!-- / .row -->
        </div> <!-- / .container -->
            <div class="home__bg"></div>
    </section> <!-- / .section home -->

        <!-- section Contacts -->
    <section class="section__contacts">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="subheading">If you have any questions don't hesistate to contact us.</h1>
          </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-sm-7">
                <div class="section-contacts__form_body">
              <p class="section-contacts__title">Get in touch</p>

              <!-- Alert message
              <div class="alert" id="form_message" role="alert"><?php //echo $msg ?></div>-->

              <!-- Please carefully read the README file in order to setup the PHP contact form properly -->
              <form id="form_sendemail" class="contacts__form" data-animate-in="animateUp" method="post" action="">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" maxlength="30" placeholder="Enter Your E-mail" data-original-title="" title="" required="">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Full Name" data-original-title="" maxlength="15" required="" pattern="[A-Za-z]{1,15}$" title="Allow Only Character">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" class="form-control" maxlength="150" rows="6" id="message" placeholder="Enter Your Message" required=""></textarea>
                  <span class="help-block"></span>
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">

                
                <div class="btn-group">
                  <button type="submit" class="btn" name="send">
                    Send Message
                  </button>
                </div>
              </form>
            </div> <!-- / .section-contacts__form_body -->
            </div>
            <div class="col-sm-5">
                        <div class="contacts__info">
                            <p class="contacts_info__title">Information</p>
                            <ul class="contacts_info__content">
                <li>
                  <p class="contact-info-text"></p>
                </li>
                  <li>
                    <i class="icon ion-android-pin"></i>
                    <div class="contact-info-content">
                      <div class="title">Address</div>
                      <div class="description"> The Patel Hotel & Restaurant , Maldives - 362004.</div>
                    </div>
                  </li>
                  <li>
                    <i class="icon ion-android-call"></i>
                    <div class="contact-info-content">
                      <div class="title">Phone / Inquiry</div>
                      <div class="description">0220 2222220</div>
                    </div>
                  </li>
                  <li>
                    <i class="icon ion-android-mail"></i>
                    <div class="contact-info-content">
                      <div class="title">E-mail</div>
                      <div class="description">thepatelhotel@gmail.com</div>
                    </div>
                  </li>
                </ul>
                        </div> <!-- / .contacts__info -->
            </div>
          </div> <!-- / .row -->
      </div> <!-- / .container -->
      
    </section> <!-- / .section__contacts -->

<?php
  include 'footer.html';
 ?>

  </body>

</html>
<!----------------------------------Add Contact Us in Admin Database-------------------------->
<?php
	if(isset($_POST['send']))
	{
		$n=$_POST['name'];
		$e=$_POST['email'];
		$m=$_POST['message'];
		
		$sql="insert into contact(name,email,message) values('$n','$e','$m')";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			//$msg="Your Message Is Send Waiting For Reply";
			echo "<script>alert('Your Message Is Send Waiting For Reply')</script>";
		}
		else
		{
			//$msg="Your Message Is NOT Send";
			echo "<script>alert('Your Message Is NOT Send')</script>";
		}
		//echo "<script>alert('Your Message Is NOT Send')</script>";
	}
?>
<!-------------------------------------------------------------------------------------------->
