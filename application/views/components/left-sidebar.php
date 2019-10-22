<style>
    .bg-color {
        background: #1fbdb0;
        width: 100%;
    }

    .sidebar .user-info .admin-action-info > ul li a {
        width: 100%;
        height: auto;
        line-height: 15px;
    }

    .suc {
        color: green !important;
        font-weight: bold;
    }
    .suc a, a, a:hover {font-weight: bold; text-decoration: none;}

    .bottom_height {
        height: 20px;
        margin: 10px auto;
        padding: 2px;
    }
	/*.menu ul {overflow-y:auto !important;}*/
</style>
<section>
    <?php 
    $user_name=null; $user_name = $this->session->userdata['loggedin']['name'];
  echo  $loggeded = $this->session->userdata['loggedin']['dept_id'];
    ?>
    <!-- Left Sidebar -->
    <aside class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"><img src="<?php echo base_url(); ?>assets/images/random-avatar7.jpg"
                                          alt="hospital"></div>
            <div class="admin-action-info"><span>Welcome &nbsp;</span>
                <span class="suc"> <?php if (!empty($user_name)){echo $user_name;} ?></span>
               <!--<br><span class="suc"><?php echo anchor('user/logout', '<i class="ace-icon fa fa-power-off"></i> Logout'); ?></span>-->
                <ul class="nav navbar-nav">
                    <li><h1><?php echo anchor('user/logout', '<i class="ace-icon fa fa-power-off"></i> Logout'); ?></h1></li>
                    <!--<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <h3> <?php if (!empty($user_name)){echo $user_name;} ?> <i class="ace-icon fa fa-caret-down"></i></h3>
                        </a>
                        <ul class="dropdown-menu bg-color">
                            <li class="divider"></li>
                            <li>
                                <?php echo anchor('user/logout', '<i class="ace-icon fa fa-power-off"></i> Logout'); ?>
                            </li>
                        </ul>
                    </li>-->
                </ul>

            </div>
            <div class="quick-stats">
<!--                <h5>Today Report</h5>-->
               <br>
                <br>
                <?php if ($loggeded == '5' || $loggeded == '1' ):  //for Reception user ?> 
                <ul>
                    <li style="width: 110px"><span><a href="<?php echo base_url(); ?>patient"> <?php echo count($patients); ?><i> New Patient</i></span></a></li>
                    <li style="width: 110px"><span><a href="<?php echo base_url(); ?>appointment/view_appointment"><?php echo  count($appointments); ?><i>New Appointment</i></a></span></li>
<!--                    <li><span>04<i>Visit</i></span></li>-->
                </ul>
                <?php endif ;?>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active open"><a href="<?php echo base_url(); ?>"><i
                            class="fa fa-home"></i><span>Dashboard</span></a></li>


                            
                            
                            
                            <?php if ($loggeded == '7'): ?> <!-- for Data Entry -->
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-shopping-cart"></i><span>Sales</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>payment/bill">view service sales</a></li>
                            <li><a href="<?php echo base_url(); ?>billing/bill/list_bill">view product sales</a></li>
                        </ul>
                    </li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-ticket"></i><span>Purchase</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>purchase">Add Purchase</a></li>
                            <li><a href="<?php echo base_url(); ?>purchase/view_purchase">View Purchases</a></li>
                        </ul>
                    </li>
                    
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-files-o"></i><span>Receipts</span></a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo base_url(); ?>receipt">View Receipts</a></li>
                    </ul>
                </li>

                 <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-file-text"></i><span>Payment</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>voucher/view_voucher">View Vouchers</a></li>
                            <li><a href="<?php echo base_url(); ?>voucher">Create  Voucher</a></li>
                        </ul>
                    </li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-file-text-o"></i><span>Ledger</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>patient">Patient</a></li>
                            <li><a href="<?php echo base_url(); ?>supplier">Supplier</a></li>
                            <li><a href="#">Cash</a></li>
                            <li><a href="#">Bank</a></li>
                            <li><a href="#">Salary</a></li>
                            <li><a href="#">Service Tax</a></li>
                            <li><a href="#">Product Vat Collected</a></li>
                            <li><a href="#">Advance</a></li>
                            <li><a href="#">Outstanding</a></li>
                                 
                            <li><a href="#">Stock</a></li>
                            </ul>
                    </li>
                    

                    
                <?php endif; ?>

                            
                            
                <?php if ($loggeded == '5' || $loggeded == '2'): // For reception user ?>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-calendar-check-o"></i><span>Appointment</span>
                    </a>
                    <ul class="ml-menu">
                        <!--                        <li><a href="doctor-schedule.html">Doctor Schedule</a></li>-->
                        <li><a href="<?php echo base_url(); ?>appointment">Add Appointment</a></li>
                        <li><a href="<?php echo base_url(); ?>appointment/view_appointment">View Appointments</a>
                        </li>
                    </ul>
                </li>


                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="fa fa-user-circle-o"></i><span>Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo base_url(); ?>patient">View Patients</a></li>
                         <li><a href="<?php echo base_url(); ?>patient/deactivate_patient_list">Inactive Patients</a></li>
                        <li><a href="<?php echo base_url(); ?>patient/add_patient">Add Patient</a></li>
                    </ul>
                </li>

