<?php //print_r($userDeshbord);
//exit; ?>
<div class="container page-bottom-margin">
            <div class="col-sm-12">
                <div class="header-page-top">
                    <h3 class="dashboard-heading"><span>Dashbaord</span></h3>
                </div>
                <div class="table-section-top">
                    <div class="text-center">Open Jobs </div>
                </div>
                <div class="table-responsive">
                    <table class="table dasbaord-table">
                        <thead>
                            <tr>
                                <th>Item <i class="ti-arrows-vertical"></i></th>
                                <th>Applicants<i class="ti-arrows-vertical"></i></th>
                                <th>Messages<i class="ti-arrows-vertical"></i></th>
                                <th>Actions<i class="ti-arrows-vertical"></i></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php  foreach ($userDeshbord as  $openjob) {
                          //  print_r($openjob);
                         ?>
                            <tr>
                                <td>
                                    <div class="item-text"><?php echo $openjob['Shipment']['brief_description']; ?></div>
                                    <div>
                                        <small>Posted <?php echo $openjob['Shipment']['created_on'];  ?></small>
                                    </div>
                                </td>
                                <td>14</td>
                                <td>
                                 <?php
                              echo $this->Html->link($dashboardMessage,
                                        array('controller' => 'users', 'action' => 'myInbox', base64_encode($openjob['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                                      ?>

                                </td>
                                <td>
                                     <?php
                              echo $this->Html->link("Edit",
                                        array('controller' => 'ships', 'action' => 'editShipment', base64_encode($openjob['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                                      ?>

                                <!-- <a href="#">Edit</a> --></td>
                                <td>
                                <?php
                              echo $this->Html->link("Job detail",
                                        array('controller' => 'ships', 'action' => 'completeListing', base64_encode($openjob['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                                 ?>
                                <!-- Job detail --></td>
                               
                            </tr>
                            
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="table-section-top">
                    <div class="text-center">Running Jobs </div>
                </div>
                <div class="table-responsive">
                    <table class="table dasbaord-table">
                        <thead>
                            <tr>
                                <th>Item <i class="ti-arrows-vertical"></i></th>
                                <th>Hire<i class="ti-arrows-vertical"></i></th>
                                <th>Status<i class="ti-arrows-vertical"></i></th>
                                <th>Actions<i class="ti-arrows-vertical"></i></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($userDeshbordRunningjob as  $rowRunning) {
                         

                         ?>
                            <tr>
                                <td>
                                    <div class="item-text">
                                      <?php echo $rowRunning['Shipment']['brief_description'];  ?>
                                    </div>
                                    <div>
                                        <small>Posted <?php echo $rowRunning['Shipment']['created_on'];  ?> </small>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-bold">
                                      Alisha J. Simmons 
                                    </div>
                                    <div>
                                      <small>2 Jun, 2015</small>
                                    </div>
                                </td>
                                <td>Shipped</td>
                                <td>
                                 <?php
                              echo $this->Html->link("Edit",
                                        array('controller' => 'ships', 'action' => 'editShipment', base64_encode($openjob['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                                      ?>
                                <!-- <a href="#">Edit</a> --></td>
                                <td>
                                <?php
                              echo $this->Html->link("Job detail",
                                        array('controller' => 'ships', 'action' => 'completeListing', base64_encode($openjob['Shipment']['id'])),
                                        array('escape' => false)
                                    );
                                 ?>

                                <!-- Job detail --></td>
                            </tr>
                          
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<style type="text/css">
  body{
    background: #fff;
  }
</style>