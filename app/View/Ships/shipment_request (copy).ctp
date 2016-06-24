<div class="container shippment-information">
      <ul class="nav nav-tabs">
         <li class="active">
            <a data-toggle="tab" href="#shippment-info">Shipment Informatioin</a>
         </li>
         <li>
            <a data-toggle="tab" href="#pickup-delivery">Pickup & Delivery</a>
         </li>
         <li>
            <a data-toggle="tab" href="#listing-option">Listing Options</a>
         </li>
         <li>
            <a data-toggle="tab" href="#complete-listing">Complete Listing</a>
         </li>
      </ul>
      <div class="tab-content">

        <!-- Shipment Info -->
         <div id="shippment-info" class=" shipment-info tab-pane fade in active">
            <div class="headertop-shipmentsection">
               <h4>Choose Shipment information</h4>
               <div><small>*required</small></div>
            </div>
            <form class="form-horizontal clearfix">
                  <section class="clearfix top-section-ship">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Number of Items</label>
                           <div class="col-sm-2">
                              <select  class="form-control numberofitems">
                                 <option value="1">1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                                 <option>6</option>
                                 <option>7</option>
                                 <option>8</option>
                                 <option>9</option>
                                 <option>10</option>
                                  <option>11</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Brief Description</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" placeholder="3 large Boxes">
                           </div>
                           <div class="col-sm-4">
                           <div class="help-block">
                           <small>
                                (e.g., 3 Large Boxes)
                           </small>
                           </div>
                           </div>
                        </div>
                     </div>
                  </section>

                  <div id="item-info">
                     <div class="item-information-box">
                        <section class="item-information clearfix">
                           <div class="col-sm-12">
                              <div class="text-blue">
                                 <h4 class="item-info-heading">Item 1 Information</h4>
                              </div>
                           </div>
                           <div class="col-sm-8">
                                 <section class="choose-number clearfix">
                                    <div class="text-blue">* Is this an auction item or an online classified listing?</div>
                                    <div class="form-group clearfix">
                                       <div class="works-in-ie-myaccount">
                                          <div class="col-sm-8 col-sm-offset-2">
                                             <div class="radio">
                                                <label>
                                                   <input type="radio" name="optionno"  value="option3" checked="checked">
                                                   <i class="fa-radio fa-checked  checked"></i>
                                                   <i class="fa-radio fa-unchecked unchecked"></i>
                                                   No, this is not an auction item or classifieds listing.
                                                </label>
                                             </div>
                                             <div class="radio">
                                                <label>
                                                   <input type="radio" name="optionno"  value="option4">
                                                   <i class="fa-radio fa-checked  checked"></i>
                                                   <i class="fa-radio fa-unchecked unchecked"></i>
                                                   Yes, this item can be found at
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group clearfix">
                                       <div class="col-sm-4 col-sm-offset-2">
                                          <select class="form-control found-select">
                                             <option selected="selected" value="1">eBay</option>
                                             <option>Proxibid</option>
                                             <option>Artfact</option>
                                             <option>AuctionZip</option>
                                             <option>Craigslist</option>
                                             <option>GovDeals.com</option>
                                             <option>GovLiquidation.com</option>
                                             <option>Gumtree</option>
                                             <option>Invaluable</option>
                                             <option>Liquidation.com</option>
                                             <option>LiveAuctioneers</option>
                                             <option>markt.de</option>
                                             <option>Public Surplus</option>
                                             <option>Other</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group url-input hide">
                                       <div class="col-sm-8 col-sm-offset-2">
                                          <label for="exampleInputEmail1">Please provide the URL for your item (optional):</label>
                                             <input type="text" class="form-control">
                                          <div class="help-block">
                                                <small>
                                                   NOTICE: This URL is for internal purposes only so we can serve you better in the future. It will not appear on your  listing.
                                                </small>
                                          </div>
                                       </div>
                                    </div>
                                 </section>

                              <div class="form-group">
                                 <div class="works-in-ie-myaccount">
                                    <div class="col-sm-8 col-sm-offset-3">
                                       <label class="radio-inline">
                                          <input type="radio" name="optradioo"  class="metric" value="0" checked="checked">
                                          <i class="fa-radio fa-checked  checked"></i>
                                          <i class="fa-radio fa-unchecked unchecked"></i>
                                          Imperial
                                       </label>
                                       <label class="radio-inline">
                                          <input type="radio" name="optradioo" class="metric" value="1">
                                          <i class="fa-radio fa-checked  checked"></i>
                                          <i class="fa-radio fa-unchecked unchecked"></i>
                                          Metric
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-sm-3 control-label">Length</label>
                                    <div class="col-sm-3">
                                       <input type="text" class="form-control imperial-attr" placeholder="ft.">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control imperial-attr-next" placeholder="In.">
                                    </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Width</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control imperial-attr" placeholder="ft.">
                                      </div>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control imperial-attr-next" placeholder="In.">
                                      </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Height</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control imperial-attr" placeholder="ft.">
                                      </div>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control imperial-attr-next" placeholder="In.">
                                      </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Weight</label>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control weight " placeholder="lbs">
                                      </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Quantity</label>
                                      <div class="col-sm-3">
                                          <select class="form-control">
                                            <option>1</option>
                                          </select>
                                      </div>
                              </div>
                              <div class="form-group item-description">
                                  <label class="col-sm-3 control-label">Item Description</label>
                                      <div class="col-sm-6">
                                        <textarea class="form-control" rows="4"></textarea>
                                      </div>
                              </div>
                           </div>
                               <div class="col-sm-4 item-img">
                                <!-- <img  class="img-responsive" src="img/dimensions.png"> -->
                                <?php 
                                    echo $this->Html->image('dimensions.png', array('alt' => '', 'class' => 'img-responsive'));
                                ?>
                               </div>
                        </section>
                     </div>
                  </div>

                      <section class="clearfix shipment-info-bottom">
                         <div class="col-sm-12">
                            <div class="form-group">
                               <div class="works-in-ie-myaccount">
                                  <label class="col-sm-2 control-label">Item(s) Palletized *</label>
                                  <div class="col-sm-8">
                                     <label class="radio-inline">
                                     <input type="radio" value="option1" name="optionp">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     Yes
                                     </label>
                                     <label class="radio-inline">
                                     <input type="radio" value="option2" name="optionp" checked="checked">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     No <small>(No Item is on a wooden or plastic pallet and can be moved by forklift)</small>
                                     </label>
                                  </div>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="works-in-ie-myaccount">
                                  <label class="col-sm-2 control-label">Item(s) Crated *</label>
                                  <div class="col-sm-8">
                                     <label class="radio-inline">
                                     <input type="radio"  value="option1" name="optionc">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     Yes
                                     </label>
                                     <label class="radio-inline">
                                     <input type="radio" checked="checked" value="option2" name="optionc">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     No <small>(item is boxed in wooden or plastic crat)</small>
                                     </label>
                                  </div>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="works-in-ie-myaccount">
                                  <label class="col-sm-2 control-label">Item(s) Stackable *</label>
                                  <div class="col-sm-8">
                                     <label class="radio-inline">
                                     <input type="radio"  value="option1" name="options">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     Yes
                                     </label>
                                     <label class="radio-inline">
                                     <input type="radio" checked="checked" value="option2" name="options">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     No <small>(item has flat surfaces and can sustain the weight of another object)</small>
                                     </label>
                                  </div>
                               </div>
                            </div>
                              <div class="form-group">
                             <label class="col-sm-2 control-label">Upload Pictures</label>
                             <div class="col-sm-5">
                                <input type="file" class="form-control">
                             </div>
                             <div class="help-block col-sm-10 col-sm-offset-2">
                                <small>
                                TIP: Listings with pictures get 63% more bids than listings without pictures! 
                                You can add an image now or do it later from your dashboard.
                                </small>
                             </div>
                          </div>
                          <div class="form-group">
                             <label class="col-sm-2 control-label">Additional Details</label>
                             <div class="col-sm-5">
                                <textarea class="form-control" rows="4"></textarea>
                             </div>
                             <div class="help-block col-sm-10 col-sm-offset-2">
                                <small>
                                IMPORTANT: Do not include your contact information here. For your security, your contact information will be exchanged only after you book a shipment with your Service Provider
                                </small>
                             </div>
                          </div>
                       
                         </div>
                      </section>
                           <div class="footer-btn">
                             <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-default margin-right-btn">Back</button>
                                   <button type="submit" class="btn btn-blue">Continue</button>
                                </div>
                             </div>
                          </div>
                    </form>
                </div>

            <!-- Pickup Delivery Section-->
            <div id="pickup-delivery" class=" pickup-delivery tab-pane fade">
               <div class="headertop-shipmentsection">
                  <h4>Choose Pickup & Delivery</h4>
                  <div><small>*required</small></div>
               </div>
               <form class="learfixc">
                  <section class="clearfix">
                     <div class="col-sm-4">
                        <div class="form-group clearfix">
                           <label class="control-label padding-left">Shipping Port location</label>
                           <div class="">
                              <input type="text" class="form-control" placeholder="City Or Zip">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>When will the shipment be at the port?</label>
                           <div class="input-group date" data-provide="datepicker">
                              <input type="text" class="form-control">
                              <div class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="clearfix whatdo-youneed">
                     <div class="col-sm-8">
                        <div class="form-group">
                           <label class="control-label">When do you need your shipment delivered?</label>
                           <div class="col-sm-8 padding-left">
                              <div class="input-group date" data-provide="datepicker">
                                 <input type="text" class="form-control">
                                 <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-4  padding-left">
                              <select class="form-control">
                                 <option>ASAP</option>
                                 <option>Before</option>
                                 <option>Between</option>
                                 <option>ON</option>
                              </select>
                           </div>
                           <div class="help-block col-sm-12 padding-left">
                              <small>
                              TIP: Remember to confirm the terms of shipment with your chosen Service Provider, including additional services or insurance.
                              </small>
                           </div>
                        </div>
                     </div>
                  </section>
                  <div class="footer-btn">
                     <div class="form-group">
                        <div class=" col-sm-10">
                           <button type="submit" class="btn btn-default margin-right-btn">Back</button>
                           <button type="submit" class="btn btn-blue">Continue</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>


            <!-- Listing Option -->
            <div id="listing-option" class="tab-pane fade listing-option">
               <div class="headertop-shipmentsection">
                  <h4>Create an Account</h4>
               </div>
               <form class="clearfix">
                  <div class="col-sm-6">
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <button class="btn btn-fb btn-block"><i aria-hidden="true" class="fa fa-facebook"> </i> Sign in with Facebook</button>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <div class="border-top">
                              <div class="or-text">Or</div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-6">
                           <label>First Name</label>
                           <input type="text" class="form-control">
                        </div>
                        <div class="col-sm-6">
                           <label>Last Name</label>
                           <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <label>Email</label>
                           <input type="email" class="form-control">
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <label>Phone</label>
                           <input type="text" class="form-control">
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <label>Account Type</label>
                           <select class="form-control">
                              <option>Personal</option>
                              <option>Business</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <label>Create Password</label>
                           <input type="text" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 list-right-background">
                     <h2>Have an Account?</h2>
                     <button class="btn btn-blue sign-in">Sign In</button>
                  </div>
                  <div class="col-sm-12">
                     <div class="footer-btn clearfix">
                        <div class="form-group">
                           <div class=" col-sm-10">
                              <button type="submit" class="btn btn-default margin-right-btn">Back</button>
                              <button type="submit" class="btn btn-blue">Continue</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>


            <!-- Complete Listing-->
            <div id="complete-listing" class="complete-listing tab-pane fade">
              
            </div>
         </div>
      </div>

       <div id="info-hide" class="hide">
            <div class="item-information-box-hide">
                <section class="item-information clearfix">
                    <div class="col-sm-12">
                        <div class="text-blue">
                            <h4 class="item-info-heading">Item 1 Information</h4>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <section class="choose-number clearfix">
                            <div class="col-sm-12">
                                <div class="text-blue">* Is this an auction item or an online classified listing?</div>
                                <div class="form-group clearfix">
                                    <div class="works-in-ie-myaccount">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionn" value="option3" checked="checked">
                                                    <i class="fa-radio fa-checked  checked"></i>
                                                    <i class="fa-radio fa-unchecked unchecked"></i>
                                                    No, this is not an auction item or classifieds listing.
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionn" value="option4">
                                                    <i class="fa-radio fa-checked  checked"></i>
                                                    <i class="fa-radio fa-unchecked unchecked"></i>
                                                    Yes, this item can be found at
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <select class="form-control found-select">
                                            <option selected="selected" value="1">eBay</option>
                                            <option>Proxibid</option>
                                            <option>Artfact</option>
                                            <option>AuctionZip</option>
                                            <option>Craigslist</option>
                                            <option>GovDeals.com</option>
                                            <option>GovLiquidation.com</option>
                                            <option>Gumtree</option>
                                            <option>Invaluable</option>
                                            <option>Liquidation.com</option>
                                            <option>LiveAuctioneers</option>
                                            <option>markt.de</option>
                                            <option>Public Surplus</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group input-url hide">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <label for="exampleInputEmail1">Please provide the URL for your item (optional):</label>
                                        <input type="text" class="form-control">
                                        <div class="help-block">
                                            <small>NOTICE: This URL is for internal purposes only so we can serve you better in the future. It will not appear on your listing.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="form-group">
                            <div class="works-in-ie-myaccount">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <label class="radio-inline">
                                        <input type="radio" name="optradioo" class="metric" value="option1" checked="checked">
                                            <i class="fa-radio fa-checked  checked"></i>
                                            <i class="fa-radio fa-unchecked unchecked"></i>
                                            Imperial
                                    </label>
                                    <label class="radio-inline">
                                            <input type="radio" class="metric" name="optradioo" value="option2">
                                            <i class="fa-radio fa-checked  checked"></i>
                                            <i class="fa-radio fa-unchecked unchecked"></i>
                                            Metric
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-3 control-label">Length</label>
                                <div class="col-sm-3">
                                    <input type="text"  class="form-control imperial-attr" placeholder="ft.">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control imperial-attr-next" placeholder="In.">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-sm-3 control-label">Width</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control imperial-attr" placeholder="ft.">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control imperial-attr-next" placeholder="In.">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Height</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control imperial-attr" placeholder="ft.">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control imperial-attr-next" placeholder="In.">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Weight</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control weight" placeholder="lbs">
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Quantity *</label>
                                <div class="col-sm-3">
                                    <select class="form-control">
                                        <option>1</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group item-description ">
                            <label class="col-sm-3 control-label">Item Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                        </div>
                    </div>

                        <div class="col-sm-4 item-img">
                            <!-- <img  class="img-responsive" src="img/dimensions.png"> -->
                            <?php 
                                    echo $this->Html->image('dimensions.png', array('alt' => '', 'class' => 'img-responsive'));
                            ?>
                        </div>
                </section>
            </div>
        </div>
<?php echo $this->Html->script('frontend/shipment-request'); ?>