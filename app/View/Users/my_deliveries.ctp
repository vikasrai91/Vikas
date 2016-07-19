<?php /*foreach ($myDelivery as  $value) {
print_r($value)
}
 exit;*/  ?>
<div class="container page-bottom-margin">
         <div class="col-sm-12">
            <div class="header-page-top clearfix">
               <div class=" col-sm-8">
                  <h3>
                     <div class="dashboard-heading">
                        <span>My Deliveries</span>
                     </div>
                  </h3>
               </div>
            </div>
            <div class="filter-header clearfix">
               <div class="row">
                  <div class="col-sm-4">
                     <input type="search" class="form-control" placeholder="Title, Location or ID">
                  </div>
                  <div class="col-sm-8  text-right">
                     <button class="btn btn-white advanced-search ">Expand Filters <span class="caret"></span></button>
                  </div>
               </div>
            </div>
            <div class="advanced-filter hide">
               <div class="row">
                  <div class="col-sm-7 col-lg-6  padding-left">
                     <label class="col-sm-12">
                        <h3>Status</h3>
                     </label>
                     <div class="col-sm-6 col-md-6">
                        <div class="form-group clearfix">
                           <div class="works-in-ie-login">
                              <div class="checkbox">
                                 <label>
                                 <input type="checkbox" value="">
                                 <i class="faa fa-unchecked unchecked"></i>
                                 <i class="faa fa-checked  checked"></i>
                                 </label>
                                 <span>Active</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="works-in-ie-login">
                              <div class="checkbox">
                                 <label>
                                 <input type="checkbox" value="">
                                 <i class="faa fa-unchecked unchecked"></i>
                                 <i class="faa fa-checked  checked"></i>
                                 </label>
                                 <span>Booked</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="works-in-ie-login">
                              <div class="checkbox">
                                 <label>
                                 <input type="checkbox" value="">
                                 <i class="faa fa-unchecked unchecked"></i>
                                 <i class="faa fa-checked  checked"></i>
                                 </label>
                                 <span>Delivered</span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-6">
                        <div class="form-group clearfix">
                           <div class="works-in-ie-login">
                              <div class="checkbox">
                                 <label>
                                 <input type="checkbox" value="">
                                 <i class="faa fa-unchecked unchecked"></i>
                                 <i class="faa fa-checked  checked"></i>
                                 </label>
                                 <span>Picked Up</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="works-in-ie-login">
                              <div class="checkbox">
                                 <label>
                                 <input type="checkbox" value="">
                                 <i class="faa fa-unchecked unchecked"></i>
                                 <i class="faa fa-checked  checked"></i>
                                 </label>
                                 <span>Closed</span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="works-in-ie-login">
                              <div class="checkbox">
                                 <label>
                                 <input type="checkbox" value="">
                                 <i class="faa fa-unchecked unchecked"></i>
                                 <i class="faa fa-checked  checked"></i>
                                 </label>
                                 <span>Deleted</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 col-lg-6">
                    
                        <label class="col-sm-12">
                           <h3>Date Created</h3>
                        </label>
                        <div class='col-md-12 col-lg-5'>
                           <div class="form-group">
                              <div>Start</div>
                              <div class='input-group date' id='startDate'>
                                <?php 
                                        echo $this->Form->text('deliver_date',array('class' => 'form-control datepicker'));
                                  ?>

                                 <!--<input type='text' class="form-control" name="startDate" />-->
                                 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class='col-md-12 col-lg-5'>
                           <div class="form-group">
                              <div>End</div>
                              <div class='input-group date' id='endDate'>
                                 <input type='text' class="form-control" name="org_endDate" />
                                 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                              </div>
                           </div>
                        </div>

                        <div class="col-sm-12 clear-filters"><a href="#"> Clear Filters</a></div>
                   
                  </div>
               </div>
            </div>
            <div class="panel panel-info result-info">
               <div class="panel-heading clearfix">
                  <h4> Results</h4>
               </div>
               <div class="panel-body">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Shipment Title</th>
                           <th>Shipment Id</th>
                           <th>Date Created</th>
                           <th>Origin</th>
                           <th>Destination</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>my delivery</td>
                           <td>497318955</td>
                           <td>Jul 6, 2016</td>
                           <td><i class="glyphicon glyphicon-map-marker orign-map"></i> Bengaluru, IND</td>
                           <td><i class="glyphicon glyphicon-map-marker destination-map"></i> Bengaluru, IND</td>
                           <td>Deleted</td>
                        </tr>
                        <tr>
                           <td>my delivery</td>
                           <td>497318955</td>
                           <td>Jul 6, 2016</td>
                           <td><i class="glyphicon glyphicon-map-marker orign-map"></i> Bengaluru, IND</td>
                           <td><i class="glyphicon glyphicon-map-marker destination-map"></i> Bengaluru, IND</td>
                           <td>Deleted</td>
                        </tr>
                        <tr>
                           <td colspan="6" class="text-center no-result-text">No results were found.
                              Please check your spelling or try another search.
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
<style type="text/css">
  body{
    background: #fff;
  }
</style>
       <script type="text/javascript">
         $('.advanced-search').on('click', function(){
         
            $(".advanced-filter").toggleClass('hide');
               if($( ".advanced-filter" ).hasClass( "hide" )) {
                  $('.advanced-search').html('Expand Filters <span class="caret"></span>');
               }else {
                  $('.advanced-search').html('Collapse Filters <span class="caret"></span>');
               }
         });
         
         //       jQuery(function () {
         //       jQuery('#startDate').datetimepicker();
         //       jQuery('#endDate').datetimepicker();
         //       jQuery("#startDate").on("dp.change",function (e) {
         //            jQuery('#endDate').data("DateTimePicker").setMinDate(e.date);
         //       });
         //       jQuery("#endDate").on("dp.change",function (e) {
         //            jQuery('#startDate').data("DateTimePicker").setMaxDate(e.date);
         //       });
         // });
         
      </script>
       
