<aside class="main-sidebar <?php echo e(config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4')); ?>">

    
    <?php if(config('adminlte.logo_img_xl')): ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xl', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column <?php echo e(config('adminlte.classes_sidebar_nav', '')); ?>"
                data-widget="treeview" role="menu"
                <?php if(config('adminlte.sidebar_nav_animation_speed') != 300): ?>
                    data-animation-speed="<?php echo e(config('adminlte.sidebar_nav_animation_speed')); ?>"
                <?php endif; ?>
                <?php if(!config('adminlte.sidebar_nav_accordion')): ?>
                    data-accordion="false"
                <?php endif; ?>>
                
            <?php if(Auth::user()->type==1): ?>
                <li class="nav-item">
                    <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' ?'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class="fas fa-home "></i>

                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a class="nav-link  " href="">
                        <i class="fas fa-fw fa-users "></i>
                        <p>
                            logistic and operation
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'vendors' ?'active' : ''); ?>" href="<?php echo e(route('vendors')); ?>">

                                <i class="fas fa-fw fa-user "></i>

                                <p>
                                    Vendor listing

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'categories' ?'active' : ''); ?>" href="<?php echo e(route('categories')); ?>">

                                <i class="fas fa-fw fa-bars "></i>

                                <p>
                                    Categories

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link <?php echo e(request()->route()->getName() === 'sub-categories' ?'active' : ''); ?> " href="<?php echo e(route('sub-categories')); ?>">

                                <i class="fas fa-fw fa-border-style "></i>

                                <p>
                                    Sub Categories

                                </p>

                            </a>

                        </li>
                           <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'pre-products' ?'active' : ''); ?>" href="<?php echo e(route('pre-products')); ?>">

                                <i class="fas fa-fw fa-pills "></i>

                                <p>
                                    Pre-products

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'products' ?'active' : ''); ?>" href="<?php echo e(route('products')); ?>">

                                <i class="fas fa-fw fa-pump-medical "></i>

                                <p>
                                    Products

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link <?php echo e(request()->route()->getName() === 'couriers' ?'active' : ''); ?> " href="<?php echo e(route('couriers')); ?>">

                                <i class="fas fa-fw fa-shipping-fast "></i>

                                <p>
                                    Couriers

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'areas' ?'active' : ''); ?>" href="<?php echo e(route('areas')); ?>">

                                <i class="fas fa-map-marker-alt "></i>

                                <p>
                                    Areas

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  " href="<?php echo e(route('expenses-receipts')); ?>">

                                <i class="fas fa-receipt "></i>

                                <p>
                                    Expenses Receipts

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">
                                <a class="nav-link <?php echo e(request()->route()->getName() === 'user-categories' ?'active' : ''); ?> " href="<?php echo e(route('user-categories')); ?>">
                                    <i class="fab fa-fw fa-black-tie "></i>
                                    <p>
                                        categories rating
                                    </p>
                                </a>
                        </li>

                    </ul>

                </li>
                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-warehouse "></i>

                            <p>
                                Inventory
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                              <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('inventory-pre-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-pre-products

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('inventory-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('inventory-sales-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        Inventory-Orders

                                    </p>

                                </a>

                            </li>
                            
                            


                        </ul>

                    </li>
                <li class="nav-item has-treeview ">


                    <a class="nav-link  " href="">

                        <i class="fas fa-cogs "></i>

                        <p>
                            orders &customer-service
                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>


                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'customers' ?'active' : ''); ?>" href="<?php echo e(route('customers')); ?>">
                                <i class="fas fa-fw fa-user "></i>
                                <p>
                                    Customers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'sales-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('sales-invoice-index')); ?>">

                                <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                <p>
                                    Orders

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  " href="<?php echo e(route('tickets')); ?>">

                                <i class="fas fa-frown "></i>

                                <p>
                                    Tickets

                                </p>

                            </a>

                        </li>


                    </ul>

                </li>
                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-calculator "></i>

                            <p>
                                Accounting
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                             <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pre-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('sales-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        returned Orders

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('purchases-pre-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        returned <br>Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('purchases-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        returned <br>Purchases-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'coustomers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('customers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Customers Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'vendors-accounting' ?'active' : ''); ?>" href="<?php echo e(route('vendors-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Vendors Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'couriers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('couriers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Couriers Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses  Receipts

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-bank-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Bank Receipts

                                    </p>

                                </a>

                            </li>
                        </ul>

                    </li>
                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-calculator "></i>

                            <p>
                                Finance
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'banks' ?'active' : ''); ?>" href="<?php echo e(route('banks')); ?>">

                                    <i class="fab fa-cc-apple-pay "></i>

                                    <p>
                                        Banks

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pre-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('sales-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        returned Orders

                                    </p>

                                </a>

                            </li>
                              <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('purchases-pre-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        returned <br>Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('purchases-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        returned<br> Purchases-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('customers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Customers Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('vendors-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Vendors Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('couriers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Couriers Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-categories')); ?>">

                                    <i class="fas fa-bars "></i>

                                    <p>
                                        Expenses Categories

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Expenses

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses  Receipts

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-bank-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Bank Receipts

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('treasury')); ?>">

                                    <i class="fas fa-home "></i>

                                    <p>
                                        Treasury

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('treasury-bank')); ?>">

                                    <i class="fas fa-home "></i>

                                    <p>
                                        Bank Treasury

                                    </p>

                                </a>

                            </li>
                        </ul>

                    </li>
                    <li class="nav-item has-treeview ">
                        <a class="nav-link  " href="">
                            <i class="fas fa-fw fa-users "></i>
                            <p>
                                users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">

                                <a class="nav-link <?php echo e(request()->route()->getName() === 'users' ?'active' : ''); ?> " href="<?php echo e(route('users')); ?>">
                                    <i class="fas fa-fw fa-user "></i>
                                    <p>
                                        users
                                    </p>
                                </a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link <?php echo e(request()->route()->getName() === 'user-types' ?'active' : ''); ?> " href="<?php echo e(route('user-types')); ?>">
                                    <i class="fas fa-fw fa-user-lock "></i>
                                    <p>
                                        permissions
                                    </p>
                                </a>
                            </li>-->


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'information' ?'active' : ''); ?>" href="<?php echo e(route('information')); ?>">
                            <i class="fas fa-info-circle "></i>

                            <p>
                              Information
                            </p>
                        </a>
                    </li>

                <?php elseif(Auth::user()->type==2): ?>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' ?'active' : ''); ?> " href="<?php echo e(route('dashboard')); ?>">
                            <i class="fas fa-home "></i>

                            <p>
                                Home
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview ">
                        <a class="nav-link  " href="">
                            <i class="fas fa-fw fa-users "></i>
                            <p>
                                 logistic and operation
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a class="nav-link  " href="<?php echo e(route('vendors')); ?>">

                                    <i class="fas fa-fw fa-user "></i>

                                    <p>
                                        Vendors

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('couriers')); ?>">

                                    <i class="fas fa-fw fa-shipping-fast "></i>

                                    <p>
                                        Couriers

                                    </p>

                                </a>

                            </li>
                        <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('areas')); ?>">

                                    <i class="fas fa-map-marker-alt "></i>

                                    <p>
                                        Areas

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('categories')); ?>">

                                    <i class="fas fa-fw fa-bars "></i>

                                    <p>
                                        Categories

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('sub-categories')); ?>">

                                    <i class="fas fa-fw fa-border-style "></i>

                                    <p>
                                        Sub Categories

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('pre-products')); ?>">

                                    <i class="fas fa-fw fa-pills "></i>

                                    <p>
                                        Pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('products')); ?>">

                                    <i class="fas fa-fw fa-pump-medical "></i>

                                    <p>
                                        Products

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Receipts

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">
                                <a class="nav-link <?php echo e(request()->route()->getName() === 'user-categories' ?'active' : ''); ?> " href="<?php echo e(route('user-categories')); ?>">
                                    <i class="fab fa-fw fa-black-tie "></i>
                                    <p>
                                        categories rating
                                    </p>
                                </a>
                            </li>


                        </ul>

                    </li>
                          <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-warehouse "></i>

                            <p>
                                Inventory
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'inventory-pre-products' ?'active' : ''); ?>" href="<?php echo e(route('inventory-pre-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-pre-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'inventory-products' ?'active' : ''); ?>" href="<?php echo e(route('inventory-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'inventory-sales-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('inventory-sales-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        Inventory-Orders

                                    </p>

                                </a>

                            </li>
                            
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('add-invoices-to-couriers')); ?>">

                                    <i class="fas fa-fw fa-shipping-fast "></i>

                                    <p>
                                        add-invoices-to-couriers

                                    </p>

                                </a>

                            </li>

                        </ul>

                    </li>
                        <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pre-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>
                <?php elseif(Auth::user()->type==3): ?>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' ?'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                            <i class="fas fa-home "></i>

                            <p>
                                Home
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-warehouse "></i>

                            <p>
                                Inventory
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'inventory-pre-products' ?'active' : ''); ?>" href="<?php echo e(route('inventory-pre-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-pre-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'inventory-products' ?'active' : ''); ?>" href="<?php echo e(route('inventory-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'inventory-sales-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('inventory-sales-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        Inventory-Orders

                                    </p>

                                </a>

                            </li>
                            
                  

                        </ul>

                    </li>
                <?php elseif(Auth::user()->type==4): ?>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' ?'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                            <i class="fas fa-home "></i>

                            <p>
                                Home
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview ">
                        <a class="nav-link active " href="">
                            <i class="fas fa-fw fa-users "></i>
                            <p>
                                orders &customer-service
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'customers' ?'active' : ''); ?>" href="<?php echo e(route('customers')); ?>">
                                    <i class="fas fa-fw fa-user "></i>
                                    <p>
                                        Customers
                                    </p>
                                </a>
                            </li>
                             <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'sales-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('sales-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        Orders

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'tickets' ?'active' : ''); ?>" href="<?php echo e(route('tickets')); ?>">

                                <i class="fas fa-frown "></i>

                                <p>
                                    Tickets

                                </p>

                            </a>

                            </li>

                        </ul>

                    </li>
                <?php elseif(Auth::user()->type==5): ?>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' ?'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                            <i class="fas fa-home "></i>

                            <p>
                                Home
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-fw fa-file-invoice "></i>

                            <p>
                                accounting
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'sales-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('sales-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        orders

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pre-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>

                        </ul>

                    </li>
                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-fw fa-file-invoice "></i>

                            <p>
                                Return Invoices
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('sales-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        Orders

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pre-products-return-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-return-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>

                        </ul>

                    </li>
                    <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'coustomers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('customers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Customers Accounting

                                    </p>

                                </a>

                    </li>
                    <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'vendors-accounting' ?'active' : ''); ?>" href="<?php echo e(route('vendors-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Vendors Accounting

                                    </p>

                                </a>

                    </li>
                    <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'couriers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('couriers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Couriers Accounting

                                    </p>

                                </a>

                    </li>
                     <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Receipts

                                    </p>

                                </a>

                    </li>
                    <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-bank-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Bank Receipts

                                    </p>

                                </a>

                    </li>
                <?php elseif(Auth::user()->type==6): ?>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' ?'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                            <i class="fas fa-home "></i>

                            <p>
                                Home
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-cogs "></i>

                            <p>
                                Finance
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">

                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'banks' ?'active' : ''); ?>" href="<?php echo e(route('banks')); ?>">

                                    <i class="fab fa-cc-apple-pay "></i>

                                    <p>
                                        Banks

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pe-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>

                        </ul>

                    </li>

                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-fw fa-file-invoice "></i>

                            <p>
                                Return Invoices
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('sales-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        Orders

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pre-products-return-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-return-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>

                        </ul>

                    </li>
                               <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'coustomers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('customers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Customers Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'vendors-accounting' ?'active' : ''); ?>" href="<?php echo e(route('vendors-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Vendors Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'couriers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('couriers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Couriers Accounting

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'expenses-categories' ?'active' : ''); ?>" href="<?php echo e(route('expenses-categories')); ?>">

                                    <i class="fas fa-bars "></i>

                                    <p>
                                        Expenses Categories

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'expenses' ?'active' : ''); ?>" href="<?php echo e(route('expenses')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Expenses

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'expenses-receipts' ?'active' : ''); ?>" href="<?php echo e(route('expenses-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Receipts

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'expenses-bank-receipts' ?'active' : ''); ?>" href="<?php echo e(route('expenses-bank-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Bank Receipts

                                    </p>

                                </a>

                            </li>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'treasury' ?'active' : ''); ?>" href="<?php echo e(route('treasury')); ?>">

                            <i class="fas fa-home "></i>

                            <p>
                                Treasury

                            </p>

                        </a>

                    </li>
                    <li class="nav-item">

                        <a class="nav-link  <?php echo e(request()->route()->getName() === 'treasury-bank' ?'active' : ''); ?>" href="<?php echo e(route('treasury-bank')); ?>">

                            <i class="fas fa-home "></i>

                            <p>
                                Bank Treasury

                            </p>

                        </a>

                    </li>
                <?php elseif(Auth::user()->type==7): ?>
<li class="nav-item">
                    <a class="nav-link  <?php echo e(request()->route()->getName() === 'dashboard' ?'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class="fas fa-home "></i>

                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a class="nav-link  " href="">
                        <i class="fas fa-fw fa-users "></i>
                        <p>
                            logistic and operation
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'vendors' ?'active' : ''); ?>" href="<?php echo e(route('vendors')); ?>">

                                <i class="fas fa-fw fa-user "></i>

                                <p>
                                    Vendor listing

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'categories' ?'active' : ''); ?>" href="<?php echo e(route('categories')); ?>">

                                <i class="fas fa-fw fa-bars "></i>

                                <p>
                                    Categories

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link <?php echo e(request()->route()->getName() === 'sub-categories' ?'active' : ''); ?> " href="<?php echo e(route('sub-categories')); ?>">

                                <i class="fas fa-fw fa-border-style "></i>

                                <p>
                                    Sub Categories

                                </p>

                            </a>

                        </li>
                           <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'pre-products' ?'active' : ''); ?>" href="<?php echo e(route('pre-products')); ?>">

                                <i class="fas fa-fw fa-pills "></i>

                                <p>
                                    Pre-products

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'products' ?'active' : ''); ?>" href="<?php echo e(route('products')); ?>">

                                <i class="fas fa-fw fa-pump-medical "></i>

                                <p>
                                    Products

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link <?php echo e(request()->route()->getName() === 'couriers' ?'active' : ''); ?> " href="<?php echo e(route('couriers')); ?>">

                                <i class="fas fa-fw fa-shipping-fast "></i>

                                <p>
                                    Couriers

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'areas' ?'active' : ''); ?>" href="<?php echo e(route('areas')); ?>">

                                <i class="fas fa-map-marker-alt "></i>

                                <p>
                                    Areas

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  " href="<?php echo e(route('expenses-receipts')); ?>">

                                <i class="fas fa-receipt "></i>

                                <p>
                                    Expenses Receipts

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">
                                <a class="nav-link <?php echo e(request()->route()->getName() === 'user-categories' ?'active' : ''); ?> " href="<?php echo e(route('user-categories')); ?>">
                                    <i class="fab fa-fw fa-black-tie "></i>
                                    <p>
                                        categories rating
                                    </p>
                                </a>
                        </li>

                    </ul>

                </li>
                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-warehouse "></i>

                            <p>
                                Inventory
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                              <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('inventory-pre-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-pre-products

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('inventory-products')); ?>">

                                    <i class="fas fa-boxes "></i>

                                    <p>
                                        Inventory-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('inventory-sales-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        Inventory-Orders

                                    </p>

                                </a>

                            </li>
                            
                  


                        </ul>

                    </li>
                <li class="nav-item has-treeview ">


                    <a class="nav-link  " href="">

                        <i class="fas fa-cogs "></i>

                        <p>
                            orders &customer-service
                            <i class="fas fa-angle-left right"></i>

                        </p>

                    </a>


                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'customers' ?'active' : ''); ?>" href="<?php echo e(route('customers')); ?>">
                                <i class="fas fa-fw fa-user "></i>
                                <p>
                                    Customers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link  <?php echo e(request()->route()->getName() === 'sales-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('sales-invoice-index')); ?>">

                                <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                <p>
                                    Orders

                                </p>

                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link  " href="<?php echo e(route('tickets')); ?>">

                                <i class="fas fa-frown "></i>

                                <p>
                                    Tickets

                                </p>

                            </a>

                        </li>


                    </ul>

                </li>
                    <li class="nav-item has-treeview ">


                        <a class="nav-link  " href="">

                            <i class="fas fa-calculator "></i>

                            <p>
                                Accounting
                                <i class="fas fa-angle-left right"></i>

                            </p>

                        </a>


                        <ul class="nav nav-treeview">
                             <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-pre-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-pre-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'purchases-products-invoice-index' ?'active' : ''); ?>" href="<?php echo e(route('purchases-products-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        Purchases-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('sales-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-invoice-dollar "></i>

                                    <p>
                                        returned Orders

                                    </p>

                                </a>

                            </li>
                             <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('purchases-pre-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file-alt "></i>

                                    <p>
                                        returned <br>Purchases-pre-products

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('purchases-products-return-invoice-index')); ?>">

                                    <i class="fas fa-fw fa-file "></i>

                                    <p>
                                        returned <br>Purchases-products

                                    </p>

                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'coustomers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('customers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Customers Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'vendors-accounting' ?'active' : ''); ?>" href="<?php echo e(route('vendors-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Vendors Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  <?php echo e(request()->route()->getName() === 'couriers-accounting' ?'active' : ''); ?>" href="<?php echo e(route('couriers-accounting')); ?>">

                                    <i class="fas fa-money-check "></i>

                                    <p>
                                        Couriers Accounting

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses  Receipts

                                    </p>

                                </a>

                            </li>
                            <li class="nav-item">

                                <a class="nav-link  " href="<?php echo e(route('expenses-bank-receipts')); ?>">

                                    <i class="fas fa-receipt "></i>

                                    <p>
                                        Expenses Bank Receipts

                                    </p>

                                </a>

                            </li>
                        </ul>

                    </li>


                <?php endif; ?>


            </ul>
        </nav>
    </div>

</aside>
<?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/vendor/adminlte/partials/sidebar/left-sidebar.blade.php ENDPATH**/ ?>