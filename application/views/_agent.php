<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="loader"></div>
            <h2>
                <?php if($agent->Id_0 == "" || $agent->Id_0 == 0): ?>
                    Ajouter un nouveau agent
               <?php endif; ?>
            </h2>
            <?php if($agent->Id_0 != "" || $agent->Id_0 != 0):?>
                <a id="edit" class="btn btn-success btn-outline no-border pull-right" href="#">Modifier ce dossier <i class="fa fa-fw fa-paste"></i></a><br/>
            <?php endif;?>
            <div class=" bg-white ibox-content page-header">
                <?php echo form_open_multipart('', array('id'=>'mainform', 'class'=>'view')); ?>
                    <div class="box-body">
                        <?php if($agent->Id_0 == ""):?>
                          <div class="ibox float-e-margins">
                            <h5 class="page-header">Informations personnelles</h5>
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
                        </div>
                        <div class="ibox float-e-margins">
                            <h5 class="page-header">Documents</h5>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail">Attestation de naissance</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Joindre le fichier</span>
                                            <span class="fileinput-exists">| Changer</span>
                                            <input type= "file" name="attestation" />
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail">Aptitude physique</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Joindre le fichier</span>
                                            <span class="fileinput-exists">| Changer</span>
                                            <input type= "file" name="aptitude"  />
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail">Certificat de mariage</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Joindre le fichier</span>
                                            <span class="fileinput-exists">| Changer</span>
                                            <input type= "file" name="certificatM"  />
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail">Dipl&ocirc;me</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Joindre le fichier</span>
                                            <span class="fileinput-exists">| Changer</span>
                                            <input type= "file" name="diplome" />
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail">Curulum vitae</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Joindre le fichier</span>
                                            <span class="fileinput-exists">| Changer</span>
                                            <input type= "file" name="cv"  />
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail">Carte d'identit&eacute;</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Joindre le fichier</span>
                                            <span class="fileinput-exists">| Changer</span>
                                            <input type= "file" name="carte"  />
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                            <div class="ibox float-e-margins">
                               <div class="panel panel-default">
                                    <div class="panel-heading"> 
                                        <h4 >Profile de l'agent</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="box box-info">
                                                <div class="box-body">
                                                    <div class="col-sm-7">
                                                        <div  align="center"> <img alt="User Pic" src="<?php echo base_url('assets/img/nobody_m.original.jpg'); ?> " id="profile-image1" class="img-circle img-responsive"> 
                                                            <input id="profile-image-upload" class="hidden" type="file">
                                                            <div style="color:#999;" >click here to change profile image</div>
                                                           
                                                            <!--Upload Image Js And Css-->
                                                        </div>
                                                        <br>
                                                        <!-- /input-group -->
                                                    </div>
                                                    <div class="left col-sm-5">
                                                        <span><h3 class="text-info"><?php echo $agent->Nom_7.' '.$agent->Postnom_8.' '.$agent->Prenom_9;?> </h3></span>
                                                        <span>
                                                            <h4 class="">
                                                                <?php if($agent->Statut_3 == 1):?>
                                                                    <i class="fa fa-user  text-success"></i>  Journalier
                                                                <?php elseif($agent->Statut_3 == 2):?>
                                                                    <i class="fa fa-user  text-green"></i> Agent actif
                                                                <?php elseif($agent->Statut_3 == 3):?>
                                                                    <i class="fa fa-user  text-yellow"></i> Agent en cong&eacute;
                                                                <?php elseif($agent->Statut_3 == 4):?>
                                                                    <i class="fa fa-user text-muted"></i> Agent inactif
                                                                <?php elseif($agent->Statut_3 == 5):?>
                                                                    <i class="fa fa-user text-danger"></i> Agent revoqu&eacute;
                                                                <?php endif;?>
                                                            </h4>
                                                        </span>
                                                        <span><p><i class="text-yellow fa fa-check-circle-o"></i> <?php echo $agent->Fonction_14;?></p></span>            
                                                        <span><p><i class=" text-green fa fa-phone-square"></i> <abrr title="Phone"><a href="tel:<?php echo $agent->Telephone_13;?>"><?php echo $agent->Telephone_13;?></a></abrr></p></span>            
                                                        <span><p><i class="fa fa-envelope"></i> <a href="mailto:#"><?php echo $agent->Email_16;?></a></p></span>            
                                                        <span><p><i class="text-success fa fa-home"></i> <?php echo $agent->Adresse_15;?></p></span>            
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <hr style="margin:5px 0 5px 0;">
                                                    <div class="col-sm-7 col-xs-7 tital " >Age :</div><div class="col-sm-5"><?php echo (Date('Y-m-d') - $agent->Naissance_11).' ans';?></div>

                                                      <div class="clearfix"></div>
                                                    <div class="bot-border"></div>

                                                    <div class="col-sm-7 col-xs-7 tital " >Date de naissance :</div><div class="col-sm-5"><?php echo $agent->Naissance_11;?></div>

                                                      <div class="clearfix"></div>
                                                    <div class="bot-border"></div>

                                                    <div class="col-sm-7 col-xs-7 tital " >Lieu de naissance :</div><div class="col-sm-5"><?php echo $agent->Lieu_17;?></div>

                                                     <div class="clearfix"></div>
                                                    <div class="bot-border"></div>

                                                    <div class="col-sm-7  col-xs-7 tital " >Genre :</div><div class="col-sm-5"><?php echo $genres[$agent->Genre_10];?></div>

                                                     <div class="clearfix"></div>
                                                    <div class="bot-border"></div>

                                                    <div class="col-sm-7 col-xs-7 tital " >Etat-civil :</div><div class="col-sm-5"><?php echo $maritals[$agent->EtatCivil_12];?></div>
                                            <!-- /.box-body -->
                                          </div>
                                          <!-- /.box -->
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="ibox float-e-margins">
                                <h5 class="page-header">Documents</h5>
                                <?php if(!empty($documents)):?>
                                    <table class="table bordered table-stripped table-hover no-border">
                                        <tbody id="bodydocuments">

                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <section id="cat_list">
                                        <div class="row fontawesome-icon-list pTop50 f14 tCenter" style="text-align: center;">
                                            <span class="text-gray">Aucun document!</span><br>
                                        </div>
                                    </section>
                                <?php endif;?>
                            </div>
                        <?php endif;?>
                        <?php if($agent->Statut_3 != 1):?>
                            <div class="ibox float-e-margins">
                                <h5 class="page-header">Autres informations</h5>                       
                                <div id="sup" class="col-md-12" style="display:none;">
                                    <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1"> Contrats</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2"> Cong&eacute;s</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="panel-body">
                                                    <div class="col-md-1 pull-right">
                                                        <?php if(!empty($contracts)):?>
                                                            <a id="addContract" href="#" class="pull_left fa fa-fw fa-plus-circle f20"></a> 
                                                        <?php endif; ?>
                                                        <br><br>
                                                    </div>
                                                    <div class="col-md-11"></div>
                                                    <?php if(!empty($contracts)):?>
                                                        <div class="ibox">
                                                            <div class="ibox-content">
                                                                <table class="table table-striped">
                                                                   <thead>
                                                                       <tr>
                                                                           <th>#</th>
                                                                           <th>D&eacute;but</th>
                                                                           <th>Fin</th>
                                                                           <th>Fonction</th>
                                                                           <th>Lieu</th>
                                                                           <th>Dur&eacute;e</th>
                                                                           <th>Statut</th>
                                                                           <th><i class="fa fa-folder"></i></th>
                                                                       </tr>
                                                                   </thead>
                                                                   <tbody>
                                                                       <?php $i = 1; foreach($contracts as $contract) :?>
                                                                        <tr>
                                                                            <?php 
                                                                                    $today = strtotime(Date("Y-m-d")); 
                                                                                    $debut = strtotime($contract->Debut_7); 
                                                                                    $fin = strtotime($contract->Fin_8); 
                                                                                    $interval = ($fin - $today)/86400; 
                                                                                    $jrestant = ($fin - $today)/86400; 
                                                                            ?>
                                                                            <td><?php echo $i;?></td>
                                                                            <td><?php echo strftime('%d-%m-%Y',strtotime($contract->Debut_7));?></td>
                                                                            <td><?php echo  strftime('%d-%m-%Y',strtotime($contract->Fin_8)); ?></td>
                                                                            <td><?php echo $contract->Fonction_13;?></td>
                                                                            <td><?php echo $contract->Lieu_14;?></td>
                                                                            <td>
                                                                                <span class="badge"><?php echo $interval;?></span> jours
                                                                            </td>
                                                                            <td>
                                                                                <?php if($jrestant > 0):?>
                                                                                    Encore <span class="badge badge-success"><?php echo $jrestant;?></span> jours
                                                                                <?php elseif($jrestant <= 0 && $contract->Statut_3 == 1):?>
                                                                                   <span class="text-primary"> A cl&ocirc;turer</span>
                                                                                <?php elseif($jrestant <= 0 && $contract->Statut_3 == 2):?>
                                                                                    <span class="text-success"> Cl&ocirc;tur&eacute;</span>
                                                                                <?php endif;?>
                                                                            </td>
                                                                            <td>
                                                                                <a style="cursor:pointer;" onclick="editContract('<?php echo $contract->Id_0; ?>')">
                                                                                    <i class="fa fa-folder-open-o"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                       <?php $i++; endforeach;?>
                                                                   </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php else :?>
                                                        <section id="cat_list">
                                                            <div class="row fontawesome-icon-list pTop50 f14 tCenter" style="text-align: center;">
                                                                <span class="text-gray">Aucun contrat!</span><br>
                                                                <button id="addContract" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Cr&eacute;er&nbsp;&nbsp;</button>&nbsp;&nbsp;
                                                            </div>
                                                        </section>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-pane">
                                                <div class="panel-body">
                                                    <div class="col-md-1 pull-right">
                                                        <?php if(!empty($holydays)):?>
                                                            <a id="addHolyday" href="#" class="pull_left fa fa-fw fa-plus-circle f20"></a> 
                                                        <?php endif; ?>
                                                        <br><br>
                                                    </div>
                                                    <?php if(!empty($holydays)):?>
                                                        <div class="ibox">
                                                            <div class="ibox-content">
                                                                <table class="table table-striped">
                                                                   <thead>
                                                                       <tr>
                                                                           <th>#</th>
                                                                           <th>Date</th>
                                                                           <th>Etat</th>
                                                                           <th>Type</th>
                                                                           <th>D&eacute;but</th>
                                                                           <th>Fin</th>
                                                                           <th>Dur&eacute;e</th>
                                                                           <th>Statut</th>
                                                                           <th><i class="fa fa-folder"></i></th>
                                                                       </tr>
                                                                   </thead>
                                                                   <tbody>
                                                                       <?php $j=1; foreach($holydays as $holyday) :?>
                                                                        <tr>
                                                                            <?php 
                                                                                $debut =  strtotime($holyday->Debut_6); 
                                                                                $taday = strtotime(Date('Y-m-d')); 
                                                                                $fin = strtotime($holyday->Fin_7); 
                                                                                $interval = ($fin - $debut)/86400;
                                                                                $jrestant = ($fin - $taday)/86400;
                                                                            ?>
                                                                            <td><?php echo $j;?></td>
                                                                            <td><?php echo $holyday->Date_1;?></td>
                                                                            <td><?php echo $holyday->Statut_2;?></td>
                                                                            <td><?php echo $holyday->Type_8;?></td>
                                                                            <td><?php echo strftime('%d-%m-%Y',strtotime($holyday->Debut_6));?></td>
                                                                            <td><?php echo  strftime('%d-%m-%Y',strtotime($holyday->Fin_7)); ?></td>
                                                                            <td> <span class="badge"><?php echo $interval;?></span> jours</td>
                                                                            <td>
                                                                                <?php if($jrestant > 0):?>
                                                                                    Encore <span class="badge badge-success"><?php echo $jrestant;?></span> jours
                                                                                <?php elseif($jrestant <= 0 && $holyday->Statut_2 == 1):?>
                                                                                    <stong><span class="text-primary"> A cl&ocirc;turer</span></stong>
                                                                                <?php elseif($jrestant <= 0 && $holyday->Statut_2 == 2):?>
                                                                                    <stong><span class="text-success"> Cl&ocirc;tur&eacute;</span></stong>
                                                                                <?php endif;?>
                                                                            </td>
                                                                            <td>
                                                                                <a style="cursor:pointer;" onclick="editHolyday('<?php echo $holyday->Id_0; ?>')">

                                                                                    <?php if($holyday->Statut_2 == 1):?>
                                                                                        <i class="fa fa-folder-open-o"></i>
                                                                                    <?php else: ?>
                                                                                        <span class="text-gray"><i class="fa fa-folder"></i></span>
                                                                                    <?php endif; ?>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                       <?php $j++; endforeach;?>
                                                                   </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php else :?>
                                                        <section id="cat_list">
                                                            <div class="row fontawesome-icon-list pTop50 f14 tCenter" style="text-align: center;">
                                                                <span class="text-gray">Aucun contrat!</span><br>
                                                                <button id="addHolyday" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Cr&eacute;er&nbsp;&nbsp;</button>&nbsp;&nbsp;
                                                            </div>
                                                        </section>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="box-footer clearfix page_header">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button id="submit" type="submit" style="margin-left:0px;" name="submit" class="btn btn-w-m btn-primary pull-right"><i class="fa fa-edit"></i> &nbsp;Enregistrer&nbsp;</button>
                                 <?php if($agent->Statut_3 == 1):?>
                                    <button id="addContract" type="button" class="btn btn-success pull_left"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Cr&eacute;er un contrat&nbsp;&nbsp;</button>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
        <div class="col-md-1">
            <a id="cancel" class="btn btn-app no-border pull_left" href="#"><span class="fa fa-fw fa-times  close f20"></span></a>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/jasny/jasny-bootstrap.min.js"'); ?>" type="text/javascript"></script>
