<style>
   @font-face{
   font-family: Baamini;
   src:url('<?php echo site_url(); ?>/assets/dist/css/Baamini.ttf');
   }
   .la{
   font-family: Baamini;
   font-size: 22px;
   line-height: 18px;
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
   line-height: 22px;
   color:#483D8B;
   }
   @font-face{
   font-family: 'Kavivanar';
   src:url('<?php echo site_url(); ?>/assets/dist/css/Kavivanar-Regular.ttf');
   }
   .laba{
   font-family: Kavivanar;
   font-size: 20px;
   line-height: 24px;
   font-weight: bold;
   color:#007eff;
   text-decoration: underline;
   }
   .l{
   font-size: 18px;
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
                        <b class="lab">
                           <h5> <b>jkpo;ehL fl;Lkhdk; mikg;Grhuh xl;LeH; kw;Wk; ,ju 15 clYiog;G njhopyhsH eythhpaq;fs;</b></h5>
                           gphpT 15(3) kw;Wk; 21(3)</br>
                           fy;tp cjtpnjhif ngWtjw;fhd tpz;zg;gk;
                           </center>
                        </b>
                     </br>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group lab">
                                 tpz;zg;gpf;fg;gLk; fy;tp cjtpnjhifapd; ngah;
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 <?php echo $family_member_data['studying_course'] ?><!--studying_course-->
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group lab">
                                 cWg;gpduhf gjpT nra;Js;s thhpaj;jpd; ngah;
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 : <?php echo $Work_data['work_two_name'] ?>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group lab">
                                 gjpT ngw;w cWg;gpdhpd; ngah;
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 : <?php echo $user_data['full_name_tamil'] ?>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group">
                                 <u class="lab">je;ij</u>  / <u class="lab">fzth; ngaH</u> 
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 : <?php echo $user_data['relative_name_tamil'] ?>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group lab">
                                 KO Kfthp
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group laba">
                                 : <a href="#"><?php echo $user_data['permanent_door_no'] ?></a><br>
                                 <a href="#"><?php echo $user_data['p_address_1_tamil'] ?></a><br>
                                 <a href="#"><?php echo $user_data['p_address_2_tamil'] ?></a><br>
                                 <a href="#"><?php echo $user_data['district_name'] ?> - <?php echo $user_data['pincode'] ?></a>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group">
                                 <u class="lab">gjpT vz;</u>  / <u class="lab">ehs;</u> 
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 <?php $originalDate = $family_member_data['registeration_date'];
                                    $newDate2 = date("d-m-Y", strtotime($originalDate)); ?>
                                 : <?php echo $family_member_data['registeration_no'] ?>, <?php echo $newDate2 ?><!-- registeration_no registeration_book-->
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group lab">
                                 FLk;g ml;il vz;
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 : <?php echo $user_data['ration_no'] ?>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group lab">
                                 Mjhh; vz;
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 : <?php echo $user_data['aadhaar_no'] ?>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group lab">
                                 njhopypd; jd;ik
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 : <?php echo $Work_data['work_there_name'] ?>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group">
                                 <br> <u class="lab">fy;tp cjtpnjhif ahUf;fhf</u><br><u class="lab">Nfl;fg;gLfpwJ kfd;</u>  / <u class="lab"> kfs; ngah;</u>  
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              </br>
                              <div class="form-group">
                                 : <?php echo $family_member_data['family_member_name'] ?>, <?php echo $family_member_data['family_relationship'] ?>  <!--family_member_name family_relationship -->
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-7">
                              <div class="form-group">
                                 <u class="lab">Njh;r;rpngw;w</u> / <u class="lab">gapYk; tFg;G</u> / <br><u class="lab"> gapYk; gbg;G kw;Wk; Mz;L</u>
                              </div>
                           </div>
                           <div class="col-md-5 laba">
                              <div class="form-group">
                                 : <?php echo $family_member_data['studying_course'] ?>, <?php echo $family_member_data['academic_year'] ?>  <!--studying_course academic_year-->
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6"></div>
                           <div class="col-sm-6 la">
                              <center><img src="<?php echo $user_data['profile_signature'] ?>" style="width:300px"></center>
                              <center><b>gjpTngw;w cWg;gpdhpd; ifnahg;gk;</b></center>
                           </div>
                        </div>
                        <div class="row">
                           <div class="card-body">
                              <hr style="border: 1px solid #555; width:100%">
                              <center>
                                 <b>
                                    <h5 class="lab">rhd;W
                                 </b>
                                 </h5>
                              </center>
                              <b class="la"> NkNy mspf;fg;gl;l tpguq;fs; midj;Jk; cz;ikahdit vd ehd; rhd;W mspf;fpNwd;.</b>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-3">
                                 <br>
                                 <br>
                                 <br>
                                 <br>
                                 <br>
                                    <?php $originalDate = $date = date('Y-m-d');
                                       $newDate2 = date("d-m-Y", strtotime($originalDate)); ?>
                                    ehs; : <b class="laba"><?php echo $newDate2; ?></b>
                                 </p>
                              </div>
                              <div class="col-sm-9 col-form-label" style="text-align: right;">
                                 <center><img src="<?php echo $Signature_Data['signature2'] ?>" style="width:300px"></center>
                                 <center>
                                    <p> 
                                       <b class="lab">cWg;gpdH. jkpo;;ehL…………….……………… njhopyhsHfs;</br>
                                       eythhpak; njhopy; rhh;e;j gjpTngw;w njhopw;rq;fj;jpd; </br>jiytH my;yJ nrayhsH</b> / <b class="lab"> rk;ge;jg;gl;l njhopyhsH cjtp Ma;thsH</b> / <b class="lab">  
                                       gzpr;rhd;W toq;f mDkjpf;fg;gl;l mYtyHfs;.</b>
                                 </center>
                              </div>
                           </div>
                           <b class="la"> jtwhd rhd;wspg;G rl;l eltbf;iff;F cl;gl;lJ</b>
                           </h5>
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