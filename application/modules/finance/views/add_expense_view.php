<!--sidebar end-->
<!--main content start-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> <?php
                            if (!empty($expense->id))
                                echo lang('edit_expense');
                            else
                                echo lang('add_expense');
                            ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home"><?php echo lang('home') ?></a></li>
                        <li class="breadcrumb-item active"> <?php
                                                            if (!empty($expense->id))
                                                                echo lang('edit_expense');
                                                            else
                                                                echo lang('add_expense');
                                                            ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="finance/addExpense" class="clearfix row" method="post" enctype="multipart/form-data">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1"><?php echo lang('category'); ?> &ast;</label>
                                    <select class="form-control m-bot15 js-example-basic-single" name="category" value='' required="">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?php echo $category->category; ?>" <?php
                                                                                                if (!empty($setval)) {
                                                                                                    if ($category->category == set_value('category')) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                }
                                                                                                if (!empty($expense->category)) {
                                                                                                    if ($category->category == $expense->category) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                }
                                                                                                ?>> <?php echo $category->category; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1"><?php echo lang('amount'); ?> &ast;</label>
                                    <input type="number" step="0.01" class="form-control" name="amount" value='<?php
                                                                                                    if (!empty($setval)) {
                                                                                                        echo set_value('amount');
                                                                                                    }
                                                                                                    if (!empty($expense->amount)) {
                                                                                                        echo $expense->amount;
                                                                                                    }
                                                                                                    ?>' placeholder="<?php echo $settings->currency; ?>" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1"><?php echo lang('note'); ?></label>
                                    <input type="text" class="form-control" name="note" value='<?php
                                                                                                if (!empty($setval)) {
                                                                                                    echo set_value('note');
                                                                                                }
                                                                                                if (!empty($expense->note)) {
                                                                                                    echo $expense->note;
                                                                                                }
                                                                                                ?>' placeholder="" required="">
                                </div>
                                <input type="hidden" name="id" value='<?php
                                                                        if (!empty($expense->id)) {
                                                                            echo $expense->id;
                                                                        }
                                                                        ?>'>
                                <div class="form-group col-md-12">
                                    <button type="submit" name="submit" class="btn btn-info float-right"><?php echo lang('submit'); ?></button>
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