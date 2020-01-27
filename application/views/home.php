<?php $this->load->view('header/personnel');?>
<div id="wrapper">
    <div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-1"></div>
                <div class="col-md-10 box-logo" style="align-content: center">
                    <img  src="<?php echo base_url('assets'); ?>/img/logo.jpeg"  />
                    <h2 class="page-header" style=" font-weight: 500;">FICR Gestion du personnel </h2>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="col-md-12 padding-10">
                
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div id="loader"></div>
                    <p class="text-left">GRH / Se connecter </p>
                    <div class="ibox-content box-login">
                        <?php echo form_open('', array('id' => 'Myform', 'class' => 'form-horizontal')); ?>
                            <div class="box-body col-md-12 page-header">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: center;">
                                            <i class="fa fa-user f15"></i>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: center;">
                                            <i class="fa fa-key f15"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                       
                                        <?php echo form_input('email', '', 'class="form-control", placeholder="Identifiant" id="email" required="required" '); ?>
                                    </div> 
                                    <div class="form-group">
                                       
                                       <?php echo form_password('password','', 'class="form-control", placeholder="Mot de passe" id="password" required="required" '); ?>
                                    </div> 
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button id="submit" class="btn btn-sm btn-primary pull-right" type="submit">Connexion</button>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?> 
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="col-md-12 padding-20 text-center"> 
                &COPY; 2019 Dimsoft creative
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer/personnel'); ?>
<script type="text/javascript">
$("#Myform").submit(function(event){
    event.preventDefault();
    var url = '<?php echo site_url('connexion'); ?>';
    var admin = '<?php echo site_url('user');?>';
    var data = $(this).serialize();
    $("#submit").text('connexion...');
    $("#submit").prop('disabled', 'true'); 
    $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'html',
            encode: true,
            success: function (result){
                if(result == 401)
                {
                        var chtml = '<div class="alert alert-danger"> D&eacute;sol&eacute; !, vous n\'avez pas de compte, veuillez contacter votre administrateur...<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
                        $('#loader').html('<img  align="middle" height="30px" src="<?php echo base_url('assets/img/loadbar.gif')?>" />');
                        $('#loader').html(chtml);
                        $("#submit").text('connexion');
                        $("#submit").prop('disabled', '');
                }
                else if(result == 400)
                {
                        window.location.replace(admin);
                }
               
            },
            error: function (error) {
                alert('ERROR!' + error);
            }
        });
        $("#submit").prop('disabled', '');
});
</script>
</body>