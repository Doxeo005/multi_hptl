<!--sidebar end-->
<!--main content start-->



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo lang('appointment') ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home"><?php echo lang('home') ?></a></li>
                        <li class="breadcrumb-item active"><?php echo lang('appointment') ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo lang('List of All Appointments'); ?></h3>
                            <div class="float-right">
                                <a data-toggle="modal" href="#myModal">
                                    <button id="" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus-circle"></i> <?php echo lang('add_appointment'); ?>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="my-3">
                            <div class="col-md-12 m-2">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#all"><?php echo lang('all'); ?></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pending"><?php echo lang('pending_confirmation'); ?></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#confirmed"><?php echo lang('confirmed'); ?></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#treated"><?php echo lang('treated'); ?></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cancelled"><?php echo lang('cancelled'); ?></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#requested"><?php echo lang('requested'); ?></a></li>
                                    </ul>
                                    <div class="float-right col-md-4">
                                        <div class="float-right custom_buttonss"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="tab-content">
                                    <div id="pending" class="tab-pane">
                                        <div class="">
                                            <div class="card-body">
                                                <div class="">
                                                    <div class="space15"></div>
                                                    <table class="table table-bordered table-hover" id="editable-sample1">
                                                        <thead>
                                                            <tr>
                                                                <th> <?php echo lang('id'); ?></th>
                                                                <th> <?php echo lang('patient'); ?></th>
                                                                <th> <?php echo lang('doctor'); ?></th>
                                                                <th> <?php echo lang('date-time'); ?></th>
                                                                <th> <?php echo lang('remarks'); ?></th>
                                                                <th> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('description'); ?></th>
                                                                <th> <?php echo lang('invoice_id'); ?></th>
                                                                <th> <?php echo lang('amount'); ?></th>
                                                                <th> <?php echo lang('bill'); ?> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="confirmed" class="tab-pane">
                                        <div class="">
                                            <div class="card-body">
                                                <div class="adv-table editable-table ">
                                                    <div class="space15"></div>
                                                    <table class="table table-bordered table-hover" id="editable-sample2">
                                                        <thead>
                                                            <tr>
                                                                <th> <?php echo lang('id'); ?></th>
                                                                <th> <?php echo lang('patient'); ?></th>
                                                                <th> <?php echo lang('doctor'); ?></th>
                                                                <th> <?php echo lang('date-time'); ?></th>
                                                                <th> <?php echo lang('remarks'); ?></th>
                                                                <th> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('description'); ?></th>
                                                                <th> <?php echo lang('invoice_id'); ?></th>
                                                                <th> <?php echo lang('amount'); ?></th>
                                                                <th> <?php echo lang('bill'); ?> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>




                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="treated" class="tab-pane">
                                        <div class="">
                                            <div class="card-body">
                                                <div class="adv-table editable-table ">
                                                    <div class="space15"></div>
                                                    <table class="table table-bordered table-hover" id="editable-sample3">
                                                        <thead>
                                                            <tr>
                                                                <th> <?php echo lang('id'); ?></th>
                                                                <th> <?php echo lang('patient'); ?></th>
                                                                <th> <?php echo lang('doctor'); ?></th>
                                                                <th> <?php echo lang('date-time'); ?></th>
                                                                <th> <?php echo lang('remarks'); ?></th>
                                                                <th> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('description'); ?></th>
                                                                <th> <?php echo lang('invoice_id'); ?></th>
                                                                <th> <?php echo lang('amount'); ?></th>
                                                                <th> <?php echo lang('bill'); ?> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>





                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="cancelled" class="tab-pane">
                                        <div class="">
                                            <div class="card-body">
                                                <div class="adv-table editable-table ">
                                                    <div class="space15"></div>
                                                    <table class="table table-bordered table-hover" id="editable-sample4">
                                                        <thead>
                                                            <tr>
                                                                <th> <?php echo lang('id'); ?></th>
                                                                <th> <?php echo lang('patient'); ?></th>
                                                                <th> <?php echo lang('doctor'); ?></th>
                                                                <th> <?php echo lang('date-time'); ?></th>
                                                                <th> <?php echo lang('remarks'); ?></th>
                                                                <th> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('description'); ?></th>
                                                                <th> <?php echo lang('invoice_id'); ?></th>
                                                                <th> <?php echo lang('amount'); ?></th>
                                                                <th> <?php echo lang('bill'); ?> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="all" class="tab-pane active">
                                        <div class="">
                                            <div class="card-body">
                                                <div class="adv-table editable-table ">

                                                    <div class="space15"></div>
                                                    <table class="table table-bordered table-hover" id="editable-sample5">
                                                        <thead>
                                                            <tr>
                                                                <th> <?php echo lang('id'); ?></th>
                                                                <th> <?php echo lang('patient'); ?></th>
                                                                <th> <?php echo lang('doctor'); ?></th>
                                                                <th> <?php echo lang('date-time'); ?></th>
                                                                <th> <?php echo lang('remarks'); ?></th>
                                                                <th> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('description'); ?></th>
                                                                <th> <?php echo lang('invoice_id'); ?></th>
                                                                <th> <?php echo lang('amount'); ?></th>
                                                                <th> <?php echo lang('bill'); ?> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="requested" class="tab-pane">
                                        <div class="">
                                            <div class="card-body">
                                                <div class="adv-table editable-table ">
                                                    <div class="space15"></div>
                                                    <table class="table table-bordered table-hover" id="editable-sample6">
                                                        <thead>
                                                            <tr>
                                                                <th> <?php echo lang('id'); ?></th>
                                                                <th> <?php echo lang('patient'); ?></th>
                                                                <th> <?php echo lang('doctor'); ?></th>
                                                                <th> <?php echo lang('date-time'); ?></th>
                                                                <th> <?php echo lang('remarks'); ?></th>
                                                                <th> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('description'); ?></th>
                                                                <th> <?php echo lang('invoice_id'); ?></th>
                                                                <th> <?php echo lang('amount'); ?></th>
                                                                <th> <?php echo lang('bill'); ?> <?php echo lang('status'); ?></th>
                                                                <th> <?php echo lang('options'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>





                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
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






<!-- Add Appointment Modal-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('add_appointment'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body row">
                <form role="form" action="appointment/addNew" id="addAppointmentForm" method="post" class="clearfix" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="col-md-6 patient_div">
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> &#42;</label>
                            <select class="form-control m-bot15 pos_select" id="pos_select" name="patient" value='' required>


                            </select>
                        </div>
                        <input type="hidden" name="redirectlink" value="10">
                        <div class="pos_client clearfix col-md-12 row">
                            <div class="payment pad_bot float-right patient_div col-md-6 mt-3">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_name" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot float-right col-md-6 mt-3">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_email" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot float-right col-md-6 mt-3">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_phone" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot float-right col-md-6 mt-3">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_age" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot col-md-6 mt-3">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                <select class="form-control" name="p_gender" value=''>

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
                        <div class="col-md-6 doctor_div">
                            <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> &#42;</label>
                            <select class="form-control m-bot15" id="adoctors" name="doctor" value='' required>

                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="exampleInputEmail1"> <?php echo lang('date'); ?> &#42;</label>
                            <input type="text" class="form-control default-date-picker" autocomplete="off" id="date" onkeypress="return false;" name="date" id="exampleInputEmail1" value='' placeholder="" required>
                        </div>
                        <div class="col-md-6 aslots mt-3">
                            <label for="exampleInputEmail1"><?php echo lang('available_slots'); ?> </label>
                            <select class="form-control m-bot15" name="time_slot" id="aslots" value=''>

                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                            <select class="form-control m-bot15" name="status" value=''>
                                <option value="Pending Confirmation" <?php ?>> <?php echo lang('pending_confirmation'); ?> </option>
                                <option value="Confirmed" <?php
                                                            ?>> <?php echo lang('confirmed'); ?> </option>
                                <option value="Treated" <?php
                                                        ?>> <?php echo lang('treated'); ?> </option>
                                <option value="Cancelled" <?php
                                                            ?>> <?php echo lang('cancelled'); ?> </option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                            <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="col-md-12 mt-3">

                            <label class=""><?php echo lang('visit'); ?> <?php echo lang('description'); ?> &#42;</label>

                            <select class="form-control m-bot15" name="visit_description" id="visit_description" value='' required>

                            </select>

                        </div>
                        <div class="form-group col-md-4 form_data mt-3">
                            <label for="exampleInputEmail1"><?php echo lang('visit'); ?> <?php echo lang('charges'); ?></label>
                            <input type="number" class="form-control" name="visit_charges" id="visit_charges" value='' placeholder="" readonly="">
                        </div>
                        <div class="form-group col-md-4 form_data mt-3">
                            <label for="exampleInputEmail1"><?php echo lang('discount'); ?></label>
                            <input type="number" class="form-control" name="discount" id="discount" value='0' placeholder="">
                        </div>
                        <div class="form-group col-md-4 form_data mt-3">
                            <label for="exampleInputEmail1"><?php echo lang('grand_total'); ?></label>
                            <input type="number" class="form-control" name="grand_total" id="grand_total" value='0' placeholder="" readonly="">
                        </div>
                        <?php if (!$this->ion_auth->in_group(array('Nurse', 'Doctor'))) { ?>
                            <div class="col-md-12">
                                <input type="checkbox" id="pay_now_appointment" name="pay_now_appointment" value="pay_now_appointment">
                                <label for=""> <?php echo lang('pay_now'); ?></label><br>
                                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                    <span class="info_message"><?php echo lang('if_pay_now_checked_please_select_status_to_confirmed') ?></span>
                                <?php } ?>
                            </div>

                            <div class="payment_label col-md-12 d-none deposit_type">
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



                                        <div class="col-md-8 payment pad_bot mt-3">
                                            <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                            <input type="text" class="form-control pay_in" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="">
                                        </div>
                                        <div class="col-md-4 payment pad_bot mt-3">
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
                                    <div class="form-group cashsubmit payment btn-block">
                                        <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right"> <?php echo lang('submit'); ?></button>
                                    </div>
                                    <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                                    <div class="form-group cardsubmit btn-block d-none">
                                        <button type="submit" name="pay_now" id="submit-btn" class="btn btn-primary btn-block float-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                                                    ?>onClick="stripePay(event);" <?php }
                                                                                                                                                                    ?> <?php if ($settings->payment_gateway == '2Checkout' && $twocheckout->status == 'live') {
                                                                                                                                                                        ?>onClick="twoCheckoutPay(event);" <?php }
                                                                                                                                                                                                        ?>> <?php echo lang('submit'); ?></button>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group payment btn-block">
                                <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right mr-0"> <?php echo lang('submit'); ?></button>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Appointment Modal-->

<div class="modal fade" role="dialog" id="cmodal">
    <div class="modal-dialog modal-xl med_his" role="document">
        <div class="modal-content">

            <div id='medical_history' class="row">
                <div class="col-md-12">

                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo lang('edit_appointment'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body row">
                <form role="form" id="editAppointmentForm" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-6 patient_div">
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> &#42;</label>
                            <select class="form-control m-bot15  pos_select1 patient" id="pos_select1" name="patient" value='' required>

                            </select>
                        </div>
                        <div class="pos_client1 clearfix col-md-12 row">
                            <div class="payment pad_bot float-right col-md-6">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_name" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot float-right col-md-6">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_email" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot float-right col-md-6">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_phone" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot float-right col-md-6">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                <input type="text" class="form-control pay_in" name="p_age" value='' placeholder="">
                            </div>
                            <div class="payment pad_bot col-md-6">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                <select class="form-control" name="p_gender" value=''>

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
                        <div class="col-md-6 doctor_div1">
                            <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> &#42;</label>
                            <select class="form-control m-bot15 doctor" id="adoctors1" name="doctor" value='' required>

                            </select>
                        </div>
                        <input type="hidden" name="redirectlink" value="10">
                        <div class="col-md-6 mt-3">
                            <label for="exampleInputEmail1"> <?php echo lang('date'); ?> &#42;</label>
                            <input type="text" class="form-control default-date-picker" autocomplete="off" id="date1" required="" onkeypress="return false;" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="exampleInputEmail1">Available Slots</label>
                            <select class="form-control m-bot15" name="time_slot" id="aslots1" value=''>

                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                            <select class="form-control m-bot15" name="status" value=''>
                                <option value="Pending Confirmation" <?php ?>> <?php echo lang('pending_confirmation'); ?> </option>
                                <option value="Confirmed" <?php ?>> <?php echo lang('confirmed'); ?> </option>
                                <option value="Treated" <?php ?>> <?php echo lang('treated'); ?> </option>
                                <option value="Cancelled" <?php ?>> <?php echo lang('cancelled'); ?> </option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                            <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="col-md-12 mt-3">

                            <label class=""><?php echo lang('visit'); ?> <?php echo lang('description'); ?> &#42;</label>

                            <select class="form-control m-bot15" name="visit_description" id="visit_description1" value='' required>

                            </select>
 
                        </div>

                        <input type="hidden" name="id" id="appointment_id" value=''>
                        <div class="form-group col-md-4 d-none consultant_fee_div mt-3">
                            <label for="exampleInputEmail1"><?php echo lang('visit'); ?> <?php echo lang('charges'); ?></label>
                            <input type="number" class="form-control" name="visit_charges" id="visit_charges1" value='' placeholder="" readonly="">
                        </div>
                        <div class="form-group col-md-4 d-none consultant_fee_div mt-3">
                            <label for="exampleInputEmail1"><?php echo lang('discount'); ?></label>
                            <input type="number" class="form-control" name="discount" id="discount1" value='0' placeholder="">
                        </div>
                        <div class="form-group col-md-4 d-none consultant_fee_div mt-3">
                            <label for="exampleInputEmail1"><?php echo lang('grand_total'); ?></label>
                            <input type="number" class="form-control" name="grand_total" id="grand_total1" value='0' placeholder="" readonly="">
                        </div>
                        <?php if (!$this->ion_auth->in_group(array('Nurse', 'Doctor'))) { ?>
                            <div class="col-md-12 d-none pay_now">
                                <input type="checkbox" id="pay_now_appointment1" name="pay_now_appointment" value="pay_now_appointment">
                                <label for=""> <?php echo lang('pay_now'); ?></label><br>
                                <span class="info_message"><?php echo lang('if_pay_now_checked_please_select_status_to_confirmed') ?></span>
                            </div>
                            <div class="col-md-12 d-none payment_status form-group mt-3">
                                <label for=""> <?php echo lang('payment'); ?> <?php echo lang('status'); ?></label><br>
                                <input type="text" class="form-control" id="pay_now_appointment" name="payment_status_appointment" value="paid" readonly="">


                            </div>
                            <div class="payment_label col-md-12 d-none deposit_type1">
                                <label for="exampleInputEmail1"><?php echo lang('deposit_type'); ?></label>

                                <div class="">
                                    <select class="form-control m-bot15 js-example-basic-single selecttype1" id="selecttype1" name="deposit_type" value=''>
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



                                <div class="card1">

                                    <hr>
                                    <?php if ($payment_gateway != 'Paymob') { ?>
                                        <div class="col-md-12 payment pad_bot">
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
                                            <input type="text" id="cardholder1" class="form-control pay_in" name="cardholder" value='' placeholder="">
                                        </div>
                                    <?php } ?>
                                    <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                                        <div class="col-md-12 payment pad_bot">
                                            <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                            <input type="text" id="card1" class="form-control pay_in" name="card_number" value='' placeholder="">
                                        </div>



                                        <div class="col-md-8 payment pad_bot">
                                            <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                            <input type="text" class="form-control pay_in" id="expire1" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="" readonly>
                                        </div>
                                        <div class="col-md-4 payment pad_bot">
                                            <label for="exampleInputEmail1"> <?php echo lang('cvv'); ?> </label>
                                            <input type="text" class="form-control pay_in" id="cvv1" maxlength="3" name="cvv" value='' placeholder="">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>


                            </div>
                            <div class="btn-block">
                                
                                <div class="">
                                    <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                                    <div class="form-group cashsubmit1 payment btn-block">
                                        <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right"> <?php echo lang('submit'); ?></button>
                                    </div>
                                    <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                                    <div class="form-group cardsubmit1  btn-block d-none">
                                        <button type="submit" name="pay_now" id="submit-btn1" class="btn btn-primary btn-block float-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                                                                                                    ?>onClick="stripePay1(event);" <?php }
                                                                                                                                                                    ?> <?php if ($settings->payment_gateway == '2Checkout' && $twocheckout->status == 'live') {
                                                                                                                                                                    ?>onClick="twoCheckoutPay1(event);" <?php }
                                                                                                                                                                                                        ?>> <?php echo lang('submit'); ?></button>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group paymentbtn-block">
                                <button type="submit" name="submit2" id="submit1" class="btn btn-primary btn-block float-right mr-0"> <?php echo lang('submit'); ?></button>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->


<?php if (!empty($gateway->publish)) {
    $gateway_stripe = $gateway->publish;
} else {
    $gateway_stripe = '';
} ?>



<script src="common/js/codearistos.min.js"></script>
<script src="common/js/moment.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script> -->
<script type="text/javascript">
    var publish = "<?php echo $gateway_stripe; ?>";
</script>
<script type="text/javascript">
    var payment_gateway = "<?php echo $settings->payment_gateway; ?>";
</script>

<script type="text/javascript">
    var select_doctor = "<?php echo lang('select_doctor'); ?>";
</script>
<script type="text/javascript">
    var select_patient = "<?php echo lang('select_patient'); ?>";
</script>
<script type="text/javascript">
    var language = "<?php echo $this->language; ?>";
</script>
<script type="text/javascript">
    var no_available_timeslots = "<?php echo lang('no_available_timeslots'); ?>";
</script>

<script src="common/extranal/js/appointment/appointment.js"></script>
<script src="common/extranal/js/appointment/appointment_select2.js"></script> 