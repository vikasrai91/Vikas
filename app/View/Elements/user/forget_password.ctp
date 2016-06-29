<!-- Forget Password modal -->
        <div class="modal fade" id="forget-password" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                                            <?php 
                                                    echo $this->Form->create('User', array('url' => '/users/forgetPassword','novalidate' => true, 'id' => 'forgetPassword')); 
                                            ?>
                        <div class="text-center forget-section">
                            <div class="form-group">
                                <p>Enter your email address and we'll send instructions to reset your password.</p>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-12">
                                   
                                    <?php 
                                         echo $this->Form->input('email', array(
                                            'placeholder' => 'Email Address', 
                                            'div' => false, 
                                            'label' => false, 
                                            'class' => 'form-control'));
                                    ?>
                                </div>
                            </div>
                                    <?php 
                                        echo $this->Form->submit('Countinue',array('class' => 'btn btn-blue-login')); 
                                    ?>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
      <!-- Forget Password modal End -->