<!--                <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-money"></i><span>Payments</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo base_url(); ?>payment/generatebill">Generate Bill</a></li>
                        <li><a href="<?php echo base_url(); ?>payment/bill">Patient Bill</a></li>
                    </ul>
                </li>-->

                
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-book"></i><span>Billing</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li><a class="<?php if(!empty($dashboard_menu)){echo $dashboard_menu;}else{echo '';}?>" href="<?php echo site_url('billing/dashboard/'); ?>"> Dashboard</a></li>
							<!--<li><a href="<?php echo base_url(); ?>payment/all_bill">View All Bills</a></li>-->
                            <li><a href="<?php echo base_url(); ?>payment/generatebill">Generate Service Bill</a></li>
                            <li><a href="<?php echo base_url(); ?>payment/view_cancel_bill">View canceled Service Bill</a></li>
            
                            <li><a href="<?php echo base_url(); ?>payment/view_active_bill">View active Service Bill</a></li>
                            <li><a href="<?php echo base_url(); ?>payment/bill">View Service Bill</a></li>
                            <li><a class="<?php if(!empty($bill_menu)){echo $bill_menu;}else{echo '';}?>" href="<?php echo base_url('billing/bill/list_bill'); ?>"> View Product Bills </a></li>
                            <li><a class="<?php if(!empty($invoice_menu)){echo $invoice_menu;}else{echo '';}?>" href="<?php echo base_url('billing/invoice/generateinvoice'); ?>"> Generate Product Bill</a></li>
                            <li><a class="<?php if(!empty($item_menu)){echo $item_menu;}else{echo '';}?>" href="<?php echo base_url('billing/audit_trial/'); ?>"> Return Sale item</a></li>
                            <li><a class="<?php if(!empty($return_menu)){echo $return_menu;}else{echo '';}?>" href="<?php echo base_url('billing/stock/return_product'); ?>"> List of Sales Return</a></li>
                        
                            <li><a class="" href="<?php echo base_url('lab_invoice/add'); ?>"> Create Lab Invoice</a></li>
                            <li><a class="" href="<?php echo base_url('lab_invoice/'); ?>"> View Lab Invoice</a></li>
                           <li><a href="<?php echo base_url(); ?>receipt">View Receipts</a></li>
                        
                        </ul>
                    </li>


                
                <?php endif; ?>


                <?php if ($loggeded == '4'): ?> <!-- for Data Entry -->
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-product-hunt"></i><span>Products</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>product/create_product">Add product</a></li>
                            <li><a href="<?php echo base_url(); ?>product">View Products</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-stethoscope" aria-hidden="true"></i><span>Vitals</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>parentvital/create_parentvital">Add Vital</a></li>
                            <li><a href="<?php echo base_url(); ?>parentvital">View vitals</a></li>
                        </ul>
                    </li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-shield"></i><span>Services</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>service/create_service">Add Service</a></li>
                            <li><a href="<?php echo base_url(); ?>service">View Services</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-building-o"></i><span>Suppliers</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>supplier/create_supplier">Add Supplier</a></li>
                            <li><a href="<?php echo base_url(); ?>supplier">View suppliers</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($loggeded == '3'): // for Nursing dept user ?>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-users"></i><span>Patient</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>patient/patient_nursing">View Patients</a></li>
							<li><a href="<?php echo base_url(); ?>patient/add_patient">Add Patient</a></li>
                        </ul>
                    </li>

                    <!--<li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-stethoscope" aria-hidden="true"></i><span>Vitals</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php //echo base_url(); ?>parentvital/create_parentvital">Add Vital</a></li>
                            <li><a href="<?php //echo base_url(); ?>parentvital">View vitals</a></li>
                        </ul>
                    </li> -->

                     <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-users"></i><span>Appointments</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>appointment">Add Appointment</a></li>
                            <li><a href="<?php echo base_url(); ?>appointment/list_today_appointments">Today's Appointments</a></li>
                            <li><a href="<?php echo base_url(); ?>appointment/view_all_appointment">All Appointments</a></li>
                        </ul>
                    </li>


