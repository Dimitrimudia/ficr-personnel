<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
            <div id="loader"></div>
            <h2>
                Ajouter un nouveau agent
            </h2>
            <div class=" bg-white ibox-content page-header">
                <?php echo form_open_multipart('', array('id'=>'mainform', 'class'=>'view')); ?>
                    <div class="box-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <?php echo form_input('name',$agent->Nom_7, 'class="form-control" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="postnon">Postnom</label>
                                <?php echo form_input('postnon',$agent->Postnom_8, 'class="form-control" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prenom">Pr&eacute;nom</label>
                                <?php echo form_input('prenom',$agent->Prenom_9, 'class="form-control" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                               <label for="genre">Genre</label>
                                <?php echo form_dropdown('genre',$genres, $agent->Genre_10, 'class="form-control" id="supervisor" required = "required"'); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="etatc">Etat-civil</label>
                                <?php echo form_dropdown('etatc',$maritals, $agent->EtatCivil_12, 'class="form-control"  required = "required"'); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">Nationalit&eacute;</label>
                                <?php echo form_input('nationality',$agent->Nationality_12, 'class="form-control" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adress">Adresse</label>
                                <?php echo form_input('adress',$agent->Adresse_15, 'class="form-control" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lieu">Lieu de naissance</label>
                                <?php echo form_input('lieu',$agent->Lieu_17, 'class="form-control" maxlength="255"  required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="naissance">Date de naissance</label>
                                <?php echo form_input('naissance',$agent->Naissance_11, 'class="form-control" maxlength="255" id="datepicker1" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telephone">T&eacute;l&eacute;phone</label>
                                <?php echo form_input('telephone',$agent->Telephone_13, 'class="form-control" placeholder="Exemple : +243810477346" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail">Email</label>
                                <?php echo form_input('mail',$agent->Email_16, 'class="form-control" placeholder="Exemple : jeanrenekalundi@gmail.com" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fonction">Fonction</label>
                                <?php echo form_input('fonction',$agent->Fonction_14, 'class="form-control" maxlength="255" required = "required" '); ?>
                            </div> 
                        </div>
                        <div id="sup" class="col-md-12" style="display:none;">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"> Contrats</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"> Cong&eacute;s</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">
                                            <strong class="page-header"> Donec quam felis</strong>
                                           
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body">
                                            <strong class="page-header"> Donec quam felis</strong> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix page_header">
                        <div class="col-md-12">
                            <div class="form-group">
                               <button type="submit" style="margin-left:0px;" name="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> &nbsp;Enregistrer&nbsp;</button>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
        <div class="col-md-1">
            <a id="cancel" class="btn btn-app no-border pull_left" href="#"><span class="fa fa-fw fa-times text-gray f20"></span></a>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
$("#datepicker1").datepicker({
    format: 'yyyy-mm-dd',
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true
});
<?php if(isset($agent->Id_0) && $agent->Id_0!=NULL && $agent->Id_0 != 0):?>
    $("#sup").css('display','block');
<?php endif;?>
$("#mainform").submit(function(e){
    e.preventDefault();
    var url = '<?php echo site_url('Addadmin/agent'); ?>/<?php echo $agent->Id_0; ?>';
    var data = $(this).serialize();
    $.ajax({
            type        : 'POST', 
            url         : url, 
            data        : data, 
            dataType    : 'html', 
            encode      : true,
            success: function(result){
                $('#loader').html('');
                $('#loader').html(result);
                <?php if($agent->Id_0 == ''){ ?>
                    $("#mainform").trigger('reset');
                <?php }?>
            },
            error:function(error){

                alert('ERROR!' + error);
            }
        });
});

$("#cancel").click(function(){
    cancel();
});
function cancel()
{
       var url = '<?php echo site_url('admin'); ?>';
       $.get(url, function(data, status){
           $("#pager").html(data);
       });
}  
</script>
