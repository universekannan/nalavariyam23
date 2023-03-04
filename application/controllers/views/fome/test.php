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
		font-size: 24px;
        line-height: 20px;
	}
	
	@font-face{
		font-family: 'Kavivanar';
		src:url('<?php echo site_url(); ?>/assets/dist/css/Kavivanar-Regular.ttf');
	}
	.laba{
		font-family: Kavivanar;
		font-size: 18px;
        line-height: 24px;
		font-weight: bold;
		color:#483D8B;
        text-decoration: underline;
		}
	.l{
		font-size: 18px;
        line-height: 20px;
		}	</style>


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
		   <b> <div class="lab"><h4> <b>jkpo;ehL fl;Lkhdk; kw;Wk; clYiog;G(mikg;Grhuh)njhopyhsu;fs; ey thupak; </b></h4>
                             ஷuj;J 5(2) fhz;f</br>
                             (9)(2) gFjpia fhz;f
            </center>
			 </div></b>
<div class="row">
	<div class="col-7">
			</br>
			</br>
			</br>
	   	<div class="row">
			<div class="col-6 lab">
			<div class="form-group">
				njhopyhspapd;  ngau;
               </div>
			  <div class="form-group">
				<h4><b><?php echo $user_data['relationship'] ?> ngau;</b></h4>
               </div>
			   <div class="form-group">
				gpwe;j Njjp;> taJ
               </div>
			  <div class="form-group">
				gzpnra;Ak; fhyk;
               </div>
			</div>
            <div class="col-md-6 laba">
		    <div class="form-group" style="text-align: left;">
			<?php echo $user_data['full_name_tamil'] ?>
            </div>
			<div class="form-group">
			<?php echo $user_data['relative_name'] ?>
            </div>
			<div class="form-group">
			<?php echo $user_data['dob'] ?> | <?php echo $user_data['age'] ?>
            </div>
			<div class="form-group">
			<?php echo $user_data['working_status'] ?>
            </div>
			
			
				</div>
			</div>
		</div>
	<div class="col-md-5">
	     <div class="row">
			<div class="col-md-6">
				</br>
				</br>
				</br>
				
			<div class="lab">Kftup : <?php echo $user_data['permanent_door_no'] ?></div>
				<div class="form-group laba">  
			<?php echo $user_data['permanent_address_1'] ?>
			</div>
		    <div class="form-group laba">  
			<?php echo $user_data['permanent_address_2'] ?>
	        </div>
			<div class="form-group laba">  
			<?php echo $user_data['district_name'] ?>
	        </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">   
					<div style="text-align: right;">
					<img src="<?php echo $user_data['prphoto'] ?>" style="border: 1px solid #555; width:140px">
					</div>
				</div>
			</div>
	    </div>
			<div class="form-group laba">  
			<b class="lab"> njhiyNgrp vz; </b><?php echo $user_data['phone'] ?>

	    </div>
    </div>
</div>
 <div class="row">
			<div class="col-3 lab">
			   <div class="form-group">
				njhopypd; jd;ik
			   </div> 
			</div>
			<div class="col-md-9 laba">
				<?php echo $user_data['work3'] ?>
			</div>
		</div>
		</br>
