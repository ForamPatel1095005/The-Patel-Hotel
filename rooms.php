<?php 
  include ('header.php');
  include ('link.html');
     require_once "connection.php" ;
  $conn = connect();

?>

  <body id="rooms-1__page">
		
    <!-- Info Section
    ================================================== -->
    
  	<!-- Navbar
    ================================================== -->
  

    <!-- CONTENT
      ================================================== -->

    <!-- section home -->
    <section class="section__home" id="section__home">
    	<div class="container">
    		<div class="row">
  	    	<div class="col-sm-12">
  	    		<div class="welcome__content">
							<h1 class="welcome_content__title">Our rooms</h1>
	  					<p class="welcome_content__desc"></p>
		  			</div> <!-- .welcome__content -->
    	    </div>
	    	</div> <!-- / .row -->
    	</div> <!-- / .container -->
			<div class="home__bg"></div>
    </section> <!-- / .section__home -->

    <!-- section rooms-1 -->
    <section class="section__rooms-1">
    	<div class="container">
    		<div class="row">
           <?php
                                     $sql1="SELECT * FROM room_info";
                                     $ans=mysqli_query($conn,$sql1);
                                            while($c=mysqli_fetch_array($ans))
                                            {
                                            ?>
          <div class="rooms__item">
            
            <div class="col-md-6">

              <div class="rooms__pic">
                <img src="../admin/room_pic/<?php echo $c['image1']; ?>" class="img-responsive" alt="...">
              </div> <!-- / .about__pic -->
            </div>
            <div class="col-md-6">
              <div class="rooms__desc">
                <div class="rooms_desc__header">
                  <h2 class="rooms_desc__title"><?php echo $c['room_type']; ?></h2>
                  <p class="rooms_desc__price"> &#36 <span><?php echo $c['price']; ?></span> / night</p>
                </div> <!-- .rooms_desc__header -->
                
				<p class="rooms_desc__desc"><?php echo $c['detail1']; ?></p>
					<p class="rooms_desc__desc"><?php echo $c['detail2']; ?></p>
               
                  <p class="rooms_desc__desc"><?php echo $c['detail3']; ?></p>
                
                
                <p class="rooms_desc__desc"><?php echo $c['detail4']; ?></p>
             
              </div> <!-- / .rooms__desc -->
            </div>
<a href="book_room.php?room_id=<?php echo $c['ri_id']; ?>" class="btn btn-rooms">Book Now</a>
          </div> <!-- .rooms__item -->
          <?php
                                      }
                              ?>
        </div> <!-- .row -->
       



      <!--  <div class="row">
          <div class="col-sm-12">
        
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
        
          </div>
        </div> <!-- / .row --> 
	    </div> <!-- / .container -->
    </section> <!-- / .section__rooms-1 -->

		
<?php 
include 'footer.html';
?>

  </body>

<!-- Mirrored from gamin.simpleqode.com/Sunset/1.0.2/rooms-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 June 2023 12:30:42 GMT -->
</html>