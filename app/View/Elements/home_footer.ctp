 <!-- Footer Section -->
      <section class="footer-section">
         <div class="container">
            <div class="col-sm-6 col-md-6 col-lg-3">
            <!-- <img class="carrier-img" class="img-responsive" src="img/footer-img-bottom.png"> -->
                  <?php echo 
                        $this->Html->image('footer-img-bottom.png', array('alt' => '', 'class' => 'carrier-img img-responsive'))
                     ?>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
               <h4>ABOUT US</h4>
               <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
               <a href="#">Read More >></a>
               <ul class="list-unstyled list-inline social-media">
                  <li><!-- <a href="#"><img src="img/facebook.png"></a> -->
                  <?php
                     echo $this->Html->link(
                                     $this->Html->image('facebook.png'), '#', array('escape' => false, 'target' => '_self')
                                 );
                  ?>
                  </li>
                  <li><!-- <a href="#"><img src="img/twitter.png"></a> -->
                  <?php
                     echo $this->Html->link(
                                     $this->Html->image('twitter.png'), '#', array('escape' => false, 'target' => '_self')
                                 );
                  ?>
                  </li>
                  <li><!-- <a href="#"><img src="img/google.png"></a> -->
                  <?php
                     echo $this->Html->link(
                                     $this->Html->image('google.png'), '#', array('escape' => false, 'target' => '_self')
                                 );
                  ?>
                  </li>
                  <li><!-- <a href="#"><img src="img/linkdin.png"></a> -->
                  <?php
                     echo $this->Html->link(
                                     $this->Html->image('linkdin.png'), '#', array('escape' => false, 'target' => '_self')
                                 );
                  ?>
                  </li>
               </ul>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
               <h4>OUR SERVICES</h4>
               <ul class="list-inline our-services">
                  <li><i class="fa fa-chevron-right fa-1" aria-hidden="true"></i> Residential Moving</li>
                  <li><i class="fa fa-chevron-right fa-1" aria-hidden="true"></i> Corporate Relocation</li>
                  <li><i class="fa fa-chevron-right fa-1" aria-hidden="true"></i> International Move</li>
                  <li><i class="fa fa-chevron-right fa-1" aria-hidden="true"></i> Packing and Unpacking</li>
                  <li><i class="fa fa-chevron-right fa-1" aria-hidden="true"></i> Auto Transport</li>
               </ul>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 get-touch">
               <h4>GET IN TOUCH</h4>
               <ul class="list-unstyled list-inline">
                  <li><i class="glyphicon glyphicon-map-marker"></i> Lorance Road 542B, Tailstoi Town 5248 MT,Worldwide Country</li>
                  <li><i class="glyphicon glyphicon-earphone"></i> 01865 524 8503</li>
                  <li><i class="glyphicon glyphicon-envelope"></i> Contact@yopmail.com</li>
                  <li><i class="glyphicon glyphicon-globe"></i> http://shipthestuff.com</li>
               </ul>
            </div>
         </div>
      </section>
      <!-- testimonial Section -->