<!--                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-stethoscope" aria-hidden="true"></i><span>Vitals</span>-->
<!--                        </a>-->
<!--                        <ul class="ml-menu">-->
<!--                            <li><a href="--><?php //echo base_url(); ?><!--parentvital/create_parentvital">Add Vital</a></li>-->
<!--                            <li><a href="--><?php //echo base_url(); ?><!--parentvital">View vitals</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->

                <?php endif; ?>

                <?php if ($loggeded == '6'): //for Lab dept user ?>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-users"></i><span>Lab Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>lab_report/patient_list">Add/Edit Reports </a></li>
                        </ul>
                    </li>


                    <!--                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-stethoscope" aria-hidden="true"></i><span>Vitals</span>-->
                    <!--                        </a>-->
                    <!--                        <ul class="ml-menu">-->
                    <!--                            <li><a href="--><?php //echo base_url(); ?><!--parentvital/create_parentvital">Add Vital</a></li>-->
                    <!--                            <li><a href="--><?php //echo base_url(); ?><!--parentvital">View vitals</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->

                <?php endif; ?>

                <?php if ($loggeded == '1'): // For Management ?>



                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                    class="fa fa-user-circle-o"></i><span>Patients</span> </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>patient">View Patients</a></li>
                             <li><a href="<?php echo base_url(); ?>patient/deactivate_patient_list">Inactive Patients</a></li>
                            
                            <li><a href="<?php echo base_url(); ?>patient/add_patient">Add Patient</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                    class="fa fa-users"></i><span>Doctors</span> </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>doctor">View Doctors</a></li>
                            <li><a href="<?php echo base_url(); ?>doctor/add_doctor">Add Doctor</a></li>
                        </ul>
                    </li>


                                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-calendar-check-o"></i><span>Appointment</span>
                        </a>
                        <ul class="ml-menu">
                            <!--                        <li><a href="doctor-schedule.html">Doctor Schedule</a></li>-->
                            <li><a href="<?php echo base_url(); ?>appointment">Add Appointment</a></li>
                            <li><a href="<?php echo base_url(); ?>appointment/view_appointment">View Appointments</a>
                            </li>
                        </ul>
                    </li>






                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-book"></i><span>Account</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>purchase">Add Purchase</a></li>
                            <li><a href="<?php echo base_url(); ?>purchase/view_purchase">View Purchases</a></li>
                            <li><a href="<?php echo base_url(); ?>payment/bill">View Sales</a></li>
                            <li><a href="<?php echo base_url(); ?>voucher">Create  Voucher</a></li>
                            <li><a href="<?php echo base_url(); ?>voucher/view_voucher">View Vouchers</a></li>
                            <li><a href="<?php echo base_url(); ?>receipt">Create/View Receipts</a></li>
                            <li><a href="<?php echo base_url(); ?>patient">Patient Ledger</a></li>
                            <li><a href="<?php echo base_url(); ?>supplier">Supplier Ledger</a></li>

                            <li><a href="<?php echo base_url(); ?>ledger/create_ledger">Create Ledger</a></li>
                            <li><a href="<?php echo base_url(); ?>ledger/view_ledger">View All Ledger</a></li>
                            <li><a href="<?php echo base_url(); ?>voucher/journal_voucher">Journal Voucher</a></li>
                            <li><a href="<?php echo base_url(); ?>ledger/contra_withdraw">Ledger Contra Withdraw Entry</a></li>
                            <li><a href="<?php echo base_url(); ?>ledger/contra_deposite">Ledger Contra Deposit Entry</a></li>
                            <li><a href="<?php echo base_url(); ?>ledger/contra_bank">Bank Transfer Contra Entry</a></li>
                            <li><a href="<?php echo base_url(); ?>ledger/trial_balance">View Trail Balance</a></li>
                             <li><a href="<?php echo base_url(); ?>ledger/trial_balance_details">View Trail Balance</a></li>
                               
                             <li><a href="<?php echo base_url(); ?>payment/credit_note">View Credit Note</a></li>
                             <li><a href="<?php echo base_url(); ?>debit_note">View Debit Note</a></li>
                        </ul>
                    </li>



                 <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-database"></i><span>Data Entry</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>supplier/create_supplier">Add Supplier</a></li>
                            <li><a href="<?php echo base_url(); ?>supplier">View suppliers</a></li>
                            <li><a href="<?php echo base_url(); ?>service/create_service">Add Service</a></li>
                            <li><a href="<?php echo base_url(); ?>service">View Services</a></li>
                            <li><a href="<?php echo base_url(); ?>product/create_product">Add product</a></li>
                            <li><a href="<?php echo base_url(); ?>product">View Products</a></li>
                            <li><a href="<?php echo base_url(); ?>employee/add_employee">Add Employee</a></li>
                            <li><a href="<?php echo base_url(); ?>employee">View Employee</a></li>
                            <li><a href="<?php echo base_url(); ?>parentvital/create_parentvital">Add Vital</a></li>
                            <li><a href="<?php echo base_url(); ?>parentvital">View Vitals</a></li>
                            
                        </ul>
                    </li>

                    
 
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-medkit"></i><span>Nursing</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>appointment/view_all_appointment">nursing note</a></li>
                            
                        </ul>
                    </li>

                    

                    
                                    <?php if (($loggeded == '2') || ($loggeded == '1')): ?>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-book"></i><span>Billing</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li><a class="<?php if(!empty($dashboard_menu)){echo $dashboard_menu;}else{echo '';}?>" href="<?php echo site_url('billing/dashboard/'); ?>"> Dashboard</a></li>
							<!--<li><a href="<?php echo base_url(); ?>payment/all_bill">View All Bills</a></li>-->
                            <li><a href="<?php echo base_url(); ?>payment/generatebill">Generate Service Bill</a></li>
                            <li><a href="<?php echo base_url(); ?>payment/view_cancel_bill">View canceled Service Bill</a></li>
            
                            <li><a href="<?php echo base_url(); ?>payment/view_active_bill">View active Service Bill</a></li>
                            <li><a href="<?php echo base_url(); ?>payment/bill">View Service Bill</a></li>
                            <li><a class="<?php if(!empty($bill_menu)){echo $bill_menu;}else{echo '';}?>" href="<?php echo base_url('billing/bill/list_bill'); ?>"> View Product Bills </a></li>
                            <li><a class="<?php if(!empty($invoice_menu)){echo $invoice_menu;}else{echo '';}?>" href="<?php echo base_url('billing/invoice/generateinvoice'); ?>"> Generate Product Bill</a></li>
                            <li><a class="<?php if(!empty($item_menu)){echo $item_menu;}else{echo '';}?>" href="<?php echo base_url('billing/audit_trial/'); ?>"> Return Sale item</a></li>
                            <li><a class="<?php if(!empty($return_menu)){echo $return_menu;}else{echo '';}?>" href="<?php echo base_url('billing/stock/return_product'); ?>"> List of Sales Return</a></li>
                        
                            <li><a class="" href="<?php echo base_url('lab_invoice/add'); ?>"> Create Lab Invoice</a></li>
                            <li><a class="" href="<?php echo base_url('lab_invoice/'); ?>"> View Lab Invoice</a></li>
                           <li><a href="<?php echo base_url(); ?>receipt">View Receipts</a></li>
                        
                        </ul>
                    </li>
 <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-cogs"></i><span>Customer Relationship Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>Wish/edit/1">Edit Birthday Message</a></li>
                          <!--   <li><a href="<?php echo base_url(); ?>Wish/edit/2">Edit Aniversary Message</a></li> -->
                            
                        </ul>
                    </li>

                <?php endif; ?>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-users"></i><span>User Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>user">View Users</a></li>
                            <li><a href="<?php echo base_url(); ?>user/create_user">Add User</a></li>
                            <li><a href="<?php echo base_url(); ?>user/change_password">Change Password</a></li>
                        </ul>
                    </li>
					<?php endif; ?>
					
					<?php if ($loggeded == '6' || $loggeded == '1'): //for Lab dept user ?>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-cogs"></i><span>Lab Setup</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>lab_group">Add/Edit Group Name </a></li>
                             <li><a href="<?php echo base_url(); ?>lab_service">Add/Edit Test Name </a></li>
                              <li><a href="<?php echo base_url(); ?>lab_service_detail">Add/Edit Test Detail Name </a></li>
                              
                        </ul>
                      
                    </li>
                     <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-file"></i><span>Lab Invoice</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?php echo base_url(); ?>lab_invoice">View Lab Invoice </a></li>
                             <li><a href="<?php echo base_url(); ?>lab_invoice/add">Create Lab Invoice</a></li>
                           
                        </ul>
                      
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-file-text"></i><span>Lab Report</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li><a href="<?php echo base_url(); ?>labreport/report_pending">Pending </a></li>
                              <li><a href="<?php echo base_url(); ?>labreport/report_completed">Completed </a></li>
                             <li><a href="<?php echo base_url(); ?>labreport/create">Add</a></li>
                            
                            
                        </ul>
                      
                    </li>
                <?php endif; ?>
                 <li><a href="<?php echo base_url(); ?>user/change_password"><i
                            class="fa fa-cogs"></i><span> Change Password</span></a></li>
<!-- <li><a href="<?php echo base_url(); ?>user/change_password"><i class="fa fa-cogs"></i> Change Password</a></li> -->
					<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
                
            </ul> <br> <br> 
        </div> <br> <br>
        <!-- #Menu -->
    </aside> <br>
    <!-- #END# Left Sidebar -->

<div class="bottom_height"></div>
</section>
