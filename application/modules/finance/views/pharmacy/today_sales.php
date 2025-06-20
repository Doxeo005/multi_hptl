<!--sidebar end-->
<!--main content start-->




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> <?php echo lang('pharmacy'); ?> <?php echo lang('today_sales'); ?> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home"><?php echo lang('home') ?></a></li>
                        <li class="breadcrumb-item active"><?php echo lang('pharmacy'); ?> <?php echo lang('today_sales'); ?></li>
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
                            <h3 class="card-title"><?php echo lang('All the todays pharmacy sales'); ?></h3>
                            <div class="float-right">
                                <a href="finance/pharmacy/addPaymentView">
                                    <button id="" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus-circle"></i> <?php echo lang('add_sale'); ?>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th> <?php echo lang('invoice_id'); ?> </th>
                                        <th> <?php echo lang('date'); ?> </th>
                                        <th> <?php echo lang('sub_total'); ?> </th>
                                        <th> <?php echo lang('discount'); ?> </th>
                                        <th> <?php echo lang('grand_total'); ?> </th>

                                        <th class="option_th"> <?php echo lang('options'); ?> </th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php foreach ($payments as $payment) { ?>
                                        <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>

                                        <tr class="">
                                            <td><?php echo '00' . $payment->id; ?></td>
                                            <td><?php echo date('d/m/y', $payment->date); ?></td>
                                            <td><?php echo $settings->currency; ?> <?php echo $payment->amount; ?></td>
                                            <td><?php echo $settings->currency; ?> <?php
                                                                                    if (!empty($payment->flat_discount)) {
                                                                                        echo $payment->flat_discount;
                                                                                    } else {
                                                                                        echo '0';
                                                                                    }
                                                                                    ?></td>
                                            <td><?php echo $settings->currency; ?> <?php echo $payment->gross_total; ?></td>

                                            <td>
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a class="btn btn-info btn-xs editbutton width_auto" href="finance/pharmacy/editPayment?id=<?php echo $payment->id; ?>"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></a>
                                                <?php } ?>

                                                <a class="btn btn-xs invoicebutton width_auto" href="finance/pharmacy/invoice?id=<?php echo $payment->id; ?>"><i class="fa fa-file-text"></i> <?php echo lang('invoice'); ?></a>
                                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                                    <a class="btn btn-info btn-xs delete_button width_auto" href="finance/pharmacy/delete?id=<?php echo $payment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>
                                                <?php } ?>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
<script type="text/javascript">
    var language = "<?php echo $this->language; ?>";
</script>

<script src="common/extranal/js/pharmacy/today_sales.js"></script>