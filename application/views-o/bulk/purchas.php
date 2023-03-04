  <div class="content-wrapper">
    <!-- Content Header (Page header) -->  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">New Districts </h3>
          </div>
          <!-- /.card-header -->
           <div class="card-body">
              <form action="<?php base_url('districts/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row">
             
              <div class="col-md-5">      
                  <div class="form-group">
						       <input  required="requiered" type="text" class="form-control" name="district_name" id="district_name" maxlength="50" placeholder="Districts Name">
                   </div>
                    <div class="form-group">
                   <input  required="requiered" type="text" class="form-control" name="district_name" id="district_name" maxlength="50" placeholder="Districts Name">
                   </div>
                     <div class="form-group">
                   <input  required="requiered" type="text" class="form-control" name="district_name" id="district_name" maxlength="50" placeholder="Districts Name">
                   </div>
                     <div class="form-group">
                   <input  required="requiered" type="text" class="form-control" name="district_name" id="district_name" maxlength="50" placeholder="Districts Name">
                   </div>
<div class="form-group row">
          <div class="col-md-12 text-center">
            <input required="required" class="btn btn-info" type="submit" name="submit" value="Save"/>
          </div>
        </div>  
              	</div>
				    

           <div class="col-md-7">    
                  <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                <tr >
                                                    <th class="text-center">
                                                        #
                                                    </th>
                                                    <th class="text-center">
                                                        Product Name
                                                    </th>
                                                   
                                                    <th class="text-center">
                                                        Quat
                                                    </th>
                                                    <th class="text-center">
                                                        Rate
                                                    </th>
                                                    <th class="text-center">
                                                        <a class="btn btn-danger fa fa-trash-o"></a>
                                                    </th>
                          
                                                </tr>
                        
                                                </thead>
                                                <tbody>
                                                <tr id='addr0'></tr>
                        
                                                </tbody>
                                                </table>
                        <div class="row">
                                    <div class="col-md-7">&nbsp;</div>
                                    <div class="col-md-7">&nbsp;</div>
                                    <div class="col-md-1">
                                        <label class="control-label">Total</label>
                                    </div>
                                    <div class="col-md-4 pull-right form-inline">
                          
                                        <input style="text-align: right" readonly type="text" name="total_amounts" id="total_amounts" class="form-control Number">
                                    </div>
                                </div>
                             </div>

                          </div>
                          <div class="form-group row">
          <div class="col-md-12 text-center">
            <input required="required" class="btn btn-info" type="submit" name="submit" value="Save"/>
          </div>
        </div> 
                       </div>
                    </div>
                  </div>
              </div>
            </div>
         
          </div>
          </div>
          </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#District").addClass('menu-open');
      $("#Districts").addClass('active');
      $("#DistrictsCreate").addClass('active');
    });
  </script>