<script type="text/javascript">
$("#datepicker1").datepicker({
    format: 'yyyy-mm-dd',
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true
});

var agent = '<?php echo $agent->Id_0;?>';
var id = '<?php echo 0;?>'
<?php if(isset($agent->Id_0) && $agent->Id_0!=NULL && $agent->Id_0 != 0):?>
    $("#sup").css('display','block');
    $("#sup").css('submit','none');
<?php endif;?>
$("#mainform").submit(function(e){
    e.preventDefault();
    var url = '<?php echo site_url('save/agent'); ?>/<?php echo $agent->Id_0; ?>';
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
       var url = '<?php echo site_url('admin'); ?>';
       $.get(url, function(data, status){
           $("#pager").html(data);
       });
} 

$("#addContract").click(function(){
        var url = '<?php echo site_url('contract'); ?>/'+id+'/'+ agent;
        $.get(url, function(data, status){
            $("#loader").html('<img  align="middle" height="30px" src="<?php echo base_url('assets/img/loadbar.gif')?>" />');
            $("#pager").html(data);
            $("#loader").html('');
        });
});

$("#addHolyday").click(function(){
        var url = '<?php echo site_url('hollyday'); ?>/'+id+'/'+ agent;
        $.get(url, function(data, status){
            $("#loader").html('<img  align="middle" height="30px" src="<?php echo base_url('assets/img/loadbar.gif')?>" />');
            $("#pager").html(data);
            $("#loader").html('');
        });
});

function editContract(contract)
{
        var url = '<?php echo site_url('contract/'); ?>' + contract +'/'+ agent;
        $.get(url, function(data, status){
            $("#pager").html(data);
        });
}

function editHolyday(holyday)
{
        var url = '<?php echo site_url('hollyday/'); ?>' + holyday +'/'+ agent;
        $.get(url, function(data, status){
            $("#pager").html(data);
        });
}

$(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
}); 

$("#edit").click(function(){
    
    alert('ok');
});
</script>
