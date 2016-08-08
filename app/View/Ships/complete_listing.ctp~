
<div class="container shippment-information complete-listings">
         <ul class="nav nav-tabs">
            <li <?php echo ($completeListing[0]['Shipment']['status'] == 1) ? 'class="active"' : 'class="not-active"'; ?>>
               <a data-toggle="tab" href="#active">Active</a>
            </li>
            <li <?php echo ($completeListing[0]['Shipment']['status'] == 2) ? 'class="active"' : 'class="not-active"'; ?>>
               <a data-toggle="tab" href="#booked">Booked</a>
            </li>
            <li <?php echo ($completeListing[0]['Shipment']['status'] == 3) ? 'class="active"' : 'class="not-active"'; ?>>
               <a data-toggle="tab" href="#dispatched">Dispatched</a>
            </li>
            <li <?php echo ($completeListing[0]['Shipment']['status'] == 4) ? 'class="active"' : 'class="not-active"'; ?>>
               <a data-toggle="tab" href="#pickedup">Picked Up</a>
            </li>
            <li <?php echo ($completeListing[0]['Shipment']['status'] == 5) ? 'class="active"' : 'class="not-active"'; ?>>
               <a data-toggle="tab" href="#delivered">Delivered</a>
            </li>
             <li <?php echo ($completeListing[0]['Shipment']['status'] == 6) ? 'class="active"' : 'class="not-active"'; ?>>
               <a data-toggle="tab" href="#archived">Archived</a>
            </li>
         </ul>


         <div class="tab-content">
            <div id="active" class="shipment-info  tab-pane fade in active clearfix">
               <div class="headertop-shipmentsection">
                  <h4><?=$completeListing[0]['Shipment']['brief_description']?></h4>
                  <div><small>Hosehold Goods > Furniture</small></div>
               </div>
               <div class="well well-lg clearfix">
                  <div class="col-sm-8">
                  <?php if($completeListing[0]['Shipment']['status'] == 0){ ?>
                  <section>
                      <h4 class="h4settings">Your delivery is saved. When you are ready to book it, view your estimate and select the pricing option that fits your needs.<a href="#"></a></h4>
                  </section>
                  <?php } else{ ?>
                  <section class="border-bottom">
                      <h4 class="h4settings">Your shipment is now listed on uShip with an offer price of $
                      <?php 
                      echo $completeListing[0]['Shipment']['price'];
                      echo $this->Html->link(
                                       "<i class='glyphicon glyphicon-pencil'></i>",
                                        array('controller' => 'ships', 'action' => 'listingRequest', base64_encode($completeListing[0]['Shipment']['id']), base64_encode($completeListing[0]['Shipment']['price'])),
                                        array('escape' => false)
                                    ); 
                      ?> 
                      </h4>
                      <p>We will notify you when service providers bid, or if there are questions about your shipment. You’ll have until <strong>24 hours after your auction ends</strong> to review and accept a bid unless otherwise noted.
                     Having trouble getting bids? Consider <span class="text-blue"><strong>upgrading your listing</strong></span> to promote inthe marketplace.</p>
                  </section>
                  <section>
                     <p><span class="text-blue"><a href="" data-target="#update-address" data-toggle="modal">Confirm</a></span> your exact street adresses.</p>
                     <p><span class="text-blue">Download shipthestuff mobile</span> for the simplest way to manage your shipment.</p>
                  </section>
                  <?php } ?>
                  </div>
                  <div class="col-sm-4 padding-right">
                  <?php if($completeListing[0]['Shipment']['status'] == 0){ ?>
                  <div style="text-align: center;">
                  <h3>Ready to book?</h3>
                  <?php
                  echo $this->Html->link("Check Price",
                                        array('controller' => 'ships', 'action' => 'listingRequest', base64_encode($completeListing[0]['Shipment']['id'])),
                                        array('class' => 'btn btn-primary', 'escape' => false)
                                    );
                            ?>
                 <!--  <button class="btn btn-primary">Check Price</button> -->
                  </div>
                  <?php } ?>
                     <ul class="list-group">
                     <?php if($completeListing[0]['Shipment']['status'] != 0){ ?>
                       <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-arrow-up"></i>  Purchase Upgrade</a></li>
                     
<?php  if($this->Session->read('Auth.User.id')==$completeListing[0]['Shipment']['user_id']){ ?>  
                       <li class="list-group-item">
                       <?php
                              echo $this->Html->link("<i class='glyphicon glyphicon-trash'></i>  Delete",
                                        array('controller' => 'ships', 'action' => 'deleteShipment', base64_encode($completeListing[0]['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                        ?>
                       </li>
                       <?php } ?>

<?php } if($this->Session->read('Auth.User.id')==$completeListing[0]['Shipment']['user_id']){ ?>                       
                       <li class="list-group-item">
                        <?php
                              echo $this->Html->link("<i class='glyphicon glyphicon-pencil'></i>  Edit Shipment",
                                        array('controller' => 'ships', 'action' => 'editShipment', base64_encode($completeListing[0]['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                        ?>
                       </li>

<?php    }  if($this->Session->read('Auth.User.id')!=$completeListing[0]['Shipment']['user_id']){ ?>
                       <li class="list-group-item">
                        <?php
               
                              echo $this->Html->link("<i class='glyphicon glyphicon-envelope'></i>  Message",
                                        array('controller' => 'users', 'action' => 'myCompose', base64_encode($completeListing[0]['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                            
                        ?>
                       </li>
                       <?php } ?>
                             <li class=" list-group-item dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-plus"></i> More
                      <span class="caret"></span>
                        </a>
                        <ul aria-labelledby="drop3" class="dropdown-menu">
                           <li><a href="#"><i class="glyphicon glyphicon-th-list"></i> List a Similar Shipment</a></li>
                           <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Email</a></li>
    
                           <li><a href="#" onclick="myFunction()"><i class="glyphicon glyphicon-print"></i> Print</a></li>
                        </ul>
                        </li>
                      
                     </ul>
                  </div>
               </div>

              <div class="col-sm-12 col-lg-3 col-md-3 padding-left padding-right">

                  <div class="panel panel-default">
                    <div class="panel-heading">Listing information</div>
                    <div class="panel-body">
                     <table class="listing-basic-info" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr>
                           <th>Shipment Title:</th>
                           <td id="title2"><?=$completeListing[0]['Shipment']['brief_description']?></td>
                        </tr>
                        <tr>
                           <th>Shipment ID:</th>
                           <td><?=$completeListing[0]['Shipment']['id']?></td>
                        </tr>
                        <tr>
                           <th>Customer:</th>
                           <td><span><?=($this->Session->read('Auth.UserDetail.f_name') != '')?$this->Session->read('Auth.UserDetail.f_name'):$this->Session->read('Auth.User.UserDetail.f_name') ?></span>
                           </td>
                        </tr>
                        <tr>
                           <th>Date Listed:</th><td><?=date('d/m/Y h:i T', strtotime($completeListing[0]['Shipment']['created_on']))?></td>
                        </tr>
                        <!-- <tr>
                           <th>Date Updated:</th>
                           <td>6/8/2016 <small>6:25 AM GMT Standard Time </small></td>
                        </tr> -->

                        <!--  Used to hide auction end info when the listing is no longer active --> 
                        <tr>
                           <th>Ends:</th>
                           <td>
                           <?php
                                  $from=date_create(date('Y-m-d h:i'));
                                  $to=date_create($completeListing[0]['PickupDelivery']['pickup_date']);
                                  $diff=date_diff($to,$from);
                                  echo $diff->d . 'd ' . $diff->h . 'h';
                                  //echo $diff->format('%R%a days');
                            ?>
                         
                           </td>
                        </tr>
                        <tr>
                           <th></th>
                           <td><?=date('d/m/Y h:i T', strtotime($completeListing[0]['PickupDelivery']['pickup_date']))?></td>
                        </tr>
                        <tr>
                           <th>Offer:</th>
                           <td>$ <?=$completeListing[0]['Shipment']['price']?><br></td>
                        </tr>
                        <tr>
                           <th># of Bids:</th>
                           <td>0</td>
                        </tr>
                        <tr>
                           <th>Auction Goods:</th><td>No</td>
                        </tr>

                        </tbody>
                     </table>
                    </div>
                  </div>
                    <div class="panel panel-default">
                    <div class="panel-heading">Listing information</div>
                    <div class="panel-body">
      <!---start first slider --> 
      <?php $imgDatas = explode(',', $completeListing[0]['Shipment']['upload_picture']);

        if(count($imgDatas) > 0){
       ?>
                              <div class="adspace1">
                              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                              <?php $jj=0; foreach($imgDatas as $imgDataqw){  ?>
                               <li data-target="#carousel-example-generic" data-slide-to="<?php echo $jj; ?>" <?=($jj == 0) ? 'class="active"' : ''?>></li>
                              <?php $jj++; } ?>
                        </ol>
                              <div class="carousel-inner" role="listbox">
                              <?php 
                              $i=0;
                              foreach($imgDatas as $imgData){ ?>
                              <div class="item <?=($i == 0) ? 'active' : ''?>">
                              <img src="/img/uploads/<?php echo $imgData; ?>" alt="" width="500" height="500">
                              </div>
                              <?php $i++; } ?>

                                 </div>
                                 <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
                              </div>
                                
                          </div>
      <!--- end first slider  -->
      <?php }else{ 
                        echo $this->Html->image('listing-info.png', array('alt' => '', 'class' => 'img-responsive'));
                      } ?>
                    </div>
                  </div>
                  </div>

                     <div class="col-sm-12 col-lg-9 col-md-9">
                        <div class="panel panel-height panel-default">
                           <div class="panel-heading">Origin, Destination, & Route Information</div>
                              <div class="panel-body">
                                 <div class="col-sm-8 padding-left">
                                    <!-- <img class="img-responsive" src="img/map.png"> -->
                                    <div id="googleMap" style="width:500px;height:380px;"></div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="listing-route-info">
                                       <div class="small-heading-list">Origin</div>
                                       <div class="listing-route-info-bd">
                                          <div>
                                             <div class="text-blue-dark ">
                                                <a href="#" class="pichup_point"><?=$completeListing[0]['PickupDelivery']['pickup_location'] .' '. $completeListing[0]['PickupDelivery']['pick_city'] .' '. $completeListing[0]['PickupDelivery']['pick_state'] .' '. $completeListing[0]['PickupDelivery']['pick_zip']?></a>
                                             </div>
                                          </div>
                                         <!--  <div>Residence</div> -->
                                          <div >Pickup: <span> <?=$completeListing[0]['PickupDelivery']['pickup_date']?></span></div>
                                       </div>
                                    </div>
                                    <div class="listing-route-info">
                                       <div class="small-heading-list">Route</div>
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" checked>Common Route</label>
                                          </div>
                                       <div class="radio">
                                          <label><input type="radio" name="optradio">Truck Miles</label>
                                       </div>
                            <?php
                              // $options = array('1' => ' Common Route ', '2' => ' Truck Miles ');
                              // $attributes = array('legend' => false,);
                              // echo $this->Form->radio('route_type', $options, $attributes);
                            ?>
                                       <div >Est Distance: <span class="Est-Distance"> </span></div>
                                    </div>
                                    <div class="listing-route-info">
                                       <div class="small-heading-list">Destination</div>
                                       <div class="listing-route-deliver">
                                          <div>
                                             <div class="text-blue-dark ">
                                                <a href="#" class="delivery_point"><?=$completeListing[0]['PickupDelivery']['delivery_location'] .' '. $completeListing[0]['PickupDelivery']['deliver_city'] .' '. $completeListing[0]['PickupDelivery']['deliver_state'] .' '. $completeListing[0]['PickupDelivery']['deliver_zip']?></a>
                                             </div>
                                          </div>
                                          <!-- <div>Residence</div> -->
                                          <div >Delivery: <span><?=($completeListing[0]['PickupDelivery']['deliver_on_type'] == 'Between') ? $completeListing[0]['PickupDelivery']['deliver_on_type'].' '.$completeListing[0]['PickupDelivery']['deliver_date'].' to '.$completeListing[0]['PickupDelivery']['deliver_date2'] : $completeListing[0]['PickupDelivery']['deliver_on_type'].' '.$completeListing[0]['PickupDelivery']['deliver_date']; ?> </span></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>

                    <div class="col-sm-12 padding-left">
                        <div class="panel panel-default">
                            <div class="panel-heading">Household Goods > Other Household Goods</div>
                            <div class="panel-body">
                                <div class="small-heading-list"><?=$completeListing[0]['Shipment']['brief_description']?></div>
                                <div class="iteam-section clearfix">
                                    <div class="col-sm-2">
                                        Total fruniture items:<?=$completeListing[0]['Shipment']['no_of_items']?>
                                    </div>

<?php $shipDatas = unserialize($completeListing[0]['Shipment']['item_infomation']); 

?>
                                    <div class="col-sm-2">
                                        <div><label>Total Weight</label>:
                        <?php

                          $weight;
                          foreach ($shipDatas as $shipData) {
                              if($shipData['measure_type'] == 1){
                                $weight = $shipData['weight']*0.453592;
                              }else{
                                $weight = $shipData['weight'];
                              }
                              $weight += $weight;
                          }
                          echo round($weight).'kg';
                        ?>
                                         </div>
                                        <div><label>Palletized</label>: <?=($completeListing[0]['Shipment']['item_palletized'] == 0) ? 'No' : 'Yes' ?></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div><label>Crated</label>: <?=($completeListing[0]['Shipment']['item_crated'] == 0) ? 'No' : 'Yes' ?></div>
                                        <div>
                                            <label>Stackable</label>: <?=($completeListing[0]['Shipment']['item_stackable'] == 0) ? 'No' : 'Yes' ?>
                                        </div>
                                    </div>
                                </div>
                        <?php $count = 1; foreach($shipDatas as $shipData) { ?>
                                <div class="col-sm-12" style="border-bottom:1px dashed #808285;">
                                <div class="col-sm-4">Item <?=$count?>:</div>
                                <div class="col-sm-8">
                                    <div><label>Quantity</label>: <?=$shipData['quantity']?></div>
                                    <?php if($shipData['measure_type'] == 1){ ?>
                                    <div><label>Dimensions</label>: L: <?=$shipData['length'][0]?> ft <?=($shipData['length'][1] == '') ? '00' : $shipData['length'][1] ;?> in. W: <?=$shipData['width'][0]?> ft <?=($shipData['width'][1] == '') ? '00' : $shipData['width'][1] ;?> in. H: <?=$shipData['height'][0]?> ft <?=($shipData['height'][1] == '') ? '00' : $shipData['height'][1] ;?> in.</div>
                                    <div><label>Weight</label>: <?=$shipData['weight']?> lbs</div>
                                    <?php }else { ?>
                                    <div><label>Dimensions</label>: L: <?=$shipData['length'][0]?> m. <?=($shipData['length'][1] == '') ? '00' : $shipData['length'][1] ;?> cm. W: <?=$shipData['width'][0]?> m. <?=($shipData['width'][1] == '') ? '00' : $shipData['width'][1] ;?> cm. H: <?=$shipData['height'][0]?> m. <?=($shipData['height'][1] == '') ? '00' : $shipData['height'][1] ;?> cm.</div>
                                    <div><label>Weight</label>: <?=$shipData['weight']?> Kg</div>
                                    <?php } ?>
                                    <?php if($shipData['option']){ ?>
                                    <div><label><?=$shipData['online_type']?></label>: 
                             <?php
                                    //echo $this->Html->link($shipData['online_url'],
                                     //   array('escape' => true, 'target' => '_blank')
                                    //);
                             echo $this->Html->link($shipData['online_url'], 'http://'.$shipData['online_url']);
                              ?>
                                    </div>
                                    <?php } ?>
                                </div>
                              </div>
                        <?php $count++; } ?>
                                <div class="col-sm-12">
                                    <strong>Accepted Service Types: </strong>
                                    White Glove, Blanket Wrap, LTL Freight and Packaging, LTL Standard
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 padding-left">
                       <div class="panel panel-default">
                          <div class="panel-heading">Questions for this Shipment</div>
                            <div class="panel-body">
                                <div class="col-sm-12">- There are currently no questions for this shipment -</div>
                            </div>
                        </div>
                    </div>                     
                </div>   
         </div>
      </div>

<?php echo $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyBDQjIHPPkARigFwTycuQqY7jTEHSykWfc&sensor=true'); ?>
<?php echo $this->Html->script('frontend/complete_listing'); ?>
<?php echo $this->element("user/confirm_shipment"); ?>
<style type="text/css">
  .not-active {
   pointer-events: none;
   cursor: default;
}
</style>
