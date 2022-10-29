<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        <a class="font-w600 text-dual" href="{{route('/')}}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">Royal Green LTD.<span class="font-w400"></span>
            </span>
        </a>
        
        <div>
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll">
        <div class="content-side">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link active" href="{{route('/')}}">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link active" href="{{route('setting')}}">
                    <i class="nav-main-link-icon fas fa-edit"></i>
                    <span class="nav-main-link-name"><span class="rounded p-1">Setting</span></span>
                </a>
            </li>
                
                <!-- <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-plane"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Flight Type</span></span>
                    </a>
                </li>
                
                <li class="nav-main-item">
                    <a class="nav-main-link active bg-light text-dark" href="">
                        <i class="nav-main-link-icon fas fa-money-check text-dark"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Scan</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-id-card-alt"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">All Scanned Passport</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fa fa-file"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Report</span></span>
                    </a>
                </li> -->
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('supplier.list')}}">
                        <i class="nav-main-link-icon fas fa-id-card-alt"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Suppliers</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{route('raw.material.list')}}">
                        <i class="nav-main-link-icon fa fa-file"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Raw Materials</span></span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fas fa-id-card-alt"></i>
                        <span class="nav-main-link-name">Purchase</span>
                    </a>
                    <ul class="nav-main-submenu">
                       <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('purchase.material')}}">
                                <span class="nav-main-link-name">Purcharse Material</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('purchase.invoice.list')}}">
                                <span class="nav-main-link-name">Purcharse Invoice List</span>
                            </a>
                        </li> 
                    </ul>
                </li>
                

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                      <i class="nav-main-link-icon fa fa-coins"></i>
                        <span class="nav-main-link-name">Current Stocks</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('material.stock')}}">
                                <span class="nav-main-link-name">Materials Current stock</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('production.product.stock')}}">
                                <span class="nav-main-link-name">Products Current stock</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                      <i class="nav-main-link-icon fas fa-money-check text-light"></i>
                        <span class="nav-main-link-name">products</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('product.create')}}">
                                <span class="nav-main-link-name">Add New Products</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('product.list')}}">
                                <span class="nav-main-link-name">All Products</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fas fa-plane"></i>
                        <span class="nav-main-link-name">Production</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('production.material')}}">
                                <span class="nav-main-link-name">Make Production</span>
                            </a>
                        </li>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('production.invoices')}}">
                                <span class="nav-main-link-name">Production Invoices</span>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-main-item bg-light">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-cart-plus text-dark"></i>
                        <span class="nav-main-link-name text-dark">Bill Preparation</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('bill.preparation')}}">
                                <span class="nav-main-link-name">Prepare Bill</span>
                            </a>
                        </li>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('sell.index')}}">
                                <span class="nav-main-link-name">Bill / Sold Invoices</span>
                            </a>
                        </li>
                       
                    </ul>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-user-plus"></i>
                        <span class="nav-main-link-name">Staff</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link"  href="{{route('add.staff')}}">
                                <span class="nav-main-link-name">Add Staff</span>
                            </a>
                        </li>
                       
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('staff.list')}}">
                                <span class="nav-main-link-name">Staff List</span>
                            </a>
                        </li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{route('staff.sallery')}}">
                            <span class="nav-main-link-name">Staff Sallery</span></a>
                        </li>
                        <li class="nav-main-item"><a class="nav-main-link" href="{{route('staff.sallery.history')}}">
                            <span class="nav-main-link-name">Staff Sallery History</span></a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fas fa-money-check-alt"></i>
                        <span class="nav-main-link-name"> Expense </span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link"  href="{{route('expence.category')}}">
                                <span class="nav-main-link-name">Expense Category</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link"  href="{{route('expence')}}">
                                <span class="nav-main-link-name">Expense Entry</span>
                            </a>
                        </li>
                       
                        <li class="nav-main-item">
                            <a class="nav-main-link"  href="{{route('expence.list')}}">
                                <span class="nav-main-link-name">Expense list</span>
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Bank</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('bank.list')}}">
                                <span class="nav-main-link-name">Bank List</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('bank.deposit')}}">
                                <span class="nav-main-link-name">Deposit</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('bank.withdraw')}}">
                                <span class="nav-main-link-name">Withdraw</span>
                            </a>
                        </li>
                    </ul>
                </li>
                

                
            </ul>
        </div>
    </div>
</nav>