<div class="row">
	<div class="col-md-4">
	  <div class="form-group row">
		<label class="col-sm-4 lab  col-form-label">kjk;</label>
		<div class="col-sm-8">
			<input value="<?php echo $user_data['religion'] ?>" type="text" class="form-control laba">
		</div>
	  </div>
	</div>
	<div class="col-md-4">
	  <div class="form-group row">
	  <label class="col-sm-4 lab col-form-label">[hjp</label>
		<div class="col-sm-8 laba">
			<input  value="<?php echo $Work_data['community'] ?>" type="text" class="form-control">
		</div>
	   </div>
	</div>
	<div class="col-md-4">
	  <div class="form-group row">
		<label class="col-sm-4 lab col-form-label">cl;gpupT</label>
		<div class="col-sm-8 laba">
			<input value="<?php echo $user_data['sub_caste'] ?>" type="text" class="form-control" name="service_name" id="service_name" maxlength="50">
		</div>
	  </div>
	</div>
	<div class="card-body">
	<hr style="border: 1px solid #555; width:100%">
	<center><b><h5 class="lab">tpz;zg;gjhuhpd; cWjpnkhop</b></h5></center>
	<br>
	<a href="#"> <b class="laba"><?php echo $user_data['respect'] ?>&nbsp;<?php echo $user_data['full_name_tamil'] ?>&nbsp;&nbsp;<?php echo $user_data['relationship_tamil'] ?> <?php echo $user_data['relative_name_tamil'] ?></b></a> <b class="la"> Mfpa ehd;> jkpof murhy; mikf;fg;gl;Ls;s clYiog;G eythhpak; my;yJ NtW eythhpaq;fspy; cWg;gpduhfNth NtW muR jpl;lq;fspd; fPo; cWg;gpduhfNth ,y;iy vd;W cWjpaspf;fpNwd;.</b>
	</div>	
	</br>
	</br>
	<label class="col-sm-7"></label>
	<label class="col-sm-5 la">
	</br>
	</br>
	</br>
	</br>
	</br>
	njhopyhspapd; ifnahg;gk; my;yJ </br>
	,lJ ifngUtpuy; milahsk; </label>
	
	<div class="card-body">
	<b class="lab">jtwhd jfty; mspf;Fk; gl;rj;jpy; rl;l tpjpfspd; gb eltbf;if vLf;fg;gLk;…</b>
	</h5>
	<hr style="border: 1px solid #555; width:100%"></hr>
	<center><h5><b class="lab">gzpr;rhd;W</b></h5></center>
	<b class="laba"><?php echo $user_data['respect'] ?>  /  <?php echo $user_data['full_name'] ?>&nbsp;&nbsp;<?php echo $user_data['relationship_tamil'] ?> <?php echo $user_data['relative_name_tamil'] ?></b></a> <b class="la"> njhopy</b> <a href="#"> <b class="laba"><?php echo $user_data['work3'] ?></b></a> <b class="la"> njhopy; nra;J tUfpwhH vd;W Neub tprhuizapy; njhpatUfpwJ vd;W cz;ikj;jd;ik rhd;wspf;fpNwd;.</b>

	</div>	
</div>
<div class="row">
	<div class="col-md-4">	
	</br>
	</br>
	</br>
	</br>
	</br>
	<label> <p class="la">,lk; : <?php echo $user_data['permanent_address_1'] ?></br></br>
	ehs; : <?php echo $date = date('Y-m-d'); ?></br></br>
	njhopw;rq;f gjpT vz; : <b class="l">713/KKM</b></p>
	</label>
	</div>
	<label class="col-sm-8 col-form-label" style="text-align: right;">
</br>
</br>
</br>
</br>
</br>
	<center><p class="lab"> 
	rhd;wpjo; mspf;Fk; egh; mYthpd; </br>
	ifnahg;gk; kw;Wk; Kj;jpiu</br>
	(Ntiyaspg;gth; gjpT ngw;w njhopw;rq;f epHthfp</br>
	(nrd;id) gjpT ngw;w xg;ge;jjhuh;</br>
	njhopyhsH Jiw ();</p>
	</label></center>
	 </div>
	 </div>
	 </div>
	 </div>
	 </div>
	 </div>
</div>		 
<div class="card-body">
    <b class="lab">jtwhd jfty; mspf;Fk; gl;rj;jpy; rl;l tpjpfspd; gb eltbf;if vLf;fg;gLk;…</b>
    </h5>
    <hr style="border: 1px solid #555; width:100%">			
</div>				
</div>				
</div>				
</div>
</br>
	 </div>				
		</div>
    </div>				
</div>

    </div>
</div>
</body>
</html>
