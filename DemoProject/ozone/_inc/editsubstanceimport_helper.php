 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {
	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="_scripts/editsubstanceimport_scr.php?id=<?php echo $_GET['edit']; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Edit Substance Import Record | <a href="?substance=yes">Cancel</a> </h2>
			<hr class="colorgraph">
            
              
           	  <div class="form-group">
              <label>Importer</label>
            	      <select name="cid" class="form-control input-lg" id="cid" required tabindex="1">
                        	<option value ="<?php echo $edit['cid']; ?>"><?php echo getRecoveryAgentName($edit['cid']); ?></option>
                        	<?php 
								$results = getImporters(); 
								foreach($results as $contact){
									if ($contact['organisation'] == "")
										echo "<option value=". $contact['id'].">". $contact['fname'] . " " . $contact['lname']. "</option>";
											else echo "<option value=". $contact['id'] .">". $contact['organisation']. " (" . $contact['fname'] . " " . $contact['lname']. ")</option>";
								}
							?>
                        </select>       	 
          	  </div>
          
            
		  <div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>Substance</label>
				<select type="text" name="substance" id="substance" class="form-control input-lg" tabindex="2">
                	<option value ="<?php echo $edit['substance']; ?>"><?php echo $edit['substance']; ?></option>
                    <?php 
						$gas_types = getSelectSettings('gas_types');
						foreach ($gas_types as $gas_type) { ?>
							<option value="<?php echo $gas_type; ?>"><?php echo $gas_type; ?></option>
						<?php }
					?>
                </select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>Year</label>
                        <select type="text" name="year" id="year" class="form-control input-lg" required  tabindex="3">
                        <option value ="<?php echo $edit['year']; ?>"><?php echo $edit['year']; ?></option>
                        	<?php 
								$year = date("Y");
								$i = 20;
								while ($i > 0){
									?>
                                    	<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php 
									$year--; 
									$i--; 	
								}
							?> 
                        </select>  
                    
					</div>
				</div> 
                
              
			</div> <!--row -->
            
            <div class="row">
            	<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Quota Requested (kg)</label>
				<input type="text" name="quota_requested" id="quota_requested" class="form-control input-lg" value="<?php echo $edit['quota_requested']; ?>" tabindex="4">
					</div>
            	</div> 
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Approved Quota (kg)</label>
				<input type="text" name="quota_approved" id="quota_approved" class="form-control input-lg" value="<?php echo $edit['quota_approved']; ?>" tabindex="5">
					</div>
            	</div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Quantity Imported (kg)</label>
				<input type="text" name="quantity_imported" id="quantity_imported" class="form-control input-lg" value="<?php echo $edit['quantity_imported']; ?>" tabindex="6">
					</div>
            	</div>
            </div> <!--row -->
            
                        
            <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                  <label>Permit Required</label> 
                  <select type="text" name="permit_required" id="permit_required" class="form-control" required  tabindex="7">
                  <option value="<?php echo $edit['permit_required']; ?>"><?php echo $edit['permit_required']; ?></option>
                  	<option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
				
                </div>
					</div>
            	<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                  <label>Date Permit Issued</label> 
                  <div class="bfh-datepicker" input="form-control input-lg" data-format="y-m-d" data-date="<?php echo $edit['permit_issue_date']; ?>"  data-name="permit_issue_date" data-id="permit_issue_date" tabindex="7"> 
				
                </div>
					</div>
            	</div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Date Examined</label>
                    <div class="bfh-datepicker" input="form-control input-lg" data-format="y-m-d" data-date="<?php echo $edit['date_imported']; ?>" data-name="date_imported" data-id="date_imported" tabindex="8"> 
				 </div>
					</div>
            	</div>
                
              
            </div> <!--row -->
            
            <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>County Of Origin (COO)</label>
				<input type="text" name="coo" id="coo" class="form-control input-lg" value="<?php echo $edit['coo']; ?>" tabindex="9">
					</div>
            	</div>
                
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>Entry Port</label>
				<select type="text" name="entry_port" id="entry_port" class="form-control input-lg" tabindex="10">
                	<option value="<?php echo $edit['entry_port']; ?>"><?php echo $edit['entry_port']; ?></option>
                    <?php 
						$entry_ports = getSelectSettings('entry_ports');
						foreach ($entry_ports as $entry_port) { ?>
							<option value="<?php echo $entry_port; ?>"><?php echo $entry_port; ?></option>
						<?php }
					?>
                </select>
					</div>
            	</div>
            </div>
           <div class="row">
          
           <div class="col-xs-12 col-sm-4 col-md-4">
           <h4 class="text-success">Labelling Specifications</h4>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="chemical_name" name="chemical_name" value="yes" <?php if ($edit['chemical_name'] == "Yes") { ?> checked="checked" <?php } ?> tabindex="11"> Chemical Name
              </label>
            </div>
            &nbsp;
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="colour_code" name="colour_code" value="yes" <?php if ($edit['colour_code'] == "Yes") { ?> checked="checked" <?php } ?> tabindex="12"> Colour Code
              </label>
            </div>
            &nbsp;
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="quantity_label" name="quantity_label" value="yes" <?php if ($edit['quantity_label'] == "Yes") { ?> checked="checked" <?php } ?> tabindex="13"> Quantity
              </label>
            </div>
            &nbsp;
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="blend" name="blend" value="yes" <?php if ($edit['blend'] == "Yes") { ?> checked="checked" <?php } ?> tabindex="14"> % of blend (if blended)
              </label>
            </div>
            </div>
            
             <div class="col-xs-12 col-sm-8 col-md-8">
           <h4 class="text-success">Examined By</h4>
           
           				<div class="form-group">
                    		
							<label>NOAU Officer</label>
                            <select type="text" name="noau_officer" id="noau_officer" class="form-control input-lg" tabindex="15">
                                <option value="<?php echo $edit['noau_officer']; ?>"><?php echo $edit['noau_officer']; ?></option>
                                <?php 
                                    $officers = getSelectSettings('officers');
                                    foreach ($officers as $officer) { ?>
                                        <option value="<?php echo $officer; ?>"><?php echo $officer; ?></option>
                                    <?php }
                                ?>
                            </select>
						</div>
           
           
           
           				<div class="form-group">
                    		<label>GRA Officer</label>
							<input type="text" name="gra_officer" id="gra_officer" class="form-control input-lg" value="<?php echo $edit['gra_officer']; ?>" tabindex="16">
						</div>
           
           
           				<div class="form-group">
                    		<label>Company Representative</label>
							<input type="text" name="representative" id="representative" class="form-control input-lg" value="<?php echo $edit['representative']; ?>" tabindex="17">
						</div>
           </div>
             </div> <!--row -->     
             <hr/>
             <div class="form-group">
              <h4 class="text-success">Approved By</h4>
            	      <select name="approved_by" class="form-control input-lg" id="approved_by" tabindex="18">
                      <option value="<?php echo $edit['approved_by']; ?>"><?php echo $edit['approved_by']; ?></option>
                      <?php 
                                    $approvers = getSelectSettings('approved_by');
                                    foreach ($approvers as $approve) { ?>
                                        <option value="<?php echo $approve; ?>"><?php echo $approve; ?></option>
                                    <?php }
                                ?>
                      </select>       	 
          	  </div>
             <div class="form-group">
              <label>NOAU Remarks/Recommendations</label>
            	      <textarea name="remarks" class="form-control input-lg" id="remarks" tabindex="18"><?php echo $edit['remarks']; ?></textarea>       	 
          	  </div>
               
               
			<hr class="colorgraph">
			<div class="row">
				<div><input type="submit" value="Edit/Save Changes" class="btn btn-primary btn-block btn-lg" tabindex="17"></div>
			</div>
		</form>
	</div>



<?php 

   } ?>

