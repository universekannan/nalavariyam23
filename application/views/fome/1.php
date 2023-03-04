<style>
   @font-face{
   font-family: Baamini;
   src:url('<?php echo site_url(); ?>/assets/dist/css/Baamini.ttf');
   }
   .la{
   font-family: Baamini;
   font-size: 22px;
   }
   .lab{
   font-family: Baamini;
   font-weight: bold;
   font-size: 22px;
   line-height: 22px;
   }
   .las{
   font-family: Baamini;
   font-weight: bold;
   font-size: 22px;
   line-height: 20px;
   color:#483D8B;
   }
   @font-face{
   font-family: 'Kavivanar';
   src:url('<?php echo site_url(); ?>/assets/dist/css/Kavivanar-Regular.ttf');
   }
   .laba{
   font-family: Kavivanar;
   font-size: 20px;
   line-height: 20px;
   font-weight: bold;
   color:#007eff;
   text-decoration: underline;
   }
   .l{
   font-size: 24px;
   line-height: 20px;
   }
   .e{
   font-size: 22px;
   line-height: 24px;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="content" >
   <div class="container-fluid">
      <div class="col-md-12">
         <div class="row">
            <div class="col-12">
               <div class="card" id="html-content-holder">
                  <div class="card-body">
                     <center>
                        </br>
                        <b>
                           <div class="lab">
                              <h4> <b>jkpo;ehL fl;Lkhdk; kw;Wk; clYiog;G (mikg;Grhuh) njhopyhsu;fs; ey thupak; </b></h4>
                              ஷuj;J 5(2) fhz;f</br>
                              (9)(2) gFjpia fhz;f
                     </center>
                     </div></b>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-7">
                              </br>
                              </br>
                              </br>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group lab">
                                       njhopyhspapd;  ngau;
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group laba">
                                       <?php echo $user_data['full_name_tamil'] ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <u class="lab">je;ij</u>  / <u class="lab">fzth; ngaH</u> 
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group laba">
                                       <?php echo $user_data['relative_name_tamil'] ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group lab">
                                       gpwe;j Njjp;> taJ
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group laba">
                                       <?php $originalDate = $user_data['dob'];
                                          $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                                       <?php echo $newDate; ?>  | <?php echo $user_data['age'] ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group lab">
                                       gzpnra;Ak; fhyk;
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group laba">
                                       <?php echo $user_data['employment'] ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group lab">
                                       njhopypd; jd;ik
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group laba">
                                       <?php echo $Work_data['work_there_name'] ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="row">
                                 <div class="col-md-6">
                                    </br>
                                    </br> </br> </br></br>
                                    </br>
                                    <div class="form-group ">
                                       <div class="lab">Kftup : <b class="laba"><?php echo $user_data['permanent_door_no'] ?></b></div>
                                    </div>
                                    <div class="form-group">  
                                       <b class="laba"><?php echo $user_data['p_address_1_tamil'] ?></b>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <div style="text-align: right;">
                                          <img src="<?php echo $user_data['profile_photo'] ?>" style="border: 1px solid #555; width:140px">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">  
                                 <b class="laba"><?php echo $user_data['p_address_2_tamil'] ?></b>
                              </div>
                              <div class="form-group">  
                                 <b class="laba"><?php echo $user_data['district_name'] ?>, <?php echo $user_data['pincode'] ?></b>
                              </div>
                              <div class="form-group">  
                                 <b class="lab"> njhiyNgrp vz; </b> <b class="laba"><?php echo $user_data['phone'] ?></b>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group row">
                                 <label class="col-sm-4 lab  col-form-label">kjk;</label>
                                 <div class="col-sm-8">
                                    <label class="laba col-form-label"> : <?php echo $user_data['religion'] ?></label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group row">
                                 <label class="col-sm-4 lab col-form-label">[hjp</label>
                                 <div class="col-sm-8">
                                    <label class="laba col-form-label"> : <?php echo $user_data['community'] ?></label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-group row">
                                 <label class="col-sm-4 lab col-form-label">cl;gpupT</label>
                                 <div class="col-sm-8 ">
                                    <label class="laba col-form-label"> : <?php echo $user_data['sub_caste'] ?></label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr style="border: 1px solid #555; width:100%">
                        <div class="card-body">
                           <center>
                              <b>
                                 <h5 class="lab">tpz;zg;gjhuhpd; cWjpnkhop
                              </b>
                              </h5>
                           </center>
                           <a href="#"> <b class="laba"><?php echo $user_data['respect'] ?>&nbsp;<?php echo $user_data['full_name_tamil'] ?>&nbsp;&nbsp;<?php echo $user_data['relationship_tamil'] ?> <?php echo $user_data['relative_name_tamil'] ?></b></a> <b class="la"> Mfpa ehd;> jkpof murhy; mikf;fg;gl;Ls;s clYiog;G eythhpak; my;yJ NtW eythhpaq;fspy; cWg;gpduhfNth </b> / <b class="la"> NtW muR jpl;lq;fspd; fPo; cWg;gpduhfNth ,y;iy vd;W cWjpaspf;fpNwd;.</b>
                           <div class="row">
                              <div class="col-sm-6"></div>
                              <div class="col-sm-6 la">
                                 <center><img src="<?php echo $user_data['profile_signature'] ?>" style="width:300px"></center>
                                 <center><b>njhopyhspapd; ifnahg;gk;</br>
                                    my;yJ  ,lJ ifngUtpuy; milahsk;</b>
                                 </center>
                              </div>
                           </div>
                           <b class="lab">jtwhd jfty; mspf;Fk; gl;rj;jpy; rl;l tpjpfspd; gb eltbf;if vLf;fg;gLk;…</b>
                           </h5>
                        </div>
                        <hr style="border: 1px solid #555; width:100%">
                        </hr>
                        <div class="card-body">
                           <center>
                              <h5><b class="lab" >gzpr;rhd;W</b></h5>
                           </center>
                           <b class="laba"><?php echo $user_data['respect'] ?> <?php echo $user_data['full_name_tamil'] ?></b></a> <a href="#"><b class="laba"><?php echo $user_data['relationship_tamil'] ?> <?php echo $user_data['relative_name_tamil'] ?></b></a> <b class="la"> vd;gtH</b> <a href="#"><b class="laba"><?php echo $Work_data['work_there_name'] ?></b></a> <b class="la"> njhopy; nra;J tUfpwhH vd;W Neub tprhuizapy; njhpatUfpwJ vd;W cz;ikj;jd;ik rhd;wspf;fpNwd;.</b>
                           <div class="row">
                              <div class="col-sm-5">
                                 <center><img src="<?php echo $Signature_Data['signature2'] ?>" style="width:299px"></center>
                              </div>
                              <div class="col-sm-7 col-form-label" style="text-align: right;">
                                 <center>
                                    </br>
                                    <p> 
                                       <b class="lab">rhd;wpjo; mspf;Fk; egh; </b> / <b class="lab"></br>
                                       mYtyupd; ifnahg;gk; kw;Wk; Kj;jpiu</br>
                                       (Ntiyaspg;gth;</b> / <b class="lab">gjpT ngw;w njhopw;rq;f epHthfp </b></br>
                                       <b class="e">VAO or RI</b><b class="lab">(nrd;id) </b> / <b class="lab"> gjpT ngw;w xg;ge;jjhuh;</b> / <b class="lab"></br>
                                       njhopyhsH Jiw (</b> <b class="e">AIL or AIF</b><b class="lab">); )
                                    </p>
                              </div>
                              </center>
                           </div>
                           <?php $originalDate = $date = date('Y-m-d');
                              $newDate2 = date("d-m-Y", strtotime($originalDate)); ?>
                           <b class="lab">ehs;</b> : <b class="laba"><?php echo $newDate2; ?></b>
                           </br>
                           <b class="lab">jtwhd jfty; mspf;Fk; gl;rj;jpy; rl;l tpjpfspd; gb eltbf;if vLf;fg;gLk;…</b>
                           </h5>
                           </br>
                           <hr style="border: 1px solid #555; width:100%">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</body>
</html>