

      <!-- Slider start here -->
      <div id="myCarousel" class="carousel carousel-custom slide carousel-fade" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
         </ol>
         <div class="container">
            <div class="text-section ">
               <div class="background-text">
                  <div class="main-heading-banner">
                     <h1>SHIP MORE, SPEND LESS</h1>
                  </div>
                  <p>Looking to ship something to Bermuda? You've come to the right place! We make it easy to compare shipping prices in Bermuda.</p>
               </div>
               <div class="read-more-btn">
                  <button class="btn btn-read-more">GET A FREE QUOTE</button>
               </div>
            </div>
         </div>
         <div class="carousel-inner" role="listbox">
            <div class="item active">
               <?php 
               echo $this->Html->image('slider2.png', array('alt' => 'slider', 'class' => 'img-responsive'));
               ?>
            </div>
            <div class="item ">
               <?php 
                  echo $this->Html->image('slider4.png', array('alt' => 'slider', 'class' => 'img-responsive'));
               ?>
            </div>
            <div class="item ">
              <?php 
                  echo $this->Html->image('slider3.png', array('alt' => 'slider', 'class' => 'img-responsive'));
              ?>
            </div>         
         </div>
      </div>

      <!-- What Can We Deliver -->
      <section class="what-can-we-do">
         <div class="container">
            <h1 class="text-center">What are you shipping?</h1>
            <div class="col-sm-4 col-lg-2 padding-l-r-10">
               <div class="border-top-box">
                  <!-- <img class="img-responsive" alt="vehicles" src="img/vehicles.png"> -->
            <?php 
            echo $this->Html->image('vehicles.png', array('alt' => 'vehicles', 'class' => 'img-responsive'));
            ?>
                  <h3>Vehicles</h3>
                  <p>Cars, Boats, Motorcycles...</p>
               </div>
            </div>
            <div class="col-sm-4 col-lg-2 padding-l-r-10">
               <div class="border-top-box">
                  <!-- <img class="img-responsive" alt="hosue" src="img/house.png"> -->
            <?php 
            echo $this->Html->image('house.png', array('alt' => 'house', 'class' => 'img-responsive'));
            ?>
                  <h3>Household Goods</h3>
                  <p>Furniture, Appliances...</p>
               </div>
            </div>
            <div class="col-sm-4 col-lg-2 padding-l-r-10">
               <div class="border-top-box">
                  <!-- <img class="img-responsive" alt="office-movers" src="img/office-mover.png"> -->
            <?php 
            echo $this->Html->image('office-mover.png', array('alt' => 'office-movers', 'class' => 'img-responsive'));
            ?>
                  <h3>Home or Office Moves</h3>
                  <p>Studio Apartment, 1-4BR House…</p>
               </div>
            </div>
            <div class="col-sm-4 col-lg-2 padding-l-r-10">
               <div class="border-top-box">
                 <!--  <img class="img-responsive" alt="heavy-equipment" src="img/heavy-equipment.png"> -->
            <?php 
            echo $this->Html->image('heavy-equipment.png', array('alt' => 'heavy-equipment', 'class' => 'img-responsive'));
            ?>
                  <h3>Plant and Heavy Equipment</h3>
                  <p>Construction, Farm...</p>
               </div>
            </div>
            <div class="col-sm-4 col-lg-2 padding-l-r-10">
               <div class="border-top-box">
                  <!-- <img class="img-responsive" alt="freight" src="img/freight.png"> -->
            <?php 
            echo $this->Html->image('freight.png', array('alt' => 'freight', 'class' => 'img-responsive'));
            ?>
                  <h3>Freight</h3>
                  <p>Less-than-Container, Container...</p>
               </div>
            </div>
            <div class="col-sm-4 col-lg-2 padding-l-r-10">
               <div class="border-top-box">
                  <!-- <img class="img-responsive" alt="animals" src="img/animals.png"> -->
            <?php 
            echo $this->Html->image('animals.png', array('alt' => 'animals', 'class' => 'img-responsive'));
            ?>
                  <h3>Animals</h3>
                  <p>Dogs, Cats, Horses...</p>
               </div>
            </div>
         </div>
      </section>
      <!-- What Can We Deliver -->


      <!-- Fast Delivery -->
      <section class="fast-delivery">
         <div class="container">
            <div class=" col-lg-6 col-sm-11 col-md-6">
               <h2>
                HOW DOES THE SERVICE WORK?
               </h2>
               <p>
                <ul class="list-unstyled">
                   <li><i class="you-talk"></i><strong>You talk.</strong> Tell us what you would like to ship. Request a shipping quote or name your own price</li>
                   <li><i class="you-find"></i><strong>We find.</strong> Our system matches your request with shippers to get you the best quote.</li>
                   <li><i class="you-save"></i><strong>You save.</strong> Select the best quote, make a deposit and begin shipping. Easy!</li>
                </ul>
               </p>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
               <!-- <img class="img-responsive" alt="fast-delvery" src="img/fast-delvery.png"> -->
         <?php 
            echo $this->Html->image('fast-delvery.png', array('alt' => 'fast-delvery', 'class' => 'img-responsive'));
         ?>
            </div>
         </div>
      </section>
      <!-- Fast Delivery -->


      <!-- Main Feature -->
      <section class="main-feature">
         <div class="container">
            <h1 class="text-center">WHY CHOOSE US?</h1>
      
            <div class="col-sm-12 col-lg-6 satisfied-customers">
               <h5>Save time</h5>
               <p>
                 Get multiple shipping quotes with the click of a button. Don’t waste any more time calling around for prices.
               </p>
               <h5>Save money</h5>
               <p>
                Shippers compete for your business so you know you’re getting the best price. With the Name Your Price option you set the terms.
               </p>
               <h5>Get the full price up front</h5>
               <p>
                 No hidden fees to worry about. You get a quote, not an estimate. A quote is an offer to do a job for an exact price. If you accept the quote then the seller won’t charge you more than the agreed price.
               </p>
               <h5>Stay up to date with the latest rates</h5>
               <p>
                  Shipping prices change all the time. Be sure to check in for the best price before you ship.
               </p>
                <h5>Assisted purchase</h5>
               <p>
                 If you need help ordering online ask a shipper to purchase goods on your behalf. We match you with businesses that offer the service.
               </p>

               <h5>Expedited Service</h5>
            </div>
            <div class="col-sm-6">
               <!-- <img class="img-responsive" alt="choose-us" src="img/choose-us.png"> -->
         <?php 
            echo $this->Html->image('forklift.png', array('alt' => 'choose-us', 'class' => 'img-responsive'));
         ?>
            </div>
         </div>
      </section>
      <!-- Main Feature -->


      <!-- History -->
      <section class="history">
         <div class="container">
            <h1 class="text-center">HISTORY</h1>
            <h3 class="text-center">Recently Shipped</h3>
               <div class="table-responsive">
            <table class="table history-table">
               <thead>
                  <tr>
                     <th>Shipped Item</th>
                     <th>Origin</th>
                     <th>Destination</th>
                     <th>Service Provider</th>
                     <th>Transporter Rating</th>
                     <th>Price</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Large Manual Garbage Computer</td>
                     <td>Evanston, IL</td>
                     <td>Modesto, CA</td>
                     <td>CLEARLANEFREIGHT</td>
                     <td>
                        <i class="glyphicon glyphicon-star"></i>            
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i> <span>5/5</span>
                     </td>
                     <td>$348.75</td>
                  </tr>
                  <tr>
                     <td>FIDA 16-4894, 16-4897</td>
                     <td>Evanston, IL</td>
                     <td>Modesto, CA</td>
                     <td>CLEARLANEFREIGHT</td>
                     <td>
                        <i class="glyphicon glyphicon-star"></i>            
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i> <span>5/5</span>
                     </td>
                     <td>$78.75</td>
                  </tr>
                  <tr>
                     <td>Large Manual Garbage Computer</td>
                     <td>Evanston, IL</td>
                     <td>Modesto, CA</td>
                     <td>CLEARLANEFREIGHT</td>
                     <td>
                        <i class="glyphicon glyphicon-star"></i>            
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i> <span>5/5</span>
                     </td>
                     <td>$348.75</td>
                  </tr>
                  <tr>
                     <td>Large Manual Garbage Computer</td>
                     <td>Evanston, IL</td>
                     <td>Modesto, CA</td>
                     <td>CLEARLANEFREIGHT</td>
                     <td>
                        <i class="glyphicon glyphicon-star"></i>            
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i>
                        <i class="glyphicon glyphicon-star"></i> <span>5/5</span>
                     </td>
                     <td>$348.75</td>
                  </tr>
               </tbody>
            </table>
            </div>
         </div>
      </section>
      <!-- History Section End Here -->

      <!-- testimonial Section -->
      <section class="testimonial-section">
         <div class="container content">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
               <!-- Indicators --> 
               <!-- Wrapper for slides --> 
               <div class="carousel-inner">
                  <div class="item active">
                     <div class="row">
                        <div class="col-xs-12">
                           <div class=" col-sm-10 col-sm-offset-3 lead adjust2">THEY TRUST US</div>
                           <div class=" ">
                              <div class="col-md-2 col-sm-2 col-xs-12 col-sm-offset-1"> 
                                 <!-- <img class="media-object  img-responsive" src="img/testimonial-img.png">  -->
         <?php 
            echo $this->Html->image('testimonial-img.png', array('alt' => '', 'class' => 'media-object  img-responsive'));
         ?>
                              </div>
                              <div class="col-md-8 col-sm-8 col-xs-12 ">
                                 <div class="caption">
                                    <div class="client-name">john matt</div>
                                    <div class="post-des">CEO TRANS GLOBOL LTD.</div>
                                    <p class="description-testimonial">“ Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor  incididunt ut labore etu dolore magna aliqua enim veniam quis nostrud exercitate ullamco laboris nisi aliquip exea commodo consequat duis aute dolor reprehenderit in lorem ipsum dolor sit ametas consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="row">
                        <div class="col-xs-12">
                           <div class="  col-sm-10 col-sm-offset-3  lead adjust2">THEY TRUST US</div>
                           <div class="">
                              <div class="col-md-2 col-sm-2 col-xs-12 col-sm-offset-1"> 
                                 <!-- <img class="media-object img-responsive" src="img/testimonial-img.png">  -->
         <?php 
            echo $this->Html->image('testimonial-img.png', array('alt' => '', 'class' => 'media-object  img-responsive'));
         ?>
                              </div>
                              <div class="col-md-8 col-sm-8 col-xs-12 ">
                                 <div class="caption">
                                    <div class="client-name">john matt</div>
                                    <div class="post-des">CEO TRANS GLOBOL LTD.</div>
                                    <p class="description-testimonial">“ Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor  incididunt ut labore etu dolore magna aliqua enim veniam quis nostrud exercitate ullamco laboris nisi aliquip exea commodo consequat duis aute dolor reprehenderit in lorem ipsum dolor sit ametas consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Controls --> 
               <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> 
               <span class="glyphicon glyphicon-menu-left-left"></span> 
               </a> 
               <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> 
               <span class="glyphicon glyphicon-menu-right-right"></span> 
               </a>
            </div>
         </div>
      </section>
      <!-- testimonial Section End -->

