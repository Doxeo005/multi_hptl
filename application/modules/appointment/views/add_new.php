<link href="common/extranal/css/appointment/add_new.css" rel="stylesheet">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?php
                        if (!empty($appointment->id))
                            echo lang('edit_appointment');
                        else
                            echo lang('add_appointment');
                        ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home"><?php echo lang('home') ?></a></li>
                        <li class="breadcrumb-item"><a href="appointment"><?php echo lang('appointment') ?></a></li>
                        <li class="breadcrumb-item active"><?php echo lang('add_new') ?> <?php echo lang('appointment') ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="adv-table editable-table ">
                                <?php echo validation_errors(); ?>
                                <?php echo $this->session->flashdata('feedback'); ?>
                            </div>
                            <form role="form" action="appointment/addNew" id="addAppointmentForm" class="clearfix row" method="post" enctype="multipart/form-data">
                                <div class="row col-md-6">
                                    <div class="form-group col-md-12 patient_div">
                                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> &#42;</label>
                                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                            <select class="form-control m-bot15  pos_select" id="pos_select" name="patient" value='' required>
                                                <?php if (!empty($appointment)) { ?>
                                                    <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php } else {
                                            $user = $this->ion_auth->get_user_id();
                                            $patients = $this->db->get_where('patient', array('ion_user_id' => $user))->row();
                                        ?>
                                            <select class="form-control m-bot15 pos_select" id="pos_select" name="patient" value='' required>
                                                <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <input type="hidden" name="redirectlink" value="10">
                                    <div class="pos_client clearfix">
                                        <div class="form-group col-md-8 payment pad_bot float-right">

                                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?> &#42;</label>

                                            <input type="text" class="form-control pay_in" name="p_name" value='<?php
                                                                                                                if (!empty($payment->p_name)) {
                                                                                                                    echo $payment->p_name;
                                                                                                                }
                                                                                                                ?>' placeholder="">
                                        </div>
                                        <div class="form-group col-md-8 payment pad_bot float-right">

                                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?> &#42;</label>

                                            <input type="text" class="form-control pay_in" name="p_email" value='<?php
                                                                                                                    if (!empty($payment->p_email)) {
                                                                                                                        echo $payment->p_email;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">

                                        </div>
                                        <div class="form-group col-md-8 payment pad_bot float-right">

                                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>

                                            <input type="text" class="form-control pay_in" name="p_phone" value='<?php
                                                                                                                    if (!empty($payment->p_phone)) {
                                                                                                                        echo $payment->p_phone;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">

                                        </div>

                                        <div class="form-group col-md-8 payment pad_bot float-right">

                                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>

                                            <input type="text" class="form-control pay_in" name="p_age" value='<?php
                                                                                                                if (!empty($payment->p_age)) {
                                                                                                                    echo $payment->p_age;
                                                                                                                }
                                                                                                                ?>' placeholder="">

                                        </div>
                                        <div class="form-group col-md-8 payment pad_bot float-right">
                                            <div class="col-md-3 payment_label">
                                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-control m-bot15" name="p_gender" value=''>

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
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 doctor_div">
                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> &#42;</label>
                                        <select class="form-control m-bot15" id="adoctors" name="doctor" value='' required="">
                                            <?php if (!empty($appointment)) { ?>
                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>





                                    <div class="col-md-12 form-group">
                                        <label class=""><?php echo lang('visit'); ?> <?php echo lang('description'); ?></label>
                                        <select class="form-control m-bot15" name="visit_description" style="<?php if ($appointment->payment_status == 'paid') {
                                                                                                                    echo ' pointer-events: none;';
                                                                                                                } ?>" id="visit_description" value='' required>
                                            <?php
                                            if (!empty($appointment->id)) {
                                            ?>
                                                <option value=""><?php echo lang('select'); ?></option>
                                                <?php
                                                foreach ($visits as $visit) {
                                                ?>
                                                    <option value="<?php echo $visit->id; ?>" <?php
                                                                                                if ($visit->id == $appointment->visit_description) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                                ?>><?php echo $visit->visit_description ?> </option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">

                                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?> &#42;</label>
                                        <input type="text" class="form-control" id="date" name="date" value='<?php
                                                                                                                if (!empty($appointment->date)) {
                                                                                                                    echo date('d-m-Y', $appointment->date);
                                                                                                                } else {
                                                                                                                    echo null;
                                                                                                                }
                                                                                                                ?>' placeholder="" onkeypress="return false;" autocomplete="off" required="">
                                    </div>

                                    <div class="form-group col-md-12 aslots">
                                            <label class=""><?php echo lang('available_slots'); ?></label>
                                            <select class="form-control m-bot15" name="time_slot" id="aslots" value=''>
                                            </select>
                                    </div>


                                    <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                                            <input type="text" class="form-control" name="remarks" value='<?php
                                                                                                            if (!empty($appointment->remarks)) {
                                                                                                                echo $appointment->remarks;
                                                                                                            }
                                                                                                            ?>' placeholder="">
                                    </div>


                                    <div class="col-md-12">
                         
                                            <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                                      
                                            <select class="form-control m-bot15" name="status" value=''>
                                                <option value="Pending Confirmation" <?php
                                                                                        if (!empty($appointment->status)) {
                                                                                            if ($appointment->status == 'Pending Confirmation') {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                        ?>> <?php echo lang('pending_confirmation'); ?> </option>
                                                <option value="Confirmed" <?php
                                                                            if (!empty($appointment->status)) {
                                                                                if ($appointment->status == 'Confirmed') {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>> <?php echo lang('confirmed'); ?> </option>
                                                <option value="Treated" <?php
                                                                        if (!empty($appointment->status)) {
                                                                            if ($appointment->status == 'Treated') {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?>> <?php echo lang('treated'); ?> </option>
                                                <option value="Cancelled" <?php
                                                                            if (!empty($appointment->status)) {
                                                                                if ($appointment->status == 'Cancelled') {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>> <?php echo lang('cancelled'); ?> </option>
                                            </select>
                                        
                                    </div>


                                    <input type="hidden" name="id" id="appointment_id" value='<?php
                                                                                                if (!empty($appointment->id)) {
                                                                                                    echo $appointment->id;
                                                                                                }
                                                                                                ?>'>
                                </div>

                                <div class="col-md-6 clearfix payment_section">

                                    <div class="form-group col-md-12 form_data">
                                        <label for="exampleInputEmail1"><?php echo lang('visit'); ?> <?php echo lang('charges'); ?></label>
                                        <input type="number" class="form-control" name="visit_charges" id="visit_charges" value='<?php if (!empty($appointment->id)) {
                                                                                                                                        echo $appointment->visit_charges;
                                                                                                                                    } ?>' placeholder="" readonly="">
                                    </div>
                                    <div class="form-group col-md-12 form_data">
                                        <label for="exampleInputEmail1"><?php echo lang('discount'); ?></label>
                                        <input type="number" class="form-control" name="discount" id="discount" value='<?php if (!empty($appointment->id)) {
                                                                                                                            echo $appointment->discount;
                                                                                                                        } else {
                                                                                                                            echo '0';
                                                                                                                        } ?>' placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 form_data">
                                        <label for="exampleInputEmail1"><?php echo lang('grand_total'); ?></label>
                                        <input type="number" class="form-control" name="grand_total" id="grand_total" value='<?php if (!empty($appointment->id)) {
                                                                                                                                    echo $appointment->grand_total;
                                                                                                                                } else {
                                                                                                                                    echo '0';
                                                                                                                                } ?>' placeholder="" readonly="">
                                    </div>

                                    <?php if (!$this->ion_auth->in_group(array('Nurse', 'Doctor'))) { ?>
                                        <?php if ($appointment->payment_status == 'paid') { ?>
                                            <div class="form-group col-md-12 form_data">
                                                <label for="exampleInputEmail1"><?php echo lang('payment'); ?> <?php echo lang('status'); ?></label>
                                                <input type="text" class="form-control" name="" id="" value='<?php echo lang('paid'); ?>' placeholder="" readonly="">
                                            </div>
                                            <div class="form-group payment right-six col-md-12 mt-3 ml-4">
                                                <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right"> <?php echo lang('submit'); ?></button>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-12">
                                                <input type="checkbox" id="pay_now_appointment" name="pay_now_appointment" value="pay_now_appointment">
                                                <label for=""> <?php echo lang('pay_now'); ?></label><br>
                                                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                    <span class="info_message"><?php echo lang('if_pay_now_checked_please_select_status_to_confirmed') ?></span>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-12 d-none deposit_type">
                                                <label for="exampleInputEmail1"><?php echo lang('deposit_type'); ?></label>

                                                <div class="">
                                                    <select class="form-control m-bot15 js-example-basic-single selecttype" id="selecttype" name="deposit_type" value=''>
                                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                                            <option value="Cash"> <?php echo lang('cash'); ?> </option>
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
                                                        <div class="col-md-12 payment pad_bot">
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
                                                        <div class="col-md-12 payment pad_bot">
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
                                                        <div class="col-md-12 payment pad_bot">
                                                            <label for="exampleInputEmail1"> <?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                                            <input type="text" id="cardholder" class="form-control pay_in" name="cardholder" value='' placeholder="">
                                                        </div>
                                                    <?php } ?>
                                                    <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                                                        <div class="col-md-12 payment pad_bot">
                                                            <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                                            <input type="text" id="card" class="form-control pay_in" name="card_number" value='' placeholder="">
                                                        </div>



                                                        <div class="col-md-8 payment pad_bot">
                                                            <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                                            <input type="text" class="form-control pay_in" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="">
                                                        </div>
                                                        <div class="col-md-4 payment pad_bot">
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

                                                    <div class="form-group cashsubmit payment right-six col-md-12 mt-3">
                                                        <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right"> <?php echo lang('submit'); ?></button>
                                                    </div>

                                                    <div class="form-group cardsubmit  right-six col-md-12 d-none">
                                                        <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary btn-block float-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                                                                    ?>onClick="stripePay(event);" <?php }
                                                                                                                                                                                    ?>> <?php echo lang('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="form-group  payment right-six col-md-12 float-right mt-3 ml-4">
                                            <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right"> <?php echo lang('submit'); ?></button>
                                        </div>
                                    <?php } ?>
                                </div>


                            </form>
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


<script src="common/js/codearistos.min.js"></script>
<!-- <script src="common/js/moment.min.js"></script> -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script> -->
<script type="text/javascript">
    var publish = "<?php echo $gateway->publish; ?>";
</script>
<script type="text/javascript">
    var payment_gateway = "<?php echo $settings->payment_gateway; ?>";
</script>

<script type="text/javascript">
    var no_available_timeslots = "<?php echo lang('no_available_timeslots'); ?>";
</script>

<?php if (!empty($appointment->id)) { ?>

    <script src="common/extranal/js/appointment/edit_appointment.js"></script>

<?php } else { ?>

    <script src="common/extranal/js/appointment/add_new.js"></script>

<?php } ?>

<script type="text/javascript">
    var currency = "<?php echo $settings->currency; ?>";
</script>

<script type="text/javascript">
    var select_doctor = "<?php echo lang('select_doctor'); ?>";
</script>
<script type="text/javascript">
    var select_patient = "<?php echo lang('select_patient'); ?>";
</script>
<script src="common/extranal/js/appointment/appointment_select2.js"></script>
