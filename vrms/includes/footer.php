<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?> <!--== Footer Area Start ==-->
    <section id="footer-area">
        <!-- Footer Widget Start -->
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                        <div class="single-footer-widget">
                            <h2><?php  echo $row['PageTitle'];?></h2>
                            <div class="widget-body">
                            <h2>VRMS</h2>
                                <p><?php  echo $row['PageDescription'];?>.</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>More Links</h2>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="twowheeler-details.php">Two Wheeler Details</a></li>
                                    <li><a href="car-details.php">Four Wheeler Details</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                            <h2>get in touch with us</h2>
                            <div class="widget-body">
                                <p>dgjjfbvjcbhzgfhjx</p>

                                <ul class="get-touch">
                                    <li><i class="fa fa-map-marker"></i> <?php  echo $row['PageDescription'];?></li>
                                    <li><i class="fa fa-mobile"></i> +<?php  echo $row['MobileNumber'];?></li>
                                    <li><i class="fa fa-envelope"></i> <?php  echo $row['Email'];?></li>
                                </ul>
                               </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Single Footer Widget End -->
                </div>
            </div>
        </div>
        <!-- Footer Widget End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>© Vehicle Rental Management System @ 2022

</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->
