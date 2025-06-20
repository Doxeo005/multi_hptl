<!--main content start-->




<style>
    .card .badge{
        font-size: 120%;
        margin-bottom: 5px;
        width: 100%;
        text-align: left !important;
        /* background: #fff !important; */
        /* color: #333; */
        padding: 16px;
    }
</style>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> <?php echo lang('pharmacy'); ?> <?php echo lang('report'); ?> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home"><?php echo lang('home') ?></a></li>
                        <li class="breadcrumb-item active"><?php echo lang('department') ?></li>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <section>
                                        <form role="form" class="f_report" action="finance/pharmacy/financialReport" method="post" enctype="multipart/form-data">
                                            <label class="range"><?php echo lang('date_range'); ?></label>
                                            <div class="form-group row">

                                                <div class="col-md-6">
                                                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                                                        <input type="text" class="form-control dpd1" name="date_from" value="<?php
                                                                                                                                if (!empty($from)) {
                                                                                                                                    echo $from;
                                                                                                                                }
                                                                                                                                ?>" placeholder=" <?php echo lang('date_from'); ?> " readonly="">
                                                        <span class="input-group-addon"> </span>
                                                        <input type="text" class="form-control dpd2" name="date_to" value="<?php
                                                                                                                            if (!empty($to)) {
                                                                                                                                echo $to;
                                                                                                                            }
                                                                                                                            ?>" placeholder=" <?php echo lang('date_to'); ?> " readonly="">
                                                    </div>
                                                    <div class="row"></div>
                                                    <span class="help-block"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" name="submit" class="btn btn-sm btn-info range_submit mt-1"> <?php echo lang('submit'); ?> </button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <section class="row">
                                        <div class="col-md-3 card-body">
                                            <label class=""><?php echo lang('date_from'); ?></label>
                                            <div class="paanel"><?php
                                                                if (!empty($from)) {
                                                                    echo $from;
                                                                }
                                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3 card-body">
                                            <label class=""><?php echo lang('date_to'); ?></label>
                                            <div class="paanel"> <?php
                                                                    if (!empty($to)) {
                                                                        echo $to;
                                                                    }
                                                                    ?>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>

                            <?php
                            if (!empty($payments)) {
                                $paid_number = 0;
                                foreach ($payments as $payment) {
                                    $paid_number = $paid_number + 1;
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-7">

                                    <section class="card">
                                        <header class="card-header">
                                            <h4><?php echo lang('sales'); ?> <?php echo lang('report'); ?> </h4>
                                        </header>
                                        <table class="table table-striped table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo lang('item_name'); ?> </th>
                                                    <th><?php echo lang('quantity'); ?> </th>
                                                    <th><?php echo lang('total'); ?> <?php echo lang('purchase'); ?> <?php echo lang('cost'); ?> </th>
                                                    <th class="hidden-phone"><?php echo lang('total'); ?> <?php echo lang('sale'); ?> <?php echo lang('cost'); ?> </th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if (!empty($payments)) {
                                                    foreach ($medicines as $medicine_name) {

                                                        foreach ($payments as $payment) {
                                                            $categories_in_payment = explode(',', $payment->category_name);
                                                            foreach ($categories_in_payment as $category_in_payment) {
                                                                $category_id = explode('*', $category_in_payment);
                                                                if ($category_id[0] == $medicine_name->id) {
                                                                    $category_id_for_report[] = $category_id[0];
                                                                }
                                                            }
                                                        }
                                                    }

                                                    $category_id_for_reports = array_unique($category_id_for_report);
                                                }
                                                ?>






                                                <?php
                                                if (!empty($payments)) {
                                                    foreach ($medicines as $category) {

                                                        if (in_array($category->id, $category_id_for_reports)) {
                                                ?>
                                                            <tr class="">
                                                                <td><?php echo $category->name ?></td>
                                                            <?php
                                                            foreach ($payments as $payment) {
                                                                $category_names_and_amounts = $payment->category_name;
                                                                $category_names_and_amounts = explode(',', $category_names_and_amounts);
                                                                foreach ($category_names_and_amounts as $category_name_and_amount) {
                                                                    $category_name = explode('*', $category_name_and_amount);
                                                                    if (($category->id == $category_name[0])) {
                                                                        $amount_per_category[] = $category_name[1] * $category_name[2];
                                                                        $cost_per_category[] = $category_name[2] * $category_name[3];
                                                                        $quantity[] = $category_name[2];
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            ?>
                                                            <td>
                                                                <?php
                                                                if (!empty($quantity)) {
                                                                    echo array_sum($quantity);
                                                                    $quantity[] = array_sum($quantity);
                                                                } else {
                                                                    echo '0';
                                                                }

                                                                $quantity = NULL;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $settings->currency; ?>
                                                                <?php
                                                                if (!empty($cost_per_category)) {
                                                                    echo array_sum($cost_per_category);
                                                                    $total_cost_by_category[] = array_sum($cost_per_category);
                                                                } else {
                                                                    echo '0';
                                                                }

                                                                $cost_per_category = NULL;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $settings->currency; ?>
                                                                <?php
                                                                if (!empty($amount_per_category)) {
                                                                    echo array_sum($amount_per_category);
                                                                    $total_payment_by_category[] = array_sum($amount_per_category);
                                                                } else {
                                                                    echo '0';
                                                                }

                                                                $amount_per_category = NULL;
                                                                ?>
                                                            </td>
                                                            </tr>
                                                    <?php
                                                    }
                                                }
                                                    ?>

                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h3> <?php echo lang('sub_total'); ?> </h3>
                                                    </td>
                                                    <td></td>
                                                    <td>

                                                        <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($total_cost_by_category)) {
                                                            echo array_sum($total_cost_by_category);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($total_payment_by_category)) {
                                                            echo array_sum($total_payment_by_category);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5> <?php echo lang('total'); ?> <?php echo lang('discount'); ?> </h5>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($payments)) {
                                                            foreach ($payments as $payment) {
                                                                $discount[] = $payment->flat_discount;
                                                            }
                                                            if ($paid_number > 0) {
                                                                echo array_sum($discount);
                                                            } else {
                                                                echo '0';
                                                            }
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h5><?php echo lang('gross'); ?> <?php echo lang('sales'); ?> </h5>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($payments)) {
                                                            if ($paid_number > 0) {
                                                                $gross = array_sum($total_payment_by_category) - array_sum($discount) + array_sum($vat);
                                                                echo $gross;
                                                            } else {
                                                                echo '0';
                                                            }
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </section>
                                    <section></section>
                                    <section class="card">
                                        <header class="card-header">
                                            <h4><?php echo lang('expense'); ?> <?php echo lang('report'); ?> </h4>
                                        </header>
                                        <table class="table table-striped table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo lang('category'); ?> </th>
                                                    <th class="hidden-phone"><?php echo lang('amount'); ?> </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($expense_categories as $category) { ?>
                                                    <tr class="">
                                                        <td><?php echo $category->category ?></td>
                                                        <td>
                                                            <?php echo $settings->currency; ?>
                                                            <?php
                                                            foreach ($expenses as $expense) {
                                                                $category_name = $expense->category;

                                                                if (($category->category == $category_name)) {
                                                                    $amount_per_category[] = $expense->amount;
                                                                }
                                                            }
                                                            if (!empty($amount_per_category)) {
                                                                $total_expense_by_category[] = array_sum($amount_per_category);
                                                                echo array_sum($amount_per_category);
                                                            } else {
                                                                echo '0';
                                                            }

                                                            $amount_per_category = NULL;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </section>
                                </div>

                                <div class="col-lg-5">
                                    <section class="">
                                        <div class="">
                                            <div class="">
                                                <div class="row badge badge-secondary">
                                                    <div class="col-md-4">
                                                        <i class="fa fa-money"></i>
                                                        <?php echo lang('gross'); ?> <?php echo lang('p_price'); ?> <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($payments)) {
                                                            if (($paid_number > 0)) {
                                                                if (!empty($total_cost_by_category)) {
                                                                    $total_cost = array_sum($total_cost_by_category);
                                                                    echo number_format($total_cost, 2, '.', ',');
                                                                } else {
                                                                    $total_cost = 0;
                                                                    echo number_format($total_cost, 2, '.', ',');
                                                                }
                                                            }
                                                        } else {
                                                            echo '0.00';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="degree">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="">
                                        <div class="">
                                            <div class="">
                                                <div class="row badge badge-info">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-money"></i>
                                                        <?php echo lang('gross'); ?> <?php echo lang('s_price'); ?> <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($payments)) {
                                                            if (($paid_number > 0)) {
                                                                if (!empty($gross)) {

                                                                    echo number_format($gross, 2, '.', ',');
                                                                } else {
                                                                    $gross = 0;
                                                                    echo number_format($gross, 2, '.', ',');
                                                                }
                                                            }
                                                        } else {
                                                            echo '0.00';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="degree">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="">
                                        <div class="">
                                            <div class="">
                                                <div class="row badge badge-warning">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-money"></i>
                                                        <?php echo lang('gross_expense'); ?> <?php echo $settings->currency; ?>
                                                        <?php
                                                        if (!empty($total_expense_by_category)) {
                                                            $total_expense = array_sum($total_expense_by_category);
                                                            echo number_format($total_expense, 2, '.', ',');
                                                        } else {
                                                            $total_expense = 0;
                                                            echo number_format($total_expense, 2, '.', ',');
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="degree">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                    <section class="">
                                        <div class="">
                                            <div class="">
                                                <div class="row  badge badge-success">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-money"></i>
                                                        <?php echo lang('profit'); ?> <?php echo $settings->currency; ?>
                                                        <?php
                                                        //  if ($paid_number > 0) {

                                                        if (!empty($total_payment_by_category)) {
                                                            $gross = array_sum($total_payment_by_category) - array_sum($discount) + array_sum($vat);

                                                            $profit = $gross - $total_cost - $total_expense;
                                                            echo number_format($profit, 2, '.', ',');
                                                        } else {
                                                            echo '0.00';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="degree">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>


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