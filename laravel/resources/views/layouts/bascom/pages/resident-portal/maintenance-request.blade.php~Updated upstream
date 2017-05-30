        <?php
        //TODO: fill these in !important
            $residentName = $residentInfo[4]. " " . $residentInfo[5];
            $residentUnitNumber =$residentInfo[3];
            $residentEmail = $residentInfo[7];
        ?>
        @extends($extends)
        @section('page-title-span','Maintenance Request')
        @section('content')
		<!-- Content -->
		<section class="content">
<<<<<<< Updated upstream:laravel/resources/views/layouts/resident-portal/pages/maintenance-request.blade.php
=======
            <link rel="stylesheet" href="/bascom/css/bootstrap-date-picker3.min.css" />
            <script
            src="/js/src/jquery-1.11.2.min.js"></script>
            <script src="/js/src/bootstrap-datepicker.js"></script>
            <script>
            $(function(){
                var mainDate = $('#PermissionToEnterDate');
                mainDate.datepicker();
                console.log('foo')

            })
            </script>
>>>>>>> Stashed changes:laravel/resources/views/layouts/bascom/pages/resident-portal/maintenance-request.blade.php
			<!-- Content Blocks -->
			<div class="container">
                <?php
                    if (isset($errors)) {
                        foreach ($errors->all() as $i => $error) {
                            echo "<div class='error'>$error</div>";
                        }
                    }
                    if (isset($workOrder)) {
                        if ($workOrder['Status'] == "SUCCESS") {
                            echo "<h1 class='notice'>Your work order was successfully submited</h1>";
                            echo "<div class='info'>Your Work Order Number is: " . $workOrder['WorkOrderNumber'] . "</div>";
                        } else {
                            echo "<h1 class='error'>We were unable to process your work order.</h1>";
                            echo "<div class='error'>If this problem persists, please contact us</div>";
                        }
                    }
                    if (isset($error)) {
                        echo "<h1 class='error'>$error</h1>";
                    }
                ?>
				<div class="row">
					<div class="col-md-12">
						<div class="page-title">
							<h1>Maintenance Request</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>Have an issue in your apartment? Complete a request for maintenance and a member of our team will service your apartment as quickly as possible.<br><br> 
						To ensure that your issue is resolved promptly, please do not submit emergency service requests via the resident portal. 
                        If you are experiencing a maintenance emergency, please call our office at <?php echo $entity->getPhone(); ?> and select the emergency maintenance line.</p>
						<div class="schedule-a-tour-form form-container">
							<form class="form-horizontal" id='form1' action="/resident-portal/maintenance-request" name="form1_<?php echo uniqid();?>" method="post">
								<div class="form-group">
									<label>Name</label>
									<input type="hidden" name="maintenance_mtype" id="maintenance_mtype" value="Website - To Be Determined">
									<input type="text" class="form-control required required"
                                    data-msg-required="Please Enter Your Name"
                                    name="ResidentName" id="ResidentName" value="<?php echo $residentName;?>" required>
								</div>

								<div class="form-group">
									<label>Unit Number</label>
									<input type="text" class="form-control required"
                                    data-msg-required="Please Enter Your Unit Number"
                                    name="maintenance_unit" id="maintenance_unit" value="<?php echo $residentUnitNumber;?>" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control required"
                                    data-msg-required="Please Enter Your Email"
                                    name="email" id="email" value="<?php echo $residentEmail;?>" required>
								</div>
								<div class="form-group">
									<label>Contact Phone</label>
									<input type="text"
                                    data-msg-required="Please Enter Your Contact Phone Number"
                                    class="form-control required" name="maintenance_phone" id="maintenance_phone" required>
								</div>
								<div class="form-group">
									<label><input name='perm2entercb' id='perm2enter' type="checkbox">&nbsp;Permission To Enter</label>
								</div>
<<<<<<< Updated upstream:laravel/resources/views/layouts/resident-portal/pages/maintenance-request.blade.php
								<div id='perm' style='display:none;'>
									<div class="form-group">
										<label>Permission To Enter Given By</label>
										<input type="text" class="form-control required" name="maintenance_name" id="maintenance_name" required>
									</div>
									<label for="date">Permission to enter on this Date</label>
									<div class="mb-20 mb-md-10 input-group date" data-provide="datepicker" id="datediv" >
										<input type="text" class="form-control required" id="PermissionToEnterDate" name="PermissionToEnterDate" readonly="true" placeholder="Maintenance Entry Date" />
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
									</div>
								</div>
                                {{csrf_field()}}
								<div class="form-group">
									<label>Describe the Problem</label><br>
									<textarea name="maintenance_mrequest" id="maintenance_mrequest" cols=70 rows=10 required></textarea>
=======
								<div class="form-group">
									<label>Permission To Enter Given By</label>
									<input type="text"
                                    data-msg-required="Please Enter The Name Of The Person Giving Permission To Enter"
                                    class="form-control required" name="maintenance_name" id="maintenance_name" required>
								</div>

                                <div class="form-group">
                                    <label for="date">Permission to enter on this Date</label>
                                    <div class="mb-20 mb-md-10 input-group date"
                                        date-provide="datepicker" id="datediv">
                                        <input type="text"

                                        data-msg-required="Please Enter The Date We have been Given Permission To Enter"
                                        class="form-control required" id="PermissionToEnterDate" name="PermissionToEnterDate" readonly="true" placeholder="Maintenance Entry Date" />

                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                {{csrf_field()}}
								<div class="form-group">
									<label>Describe the Problem</label><br>
									<textarea

                                    data-msg-required="Please Give A Brief Description Of The Problem"
                                    name="maintenance_mrequest" id="maintenance_mrequest" class="form-control" cols=70 rows=10 required></textarea>
>>>>>>> Stashed changes:laravel/resources/views/layouts/bascom/pages/resident-portal/maintenance-request.blade.php
								</div>
								<input type="submit" value="Submit" class="btn submit-btn">
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</section>
        @stop
        @section('page-specific-js')
		<script type='text/javascript'>
        $(document).ready(function() {
            $(".nav-main-right a").on("click", function(){
               $(".nav-main-right").find(".active").removeClass("active");
               $(this).parent().addClass("active");
                        
            });
            amcBindValidate({
                'form': '#form1',
                'rules': {
                    ResidentName: 'required',
                    maintenance_unit: 'required',
                    email: {
                        required: true,
                        email: true,
                    },
                    maintenance_phone: {
                        required: true
                    }
                }
            });
            amcMaskPhone('#maintenance_phone','(999) 999-9999');
		    $("#date").datepicker({'format': 'mm/dd/yyyy'});
            $("#perm2enter").bind("click",function(){
                if($(this).is(":checked")){
                    $("#perm").slideDown(); 
                    amcBindValidate({
                        'form': '#form1',
                        'rules': {
                            ResidentName: 'required',
                            maintenance_unit: 'required',
                            email: {
                                required: true,
                                email: true,
                            },
                            maintenance_phone: {
                                required: true
                            },
                            maintenance_name: {
                                required: true
                            },
                            'PermissionToEnterDate': {
                                required: true,
                                'date': true
                            }
                        }
                    });
                }else{
                    $("#perm").slideUp();
                    amcBindValidate({
                        'form': '#form1',
                        'rules': {
                            ResidentName: 'required',
                            maintenance_unit: 'required',
                            email: {
                                required: true,
                                email: true,
                            },
                            maintenance_phone: {
                                required: true
                            }
                        }
                    });
                }
            });
        });
        </script>
        @stop
