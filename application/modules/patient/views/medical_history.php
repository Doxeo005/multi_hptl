<!--sidebar end-->
<!--main content start-->

<link href="common/extranal/css/patient/medical_history.css" rel="stylesheet">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>
                        <?php echo lang('patient'); ?> <?php echo lang('info'); ?>
                    </h1>
                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                        <div class="mt-3">
                            <select class="custom-select pos_select" id="pos_select_patient" name="patient_id" style="font-weight:300 !important;">
                                <option value="<?php echo $patient->id; ?>" selected>
                                    <?php echo  $patient->name . ' (' . lang('id') . ': ' . $patient->id . ' - ' . lang('phone') . ': ' . $patient->phone . ' - ' . lang('age') . ': ' . explode('-', $patient->age)[0] . ' ' . lang('years'); ?>
                                </option>
                            </select>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home"><?php echo lang('home') ?></a></li>
                        <li class="breadcrumb-item active"> <?php echo lang('patient'); ?> <?php echo lang('info'); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="profile-nav">
                                    <div class="user-heading round edit_patient_div">
                                        <?php if (!empty($patient->img_url)) { ?>
                                            <img src="<?php echo $patient->img_url; ?>" style="height: 100px;" class="rounded-circle" alt="">
                                        <?php } ?>
                                        <h2> <?php echo $patient->name; ?> </h2>
                                        <p> <?php echo $patient->email; ?> </p>
                                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                            <button type="button" class="btn btn-sm btn-primary editPatient" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $patient->id; ?>"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></button>
                                        <?php } ?>
                                    </div>

                                    <ul class="list-unstyled mt-4">
                                        <li> <?php echo lang('patient_id'); ?> <span class="badge badge-primary float-end"><?php echo $patient->id; ?></span></li>
                                        <li> <?php echo lang('gender'); ?><span class="badge badge-primary float-end"><?php echo $patient->sex; ?></span></li>
                                        <li> <?php echo lang('birth_date'); ?><span class="badge badge-primary float-end"><?php echo $patient->birthdate; ?></span></li>
                                        <li> <?php echo lang('phone'); ?><span class="badge badge-primary float-end"><?php echo $patient->phone; ?></span></li>
                                        <li> <?php echo lang('email'); ?><span class="badge badge-primary float-end"><?php echo $patient->email; ?></span></li>
                                        <li> <?php echo lang('address'); ?><span class="badge badge-primary float-end"><?php echo $patient->address; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>









                    <!-- /.card -->
                </div>

                <div class="col-md-9">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <section class="col-md-12">



                                <section class="card-body">
                                    <div class="">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <?php if (in_array('appointment', $this->modules)) { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php echo ($redirect_tab == '') ? 'active' : ''; ?>" data-toggle="tab" href="#appointments"><?php echo lang('appointments'); ?></a>
                                                </li>
                                            <?php } ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo ($redirect_tab == 'vital') ? 'active' : ''; ?>" data-toggle="tab" href="#vital"><?php echo lang('vital_signs'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo ($redirect_tab == 'case') ? 'active' : ''; ?>" data-toggle="tab" href="#home"><?php echo lang('case_history'); ?></a>
                                            </li>
                                            <?php if (in_array('prescription', $this->modules)) { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#about"><?php echo lang('prescription'); ?></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (in_array('lab', $this->modules)) { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#lab"><?php echo lang('lab'); ?></a>
                                                </li>
                                            <?php } ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo ($redirect_tab == 'files') ? 'active' : ''; ?>" data-toggle="tab" href="#profile"><?php echo lang('documents'); ?></a>
                                            </li>
                                            <?php if (in_array('bed', $this->modules)) { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#contact"><?php echo lang('bed'); ?></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (!$this->ion_auth->in_group(array('Patient'))) {
                                                if ($settings->show_odontogram_in_history == 'yes') { ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo ($redirect_tab == 'odontogram') ? 'active' : ''; ?>" data-toggle="tab" href="#odontogram"><?php echo lang('odontogram'); ?></a>
                                                    </li>
                                            <?php }
                                            } ?>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#timeline"><?php echo lang('timeline'); ?></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="">
                                        <div class="tab-content">
                                            <div id="appointments" class="tab-pane <?php if ($redirect_tab == '') {
                                                                                        echo 'active';
                                                                                    } ?>">
                                                <div class="">
                                                    <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                        <div class=" no-print">
                                                            <a class="btn btn-sm btn-success btn_width" data-toggle="modal" href="#addAppointmentModal">
                                                                <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?>
                                                            </a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class=" no-print">
                                                            <a class="btn btn-sm btn-success btn_width" data-toggle="modal" href="#addAppointmentModal">
                                                                <i class="fa fa-plus-circle"> </i> <?php echo lang('request_a_appointment'); ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('date'); ?></th>
                                                                    <th><?php echo lang('time_slot'); ?></th>
                                                                    <th><?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('status'); ?></th>
                                                                    <th><?php echo lang('description'); ?></th>
                                                                    <th><?php echo lang('charges'); ?></th>
                                                                    <th><?php echo lang('bill_status'); ?></th>
                                                                    <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                                        <th class="no-print"><?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($appointments as $appointment) {


                                                                    $time_slot = $appointment->time_slot;
                                                                    if ($time_slot != 'Not Selected') {
                                                                        $time_slot_exploded = explode(' To ', $time_slot);
                                                                        $time_slot =  $time_slot_exploded[0] . ' ' . lang('to') . ' ' . $time_slot_exploded[1];

                                                                        $this->db->where('hospital_id', $this->hospital_id);
                                                                        $this->settings = $this->db->get('settings')->row();

                                                                        if ($this->settings->time_format == 24) {
                                                                            $s_time = $this->settings_model->convert_to_24h($time_slot_exploded[0]);
                                                                            $e_time = $this->settings_model->convert_to_24h($time_slot_exploded[1]);
                                                                            $time_slot = $s_time . ' - ' . $e_time;
                                                                        }
                                                                    } else {
                                                                        $time_slot = lang('not_selected');
                                                                    }



                                                                ?>
                                                                    <tr class="">

                                                                        <td><?php echo date('d-m-Y', $appointment->date); ?></td>
                                                                        <td><?php echo $time_slot; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                                                                            if (!empty($doctor_details)) {
                                                                                $appointment_doctor = $doctor_details->name;
                                                                            } else {
                                                                                $appointment_doctor = '';
                                                                            }
                                                                            echo $appointment_doctor;
                                                                            ?>
                                                                        </td>
                                                                        <td><?php
                                                                            if ($appointment->status == 'Pending Confirmation') {
                                                                                $appointment_status = lang('pending');
                                                                            } elseif ($appointment->status == 'Confirmed') {
                                                                                $appointment_status = lang('confirmed');
                                                                            } elseif ($appointment->status == 'Treated') {
                                                                                $appointment_status = lang('treated');
                                                                            } elseif ($appointment->status == 'Cancelled') {
                                                                                $appointment_status = lang('cancelled');
                                                                            } elseif ($appointment->status == 'Requested') {
                                                                                $appointment_status = lang('requested');
                                                                            }
                                                                            echo $appointment_status;
                                                                            ?></td>
                                                                        <td><?php if (!empty($appointment->visit_description)) {
                                                                                echo $this->doctorvisit_model->getDoctorVisitById($appointment->visit_description)->visit_description;
                                                                            } ?></td>
                                                                        <td><?php echo $this->settings->currency . $appointment->visit_charges; ?></td>


                                                                        <?php
                                                                        $payment_details = $this->finance_model->getPaymentByAppointmentId($appointment->id);
                                                                        $total_deposited_amount = $this->finance_model->getDepositAmountByPaymentId($payment_details->id);
                                                                        $total_due = $payment_details->gross_total - $total_deposited_amount;
                                                                        if ($payment_details->gross_total == $total_due) {
                                                                            if ($payment_details->gross_total != 0) {
                                                                                $bill_status = '<span class="badge badge-warning">' . lang('unpaid') . '</span>';
                                                                            } else {
                                                                                $bill_status = '<span class="badge badge-primary">' . lang('paid') . '</span>';
                                                                            }
                                                                        } elseif ($total_due == 0) {
                                                                            $bill_status = '<span class="badge badge-primary">' . lang('paid') . '</span>';
                                                                        } else {
                                                                            $bill_status = '<span class="badge badge-warning">' . lang('due') . '</span>';
                                                                        }
                                                                        ?>


                                                                        <td><?php echo $bill_status; ?></td>



                                                                        <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                                                            <td class="no-print edit_appointment_button">
                                                                                <button type="button" class="btn btn-sm btn-primary editAppointmentButton mb-2" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"></i> </button>
                                                                                <a class="btn btn-sm btn-danger delete_button" title="<?php echo lang('delete'); ?>" href="appointment/delete?id=<?php echo $appointment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (!$this->ion_auth->in_group(array('Patient'))) {
                                                if ($settings->show_odontogram_in_history == 'yes') { ?>
                                                    <div id="odontogram" class="tab-pane <?php if ($redirect_tab == 'odontogram') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                                        <div class="">
                                                            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                                <div class=" no-print">
                                                                    <a class="btn btn-info btn_width btn-sm" href="prescription/addPrescriptionView">
                                                                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?>
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                            <form action="patient/odontogram" method="POST">
                                                                <input type="hidden" id="t32" name="tooth[Tooth32]" value="<?php echo $odontogram->Tooth32; ?>"></input>
                                                                <input type="hidden" id="t31" name="tooth[Tooth31]" value="<?php echo $odontogram->Tooth31; ?>"></input>
                                                                <input type="hidden" id="t30" name="tooth[Tooth30]" value="<?php echo $odontogram->Tooth30; ?>"></input>
                                                                <input type="hidden" id="t29" name="tooth[Tooth29]" value="<?php echo $odontogram->Tooth29; ?>"></input>
                                                                <input type="hidden" id="t28" name="tooth[Tooth28]" value="<?php echo $odontogram->Tooth28; ?>"></input>
                                                                <input type="hidden" id="t27" name="tooth[Tooth27]" value="<?php echo $odontogram->Tooth27; ?>"></input>
                                                                <input type="hidden" id="t26" name="tooth[Tooth26]" value="<?php echo $odontogram->Tooth26; ?>"></input>
                                                                <input type="hidden" id="t25" name="tooth[Tooth25]" value="<?php echo $odontogram->Tooth25; ?>"></input>
                                                                <input type="hidden" id="t24" name="tooth[Tooth24]" value="<?php echo $odontogram->Tooth24; ?>"></input>
                                                                <input type="hidden" id="t23" name="tooth[Tooth23]" value="<?php echo $odontogram->Tooth23; ?>"></input>
                                                                <input type="hidden" id="t22" name="tooth[Tooth22]" value="<?php echo $odontogram->Tooth22; ?>"></input>
                                                                <input type="hidden" id="t21" name="tooth[Tooth21]" value="<?php echo $odontogram->Tooth21; ?>"></input>
                                                                <input type="hidden" id="t20" name="tooth[Tooth20]" value="<?php echo $odontogram->Tooth20; ?>"></input>
                                                                <input type="hidden" id="t19" name="tooth[Tooth19]" value="<?php echo $odontogram->Tooth19; ?>"></input>
                                                                <input type="hidden" id="t18" name="tooth[Tooth18]" value="<?php echo $odontogram->Tooth18; ?>"></input>
                                                                <input type="hidden" id="t17" name="tooth[Tooth17]" value="<?php echo $odontogram->Tooth17 ?>"></input>
                                                                <input type="hidden" id="t16" name="tooth[Tooth16]" value="<?php echo $odontogram->Tooth16 ?>"></input>
                                                                <input type="hidden" id="t15" name="tooth[Tooth15]" value="<?php echo $odontogram->Tooth15; ?>"></input>
                                                                <input type="hidden" id="t14" name="tooth[Tooth14]" value="<?php echo $odontogram->Tooth14; ?>"></input>
                                                                <input type="hidden" id="t13" name="tooth[Tooth13]" value="<?php echo $odontogram->Tooth13; ?>"></input>
                                                                <input type="hidden" id="t12" name="tooth[Tooth12]" value="<?php echo $odontogram->Tooth12; ?>"></input>
                                                                <input type="hidden" id="t11" name="tooth[Tooth11]" value="<?php echo $odontogram->Tooth11; ?>"></input>
                                                                <input type="hidden" id="t10" name="tooth[Tooth10]" value="<?php echo $odontogram->Tooth10; ?>"></input>
                                                                <input type="hidden" id="t9" name="tooth[Tooth9]" value="<?php echo $odontogram->Tooth9; ?>"></input>
                                                                <input type="hidden" id="t8" name="tooth[Tooth8]" value="<?php echo $odontogram->Tooth8; ?>"></input>
                                                                <input type="hidden" id="t7" name="tooth[Tooth7]" value="<?php echo $odontogram->Tooth7; ?>"></input>
                                                                <input type="hidden" id="t6" name="tooth[Tooth6]" value="<?php echo $odontogram->Tooth6; ?>"></input>
                                                                <input type="hidden" id="t5" name="tooth[Tooth5]" value="<?php echo $odontogram->Tooth5; ?>"></input>
                                                                <input type="hidden" id="t4" name="tooth[Tooth4]" value="<?php echo $odontogram->Tooth4; ?>"></input>
                                                                <input type="hidden" id="t3" name="tooth[Tooth3]" value="<?php echo $odontogram->Tooth3; ?>"></input>
                                                                <input type="hidden" id="t2" name="tooth[Tooth2]" value="<?php echo $odontogram->Tooth2; ?>"></input>
                                                                <input type="hidden" id="t1" name="tooth[Tooth1]" value="<?php echo $odontogram->Tooth1; ?>"></input>
                                                                <style>
                                                                    .tooth-chart {
                                                                        width: 450px;
                                                                    }

                                                                    #Spots polygon,
                                                                    #Spots path {
                                                                        -webkit-transition: fill .25s;
                                                                        transition: fill .25s;
                                                                    }

                                                                    #Spots polygon:hover,
                                                                    #Spots polygon:active,
                                                                    #Spots path:hover,
                                                                    #Spots path:active {
                                                                        fill: #dddddd !important;
                                                                    }

                                                                    .clickUl {
                                                                        margin-top: 20px;

                                                                    }

                                                                    .clickUl li {
                                                                        display: inline-block;
                                                                    }

                                                                    .clickUl li a {
                                                                        padding: 10px;

                                                                    }
                                                                </style>
                                                                <div style=" width:40%; margin-left: 20px; margin-right:20px; margin-bottom: 60px; float:left;">
                                                                    <ul class="clickUl">
                                                                        <li><a data-id="1" id="1" onClick="cause(this.id)" style="background:#00ba72; color:#fff;">K</a></li>
                                                                        <li><a data-id="2" id="2" onClick="cause(this.id)" style="background:#004eff; color:#fff;">C</a></li>
                                                                        <li><a data-id="3" id="3" onClick="cause(this.id)" style="background:#ff0000; color:#fff;">Ce</a></li>
                                                                        <li><a data-id="4" id="4" onClick="cause(this.id)" style="background:#ff9000; color:#fff;">D</a></li>
                                                                        <li><a data-id="5" id="5" onClick="cause(this.id)" style="background:#9c00ff; color:#fff;">KR</a></li>
                                                                        <li><a data-id="6" id="6" onClick="cause(this.id)" style="background:#8e0101; color:#fff;">PS</a></li>
                                                                        <li><a data-id="7" id="7" onClick="cause(this.id)" style="background:#006666; color:#fff;">IP</a></li>
                                                                        <li><a data-id="8" id="8" onClick="cause(this.id)" style="background:#00c0ff; color:#fff;">X</a></li>
                                                                    </ul>

                                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 700" enable-background="new 0 0 450 700" xml:space="preserve">
                                                                        <g id="toothLabels">
                                                                            <text id="lbl32" transform="matrix(1 0 0 1 97.9767 402.1409)" font-family="'Avenir-Heavy'" font-size="21px">32</text>
                                                                            <text id="lbl31" transform="matrix(1 0 0 1 94.7426 449.1693)" font-family="'Avenir-Heavy'" font-size="21px">31</text>
                                                                            <text id="lbl30" transform="matrix(1 0 0 1 106.0002 495.5433)" font-family="'Avenir-Heavy'" font-size="21px">30</text>
                                                                            <text id="lbl29" transform="matrix(1 0 0 1 118.0002 538.667)" font-family="'Avenir-Heavy'" font-size="21px">29</text>
                                                                            <text id="lbl28" transform="matrix(0.9999 -1.456241e-02 1.456241e-02 0.9999 136.4086 573.5098)" font-family="'Avenir-Heavy'" font-size="21px">28</text>
                                                                            <text id="lbl27" transform="matrix(1 0 0 1 157.3335 603.8164)" font-family="'Avenir-Heavy'" font-size="17px">27</text>
                                                                            <text id="lbl26" transform="matrix(1 0 0 1 179.3335 623.8164)" font-family="'Avenir-Heavy'" font-size="18px">26</text>
                                                                            <text id="lbl25" transform="matrix(1 0 0 1 204.6669 628.483)" font-family="'Avenir-Heavy'" font-size="18px">25</text>
                                                                            <text id="lbl24" transform="matrix(1 0 0 1 231.3335 628.1497)" font-family="'Avenir-Heavy'" font-size="18px">24</text>
                                                                            <text id="lbl23" transform="matrix(1 0 0 1 256.3335 619.1497)" font-family="'Avenir-Heavy'" font-size="17px">23</text>
                                                                            <text id="lbl22" transform="matrix(1 0 0 1 276.3335 602.483)" font-family="'Avenir-Heavy'" font-size="18px">22</text>
                                                                            <text id="lbl21" transform="matrix(1 0 0 1 286.6669 573.1497)" font-family="'Avenir-Heavy'" font-size="21px">21</text>
                                                                            <text id="lbl20" transform="matrix(1 0 0 1 303.6327 538.667)" font-family="'Avenir-Heavy'" font-size="21px">20</text>
                                                                            <text id="lbl19" transform="matrix(1 0 0 1 322.983 495.5432)" font-family="'Avenir-Heavy'" font-size="21px">19</text>
                                                                            <text id="lbl18" transform="matrix(1 0 0 1 325.1251 449.1686)" font-family="'Avenir-Heavy'" font-size="21px">18</text>
                                                                            <text id="lbl17" transform="matrix(1 0 0 1 324.0004 402.1405)" font-family="'Avenir-Heavy'" font-size="21px">17</text>
                                                                            <text id="lbl16" transform="matrix(1 0 0 1 312.8534 324.1021)" font-family="'Avenir-Heavy'" font-size="21px">16</text>
                                                                            <text id="lbl15" transform="matrix(1 0 0 1 315.3335 275.3333)" font-family="'Avenir-Heavy'" font-size="21px">15</text>
                                                                            <text id="lbl14" transform="matrix(1 0 0 1 311.3335 236)" font-family="'Avenir-Heavy'" font-size="21px">14</text>
                                                                            <text id="lbl13" transform="matrix(1 0 0 1 300.3335 200.6667)" font-family="'Avenir-Heavy'" font-size="21px">13</text>
                                                                            <text id="lbl12" transform="matrix(1 0 0 1 286.6669 172)" font-family="'Avenir-Heavy'" font-size="21px">12</text>
                                                                            <text id="lbl11" transform="matrix(1 0 0 1 270.2269 142.439)" font-family="'Avenir-Heavy'" font-size="21px">11</text>
                                                                            <text id="lbl10" transform="matrix(1 0 0 1 247.5099 118.9722)" font-family="'Avenir-Heavy'" font-size="21px">10</text>
                                                                            <text id="lbl9" transform="matrix(1 0 0 1 227.8432 112.9722)" font-family="'Avenir-Heavy'" font-size="21px">9</text>
                                                                            <text id="lbl8" transform="matrix(1 0 0 1 200.1766 112.9722)" font-family="'Avenir-Heavy'" font-size="21px">8</text>
                                                                            <text id="lbl7" transform="matrix(1 0 0 1 170.5099 117.6388)" font-family="'Avenir-Heavy'" font-size="21px">7</text>
                                                                            <text id="lbl6" transform="matrix(1 0 0 1 148.6667 134.167)" font-family="'Avenir-Heavy'" font-size="21px">6</text>
                                                                            <text id="lbl5" transform="matrix(1 0 0 1 131.3605 164.8335)" font-family="'Avenir-Heavy'" font-size="21px">5</text>
                                                                            <text id="lbl4" transform="matrix(1 0 0 1 119.3927 195.6387)" font-family="'Avenir-Heavy'" font-size="21px">4</text>
                                                                            <text id="lbl3" transform="matrix(1 0 0 1 103.8631 234.4391)" font-family="'Avenir-Heavy'" font-size="21px">3</text>
                                                                            <text id="lbl2" transform="matrix(1 0 0 1 96.2504 275.9999)" font-family="'Avenir-Heavy'" font-size="21px">2</text>
                                                                            <text id="lbl1" transform="matrix(1 0 0 1 93.9767 324.769)" font-family="'Avenir-Heavy'" font-size="21px">1</text>
                                                                        </g>

                                                                        <g id="dmftLabels">
                                                                            <text id="txtTooth32" transform="matrix(1 0 0 1 5.0001 386.3778)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth31" transform="matrix(1 0 0 1 0.9998 449.7374)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth30" transform="matrix(1 0 0 1 9.6668 513.5912)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth29" transform="matrix(1 0 0 1 36.3335 578.2579)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth28" transform="matrix(1 0 0 1 74.3335 626.9246)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth27" transform="matrix(1 0 0 1 109.0001 660.9246)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth26" transform="matrix(1 0 0 1 145.6668 678.2579)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth25" transform="matrix(1 0 0 1 191.6668 687.5912)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth24" transform="matrix(1 0 0 1 233.0001 687.5915)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth23" transform="matrix(1 0 0 1 283.0001 673.5915)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth22" transform="matrix(1 0 0 1 329.6668 644.9248)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth21" transform="matrix(1 0 0 1 359.6668 604.9248)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth20" transform="matrix(1 0 0 1 390.3334 558.2581)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth19" transform="matrix(1 0 0 1 412.6435 494.2493)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth18" transform="matrix(1 0 0 1 416.1565 449.7382)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth17" transform="matrix(1 0 0 1 409.9765 386.378)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth16" transform="matrix(1 0 0 1 410.5356 325.845)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth15" transform="matrix(1 0 0 1 414.0005 251.8453)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth14" transform="matrix(1 0 0 1 408.7707 211.7113)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth13" transform="matrix(1 0 0 1 386.7073 165.7383)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth12" transform="matrix(1 0 0 1 360.5876 123.5825)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth11" transform="matrix(1 0 0 1 344.0069 89.5916)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth10" transform="matrix(1 0 0 1 301.0546 54.1648)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth9" transform="matrix(1 0 0 1 229.2251 29.2916)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth8" transform="matrix(1 0 0 1 172.7413 30.3285)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth7" transform="matrix(1 0 0 1 114.3296 51.5455)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth6" transform="matrix(1 0 0 1 72.0002 91.2056)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth5" transform="matrix(1 0 0 1 48.5357 127.8719)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth4" transform="matrix(1 0 0 1 27.2052 167.0134)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth3" transform="matrix(1 0 0 1 8.7983 212.3336)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth2" transform="matrix(1 0 0 1 3.25 260.1059)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                            <text id="txtTooth1" transform="matrix(1 0 0 1 5.0001 338.4393)" font-family="'MyriadPro-Regular'" font-size="16px"></text>
                                                                        </g>

                                                                        <g id="Spots">
                                                                            <polygon id="Tooth32" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth32; ?>" data-key="32" points="66.7,369.7 59,370.3 51,373.7 43.7,384.3 42.3,392 38.7,406 41,415.3 44.3,420.3
                                                 47.3,424 51.7,424.3 57.7,424 62.3,422.7 66.7,422.7 71,424.3 76.3,422.7 80.7,419.3 84.7,412.3 85.3,405 87.3,391.7 85,380
                                                 80.7,375 73.7,371.3 	" />
                                                                            <polygon id="Tooth31" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth31; ?>" data-key="31" points="76,425.7 80.3,427.7 83.3,433 85.3,447.7 84.3,458.7 79.7,472.3 73,475 50.3,479.7
                                                 46.7,476.7 37.7,446.3 39.7,438.3 43.3,432 49,426.7 56,424.7 65,424.7 	" />
                                                                            <polygon id="Tooth30" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth30; ?>" data-key="30" points="78.7,476 85,481 90.3,488.3 96.3,499.3 97.7,511.3 93,522 86,526.3 67,533
                                                 60.3,529.7 56.3,523.7 51.7,511 47.7,494.7 47.7,488.3 50.3,483.3 55,479.7 67,476.7 	" />
                                                                            <polygon id="Tooth29" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth29; ?>" data-key="29" points="93.3,525 99.3,527.3 108.3,536 114,546.7 115.7,559.3 114.3,567.3 106.3,573
                                                 98.3,578.3 88,579 82,575 75,565 69.3,552.3 67.3,542 69.7,536 74.3,531.7 84.3,528.3 	" />
                                                                            <path id="Tooth28" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth28; ?>" data-key="28" d="M117.3,569.7l7.7,1.3l6.3,3.7l6.3,7.7l4,8.3L144,602l-1.3,6.7l-6.7,6.7l-7.7,3.3l-7.3-1l-7-3
                                              l-7.3-7l-5-9l-2-10c0,0-0.7-7,0.3-7.3c1-0.3,5.3-6.7,5.3-6.7l9-5H117.3z" />
                                                                            <polygon id="Tooth27" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth27; ?>" data-key="27" points="155.7,611 160.3,615.3 165,624.7 161.7,634.3 156,641.3 149,644 140.7,644.3
                                                 133.3,641.3 128.7,634.7 128.7,629 132.7,621.3 137.7,615 143.7,611 149.7,610 	" />
                                                                            <polygon id="Tooth26" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth26; ?>" data-key="26" points="178.3,627 186,629 187.7,633.7 188.7,644 189,657 189.3,662.7 186.3,663.7 176.7,663
                                                 168,656.3 159.3,649.7 156.7,644 162,639.3 	" />
                                                                            <polygon id="Tooth25" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth25; ?>" data-key="25" points="214,637 218,642.7 223,654.3 225.7,664 225.3,666.3 219,668.3 206.7,668 196,665.7
                                                 190.3,662.7 193,657.3 199.7,647.3 207,638 210.7,635.5 	" />
                                                                            <path id="Tooth24" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth24; ?>" data-key="24" d="M235.3,637c0,0,3-2,4-2.3c1-0.3,4.3,0,4.3,0l5,4.3l5.3,7.3l3.3,6.7l2,7.3l-2,3l-7.7,2.7
                                              l-10,0.3h-10l-2-6.7l2.7-7.3L235.3,637z" />
                                                                            <polygon id="Tooth23" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth23; ?>" data-key="23" points="269.3,624 273.3,624.7 275.3,627.3 279,628.7 281.7,631.3 285.3,634.7 289.3,638.3
                                                 292,643.3 291.3,650 287,655 280.7,658.7 272,660 265,660.7 261.3,657.3 261.7,650 263.7,637 264.3,627 	" />
                                                                            <polygon id="Tooth22" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth22; ?>" data-key="22" points="286,629.3 286.7,633.3 291.3,638.7 295.3,642.3 302,644 311.7,643.3 318.3,637.7
                                                 321,630 321.3,620.3 317,614.3 308,608 298.3,607 291,609.3 287,612.3 286.7,617.7 287.3,624.7 	" />
                                                                            <polygon id="Tooth21" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth21; ?>" data-key="21" points="331,565.7 335,565.7 341.3,568 349.3,574.3 352.3,578.3 352.7,583.7 350.7,593.7
                                                 342.7,604 337.7,609 328,612.7 320,613.3 315,611 308.3,604.7 306.7,598 307.3,591.3 309,584.7 312.7,578.3 318.3,571.7 	" />
                                                                            <polygon id="Tooth20" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth20; ?>" data-key="20" points="334,561 338.7,566 346,570 354.7,573 360.7,571.7 368,568.3 383,545 385.3,532.7
                                                 381.3,524.3 374,520.7 363.7,516.3 356.3,515.3 351.3,518.3 346.3,524 340.3,534.3 336,546.7 	" />
                                                                            <path id="Tooth19" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth19; ?>" data-key="19" d="M398,470l4.7,5.7l3,7.7l-0.3,11.7l-6,13.3l-6.3,10.3l-8.3,4.3l-7.3-1l-16.3-7c0,0-2.7-6-3-7.3
                                              c-0.3-1.3-0.3-11-0.3-11l3.7-14.3l3.7-7l5.3-6.7l8-2l9.7-0.7L398,470z" />
                                                                            <polygon id="Tooth18" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth18; ?>" data-key="18" points="410,435 408.7,447.3 404.3,459 399.3,467.7 393.7,468 388,466 376.3,466.3
                                                 369.7,466.3 365.7,460 364.7,444.7 366.3,434.3 369,424 378.3,417.3 386.7,415.7 391.7,415.3 396,418 399.7,418 404,421.7
                                                 407.7,427.3 	" />
                                                                            <polygon id="Tooth17" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth17; ?>" data-key="17" points="371.7,417 378.3,417.3 386.7,415.7 391.7,415.3 397.3,417.7 402.7,416.3 407.7,409.7
                                                 406.7,395 401,377.7 397.3,373 390.7,367.3 380,365 373,366.7 367.3,369 364,374.3 360,389 363.3,401.3 367.7,412.3 	" />
                                                                            <polygon id="Tooth16" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth16; ?>" data-key="16" points="404.3,293.7 408.7,299.3 408.7,308 405.3,318.7 401,329.7 392.3,339.7 382.7,341
                                                 369,339.7 359,335 354.7,327.7 354.3,316 358.3,304 363.7,294 368.7,294.7 378.7,296 389,296 	" />
                                                                            <polygon id="Tooth15" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth15; ?>" data-key="15" points="362.3,247.3 357.3,251 357,259.3 358.7,268 359.7,279.7 361.3,286.7 365,291.7
                                                 371,294.3 392,295 404.3,293.7 410,280.7 412,263.3 407.3,246.7 401,240.3 396,239.7 389.3,243 	" />
                                                                            <polygon id="Tooth14" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth14; ?>" data-key="14" points="359.7,243.7 350.7,224 345.7,211.7 348.7,205 358.3,202.7 375.7,197 388.7,193
                                                 393,196 399.3,207 401.3,222.7 400,234.3 394.7,240.7 381.7,244.7 371,246 	" />
                                                                            <polygon id="Tooth13" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth13 ?>" data-key="13" points="386,188.7 383.3,192.7 377.7,196 356.3,203.3 345.7,202.3 341.7,199.7 338.7,196.3
                                                 335,188.7 332,177 333.7,169.7 338,164.7 346.3,161 353.7,156.7 360.3,150.3 364,151 370.7,156.3 376.3,164.3 380,170.3
                                                 383.3,178.3 	" />
                                                                            <polygon id="Tooth12" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth12; ?>" data-key="12" points="358.7,134.3 360.3,145.7 357.3,152.7 352,157.3 346.3,161 336,164 329.7,163.3
                                                 321.7,157.7 314.3,149 310.7,139.3 310,133.7 312.3,127 318.3,125.7 326,122 332.7,116 334.7,114.3 337.7,117.3 343.3,119.7
                                                 348.7,122.7 354.3,127.7 	" />
                                                                            <polygon id="Tooth11" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth11; ?>" data-key="11" points="336,93.3 337.7,100 336,104.7 332.7,113.7 324.3,121.3 315.3,125.7 306.3,126
                                                 297.3,120.3 294,112 295.7,102.7 299,95 303.3,90 309.3,88 316.3,87.3 322.7,87.3 328,88.3 	" />
                                                                            <polygon id="Tooth10" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth10; ?>" data-key="10" points="310.3,83.3 298,90.7 286,95 276.3,98.3 270.3,93.3 269,82.7 269,69.3 270,58.7
                                                 274.7,54.7 282,53 287.7,54.7 297.3,60.3 304,64.3 308.7,68.7 312.3,74 313,81 	" />
                                                                            <polygon id="Tooth9" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth9; ?>" data-key="9" points="273.3,52 266.7,61.7 258.3,72.3 253.3,79.7 247.3,85 239,87.7 232.3,82 224.7,67
                                                 222,58.3 219,50 220,44.3 224.3,40.3 230,38.7 237.3,38.7 253,39.3 258.7,41.3 264.3,43.7 268.3,45.7 	" />
                                                                            <polygon id="Tooth8" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth8; ?>" data-key="8" points="176.7,46.3 195,41 203.3,39.7 209.3,40.7 215.3,42.7 217,47 217.7,54.3 215,64.7
                                                 212.3,75.7 208,83 201.7,85.7 195.7,86.7 189.7,83.3 183.7,74.7 175,62 171.7,54 172.7,49.7 	" />
                                                                            <path id="Tooth7" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth7; ?>" data-key="7" d="M167,55l6.7,6.3L174,68l0.3,8l1,10l-2,8.3l-4.7,4.3l-6.7,1.7l-8-4.3l-7.3-4.7l-9.3-4.7
                                              l-6.3-5.3l-1-4.3l1.3-5c0,0,3.3-6,4.3-6s5.3-6,6.3-6s10.3-4.7,10.3-4.7L167,55z" />
                                                                            <polygon id="Tooth6" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth6; ?>" data-key="6" points="126.3,82 134.3,86.3 139.7,92.3 144.7,104.7 145.7,115.3 143.7,120.7 138,124.3
                                                 131.3,125 121,125 114.7,119.3 110.3,112.3 108.3,104.7 108.7,94.7 110.7,88.7 116,84 	" />
                                                                            <polygon id="Tooth5" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth5; ?>" data-key="5" points="109,116.7 116,122.3 122.7,125.3 127.7,131.3 128.3,141 122.7,153.7 114,161.7
                                                 105.7,162.3 96.7,161 85.7,156 82,150 81,139.3 86.3,128 93,121.3 100.7,117.3 	" />
                                                                            <polygon id="Tooth4" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth4; ?>" data-key="4" points="82,155.3 102.3,163.3 108.7,172 109.3,182 104.7,192 100,199 94,203.7 85.3,201.7
                                                 73.7,201 64.3,196.7 60.3,190.7 59,183.3 61.7,175.3 66.3,167.7 71.3,161.3 	" />
                                                                            <path id="Tooth3" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth3; ?>" data-key="3" d="M92.7,207.3l2,5.3l-1.7,8l-1.7,9l-4,8l-5,7.7l-11,4.7l-13.7,0.7l-10-7l-1.7-5L45,220l3-10.7
                                              l5-7.3l4-3.3l4.7-2.7l5.3,3.7l6.7,1.3c0,0,7.3,1.3,9.3,1.3s6.3,0.7,6.3,0.7L92.7,207.3z" />
                                                                            <polygon id="Tooth2" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth2; ?>" data-key="2" points="79.7,288.3 71.7,291 55,293 40.3,291.3 36,287 33,273.7 36.3,260 42,248.7 44.7,244.7
                                                 50.3,246.7 56,249 65.3,250.7 74,249.7 80.3,249.7 82.3,254 85.3,259.3 87,267.7 87.7,274.7 85.3,282.7 	" />
                                                                            <polygon id="Tooth1" onClick="reply_click(this.id)" fill="<?php echo $odontogram->Tooth1; ?>" data-key="1" points="33,314.3 38,325.7 45.7,335.7 55.7,341.7 64.7,343 73.3,340 77.7,335.7 81.3,326.3
                                                 82,314.3 81.3,302 80.7,292.7 73.7,292 51.3,293.7 38.7,293.7 34,298 31.7,302.3 32,311 	" />
                                                                        </g>

                                                                        <g id="adult-outlines">
                                                                            <g id="XMLID_210_">
                                                                                <path id="XMLID_208_" fill="#010101" d="M372.6,180.5c0.2,1.4-2,2.3-2.9,1.2c-0.7-1.1,1.5-1.8,2.4-0.9L372.6,180.5z" />
                                                                                <path id="XMLID_207_" fill="#010101" d="M71.4,392.6c-0.5,1.1-2,1.5-2.9,0.9c-0.3-1.6,2.6-2.4,3.2-0.9L71.4,392.6z" />
                                                                                <path id="XMLID_199_" fill="#010101" d="M83.6,183.9c1.2,0.1,2.2,1.1,2.3,2.3c-1.2,1.3-3.7-1.1-2.4-2.3L83.6,183.9z" />
                                                                                <path id="XMLID_192_" fill="#010101" d="M341.6,587.6c-0.3-0.9,1.1-1.3,2-1.1c0.7,1.1-0.3,2.8-1.6,2.8
                                              C341.2,589.2,341,588,341.6,587.6L341.6,587.6z" />
                                                                                <path id="XMLID_188_" fill="#010101" d="M87.8,552.3c-1.5,0-3,0-4.6,0c-0.4-0.6-0.5-1.3-0.4-2c1.4-0.4,2.8-0.5,4.2-0.3
                                              c0.3,0.7,0.6,1.5,0.8,2.2L87.8,552.3z" />
                                                                                <path id="XMLID_186_" fill="#010101" d="M63.1,269.9c2.1,0.4,3.5,2.9,2.7,4.9c-1.8-0.7-3-2.8-2.7-4.7L63.1,269.9z" />
                                                                                <path id="XMLID_64_" fill="#010101" d="M407.7,456.5c5.4-9,6.6-22,0.9-30c-0.6-1.7-1.7-3.4-2.9-4.4c-0.9-0.7-1.8-1.4-2.6-2.1
                                              c-0.4-0.4-0.8-0.7-1.2-1c2.4-1.1,4.5-3.1,5.6-5.4c2.5-5.1,1.8-11,0.8-16.6c-1.6-8.7-4.1-17.6-9.8-24.5c-5.6-6.9-15-11.3-23.5-8.9
                                              c-9.2,2.6-14.9,12.4-15.5,21.9c-0.6,9.5,3,18.8,7.2,27.4c1,2.1,2.1,4.3,2.2,6.7c0,2.1-0.8,4.2-1.5,6.2c-3.5,9.5-4.8,19.7-4.1,29.8
                                              c0.4,4.9,2.8,10.8,6.5,13.2c-0.6,0.6-1.2,1.5-1.8,2.1c-1.2,1.2-2.5,2.3-3.6,3.6c-5,4.6-6.7,12.7-7.1,19.9
                                              c-0.5,8.9-0.8,18.9-7.3,24.9c-9.4,8.5-15.3,20.7-16.3,33.3c-0.4,4.8-0.9,10.9-5.5,12.3c-16.4,5.2-26.6,24.8-21.3,41.2
                                              c-8.6-1-20.5,0.4-21.6,9c-0.4,3.3,1.1,6.5,0.9,9.8c-0.1,2.3-1.9,4.8-4,5.4c-1.4-1.1-2.7-2.2-4.5-2.8c-1.3-0.4-1.7-0.9-2.4-1.7
                                              c0.1,0,0.2,0,0.3,0.1c-1.4-4.1-8-3.8-10.7-0.3c-2.7,3.4-2.7,8.2-2.9,12.5c-0.2,4.4-1,9.2-4.5,11.8c-2.2-4.9-4.5-10-8.7-13.3
                                              S238,632,234,635.6c-5.2,4.7-2.9,13.6-6.3,19.8c-4.4-1.8-5.7-7.3-7-11.9c-1.3-4.6-4.6-9.9-9.4-9.1c-2.6,0.4-4.4,2.6-6.1,4.6
                                              c-4.8,5.8-9.5,11.6-14.3,17.4c-4.6-9,3.5-22.7-4.5-29c-6.7-5.2-15.8,1.6-21.4,7.9c1-5.8,2.1-11.8,0.3-17.4
                                              c-1.8-5.6-7.4-10.4-13.1-9.2c-5.6,1.2-8.2-6.7-8.1-12.4c0.1-4.8-0.7-11.1-4.4-13.2c-1.3-1.9-2.7-3.8-4-5.7c-1.7-2.5-3.2-4.2-6-5.6
                                              c0,0-0.1,0-0.1,0c-3.4-2.8-7.7-4.4-12-4.4c3.2-16.9-5.5-35.3-20.6-43.5c4.2-10.4,2.9-22.8-3-32.3c-3.1-5.8-7.1-11.1-12.4-14.8
                                              c3.8-12.1,5.3-24.8,4.6-37.5c-0.2-2.9-0.8-6.2-2.4-8.6c-0.4-1.2-1-2.3-1.9-3.1c-1.1-0.9-2.6-1.6-4.1-2.1c1.1-0.7,2.1-1.6,2.9-2.6
                                              c3-3.6,4.3-8.2,5.4-12.7c2.4-9.5,4.5-19.9,0.6-28.9c-3.2-7.3-10.3-12.7-18.2-13.8s-16.2,2.2-21.3,8.3c-4.6,5.6-6.4,13.1-7.9,20.2
                                              c-2.1,9.3-3.3,20.9,4.5,26.4c2,1.4,1.7,4.7,0.3,6.7s-3.6,3.5-5.1,5.5c-2.6,3.6-2.5,8.5-2,13c1.5,12.7,5.6,25.1,11.8,36.3
                                              c-0.4,0.7-0.9,1.3-1.2,2c-0.8,1.5-1,3.2-1.1,4.8c-0.8,3.2-0.2,6.9,0.5,10.2c3,14.2,8.1,30.9,21.9,35.3c-5,5.4-2.4,14,0.5,20.8
                                              c2.7,6.4,5.5,12.9,10.3,18c4.8,5,12.1,8.3,18.7,6.4c-4,19.4,13.3,40,33,40.1c-1.1,2.1-2.1,4.2-3.1,6.4c-0.2,0.4-0.1,0.8,0.1,1.1
                                              c-2.2,6.2,0.8,14.6,7.4,16.3c7.7,2,18.2-2.8,22.3,3.9c5.4,9,15.4,15,25.9,15.7c-0.2-0.2-0.5-0.3-0.7-0.5c1,0.1,2,0.2,3,0.2
                                              c1.5,0.1,2.8,0.2,4.1-0.6c6.6,5.3,15.8,7.3,24,5.3c2.2,0,4.3,0.2,6.5-0.2c2.3-0.4,4.4-1,6.3-2.3c8.3,3.6,18.2,3.2,26.2-1
                                              c0.3-0.1,0.5-0.1,0.8-0.2c1.3-0.3,2.5-0.6,3.5-1.5c0.2-0.2,0.3-0.5,0.3-0.7c1.2-0.9,2.3-1.8,3.5-2.7c13.1,6.3,31.1-2.4,34.2-16.7
                                              c7.4,3.6,17.1,1.8,22.7-4.2c5.6-6,6.8-15.8,2.7-22.9c19.4-1.8,35.2-21.6,32.6-40.9c21.2-5.9,36-29.1,32.3-50.8
                                              c9.8-4.6,14.6-15.7,18.6-25.8c3.1-7.9,5.7-17.9-0.4-23.8C399.1,470.9,404,462.6,407.7,456.5z M40.6,410c-1-1.9-0.5-4.3,0-6.4
                                              c1.1-4.4,2.2-8.8,3.3-13.2c1.5-5.8,3.3-12.1,8.1-15.6c1.4-1,2.9-1.7,4.5-2.2c7.1-2.5,15.4-1.7,21.5,2.7c6.1,4.4,9.5,12.5,7.6,19.7
                                              c-1.5,6-0.9,12.3-2.8,18.2c-1.9,5.8-7.9,11.3-13.7,9.2c-7.2-2.5-16.2,4.1-22.4-0.4C43.1,419.3,42.8,414,40.6,410z M45.6,471.3
                                              c-1.3-5-2.5-10.1-3.8-15.1c-1-3.8-1.9-7.7-1.8-11.6c0.3-6.5,3.9-12.8,9.5-16.3c5.5-3.5,12.8-4,18.8-1.5c2.1,0.9,4.5,0.8,6.7,0
                                              c1.8,0.3,3.9,1,5.3,2c3.9,11.8,4.2,24.7,1,36.6c-0.6,2.2-1.4,4.6-3.2,6c-1.5,1.3-3.5,1.7-5.5,2.1c-6.8,1.5-13.7,3-20.5,4.5
                                              C48.6,479,46.5,474.7,45.6,471.3z M63.2,530c-3.3-1.7-5.2-5.3-6.6-8.7c-4.3-9.8-7-20.3-8.1-31c0.1-1,0.2-2.1,0.7-3
                                              c0.4-0.9,1.1-1.7,1.6-2.6c0.2-0.1,0.4-0.1,0.6-0.3c0.4-0.2,0.5-0.6,0.4-1c8-4.9,17.7-7.1,27-6.1c0,0,0,0,0,0
                                              c7.9,4.7,12.8,13.2,16.4,21.4c0,0.1,0.1,0.2,0.2,0.2c0.9,3.1,1.4,6.2,1.3,9.4c-0.1,7.2-4.2,14.8-11.1,16.8
                                              C78,527.3,70.2,533.6,63.2,530z M89.1,577.8c-6.7-1.7-10.3-8.7-13.2-15c-1.4-3-2.7-6.1-4.1-9.1c-1.7-3.8-3.4-7.8-2.7-11.9
                                              c0.7-3.9,3.5-7.2,6.9-9.3c3.4-2.1,7.2-3.2,11-4.3c2.1-0.6,4.3-1.2,6.5-1.1c4,0.2,7.5,2.6,10.3,5.4c6.6,6.5,10.6,15.4,11.1,24.6
                                              c0.1,2.6,0,5.2-1.1,7.5c-1.3,2.7-3.8,4.5-6.1,6.3C102.3,575.2,95.8,579.5,89.1,577.8z M120.8,616.5c-7.1-1.9-12.8-7.5-16.2-14
                                              c-3-5.7-4.5-12.3-3-18.6c1.5-6.2,6.4-11.8,12.7-13c6.2-1.2,12.2,1.8,17.6,5.1c1.1,1.2,2.1,2.6,3.1,4.1c1.2,1.7,2.3,3.4,3.5,5
                                              c3.6,8,6.2,17.3,1.6,24.6C136.4,615.9,127.9,618.4,120.8,616.5z M150.4,642.4c-5.6,2-12.3,1.4-16.7-2.6c-3-2.7-4.5-7-3.9-10.9
                                              c0,0,0,0,0,0c1.3-2.7,2.6-5.4,4-8c3.6-4.3,7.6-8.8,13.1-9.8c7.7-1.5,15.6,5.5,16.1,13.3C163.7,632.3,157.9,639.8,150.4,642.4z
                                              M184.5,662.6c-1.6-0.1-3.2-0.3-4.8-0.4c-5.9-3.9-11.8-7.7-17.6-11.6c-1.4-0.9-3-2-3.4-3.7c-0.6-2.6,1.7-4.8,3.8-6.4
                                              c3.9-2.9,7.8-5.9,11.7-8.8c2.2-1.7,4.7-3.4,7.5-3c4.8,0.7,6,7.1,6,12c0,7.1,0,14.1,0.1,21.2c0.3,0.3,0.6,0.6,0.9,0.9
                                              C187.4,663,185.8,662.7,184.5,662.6z M212.9,667.5C212.9,667.5,212.8,667.5,212.9,667.5c-7.3-0.3-14.5-2.1-21-5.4
                                              c4.7-8,10.1-15.6,16.1-22.7c0.9-1,2-2.2,3.3-2.1c1.3,0,2.4,1.2,3.2,2.3c5.6,7.7,9.2,16.8,10.3,26.3c0.1,0,0.1,0.1,0.2,0.1
                                              C221.2,667.9,217.1,667.3,212.9,667.5z M257.1,662.6c-0.3-0.1-0.6,0-0.9,0.2c-1,0.9-2.6,1-3.8,1.3c-0.4,0.1-0.8,0.3-1.3,0.4
                                              l-12.4,1c-3.6,0.3-8.3-0.1-9.4-3.5c-0.6-1.7,0.1-3.6,0.7-5.3c1.7-4.7,3.5-9.5,5.2-14.2c1.3-3.6,4-7.9,7.7-6.9
                                              c1.4,0.4,2.5,1.5,3.4,2.6C252.6,645.1,259.2,654,257.1,662.6z M366.7,407.2c-2.7-7.6-5.5-15.8-3.5-23.6c0.6-2.6,1.8-5.1,2.1-7.7
                                              c0.4-3.1,2.8-5.8,5.7-7.2c2.8-1.4,6.1-1.8,9.3-1.8c5.7,0,11.8,1.4,15.8,5.4c5.1,5.2,5.6,13.2,7.5,20.3c0.9,3.4,2.2,6.7,2.8,10.2
                                              s0.2,7.3-1.9,10.1c-2.1,2.8-6.3,4.2-9.3,2.3c-7-4.4-17.3,4.1-24-0.7C368.8,412.8,367.7,409.9,366.7,407.2z M368.9,463.2
                                              c-1.7-1.9-2-4.6-2.2-7.2c-0.8-9.6-1.5-19.8,2.9-28.3s15.9-14.2,24-9c1.8,1.2,4,1.4,6.1,0.9c1.4,1.1,2.5,2.3,3.9,3.3
                                              c1.5,1.1,3.2,2.9,3.4,4.8c0.1,0.4,0.3,0.7,0.6,0.8c3.2,9.3-0.5,21.4-4.7,31.2c-1.8,4.2-6.5,9.1-9.8,6
                                              C386.9,460.1,374.5,469.6,368.9,463.2z M285,655.6c-4.7,3.2-10.7,3.7-16.3,4.2c-1.5,0.1-3.2,0.2-4.5-0.7c-1.9-1.4-1.7-4.2-1.3-6.5
                                              c1.3-8.2,2.6-16.5,3.8-24.7c1.6-1.4,3.7-2.3,5.8-2.5c1.3,0.9,1.7,2.6,3.2,3.3c0.9,0.5,2,0.5,2.9,1c0.5,0.3,1.1,0.7,1.6,1.1
                                              c1.7,4.1,7.2,6,9.6,9.9C292.6,645.7,289.7,652.4,285,655.6z M311.4,641.3c-7.7,3.9-18.2,0.5-22.1-7.2c-0.7-1.4-0.8-3.1-0.8-4.6
                                              c0-2.8-0.1-5.5-0.1-8.3c-0.1-3.2,0-6.6,1.9-9.1c2.2-2.7,6-3.5,9.5-3.4c7.5,0.2,15.3,3.8,18.8,10.5
                                              C322.5,626.9,319,637.4,311.4,641.3z M349.8,590.1c-3.7,7.8-8.6,15.5-16.2,19.6c-7.6,4.1-18.5,3.1-23.2-4.2
                                              c-3-4.6-3-10.6-1.5-15.8c2.3-8.3,7.9-15.7,15.4-20c2.7-1.6,5.7-2.8,8.8-2.6c3.9,0.2,7.4,2.6,10.6,4.8c3.6,2.6,7.6,5.7,8.1,10.1
                                              C352.1,584.8,351,587.5,349.8,590.1z M382.6,543c-1.9,4.3-4.8,8.1-7.3,12.1c-3.4,5.4-6.2,11.7-11.8,14.7c-6.2,3.2-13.8,1.4-19.9-2
                                              c-3.5-2-6.9-4.7-8-8.6c-1.1-3.9,0.5-8.1,2-11.9c1.8-4.4,3.6-8.8,5.4-13.3c2.8-7,6.6-14.8,13.9-16.7c6.1-1.5,12.2,1.8,17.6,5
                                              c3.1,1.9,6.4,3.9,8.2,7C385.1,533.4,384.5,538.7,382.6,543z M397.9,508c-2.4,4.8-5.1,10-10,12.1c-5.6,2.4-12,0-17.6-2.4
                                              c-8-3.4-11.8-13.2-11-21.9c0.7-7.7,4.2-14.8,7.9-21.7c0.5-0.5,1-0.9,1.5-1.4c0.5-0.5,1.1-1,1.5-1.5c0.2-0.2,1.1-1.6,1.3-1.6
                                              c0.3,0.1,0.5,0,0.7-0.1c1,0.2,2.1,0.2,3.2-0.2c8.8-2.8,19.7-1.8,25.3,5.5C407.9,484.2,403,497.5,397.9,508z" />
                                                                                <path id="XMLID_183_" fill="#010101" d="M378.3,306.7c1.2,0.4,1.9,1.7,1.7,2.9c-1.9,0.2-3.7-1.6-3.6-3.4c0.5-0.6,1.6-0.3,1.8,0.4
                                              L378.3,306.7z" />
                                                                                <path id="XMLID_177_" fill="#010101" d="M358.7,536.6c0.7,2.3,2.4,4.2,4.7,5.2c3.3-3,6.9-6.1,11.4-6.2c-1.9,3.5-5.3,6.2-9.1,7.1
                                              c-3.2,0.8-4.9,4.6-4.4,7.9c0.5,3.3,2.6,6.1,4.6,8.7c-1.2,1.5-3.5-0.3-4.4-2c-0.9-1.7-2.9-3.7-4.3-2.4c-1.2-2.8,1.5-5.7,1.7-8.7
                                              c0.3-4.4-4.6-8.2-3.5-12.4c0.5-0.8,1.8-0.5,2.4,0.2S358.5,535.7,358.7,536.6z" />
                                                                                <path id="XMLID_176_" fill="#010101" d="M63.1,270.1c-1.4-0.5-2.4-2.1-2.2-3.6c0.2-1.5,1.5-2.9,3-3.1c-0.2,2.2-0.5,4.4-0.9,6.7
                                              L63.1,270.1z" />
                                                                                <path id="XMLID_175_" fill="#010101" d="M320.6,597.9c-0.2-1-0.3-1.9-0.5-2.9c1.7-0.7,3.5,0.6,5.3,0.9c3.5,0.6,6.7-2.8,7.3-6.3
                                              s-0.8-7-2.1-10.3c0.6-0.1,1.2-0.2,1.7-0.3c5.3,5.5,4,15.7-2.4,19.8c-0.6,0.4-1.3,0.8-2.1,0.8C325.4,599.9,323,596.8,320.6,597.9z" />
                                                                                <path id="XMLID_174_" fill="#010101" d="M119.7,592.5c2.5-1.5,6.2-0.5,7.6,2.1C124.7,595.7,121.3,594.8,119.7,592.5z" />
                                                                                <path id="XMLID_172_" fill="#010101" d="M389.2,304.3c1.4-0.6,2.6,1.8,1.7,3c-1,1.3-2.7,1.4-4.3,1.5c-0.6-1.8,0.9-3.9,2.8-4
                                              L389.2,304.3z" />
                                                                                <path id="XMLID_167_" fill="#010101" d="M97.4,545.2c-0.7,1.1-1.4,2.1-2.1,3.2c-0.8,0.8-2.3-0.3-2.3-1.4c0-1.1,0.9-2.1,1.7-2.9
                                              c0.9-0.9,1.8-1.8,2.7-2.7C98.3,542.4,98.3,544.2,97.4,545.2L97.4,545.2z" />
                                                                                <path id="XMLID_165_" fill="#010101" d="M58.9,456c-0.1-1.2-0.3-2.3-0.4-3.5c0.7-0.1,1.5-0.2,2.2-0.3c-0.4,1.4,0.2,2.9,0.8,4.3
                                              c0.6,1.4,1.2,2.9,0.7,4.3c-0.5,1.4-2.6,2.1-3.5,0.9C58.4,459.7,58.5,457.8,58.9,456L58.9,456z" />
                                                                                <path id="XMLID_163_" fill="#010101" d="M59,444.6c-0.2-1.4,1.6-2.4,2.9-1.8c1.2,0.6,1.6,2.4,1,3.6c-0.6,1.3-2,2-3.3,2.3
                                              c-2,0.3-3.2-3.1-1.4-4.1L59,444.6z" />
                                                                                <path id="XMLID_162_" fill="#010101" d="M378.1,510.6c0.5-3.6,0-7.3-1.3-10.7c1.9,1.7,4.9,1.8,7,0.3c2-1.5,2.8-4.5,1.7-6.8
                                              c2.9,1,5.9,1.8,8.9,2.3c-6,3.6-12.5,8-13.6,14.8C379.9,510.6,379,510.6,378.1,510.6z" />
                                                                                <path id="XMLID_161_" fill="#010101" d="M66.5,229c0.7,1.9,1.4,3.8,2.1,5.7c-0.7,0.2-1.4,0.3-2.1,0.5c-1-2.7-2.1-5.4-3.1-8.1
                                              C64.3,226,65.9,227.6,66.5,229z" />
                                                                                <path id="XMLID_157_" fill="#010101" d="M373.1,216.3c1.2-2.9,3.1-5.5,5.5-7.5c0.8,0,1.6,0,2.4,0
                                              C379.5,212.4,377,216.7,373.1,216.3z" />
                                                                                <path id="XMLID_154_" fill="#010101" d="M63.1,219.6c-0.2,2.4-1.4,4.6-3.4,6c-1.2-0.9-0.8-2.8-0.3-4.2c1-2.8,2-5.6,3.1-8.3
                                              C64.3,214.7,64.6,217.8,63.1,219.6L63.1,219.6z" />
                                                                                <path id="XMLID_150_" fill="#010101" d="M91.9,552.9c2.1,0.3,4.5,0.9,5.6,2.7c1.1,1.8-0.7,5-2.7,4c-1.9-2.4-3.9-4.8-5.8-7.2
                                              C90,552.6,91,552.8,91.9,552.9z" />
                                                                                <path id="XMLID_148_" fill="#010101" d="M111.7,137.3c-3.4,0.7-6.9,0.6-10.2-0.3c-1.3-1.3-1.6-3.5-0.6-5c1.3,2,3.7,3.3,6,3.2
                                              c1,0,2.1-0.3,3.1-0.1C111.1,135.3,112,136.3,111.7,137.3L111.7,137.3z" />
                                                                                <path id="XMLID_129_" fill="#010101" d="M102.5,140.9c-0.4,1.9-1,3.7-1.8,5.4c-2.4,0.3-4.7,0.6-7.1,0.9c2.5-2.7,4.9-5.4,7.4-8
                                              c0.2-0.5,1.1-0.5,1.4,0C102.7,139.6,102.6,140.3,102.5,140.9z" />
                                                                                <path id="XMLID_119_" fill="#010101" d="M262.1,54.8c-4.1-0.8-8.2-2.1-12.1-3.7c-0.5-0.2-0.9-0.8-1-1.4
                                              C253.8,47.6,259.9,50,262.1,54.8z" />
                                                                                <path id="XMLID_117_" fill="#010101" d="M359.4,184.9c2.1-2.4,4.2-4.8,6.3-7.2c0.1,4.3-2.2,8.6-5.9,10.8c-0.8,0.3-1.6-0.6-1.6-1.4
                                              C358.3,186.2,358.9,185.5,359.4,184.9z" />
                                                                                <path id="XMLID_97_" fill="#010101" d="M77.7,167c1.7,0.3,3,1.6,4.3,2.8c2,1.9,4,3.8,6,5.8c-3.1,0.1-5.4,2.7-7.5,4.9
                                              c-2.1,2.2-5,4.4-8,3.6c-0.1-0.7-0.2-1.5-0.3-2.2c3.3-0.2,6.5-2.5,7.6-5.6C81,173.1,80.1,169.3,77.7,167z" />
                                                                                <path id="XMLID_67_" fill="#010101" d="M201.2,50.3c-6.4,2.4-13.2,3.8-20.1,4.1C186.6,49.8,194.4,48.2,201.2,50.3z" />
                                                                                <path id="XMLID_60_" fill="#010101" d="M391.5,280.2c-1.3-2.9-4.6-4.4-7.2-6.3c-2.6-1.9-5-5.3-3.6-8.2c0.5-1,1.4-1.8,2-2.7
                                              c1.1-1.5,1.7-3.3,1.6-5.1c1.3,1.2,1.6,3.3,1.3,5.1c-0.3,1.8-1,3.5-1.1,5.3c-0.2,1.8,0.3,3.9,1.9,4.8c1.5,1,4.1,0,4.1-1.8
                                              C391.7,274.1,392.1,277.3,391.5,280.2z" />
                                                                                <path id="XMLID_49_" fill="#010101" d="M70.8,209.5c1.2,2.9,2.5,5.9,3.7,8.8c0.3,0.7,0.6,1.4,0.5,2.1c-0.1,0.7-0.5,1.3-0.8,1.8
                                              c-1.2,1.8-2.4,3.6-3.6,5.4c-1.4-0.3-1.7-2.2-1.2-3.5c0.5-1.3,1.6-2.4,2-3.7c0.9-3.6-3.4-7.1-2.2-10.6
                                              C69.6,209.3,70.4,209.2,70.8,209.5z" />
                                                                                <path id="XMLID_48_" fill="#010101" d="M292.7,71.3c-0.8-0.7-1.6-2.1-0.7-2.6c4.8,1.5,9,4.8,11.6,9.1c-0.4,0.6-1.1,1-1.8,1.1
                                              C298.8,76.3,295.7,73.8,292.7,71.3z" />
                                                                                <path id="XMLID_46_" fill="#010101" d="M382.4,441.6c-0.7-0.5-1.3-1.3-1.4-2.1c3.8-1.8,5.5-6.9,3.7-10.6c1.3-0.9,2.4,1.3,3.6,2.3
                                              c1.7,1.6,4.4,0.7,6.3-0.4c2-1.2,4.1-2.6,6.3-2.1c-0.8,3-3.7,5.3-6.8,5.4c-2.8,0.1-5.1,3.1-4.5,5.8
                                              C387.5,438,383.5,438.9,382.4,441.6z" />
                                                                                <path id="XMLID_44_" fill="#010101" d="M366.5,164.1c-0.4,1.3-0.7,2.6-1.4,3.8c-2.4,4.5-8.6,6.6-13.2,4.3
                                              c2.9-3.2,9.5-1.5,11.4-5.4c0.4-0.8,0.5-1.7,1-2.4S366,163.5,366.5,164.1z" />
                                                                                <path id="XMLID_43_" fill="#010101" d="M392.5,251.6c-1.6,3-0.8,7.1,1.9,9.3c1.4,1.2,1.9,3.3,1.2,5c-0.8,1.7-2.8,2.7-4.6,2.3
                                              c1.3-2.6,1.3-5.9,0.1-8.6c-0.8-1.8-2.2-3.4-2.3-5.3C388.7,252.4,391,250.3,392.5,251.6z" />
                                                                                <path id="XMLID_39_" fill="#010101" d="M370.9,231.8c1.5-4.6,5.7-8.2,10.5-8.9c1.6-0.2,4,0.9,3.2,2.4
                                              C380.1,227.5,375.5,229.6,370.9,231.8z" />
                                                                                <path id="XMLID_35_" fill="#010101" d="M385,401c0.2-3.3-2-6.6-5.1-7.7c-0.9-0.3-2-0.5-2.8-1.1c-0.8-0.6-1.3-1.8-0.6-2.6
                                              c4.7-0.4,9.5,2.4,11.5,6.7c0.6,1.2,0.9,2.7,0.3,3.9C387.7,401.5,385.9,402,385,401z" />
                                                                                <path id="XMLID_66_" fill="#010101" d="M408.9,285.8c7.9-15.8,6-38.2-9.1-47.3c7.5-16.1,2.5-37.1-11.5-48.1
                                              c-2.6-15.9-11.2-30.8-23.7-41.1c-3.5-2.9-3.3-8.2-3.9-12.7c-0.3-2.2-1.3-4.7-2.7-6.4c0,0,0-0.1-0.1-0.1c-0.7-1.1-1.7-2-2.6-2.8
                                              c-1.4-2-3.1-4-5-5.3c-0.4-0.3-0.8-0.5-1.3-0.8c0.1,0,0.3,0,0.4,0c-0.4-0.2-0.8-0.3-1.2-0.5c-0.8-0.4-1.7-0.8-2.4-1.4
                                              c-1.1-0.7-1.9-1.1-2.9-1.1c-1.4-0.8-2.7-1.8-3.8-3c-2.7-3-3.9-7.8-1.4-11c4-5.3,0.2-13.6-5.8-16.5s-13.1-2.1-19.7-1.2
                                              c3.3-3.9,3.4-9.8,1.4-14.5c-2.1-4.7-6-8.3-10.2-11.2c-8.1-5.6-17.6-9.1-27.4-10c-2.4-1.7-4.3-3.7-6.5-5.4c-2.5-1.9-5.6-3-8.4-4.3
                                              c-0.1,0-0.1,0-0.2,0c-12.1-6.2-27.1-6.6-39.4-0.7c-4.2,2-9-0.1-13.5-1.3c-14.4-4-31,2.2-39.3,14.6c-15.1-3.5-32.1,5.4-37.9,19.8
                                              c-1.4,3.4-3.4,7.8-7,7.1c-6.8-1.2-13.3,4.4-15.5,11c-2.2,6.6-1,13.7,0.4,20.5c0.6,2.8-3.4,4-6.2,4.4c-13.6,2-24.2,16.2-22.3,29.8
                                              c0.4,2.5,0.9,5.6-1,7.2c-8,6.9-16.4,14.4-19.6,24.5c-1.8,5.7-1.1,12.4,1.7,17.5c0,0-0.1,0-0.1,0.1c-1,0.7-2.1,1.4-3.1,2
                                              c-0.4,0.2-0.7,0.5-1.1,0.7c-6.1,0.9-10.5,7.4-11.6,13.7c-1.2,6.9,0.3,14.1-0.4,21.1c-1,10.4-6.6,19.8-9.9,29.7
                                              c-3.3,9.9-3.8,22.3,3.8,29.5c-3.6,2.2-6.3,5.9-7.2,10c-0.2,0.2-0.2,0.4-0.3,0.6c-0.2,0.2-0.3,0.4-0.3,0.7c0,2.3,0,4.6,0.8,6.8
                                              c0.3,6.8,3.2,13.5,7.8,18.5c0.2,0.5,0.4,0.9,0.7,1.3c0,0,0,0,0,0c1.5,2.6,3.5,4.6,6.1,6.4c2,1.4,4,3.3,6.1,4.7
                                              c4.3,4.6,12.1,5.7,18,3c7-3.2,11.5-10.5,13.2-18.1s1-15.4,0.3-23.1c-0.4-4.3-0.7-8.5-1.1-12.8c1.8-2.6,3.1-5.5,4-8.5
                                              c0.3-0.7,0.6-1.3,0.8-2c0.4-1.5,0.6-3.2,1-4.7c0.2-0.7,0.3-1.3,0.3-2c3.4-9.7-9.3-22.2-2.6-30.3c8.7-10.4,12.1-25,9-38.2l2-1.8
                                              c0.9-0.3,1.7-0.8,2.4-1.6c1-1.2,2.3-2,3.3-3.3c0.6-0.8,1.1-1.6,1.5-2.4c0.5-0.5,1-1,1.5-1.6c0-0.1,0.1-0.1,0.1-0.2
                                              c3.6-3.1,4.9-9.4,4.8-14.6c-0.2-7-0.1-15.7,6.2-18.7c11.4-5.6,16.9-21,11.4-32.5c6.1-0.7,12.5-2.7,16.2-7.6
                                              c6.6-8.8,1.2-21.2-4.3-30.7c9.3,2.2,16.2,12.8,25.7,11.6c6.5-0.8,11.1-7.3,11.9-13.7s-1.1-13-3.1-19.2c8.3,4.9,11.6,17,21,19.4
                                              c6.8,1.8,13.9-2.8,17.4-8.9c3.5-6.1,4.2-13.3,4.9-20.3c5.4,3.6,7,10.6,9,16.7c2,6.1,6,12.9,12.4,13.3c4.8,0.4,9-3,12.5-6.3
                                              c5.5-5.4,10.6-11.3,14.9-17.7c3,5.6,1.5,12.3,1,18.6c-0.4,6.3,1.2,13.9,7.2,16.1c7.7,2.7,14.8-6,23-6.9c-3,7.9-7.4,16.3-4.6,24.2
                                              c2.5,7.1,10.3,11.1,17.8,11.1c-0.7,0.9-1.3,1.9-1.5,3c-0.4,1.8-0.1,3.8-0.1,5.6c0,0.1,0,0.3,0.1,0.4c-1,9.7,7,19.7,16,25
                                              c3.6,2.1,8,5.4,6.6,9.2c-2.5,6.8-1,14.8,3.5,20.4c0.3,2.7,2.6,5.2,4.3,7.2c1.5,1.8,3.2,3.4,5.2,4.5c0.5,1,1,2.1,1.5,3.1
                                              c-1.2,1.6-1.1,4.2-0.9,6c0.1,1.3,0.3,2.7,0.7,3.9c0.4,1.1,1.1,2,1.5,3.2c1.5,6.7,4,13.2,7.3,19.1c1.3,2.3,2.8,4.8,2.3,7.5
                                              c-2.5,14-1.1,28.8,4.1,42c1.6,4.1-0.5,8.6-2.4,12.6c-2.8,5.6-5.4,11.5-6.1,17.7c-0.7,6.2,0.7,13,5.2,17.4
                                              c5.3,5.3,13.3,6.2,20.7,6.7c3.7,0.2,7.4,0.4,10.9-0.7c8-2.5,12.5-10.9,16.1-18.5c4.2-8.8,8.1-20,1.9-27.5
                                              C405.4,293.1,407.3,289,408.9,285.8z M73.7,338.6c-5.9,4.3-13.9,3.3-21,1c-1.7-1.2-3.4-2.8-5-3.9c-3-2.1-5.4-4.3-6.9-7.7
                                              c-0.1-0.2-0.2-0.3-0.3-0.3c-0.3-0.7-0.5-1.5-0.8-2.2c-2.2-5.4-4.3-10.8-6.5-16.2c-0.1-0.2-0.2-0.3-0.3-0.5c-0.4-1.6-0.4-3.3-0.3-5
                                              c0.2-0.2,0.2-0.5,0.2-0.7c2.2-2.7,4.5-5.4,6.7-8.1c11.8-0.5,23.7-1,35.5-1.6c1.5-0.1,3.2-0.1,4.3,0.8c1.5,1.2,1.7,3.4,1.7,5.3
                                              c0,5.1,0.1,10.3,0.1,15.4C81.2,323.6,80.6,333.5,73.7,338.6z M84.1,260.4c0.5,4.1,0.4,8.7,2.4,12.1c0.2,2.1-0.8,4.8-1.3,6.7
                                              c-0.4,1.7-1.8,4.2-3,5.3c-0.1,0.1-0.1,0.1-0.1,0.2c-5.9,4.8-15.2,6.3-23.2,7c-8.3,0.7-18.8,0.2-22.4-7.3
                                              c-1.8-3.6-1.3-7.9-0.8-11.9c1.2-9.5,2.9-19.9,10.3-26c8.5,5.4,19.2,7.1,29,4.6C79.7,249.7,83.5,255.5,84.1,260.4z M93,214.7
                                              c-0.7,12.3-5.3,25.3-15.8,31.7c-10.5,6.4-27.2,2.5-30.3-9.4c-3.3-12.5,0.2-26.5,8.9-36.1c0.9-0.3,1.6-0.8,2.4-1.3
                                              c1.2-0.7,2.4-1.5,3.6-2.3c0.1,0,0.1-0.1,0.1-0.1c2.2,3.2,5.3,5.6,9.2,6.4c7.5,1.6,18-1.8,21.3,5.2C93.2,210.6,93.1,212.7,93,214.7
                                              z M102,194.9c-0.4,0.1-0.6,0.5-0.7,0.9c0,0,0,0,0,0.1c-0.7,0.7-1.3,1.4-2,2.1c-0.9,0.9-1.9,1.9-3,2.6c-0.5,0.3-1,0.4-1.5,0.6
                                              c-4.2-0.2-8.4-0.4-12.5-0.7c-6.7-0.3-14.3-1.1-18.5-6.4c-6.7-8.4,0-20.5,6.6-29c3.2-4,7.5-8.5,12.5-7.4
                                              c10.3,2.3,22.3,6.3,24.9,16.5C109.7,181.4,105.9,188.6,102,194.9z M123.9,148.8c-3.2,5.8-8,11.5-14.5,12.7
                                              c-4.4,0.8-8.9-0.6-13.1-2c-3-1-6.1-2-8.5-4c-5.1-4.1-6.5-11.6-4.7-17.8c1.8-6.3,6.4-11.4,11.5-15.5c1.3-1.1,2.7-2.1,4.2-2.8
                                              c5.1-2.4,11.8-1,15.5,3.2c2.1,2.4,5.7,2.8,8.3,4.5c3.3,2.2,5,6.4,4.9,10.4C127.4,141.5,125.8,145.3,123.9,148.8z M143,105
                                              c0.8,3,1.6,6,1.4,9.1s-1.6,6.2-4.1,7.9c-2.5,1.7-5.6,1.8-8.6,1.8c-4,0.1-8.1,0.1-11.6-1.5c-4-1.8-6.9-5.6-8.4-9.8
                                              c-1.5-4.1-1.7-8.6-1.6-13c0.2-4.3,0.8-9,3.8-12.2c4.7-5.2,13.5-4.5,19-0.1C138.3,91.4,141,98.3,143,105z M169.3,97.2
                                              c-3.9,2.5-9.2,1.3-13.1-1.1s-7.3-5.7-11.5-7.8c-4.5-2.2-10.4-3.4-12.3-8c-2.2-5.1,2.2-10.6,6.5-14.1c2.3-1.9,4.8-3.6,7.3-5.2
                                              c4.6-2.9,9.8-5.5,15.3-5.2s11,4.3,11.4,9.8c0.1,1.8-0.3,3.5-0.5,5.2c-0.4,4.6,1,9.2,1.4,13.9C174.3,89.4,173.2,94.7,169.3,97.2z
                                              M215.9,55.6c-0.9,3.8-1.7,7.6-2.6,11.4c-0.9,4-1.8,8.1-4,11.6c-2.2,3.5-5.8,6.4-9.9,6.4c-5.8,0.1-10.2-4.9-13.8-9.5
                                              c-4.6-5.9-9.2-12-11.4-19.2c-0.6-2-1-4.2-0.1-6.1c1-2.1,3.4-3.2,5.6-4c6.5-2.4,13.2-4.1,20-5c3.1-0.4,6.3-0.7,9.4,0.1
                                              c3,0.8,5.9,2.8,7,5.7C217.1,49.8,216.5,52.8,215.9,55.6z M253.2,78.2c-2.8,3.4-6.1,7.1-10.5,7.4c-7.2,0.6-11.7-7.5-14.3-14.3
                                              c-1.9-5-3.9-10.1-5.8-15.1c-1.4-3.6-2.7-7.7-0.9-11c2-3.9,7.2-4.9,11.6-5.1c9.6-0.4,19.3,0.9,28.5,3.6c2.6,1.2,5.4,2.4,7.4,4.3
                                              c1,1,2,1.8,3,2.6C266.5,60.3,260.2,69.5,253.2,78.2z M285.7,94.2c-4.4,1.9-10.3,3.5-13.3-0.2c-1.7-2-1.8-5-1.7-7.6l0.4-23.8
                                              c0.1-5.1,5.8-8.5,10.8-8.2c5,0.4,9.5,3.4,13.6,6.3c2.6,1.9,5.3,3.7,7.9,5.6c4.3,3,9,7.2,8.1,12.3c-0.8,4.4-5.5,6.9-9.7,8.6
                                              C296.5,89.6,291.1,91.9,285.7,94.2z M305.4,123.7c-2.5-0.8-4.9-2.2-6.6-4.2c-4-4.9-3-12.1-0.9-18c1.7-4.8,4.3-9.8,9-11.6
                                              c3.4-1.3,7.1-0.7,10.7-0.6c4,0.2,8-0.2,11.8,1.1c3.8,1.2,7.2,4.7,6.8,8.6c-0.8,7.5-4,14.8-9.7,19.8
                                              C320.7,123.7,312.5,126,305.4,123.7z M322.8,157.1c-6-5.6-10.1-13.2-11.6-21.2c0-1.1,0-2.1,0-3.2c0.1-1.8,0.7-2.9,1.8-4.2
                                              c0.2-0.2,0.2-0.4,0.2-0.6c8-0.9,15.2-5.7,21.2-11.1c1.9,1.1,3.9,2.1,6,2.8c3.1,1.8,6.6,3.6,9.3,5.9c0.7,0.6,1.2,1.4,1.9,2
                                              c0.2,0.2,0.4,0.3,0.6,0.5c0,0,0,0,0,0c0.7,0.5,1.4,1,2,1.5c0.4,0.6,0.8,1.2,1.1,1.8c0.2,0.3,0.5,0.5,0.8,0.5
                                              c3,4.4,3.6,10.5,1.6,15.5c-2.6,6.8-8.9,11.6-15.7,14.1c-3,1.1-6.1,1.7-9.3,1.3C329,162.1,325.6,159.8,322.8,157.1z M341.6,198.1
                                              c-1-1.1-2.5-2.8-3.5-4.5l-0.8-2.2c0-0.1,0-0.1,0-0.2c0-0.3-0.1-0.5-0.3-0.7l-1.3-3.8c-1.6-4.7-3.3-9.8-1.5-14.5
                                              c3.7-9.8,18.7-9.8,24.5-18.5c2.3-3.4,7.5-0.5,10.1,2.7c5.9,7.2,10.8,15.2,14.5,23.7c0.9,2,1.7,4.1,1.4,6.3c-0.5,4.3-5,6.8-9,8.6
                                              c-10.1,4.6-21.5,9.2-31.8,5.3C343.1,199.7,342.3,198.9,341.6,198.1z M347.3,212.8c-0.2-1.5-0.2-3.3,0.2-4.5
                                              c11.8-4.2,23.7-8.3,35.5-12.5c1.7-0.6,3.4-1.2,5.2-0.9c2.3,0.3,4.2,2.1,5.6,4c4.5,6.2,5.3,14.2,5.9,21.8
                                              c0.4,5.3,0.7,11.2-2.7,15.2c-2.3,2.8-5.9,4.1-9.4,5.1c-5.9,1.7-12,2.8-18.2,3.3c-3.1,0.2-6.5,0.2-8.8-1.9
                                              c-1.3-1.2-2.1-2.9-2.8-4.6C354.3,229.6,350.8,221.2,347.3,212.8z M360.8,269.5c-0.6-3.5-2-6.9-2.5-10.4s0.2-7.6,3-9.8
                                              c1.9-1.4,4.3-1.8,6.6-2c8.9-0.7,18.5,0.3,25.9-4.8c3-2,7.2-0.5,9.8,2.1c7.1,6.8,6.6,18.1,5.7,27.9c-0.7,7.5-2.3,16.3-9.1,19.5
                                              c-2.9,1.4-6.1,1.4-9.3,1.4c-3.8,0-7.6,0.1-11.4,0.1c-5.3,0-11.3-0.2-15-4.1C359.9,284.3,361.9,276.3,360.8,269.5z M402.2,323.4
                                              c-2.2,4.8-4.6,9.9-9,12.8c-5.7,3.8-13.2,3-20,1.9c-4-0.7-8.1-1.4-11.6-3.6s-6.2-5.9-5.8-10c0.6-7.6,2.2-15.1,4.8-22.3
                                              c0.9-2.4,2.1-5,4.5-6c1.7-0.7,3.6-0.3,5.4,0c9.6,1.7,19.4,1.4,28.9-0.6c1.3-0.3,2.7-0.6,4-0.3c2.4,0.7,3.6,3.4,4,5.9
                                              C408.6,308.9,405.3,316.4,402.2,323.4z" />
                                                                                <path id="XMLID_33_" fill="#010101" d="M79.4,509.8c0.8,0.4,0.3,1.7-0.6,1.9c-0.8,0.2-1.7-0.2-2.6-0.3c-3.9-0.5-6.7,4.6-10.6,4.6
                                              c0-1.1,0.7-2,1.3-2.8c2-2.6,4-5.1,6-7.7C73.4,508.4,76.5,510.5,79.4,509.8z" />
                                                                                <path id="XMLID_32_" fill="#010101" d="M64.9,501.7c0.4-2.9,0.9-5.8,1.3-8.7c0.2-1.2,0.5-2.6,1.7-3c2.3,3.5,6.6,5.5,10.8,5
                                              c-1.9,2.6-6,1.8-9,0.7C69.5,498.5,67.5,501.1,64.9,501.7z" />
                                                                                <path id="XMLID_30_" fill="#010101" d="M380.9,376.7c0.2-0.9,1.6-0.7,2.1,0.1s0.2,1.7,0.2,2.6c-0.3,4.6,4.5,8.7,9,7.8
                                              c-0.7,1.9-2.6,3.2-4.6,3.2C383.2,387.4,380.5,382,380.9,376.7z" />
                                                                                <path id="XMLID_25_" fill="#010101" d="M339.6,130.4c2.1,3.2,3.6,6.8,4.7,10.5c-4.2-1.5-9.2,2.8-8.3,7.2c-2-0.7-2.5-3.5-1.7-5.5
                                              c0.8-2,2.3-3.6,3.3-5.5c1-1.9,1.3-4.5-0.2-5.9C338.1,130.9,338.8,130.7,339.6,130.4z" />
                                                                                <path id="XMLID_21_" fill="#010101" d="M381.7,454.8c-1.1-0.5-0.7-2.4,0.4-3.1c1.1-0.7,2.4-0.7,3.5-1.3c3-1.5,3.3-5.5,3.2-8.8
                                              c1.3-0.3,2.3,1.4,2.2,2.8c0,1.4-0.5,2.9,0.2,4c0.8,1.4,2.7,1.5,4.2,2c1.5,0.5,3.1,2.2,2.1,3.5
                                              C392.5,451.9,386.5,452.2,381.7,454.8z" />
                                                                                <path id="XMLID_20_" fill="#010101" d="M386.8,329.1c0.4-5-2.7-10.1-7.4-12.1c0.1-1.4,2.3-1,3.6-0.6c2.7,0.9,5.8,0.1,7.7-2
                                              c1.2,0.2,1.1,2.1,0.3,3c-0.8,0.9-2.1,1.4-2.7,2.5c-0.9,1.7,0.4,3.6,1,5.4S388.4,330,386.8,329.1z" />
                                                                                <path id="XMLID_19_" fill="#010101" d="M113.4,601.5c-0.9-0.8-0.7-2.2-0.4-3.3c0.4-2,0.8-4,1.2-5.9c0.9-4.5,3.8-8.6,7.7-10.9
                                              c1,1.4,0.4,3.4-0.7,4.8s-2.5,2.5-3.3,4c-1,1.9-1,4.1-1.3,6.2C116.3,598.5,115.4,600.8,113.4,601.5z" />
                                                                                <path id="XMLID_18_" fill="#010101" d="M388.3,481.6c-0.7,3-1.5,6.2-3.5,8.5c-2.1,2.3-5.9,3.4-8.4,1.5c5.6-2.1,9.5-8.1,9.2-14.1
                                              c0.7-0.8,2.2-0.3,2.7,0.7C388.8,479.3,388.6,480.5,388.3,481.6z" />
                                                                                <path id="XMLID_15_" fill="#010101" d="M155,66.8c1.3-0.8,3.7-1,3.7,0.5c-5.6,3.5-11.1,7-16.8,10.4c-1.6-1,0.1-3.4,1.7-4.3
                                              C147.4,71.2,151.2,69,155,66.8z" />
                                                                                <path id="XMLID_13_" fill="#010101" d="M56,411.5c-1.4-1.5,0.9-3.6,2.6-4.9c3.5-2.6,5.3-7.3,4.4-11.6c0.9-1,2.8-0.5,3.4,0.7
                                              c0.6,1.2,0.4,2.7-0.1,4C64.7,404.8,60.8,409,56,411.5z" />
                                                                                <path id="XMLID_7_" fill="#010101" d="M55,311.6c-1.1,2.8-3.7,4.9-6.7,5.5c2.3-2.7,3.9-6.1,4.5-9.7c2.3,0.8,4.7,1.6,7,2.4
                                              c0.9,0.3,2.1,1.3,1.4,2c-1.2,1.4-0.2,3.6,0.4,5.3c0.7,1.8,0.4,4.5-1.5,4.6C59.7,317.9,57.8,314.3,55,311.6z" />
                                                                                <path id="XMLID_6_" fill="#010101" d="M47.9,271.6c1.3-4.4,3-8.8,4.9-13c1.6,0.1,2.4,2.2,2,3.7c-0.4,1.6-1.5,2.9-2,4.4
                                              c-0.6,1.5-0.3,3.6,1.1,4.2c2.7,1.1,4.3,4.2,3.8,7.1c-1,1-2.2-0.9-2.6-2.2C54.3,272.8,50.8,270.2,47.9,271.6z" />
                                                                            </g>
                                                                        </g>


                                                                    </svg>

                                                                </div>
                                                                <input type="hidden" name="redirect_tab" value="odontogram">
                                                                <input type="hidden" name="patient_id" value="<?php echo $patient->id; ?>"></input>
                                                                <div style=" float:left; width:50%; margin-top:80px; ">
                                                                    <label style="font-size: 20px;"><?php echo lang('description'); ?></label>
                                                                    <textarea style=" width:100%; height:150px; padding:10px; font-size:1.2em; resize:none;" name="description" <?php if (empty($odontogram->description)) { ?> placeholder="Enter Description..." <?php } ?>><?php
                                                                                                                                                                                                                                                                                if (!empty($odontogram->description)) {
                                                                                                                                                                                                                                                                                    echo $odontogram->description;
                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                ?></textarea>

                                                                    <input type="submit" class="btn btn-info btn-md" style="color: #fff; background-color: #39B27C !important;" value="<?php echo lang('submit'); ?>">
                                                                </div>
                                                                <div style="clear:both"></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                            <div id="vital" class="tab-pane <?php if ($redirect_tab == 'vital') {
                                                                                echo 'active';
                                                                            } ?>">
                                                <div class="">

                                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                        <div class=" no-print">
                                                            <a class="btn btn-sm btn-success btn_width" data-toggle="modal" href="#myModalVital">
                                                                <i class="fa fa-plus-circle"> </i> <?php echo lang('add_recent'); ?> <?php echo lang('vital_sign'); ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="adv-table editable-table ">


                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr class="header_table">
                                                                    <th><?php echo lang('date_time'); ?></th>
                                                                    <th><?php echo lang('heart_rate'); ?>(bpm)</th>
                                                                    <th><?php echo lang('blood_pressure'); ?>(mmHg)</th>

                                                                    <th><?php echo lang('temp'); ?>(&deg;C)</th>
                                                                    <th><?php echo lang('oxygen_saturation'); ?>(%)</th>
                                                                    <th><?php echo lang('respiratory_rate'); ?>(bpm)</th>
                                                                    <th><?php echo lang('bmi_weight'); ?>(Kg)</th>
                                                                    <th><?php echo lang('bmi_height'); ?>(Cm)</th>
                                                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                        <th class="no-print"><?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($vital_signs as $vital_sign) { ?>
                                                                    <tr class="">

                                                                        <td><?php echo $vital_sign->add_date_time; ?></td>
                                                                        <td><?php echo $vital_sign->heart_rate; ?></td>
                                                                        <td><?php echo $vital_sign->systolic_blood_pressure; ?>/<?php echo $vital_sign->diastolic_blood_pressure; ?></td>

                                                                        <td><?php echo $vital_sign->temperature; ?></td>
                                                                        <td><?php echo $vital_sign->oxygen_saturation; ?></td>
                                                                        <td><?php echo $vital_sign->respiratory_rate; ?></td>
                                                                        <td><?php echo $vital_sign->bmi_weight; ?></td>
                                                                        <td><?php echo $vital_sign->bmi_height; ?></td>
                                                                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                            <td class="no-print vitalSignTable">
                                                                                <button type="button" class="btn btn-sm btn-primary editbutton mb-2 btn_width" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $vital_sign->id; ?>"><i class="fa fa-edit"></i> </button>
                                                                                <a class="btn btn-sm btn-danger delete_button btn_width" title="<?php echo lang('delete'); ?>" href="patient/deleteVitalSign?id=<?php echo $vital_sign->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="home" class="tab-pane <?php if ($redirect_tab == 'case') {
                                                                                echo 'active';
                                                                            } ?>">
                                                <div class="">

                                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                        <div class=" no-print">
                                                            <a class="btn btn-sm btn-success btn_width" data-toggle="modal" href="#myModal">
                                                                <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="adv-table editable-table ">


                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('date'); ?></th>
                                                                    <th><?php echo lang('title'); ?></th>
                                                                    <th><?php echo lang('description'); ?></th>
                                                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                        <th class="no-print"><?php echo lang('options'); ?></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($medical_histories as $medical_history) { ?>
                                                                    <tr class="">

                                                                        <td><?php echo date('d-m-Y', $medical_history->date); ?></td>
                                                                        <td><?php echo $medical_history->title; ?></td>
                                                                        <td><?php echo $medical_history->description; ?></td>
                                                                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                            <td class="no-print medical_history_button">
                                                                                <button type="button" class="btn btn-sm btn-primary editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $medical_history->id; ?>"><i class="fa fa-edit"></i> </button>
                                                                                <a class="btn btn-sm btn-danger delete_button" title="<?php echo lang('delete'); ?>" href="patient/deleteCaseHistory?id=<?php echo $medical_history->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="about" class="tab-pane">
                                                <div class="">
                                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                        <div class=" no-print">
                                                            <a class="btn btn-info btn_width btn-sm" href="prescription/addPrescriptionView">
                                                                <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>

                                                                    <th><?php echo lang('date'); ?></th>
                                                                    <th><?php echo lang('doctor'); ?></th>
                                                                    <th><?php echo lang('medicine'); ?></th>
                                                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($prescriptions as $prescription) { ?>
                                                                    <tr class="">
                                                                        <td><?php echo date('m/d/Y', $prescription->date); ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
                                                                            if (!empty($doctor_details)) {
                                                                                $prescription_doctor = $doctor_details->name;
                                                                            } else {
                                                                                $prescription_doctor = '';
                                                                            }
                                                                            echo $prescription_doctor;
                                                                            ?>

                                                                        </td>
                                                                        <td>

                                                                            <?php
                                                                            if (!empty($prescription->medicine)) {
                                                                                $medicine = explode('###', $prescription->medicine);

                                                                                foreach ($medicine as $key => $value) {
                                                                                    $medicine_id = explode('***', $value);
                                                                                    $medicine_details = $this->medicine_model->getMedicineById($medicine_id[0]);
                                                                                    if (!empty($medicine_details)) {
                                                                                        $medicine_name_with_dosage = $medicine_details->name . ' -' . $medicine_id[1];
                                                                                        $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                                                                                        rtrim($medicine_name_with_dosage, ',');
                                                                                        echo '<p>' . $medicine_name_with_dosage . '</p>';
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>


                                                                        </td>
                                                                        <td class="no-print prescription_button">
                                                                            <a class="btn btn-sm btn-primary" href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-eye"> <?php echo lang('view'); ?> </i></a>
                                                                            <?php
                                                                            if ($this->ion_auth->in_group('Doctor')) {
                                                                                $current_user = $this->ion_auth->get_user_id();
                                                                                $doctor_table_id = $this->doctor_model->getDoctorByIonUserId($current_user)->id;
                                                                                if ($prescription->doctor == $doctor_table_id) {
                                                                            ?>
                                                                                    <a type="button" class="btn btn-sm btn-primary" data-toggle="modal" href="prescription/editPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></a>
                                                                                    <a class="btn btn-sm btn-danger delete_button" href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> <?php echo lang('delete'); ?></a>
                                                                            <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <a class="btn btn-sm btn-secondary" title="<?php echo lang('print'); ?>" href="prescription/viewPrescriptionPrint?id=<?php echo $prescription->id; ?>" target="_blank"> <i class="fa fa-print"></i> <?php echo lang('print'); ?></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="lab" class="tab-pane">
                                                <div class="">
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('id'); ?></th>
                                                                    <th><?php echo lang('date'); ?></th>
                                                                    <th><?php echo lang('doctor'); ?></th>
                                                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($labs as $lab) {
                                                                    if ($lab->status == 'completed') {
                                                                ?>
                                                                        <tr class="">
                                                                            <td><?php echo $lab->id; ?></td>
                                                                            <td><?php echo date('m/d/Y', $lab->date); ?></td>
                                                                            <td>
                                                                                <?php
                                                                                $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
                                                                                if (!empty($doctor_details)) {
                                                                                    $lab_doctor = $doctor_details->name;
                                                                                } else {
                                                                                    $lab_doctor = '';
                                                                                }
                                                                                echo $lab_doctor;
                                                                                ?>
                                                                            </td>
                                                                            <td class="no-print">
                                                                                <a class="btn btn-sm btn-primary" href="lab/viewReport?id=<?php echo $lab->id; ?>"><i class="fa fa-eye"> <?php echo lang('report'); ?> </i></a>
                                                                            </td>
                                                                        </tr>
                                                                <?php }
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>



                                            <div id="profile" class="tab-pane <?php if ($redirect_tab == 'files') {
                                                                                    echo 'active';
                                                                                } ?>">
                                                <div class="">
                                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <div class="btn-group float-left">
                                                                    <a class="btn btn-sm btn-success btn_width" data-toggle="modal" href="#myModal1">
                                                                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_file'); ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class=" add_folder_css">
                                                                <div class="btn-group float-right">
                                                                    <a class="btn btn-sm btn-success btn_width" data-toggle="modal" href="#myModalf">
                                                                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_folder'); ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="adv-table editable-table ">
                                                        <div class="col-md-12">
                                                            <?php
                                                            foreach ($patient_materials as $patient_material) {
                                                                if ($patient_material->folder == '') {
                                                            ?>
                                                                    <div class="card col-md-3 patient_material_class1">
                                                                        <div class="col-md-5 float-left">
                                                                            <div class="post-info">
                                                                                <a class="example-image-link" href="<?php echo $patient_material->url; ?>" data-lightbox="example-1">
                                                                                    <img class="example-image" src="<?php echo $patient_material->url; ?>" alt="image-1" height="90" width="90" /></a>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-7 float-right patient_material_url">
                                                                            <div class="post-info patient_material_title">
                                                                                <?php
                                                                                if (!empty($patient_material->title)) {
                                                                                    echo $patient_material->title;
                                                                                }
                                                                                ?>

                                                                            </div>
                                                                            <div class="post-info">
                                                                                <a class="btn btn-blue btn-sm btn_width" href="<?php echo $patient_material->url; ?>" download><i class="fa fa-download"></i> </a>
                                                                                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                                    <a class="btn btn-sm btn-danger delete_button " title="<?php echo lang('delete'); ?>" href="patient/deletePatientMaterial?id=<?php echo $patient_material->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i> </a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                            <?php foreach ($folders as $folder) {
                                                            ?>
                                                                <div class="card col-md-3 patient_material_class1">
                                                                    <div class="col-md-6 float-left">


                                                                        <a href="patient/medicalHistoryByFolder?id=<?php echo $folder->id; ?>">
                                                                            <div class="post-info">

                                                                                <img class="example-image" src="uploads/folder1.png" alt="image-1" height="100" width="100" />

                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-6 float-right">
                                                                        <div class="post-info patient_material_title">
                                                                            <?php
                                                                            if (!empty($folder->folder_name)) {
                                                                                echo $folder->folder_name;
                                                                            }
                                                                            ?>

                                                                        </div>




                                                                        <div class="btn-group">
                                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                                <span class="">Action</span>

                                                                            </button>
                                                                            <ul class="dropdown-menu folder_div" role="menu">
                                                                                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                                    <li> <a type="" class="edittbutton" data-toggle="modal" data-id="<?php echo $folder->id; ?>"><?php echo lang('edit'); ?></a></li>
                                                                                    <li><a class="" href="patient/deleteFolder?id=<?php echo $folder->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><?php echo lang('delete'); ?></a></li>
                                                                                    <li><a class="uploadbutton" data-toggle="modal" data-id="<?php echo $folder->id; ?>"> <?php echo lang('upload_file'); ?> </a></li>
                                                                                <?php } ?>
                                                                                <li><a class="" href="patient/medicalHistoryByFolder?id=<?php echo $folder->id; ?>"><?php echo lang('view_files'); ?></a></li>
                                                                            </ul>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="contact" class="tab-pane">
                                                <div class="">
                                                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                        <div class=" no-print">
                                                            <a class="btn btn-sm btn-success btn_width" data-toggle="modal" href="#myModa3">
                                                                <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="adv-table editable-table ">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo lang('bed_id'); ?></th>
                                                                    <th><?php echo lang('alloted_time'); ?></th>
                                                                    <th><?php echo lang('discharge_time'); ?></th>
                                                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                        <th><?php echo lang('view_more'); ?></th>
                                                                    <?php } else { ?>
                                                                        <th></th>
                                                                    <?php } ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>



                                                                <?php foreach ($beds as $bed) {


                                                                    $bed_a_time = explode(' - ', $bed->a_time);
                                                                    $bed_a_time[0] = date('d-m-Y', strtotime($bed_a_time[0]));


                                                                    if ($this->settings->time_format == 24) {

                                                                        $bed_a_time[1] = $this->settings_model->convert_to_24h($bed_a_time[1]);
                                                                        $bed->a_time = $bed_a_time[0] . ' - ' . $bed_a_time[1];

                                                                        $bed_d_time = explode(' - ', $bed->d_time);
                                                                        $bed_d_time[0] = date('d-m-Y', strtotime($bed_d_time[0]));
                                                                        $bed_d_time[1] = $this->settings_model->convert_to_24h($bed_d_time[1]);
                                                                        $bed->d_time = $bed_d_time[0] . ' - ' . $bed_d_time[1];
                                                                    }

                                                                    if (empty($bed->d_time)) {
                                                                        $bed->d_time = '';
                                                                    }


                                                                ?>
                                                                    <tr class="">
                                                                        <td><?php echo $bed->bed_id; ?></td>
                                                                        <td><?php echo $bed->a_time; ?></td>
                                                                        <td><?php echo $bed->d_time; ?></td>
                                                                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                            <td> <a class="btn btn-primary btn-sm btn_width" href="bed/bedAllotmentDetails?id=<?php echo $bed->id; ?>"> <?php echo lang('details'); ?></a>
                                                                                <?php if (!empty($bed->d_time)) { ?>
                                                                                    <a class="btn btn-secondary btn-sm btn_width" href="bed/dischargeReport?id=<?php echo $bed->id; ?>"> <?php echo lang('discharge_report'); ?></a>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <?php } else {
                                                                            if (!empty($bed->d_time)) { ?>
                                                                                <a class="btn btn-secondary btn-sm btn_width" href="bed/dischargeReport?id=<?php echo $bed->id; ?>"> <?php echo lang('discharge_report'); ?></a>
                                                                            <?php } ?>
                                                                        <?php    } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="timeline" class="tab-pane">
                                                <div class="">
                                                    <div class="">
                                                        <section class="card ">
                                                            <header class="card-header">
                                                                <?php echo lang('timeline'); ?>
                                                            </header>


                                                            <?php
                                                            if (!empty($timeline)) {
                                                                krsort($timeline);
                                                                foreach ($timeline as $key => $value) {
                                                                    echo $value;
                                                                }
                                                            }
                                                            ?>

                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </section>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>






<!--main content end-->
<!--footer start-->




<!-- Add Folder Modal-->
<div class="modal fade" id="myModalf" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('add'); ?> <?php echo lang('folder'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addNewFolder" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('name'); ?> &ast;</label>
                        <input type="text" class="form-control" name="folder_name" placeholder="" required="">
                    </div>
                    <input type="hidden" name="redirect_tab" value="files">
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="myModalfe" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('edit'); ?> <?php echo lang('folder'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" id="editFolderForm" action="patient/addNewFolder" class="clearfix" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('name'); ?> &ast;</label>
                        <input type="text" class="form-control" name="folder_name" placeholder="" required="">
                    </div>
                    <input type="hidden" name="redirect_tab" value="files">
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value='<?php echo $folder->id; ?>'>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- Add Vital Sign Modal-->
<div class="modal fade" id="myModalVital" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('add'); ?> <?php echo lang('vital_sign'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addNewVitalSign" class="clearfix row" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('heart_rate'); ?>(bpm) </label>
                        <input min="1" type="number" class="form-control" name="heart_rate" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('systolic_blood_pressure'); ?>(mmHg) </label>
                        <input min="1" type="number" class="form-control" name="systolic_blood_pressure" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('diastolic_blood_pressure'); ?>(mmHg) </label>
                        <input min="1" type="number" class="form-control" name="diastolic_blood_pressure" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('temperature'); ?>(&deg;C) </label>
                        <input min="1" type="number" class="form-control" name="temperature" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('oxygen_saturation'); ?>(%) </label>
                        <input min="1" type="number" class="form-control" name="oxygen_saturation" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('respiratory_rate'); ?>(bpm) </label>
                        <input min="1" type="number" class="form-control" name="respiratory_rate" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('bmi_weight'); ?>(Kg) </label>
                        <input min="1" step="0.01" type="number" class="form-control" name="bmi_weight" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('bmi_height'); ?>(Cm) </label>
                        <input min="1" type="number" step="0.01" class="form-control" name="bmi_height" placeholder="">
                    </div>
                    <input type="hidden" name="redirect_tab" value="vital">
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- Edit Vital Sign Modal-->
<div class="modal fade" id="myModalVitalEdit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('edit'); ?> <?php echo lang('vital_sign'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" id="editVitalSign" action="patient/addNewVitalSign" class="clearfix row" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('heart_rate'); ?>(bpm)&ast; </label>
                        <input min="1" type="number" class="form-control" name="heart_rate" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('systolic_blood_pressure'); ?>(mmHg)&ast; </label>
                        <input min="1" type="number" class="form-control" name="systolic_blood_pressure" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('diastolic_blood_pressure'); ?>(mmHg)&ast; </label>
                        <input min="1" type="number" class="form-control" name="diastolic_blood_pressure" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('temperature'); ?>(&deg;C)&ast; </label>
                        <input min="1" type="number" class="form-control" name="temperature" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('oxygen_saturation'); ?>(%)&ast; </label>
                        <input min="1" type="number" class="form-control" name="oxygen_saturation" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('respiratory_rate'); ?>(bpm)&ast; </label>
                        <input min="1" type="number" class="form-control" name="respiratory_rate" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('bmi_weight'); ?>(Kg)&ast; </label>
                        <input min="1" step="0.01" type="number" class="form-control" name="bmi_weight" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> <?php echo lang('bmi_height'); ?>(Cm)&ast; </label>
                        <input min="1" type="number" step="0.01" class="form-control" name="bmi_height" placeholder="" required="">
                    </div>
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="redirect_tab" value="vital">
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add File Modal-->
<div class="modal fade" id="myModal1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('add'); ?> <?php echo lang('files'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addPatientMaterial" class="clearfix row" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('title'); ?>&ast; </label>
                        <input type="text" class="form-control" name="title" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('file'); ?> &ast;</label>
                        <input type="file" name="img_url" required="">
                    </div>
                    <input type="hidden" name="redirect_tab" value="files">
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="myModalff" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('add'); ?> <?php echo lang('files'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" id="uploadFileForm" action="patient/addPatientMaterial" class="clearfix" method="post" enctype="multipart/form-data">


                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('title'); ?> &ast;</label>
                        <input type="text" class="form-control" name="title" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('file'); ?> &ast;</label>
                        <input type="file" name="img_url" required="">
                    </div>
                    <input type="hidden" name="redirect_tab" value="files">
                    <input type="hidden" name="hidden_folder_name" value="<?php echo $folder->folder_name; ?>" />
                    <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="folder" value='<?php echo $folder->id; ?>'>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->


<!-- Add Case Modal-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('add_case'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addMedicalHistory" class="clearfix row" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?> &ast;</label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" value='' placeholder="" autocomplete="off" required="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('title'); ?> &ast;</label>
                        <input type="text" class="form-control form-control-inline input-medium" name="title" value='' placeholder="" required="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class=""><?php echo lang('description'); ?></label>
                        <div class="">
                            <textarea class="ckeditor form-control" name="description" id="editor1" value="" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="redirect_tab" value="case">
                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info submit_button float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('edit_case'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" id="medical_historyEditForm" class="clearfix row" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?> &ast;</label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" value='' placeholder="" readonly="" required="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('title'); ?> &ast;</label>
                        <input type="text" class="form-control form-control-inline input-medium" name="title" value='' placeholder="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label class=""><?php echo lang('description'); ?> &ast;</label>
                        <div class="">
                            <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="redirect_tab" value="case">
                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info submit_button float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>


<!-- Add Appointment Modal-->
<div class="modal fade" id="addAppointmentModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"">
        <div class=" modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> <?php echo lang('add_appointment'); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <form role="form" action="appointment/addNew" id="addAppointmentForm" class="form-row" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> &#42;</label>
                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                        <select class="form-control m-bot15 js-example-basic-single pos_select" id="pos_select" name="patient" value='' required="">
                            <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                        </select>
                    <?php } else {
                        $user = $this->ion_auth->get_user_id();
                        $patients = $this->db->get_where('patient', array('ion_user_id' => $user))->row();
                    ?>
                        <select class="form-control js-example-basic-single pos_select" id="pos_select" name="patient" value='' required>
                            <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?></option>
                        </select>
                    <?php } ?>
                </div>

                <div class="form-group col-md-4 doctor_div">
                    <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> &#42;</label>
                    <select class="form-control m-bot15" id="adoctors" name="doctor" value='' required="">

                    </select>
                </div>


                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1"> <?php echo lang('date'); ?> &#42;</label>
                    <input type="text" class="form-control default-date-picker" id="date" required="" name="date" value='' placeholder="" onkeypress="return false;" autocomplete="off">
                </div>

                <div class="form-group col-md-6 aslots">
                    <label class=""><?php echo lang('available_slots'); ?></label>
                    <select class="form-control m-bot15" name="time_slot" id="aslots" value=''>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                    <select class="form-control m-bot15" name="status" value=''>

                        <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                            <option value="Pending Confirmation" <?php ?>> <?php echo lang('pending_confirmation'); ?> </option>
                            <option value="Confirmed" <?php ?>> <?php echo lang('confirmed'); ?> </option>
                            <option value="Treated" <?php
                                                    ?>> <?php echo lang('treated'); ?> </option>
                            <option value="Cancelled" <?php ?>> <?php echo lang('cancelled'); ?> </option>
                        <?php } else { ?>
                            <option value="Requested" <?php ?>> <?php echo lang('requested'); ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6 status_paid_hidden_section">

                    <label class=""><?php echo lang('visit'); ?> <?php echo lang('description'); ?></label>

                    <select class="form-control m-bot15" name="visit_description" id="visit_description" value='' required>

                    </select>

                </div>
                <input type="hidden" name="redirectlink" value="med_his">
                <!-- <div class="col-md-8 card">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div> -->

                <!-- 


                    <div class="col-md-5 card">
                        <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                    </div> -->

                <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>

                <input type="hidden" name="request" value='<?php
                                                            if ($this->ion_auth->in_group(array('Patient'))) {
                                                                echo 'Yes';
                                                            }
                                                            ?>'>
                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('visit'); ?> <?php echo lang('charges'); ?></label>
                        <input type="number" class="form-control" name="visit_charges" id="visit_charges" value='' placeholder="" readonly="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('discount'); ?></label>
                        <input type="number" class="form-control" name="discount" id="discount" value='0' placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('grand_total'); ?></label>
                        <input type="number" class="form-control" name="grand_total" id="grand_total" value='0' placeholder="" readonly="">
                    </div>
                <?php } else { ?>
                    <div class="form-group col-md-8">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('visit'); ?> <?php echo lang('charges'); ?></label>
                        <input type="number" class="form-control" name="visit_charges" id="visit_charges" value='' placeholder="" readonly="">
                    </div>


                    <input type="hidden" class="form-control" name="discount" id="discount" value='0' placeholder="">

                    <input type="hidden" class="form-control" name="grand_total" id="grand_total" value='0' placeholder="" readonly="">

                <?php } ?>
                <?php if (!$this->ion_auth->in_group(array('Nurse', 'Doctor'))) { ?>
                    <div class="form-group col-md-12">
                        <input type="checkbox" id="pay_now_appointment" name="pay_now_appointment" value="pay_now_appointment">
                        <label for=""> <?php echo lang('pay_now'); ?></label><br>
                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                            <span style="color:red;"><?php echo lang('if_pay_now_checked_please_select_status_to_confirmed') ?></span>
                        <?php } ?>
                    </div>

                    <div class="payment_label col-md-12 d-none deposit_type" style="text-align: left !important ;margin: 0% !important ;">
                        <label for="exampleInputEmail1"><?php echo lang('deposit_type'); ?></label>

                        <div class="">
                            <select class="form-control m-bot15 js-example-basic-single selecttype" id="selecttype" name="deposit_type" value=''>
                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Patient'))) { ?>
                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                        <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                                        <option value="0"> <?php echo lang('select'); ?> </option>

                                    <?php } ?>

                                    <option value="Card"> <?php echo lang('card'); ?> </option>
                                <?php } ?>

                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <?php
                        $payment_gateway = $settings->payment_gateway;
                        ?>



                        <div class="cardPayment">

                            <hr>
                            <?php if ($payment_gateway != 'Paymob') { ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                                    <div class="payment pad_bot">
                                        <img src="uploads/card.png" width="100%">
                                    </div>
                                </div>
                            <?php }
                            ?>

                            <?php
                            if ($payment_gateway == 'PayPal') {
                            ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
                                    <select class="form-control m-bot15" name="card_type" value=''>

                                        <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>
                                        <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                        <option value="American Express"> <?php echo lang('american_express'); ?> </option>
                                    </select>
                                </div>
                            <?php } ?>
                            <?php if ($payment_gateway == '2Checkout' || $payment_gateway == 'PayPal') {
                            ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                    <input type="text" id="cardholder" class="form-control pay_in" name="cardholder" value='' placeholder="">
                                </div>
                            <?php } ?>
                            <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                    <input type="text" id="card" class="form-control pay_in" name="card_number" value='' placeholder="">
                                </div>



                                <div class="form-group col-md-8 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                    <input type="text" class="form-control pay_in" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="">
                                </div>
                                <div class="form-group col-md-4 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('cvv'); ?> </label>
                                    <input type="text" class="form-control pay_in" id="cvv" maxlength="3" name="cvv" value='' placeholder="">
                                </div>
                            <?php
                            }
                            ?>
                        </div>


                    </div>
                    <div class="btn-block">
                        <div class="">
                            <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                            <div class="form-group cashsubmit payment right-six">
                                <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right"> <?php echo lang('submit'); ?></button>
                            </div>
                            <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                            <div class="form-group cardsubmit right-six col-md-12 d-none">
                                <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary btn-block float-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                                            ?>onClick="stripePay(event);" <?php }
                                                                                                                                                            ?> <?php if ($settings->payment_gateway == '2Checkout' && $twocheckout->status == 'live') {
                                                                                                                                                                ?>onClick="twoCheckoutPay(event);" <?php }
                                                                                                                                                                                                    ?>> <?php echo lang('submit'); ?></button>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group  payment float-right right-six col-md-12">
                        <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                <?php } ?>

            </form>

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editAppointmentModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class=" modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> <?php echo lang('edit_appointment'); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <form role="form" id="editAppointmentForm" class="clearfix row" action="appointment/addNew" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> &#42;</label>
                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                        <select class="form-control m-bot15 js-example-basic-single pos_select patient" name="patient" value='' required="">
                            <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                        </select>
                    <?php } else {
                        $user = $this->ion_auth->get_user_id();
                        $patients = $this->db->get_where('patient', array('ion_user_id' => $user))->row();
                    ?>
                        <select class="form-control js-example-basic-single" id="" name="patient" value='' required>
                            <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> </option>
                        </select>
                    <?php } ?>
                </div>

                <div class="form-group col-md-4 doctor_div1">
                    <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> &#42;</label>
                    <select class="form-control m-bot15 doctor" id="adoctors1" name="doctor" value='' required="">

                    </select>
                </div>


                <div class="form-group  col-md-4">
                    <label for="exampleInputEmail1"> <?php echo lang('date'); ?> &#42;</label>
                    <input type="text" class="form-control default-date-picker" id="date1" required="" name="date" value='' placeholder="" onkeypress="return false;" readonly>
                </div>

                <div class="form-group  col-md-12 status_paid_hidden_section">

                    <label class=""><?php echo lang('visit'); ?> <?php echo lang('description'); ?> &#42;</label>

                    <select class="form-control m-bot15" name="visit_description" id="visit_description1" value='' required>

                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label class=""><?php echo lang('available_slots'); ?></label>
                    <select class="form-control m-bot15" name="time_slot" id="aslots1" value=''>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                    <select class="form-control m-bot15" name="status" value=''>
                        <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                            <option value="Pending Confirmation" <?php ?>> <?php echo lang('pending_confirmation'); ?> </option>
                            <option value="Confirmed" <?php
                                                        ?>> <?php echo lang('confirmed'); ?> </option>
                            <option value="Treated" <?php
                                                    ?>> <?php echo lang('treated'); ?> </option>
                            <option value="Cancelled" <?php ?>> <?php echo lang('cancelled'); ?> </option>
                        <?php } else { ?>
                            <option value="Requested" <?php ?>> <?php echo lang('requested'); ?> </option>
                        <?php } ?>
                    </select>
                </div>





                <input type="hidden" name="redirectlink" value="med_his">

                <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>
                <input type="hidden" name="id" id="appointment_id" value=''>

                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-4 d-none consultant_fee_div">
                        <label for="exampleInputEmail1"><?php echo lang('visit'); ?> <?php echo lang('charges'); ?></label>
                        <input type="number" class="form-control" name="visit_charges" id="visit_charges1" value='' placeholder="" readonly="">
                    </div>
                    <div class="form-group col-md-4 d-none consultant_fee_div">
                        <label for="exampleInputEmail1"><?php echo lang('discount'); ?></label>
                        <input type="number" class="form-control" name="discount" id="discount1" value='0' placeholder="">
                    </div>
                    <div class="form-group col-md-4 d-none consultant_fee_div">
                        <label for="exampleInputEmail1"><?php echo lang('grand_total'); ?></label>
                        <input type="number" class="form-control" name="grand_total" id="grand_total1" value='0' placeholder="" readonly="">
                    </div>
                <?php } else { ?>
                    <div class="form-group col-md-8">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-4 d-none consultant_fee_div">
                        <label for="exampleInputEmail1"><?php echo lang('visit'); ?> <?php echo lang('charges'); ?></label>
                        <input type="number" class="form-control" name="visit_charges" id="visit_charges1" value='' placeholder="" readonly="">
                    </div>


                    <input type="hidden" class="form-control" name="discount" id="discount1" value='0' placeholder="">

                    <input type="hidden" class="form-control" name="grand_total" id="grand_total1" value='0' placeholder="" readonly="">

                <?php } ?>
                <?php if (!$this->ion_auth->in_group(array('Nurse', 'Doctor'))) { ?>
                    <div class="form-group col-md-12 d-none pay_now">
                        <input type="checkbox" id="pay_now_appointment1" name="pay_now_appointment" value="pay_now_appointment">
                        <label for=""> <?php echo lang('pay_now'); ?></label><br>
                        <span style="color:red;"><?php echo lang('if_pay_now_checked_please_select_status_to_confirmed') ?></span>
                    </div>
                    <div class="form-group col-md-12 d-none payment_status form-group">
                        <label for=""> <?php echo lang('payment'); ?> <?php echo lang('status'); ?></label><br>
                        <input type="text" class="form-control" id="pay_now_appointment" name="payment_status_appointment" value="paid" readonly="">


                    </div>
                    <div class="form-group payment_label col-md-12 d-none deposit_type1" style="text-align: left !important ;margin: 0% !important ;">
                        <label for="exampleInputEmail1"><?php echo lang('deposit_type'); ?></label>

                        <div class="">
                            <select class="form-control m-bot15 js-example-basic-single selecttype1" id="selecttype1" name="deposit_type" value=''>
                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Patient'))) { ?>
                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                        <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                                        <option value="0"> <?php echo lang('select'); ?> </option>
                                    <?php } ?>

                                    <option value="Card"> <?php echo lang('card'); ?> </option>
                                <?php } ?>

                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <?php
                        $payment_gateway = $settings->payment_gateway;
                        ?>



                        <div class="card1">

                            <hr>
                            <?php if ($payment_gateway != 'Paymob') { ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                                    <div class="payment pad_bot">
                                        <img src="uploads/card.png" width="100%">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if ($payment_gateway == 'PayPal') {
                            ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
                                    <select class="form-control m-bot15" name="card_type" value=''>

                                        <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>
                                        <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                        <option value="American Express"> <?php echo lang('american_express'); ?> </option>
                                    </select>
                                </div>
                            <?php } ?>
                            <?php if ($payment_gateway == '2Checkout' || $payment_gateway == 'PayPal') {
                            ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                    <input type="text" id="cardholder1" class="form-control pay_in" name="cardholder" value='' placeholder="">
                                </div>
                            <?php } ?>
                            <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                                <div class="form-group col-md-12 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                    <input type="text" id="card1" class="form-control pay_in" name="card_number" value='' placeholder="">
                                </div>



                                <div class="form-group col-md-8 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                    <input type="text" class="form-control pay_in" id="expire1" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="">
                                </div>
                                <div class="form-group col-md-4 payment pad_bot">
                                    <label for="exampleInputEmail1"> <?php echo lang('cvv'); ?> </label>
                                    <input type="text" class="form-control pay_in" id="cvv1" maxlength="3" name="cvv" value='' placeholder="">
                                </div>
                            <?php
                            }
                            ?>
                        </div>


                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-3 payment_label">
                        </div>
                        <div class="form-group col-md-9">
                            <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                            <div class="form-group cashsubmit1 payment  right-six col-md-12">
                                <button type="submit" name="submit2" id="submit1" class="btn btn-info row float-right"> <?php echo lang('submit'); ?></button>
                            </div>
                            <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                            <div class="form-group cardsubmit1  right-six col-md-12 d-none">
                                <button type="submit" name="pay_now" id="submit-btn1" class="btn btn-info row float-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                                            ?>onClick="stripePay1(event);" <?php }
                                                                                                                                                            ?> <?php if ($settings->payment_gateway == '2Checkout' && $twocheckout->status == 'live') {
                                                                                                                                                                ?>onClick="twoCheckoutPay1(event);" <?php }
                                                                                                                                                                                                    ?>> <?php echo lang('submit'); ?></button>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group  payment  right-six col-md-12">
                        <button type="submit" name="submit2" id="submit1" class="btn btn-info row float-right"> <?php echo lang('submit'); ?></button>
                    </div>
                <?php } ?>

            </form>

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->





<!-- Edit Patient Modal-->
<div class="modal fade" id="infoModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('edit_patient'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body row">
                <form role="form" id="editPatientForm" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="name" value='' placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                            <input type="text" class="form-control" name="email" value='' placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('change'); ?><?php echo lang('password'); ?></label>
                            <input type="password" class="form-control" name="password" placeholder="" autocomplete="on">
                        </div>



                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                            <input type="text" class="form-control" name="address" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                            <input type="text" class="form-control" name="phone" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                            <select class="form-control m-bot15" name="sex" value=''>

                                <option value="Male" <?php
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Male') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?>> <?php echo lang('male'); ?> </option>
                                <option value="Female" <?php
                                                        if (!empty($patient->sex)) {
                                                            if ($patient->sex == 'Female') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?>> <?php echo lang('female'); ?> </option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo lang('birth_date'); ?></label>
                            <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="" placeholder="" readonly="">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
                            <select class="form-control m-bot15" name="bloodgroup" value=''>
                                <option></option>
                                <?php foreach ($groups as $group) { ?>
                                    <option value="<?php echo $group->group; ?>" <?php
                                                                                    if (!empty($patient->bloodgroup)) {
                                                                                        if ($group->group == $patient->bloodgroup) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    }
                                                                                    ?>> <?php echo $group->group; ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                            <select class="form-control js-example-basic-single doctor" name="doctor" value=''>
                                <option value=""> </option>
                                <?php foreach ($doctors as $doctor) { ?>
                                    <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                <?php } ?>
                            </select>
                        </div>



                        <div class="form-group last col-md-6">
                            <label class="control-label"><?php echo lang('image'); ?></label>
                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail img_class fileupload-preview fileupload-exists thumbnail img_thumb">
                                        <img src="" height="100px" width="100px" id="img" alt="" />
                                    </div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="btn fileupload-new badge badge-secondary"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?></span>
                                            <!-- <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span> -->
                                            <input type="file" class="default" name="img_url" />
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                        </div>

                        <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>

                        <input type="hidden" name="id" value=''>
                        <input type="hidden" name="p_id" value='<?php
                                                                if (!empty($patient->patient_id)) {
                                                                    echo $patient->patient_id;
                                                                }
                                                                ?>'>







                        <section class="col-md-12">
                            <button type="submit" name="submit" class="btn btn-info float-right"><?php echo lang('submit'); ?></button>
                        </section>

                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
<!-- Edit Patient Modal-->




<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    var select_doctor = "<?php echo lang('select_doctor'); ?>";
</script>
<script type="text/javascript">
    var select_patient = "<?php echo lang('select_patient'); ?>";
</script>
<script type="text/javascript">
    var language = "<?php echo $this->language; ?>";
</script>
<script src="common/assets/tinymce/tinymce.min.js"></script>
<script src="common/extranal/js/patient/medical_history.js"></script>
<script src="common/extranal/js/appointment/medicalhistory.js"></script>