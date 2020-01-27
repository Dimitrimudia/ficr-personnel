<?php

if($contract->Id_0 != 0 && $contract->Id_0 != ""):
    $debut =  strtotime(date('Y-m-d'));
    $fin =  strtotime($contract->Fin_8);
    $today =($fin - $debut)/86400;
    if($today <= 0):
        $today = 0;
    endif;
endif;
?>
<div class="col-md-2"></div>
<div class="col-md-8">
    <div id="loader"></div>
    <h2>
        <?php if($contract->Id_0 != '' && $contract->Id_0 != 0):?>
            D&eacute;tails du contrat de l'agent:  <strong><?php echo $agent->Nom_7.' '.$agent->Postnom_8.' '.$agent->Prenom_9;?></strong>
        <?php else :?>
            Nouveau contrat pour l'agent: <strong><?php echo $agent->Nom_7.' '.$agent->Postnom_8.' '.$agent->Prenom_9;?></strong>
        <?php endif;?>
    </h2>
    <span>
        <?php if($contract->Id_0 != 0 && $contract->Id_0 != ""):?>
            <?php if($today == 0 && $contract->Statut_3 == 2): ?>
                <span class="text-warning"> Contrat cl&ocirc;tur&eacute; </span>
            <?php elseif($today > 0 && $contract->Statut_3 == 1): ?>
                <span class="text-success"> Encore <?php echo $today; ?> pour ce contrat</span>
            <?php elseif($today <= 0 && $contract->Statut_3 == 1): ?>
                <span class="text-success"> Ce contrat doit &ecirc;tre cl&ocirc;rer!</span>
            <?php endif; ?>
        <?php endif; ?>
    </span>
   <div class=" bg-white ibox-content page-header">
        <?php echo form_open_multipart('', array('id'=>'mainform', 'class'=>'view')); ?>
            <div class="box-body">
                <input type='hidden' name='identifier'  value='<?php echo $agent->Id_0?>'/>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <?php echo form_dropdown('type', $types, $contract->Type_6, 'class="form-control"  required = "required"'); ?>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="debut">D&eacute;but</label>
                        <?php echo form_input('debut',$contract->Debut_7, 'class="form-control" maxlength="255" id="datepicker1" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fin">Fin</label>
                        <?php echo form_input('fin',$contract->Fin_8, 'class="form-control" maxlength="255" id="datepicker2" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fonction">Fonction</label>
                        <?php echo form_input('fonction',$contract->Fonction_13, 'class="form-control" maxlength="255" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lieu">Lieu</label>
                        <?php echo form_input('lieu',$contract->Lieu_14, 'class="form-control" maxlength="255" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cnss">N&diam; CNSS</label>
                        <?php echo form_input('cnss',$contract->CNSS_11, 'class="form-control" maxlength="255" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="enfants">Nombre d'enfants</label>
                        <?php echo form_input('enfants',$contract->Enfant_12, 'class="form-control" maxlength="255" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <?php echo form_textarea(array('name' => 'comment', $contract->Commentaire_10, 'cols' => 40, 'rows' => 2), set_value('comment',$contract->Commentaire_10), 'id="comment" class="form-control" maxlength="761"'); ?>
                        <div style="clear:both"></div>
                    </div>   
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                <span class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-default btn-file">
                                <span class="fileinput-new">Joindre le P.V</span>
                                <span class="fileinput-exists">| Changer</span>
                                <input type= "file" name="attachement" value="<?php if(isset($default->Attachement_12)){ echo $default->Attachement_12; } ?>" />
                            </span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                        </div>   
                    </div>
                </div>
                <?php if(($contract->Id_0 != 0 || $contract->Id_0 != "") && $contract->Statut_3 == 1 && $today <= 0):?>
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox1" name="state" value="cl" type="checkbox">
                            <label for="checkbox1">
                                Cochez pour cl&ocirc;turer le contrat.
                            </label>
                        </div>
                    </div>
                <?php endif;?>
                <?php if(($contract->Id_0 != 0 || $contract->Id_0 != "") && $contract->Statut_3 == 1):?>
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox2" name="stop" value="st" type="checkbox">
                            <label for="checkbox2">
                                Cochez pour r&eacute;silier le contrat.
                            </label>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="box-footer clearfix page_header">
                <?php if($contract->Statut_3 == 1 || $contract->Id_0 == 0 || $contract->Id_0 == "") :?>
                    <div class="col-md-12">
                        <div class="form-group">
                           <button type="submit" style="margin-left:0px;" name="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> &nbsp;Enregistrer&nbsp;</button>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        <?php echo form_close();?>
   </div>
</div>
<div class="col-md-2">
    <a id="cancel" class="btn btn-app no-border pull_left" href="#"><span class="fa fa-fw fa-times  close f20"></span></a>
</div>
<script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/jasny/jasny-bootstrap.min.js"'); ?>" type="text/javascript"></script>
<script type="text/javascript">
var id = '<?php echo $agent->Id_0;?>';
$("#datepicker1").datepicker({
    format: 'yyyy-mm-dd',
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true
});
$("#datepicker2").datepicker({
    format: 'yyyy-mm-dd',
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true
});

$("#mainform").submit(function(e){
    e.preventDefault();
    var url = '<?php echo site_url('save/contrat'); ?>/<?php echo $contract->Id_0; ?>';
    var data = new FormData(this);
    $.ajax({
            type        : 'POST', 
            url         : url, 
            data        : data, 
            dataType    : 'html', 
            encode      : true,
            processData :false,
            cache       :false,
            contentType : false,
            success: function(result){
                $('#loader').html('<img  align="middle" height="30px" src="<?php echo base_url('assets/img/loadbar.gif')?>" />');
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
        var url = '<?php echo site_url('display/agent/'); ?>' + id;
       $.get(url, function(data, status){
           $("#pager").html(data);
       });
}  
</script>