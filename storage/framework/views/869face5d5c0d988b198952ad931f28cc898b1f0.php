<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section id="invoice-title-number">

        <span id="title">No # <?php echo e($invoice->id); ?></span>

    </section>

    <div class="clearfix"></div>

    <section id="client-info">
        <div>
            <span class="bold">Customer : <?php echo e($invoice->vendor?$invoice->vendor->name:''); ?></span>
        </div>

        <div>
            <span>Address : <?php echo e($invoice->vendor?$invoice->vendor->address:''); ?></span>
        </div>


        <div>
            <span>Phone : <?php echo e($invoice->vendor?$invoice->vendor->phone:''); ?></span>
        </div>
        <br>


    </section>

    <div class="clearfix"></div>

    <section id="items">

        <table cellpadding="0" cellspacing="0">

            <tr>
                <th >pre Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>

            <?php $__currentLoopData = $invoice->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr >
                    <td><?php echo e($row->pre_product?$row->pre_product->name:''); ?></td>
                    <td><?php echo e($row->quantity); ?></td>
                    <td><?php echo e($row->pre_product?$row->pre_product->purchase_price:''); ?></td>
                    <td><?php echo e($row->total); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>

    </section>

    <section id="sums">

        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Sub Total : </th>
                <td><?php echo e($invoice->sub_total); ?></td>
            </tr>

            <tr data-iterate="tax">
                <th>Tax : </th>
                <td><?php echo e($invoice->tax); ?></td>
            </tr>
            <tr data-hide-on-quote="true">
                <th>Tax Amount : </th>
                <td><?php echo e($invoice->tax_amount); ?></td>
            </tr>

            <tr data-hide-on-quote="true" class="due-amount">
                <th>Discount Amount : </th>
                <td><?php echo e($invoice->discount_amount); ?></td>
            </tr>
            <tr class="amount-total">
                <!-- {amount_total_label} -->
                <td colspan="2"><?php echo e($invoice->grand_total); ?></td>
            </tr>
        </table>

        <div class="clearfix"></div>

    </section>

    <div class="clearfix"></div>

    <section id="invoice-info">
        <div>
            <span><b>Invoice Date :</b> </span> <span><b><?php echo e($invoice->created_at); ?></b></span>
        </div>

        <br />

        <div>
            <span>Currency : </span> <span>EGP</span>
        </div>
    </section>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/inventory-pre-products-invoice/pdf-template-2.blade.php ENDPATH**/ ?>