<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RawMaterial;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseInvoiceController;
use App\Http\Controllers\ProductInvoiceController;
use App\Http\Controllers\ProductionToProductController;
use App\Http\Controllers\ProductionToProductOutPutController;
use App\Http\Controllers\SellInvoiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffSalleryController;
use App\Http\Controllers\ExpensesController;




Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [Admincontroller::class, 'dashboard'])->name('/');
    Route::get('/dashboard', [Admincontroller::class, 'dashboard'])->name('dashboard');
    Route::get('/cash-in', [TransactionsController::class, 'create_cash_in'])->name('cash.in');
    Route::post('/cash-in-confirm', [TransactionsController::class, 'store_cash_in'])->name('cash.in.confirm');
    Route::get('/cash-out', [TransactionsController::class, 'create_cash_out'])->name('cash.out');
    Route::post('/cash-out-confirm', [TransactionsController::class, 'store_cash_out'])->name('cash.out.confirm');
    Route::get('/transaction-history', [TransactionsController::class, 'index'])->name('transactions.history');
    Route::get('/transaction-history-data', [TransactionsController::class, 'transactions_data'])->name('all.transactions.data');
    Route::post('/admin/update-print-cost', [SettingsController::class, 'store'])->name('update.print.cost');


    //Begin: crm
    // Route::get('/crm', [CRMcontroller::class, 'index'])->name('admin.crm');
    // Route::post('/create-crm', [CRMcontroller::class, 'store'])->name('admin.create.new.crm');
    // Route::get('/edit-crm/{id}', [CRMcontroller::class, 'edit'])->name('admin.edit.crm');
    // Route::post('/update-crm/{id}', [CRMcontroller::class, 'update']);
    // Route::get('/deactive-crm/{id}', [CRMcontroller::class, 'DeactiveCRM']);
    // Route::get('/active-crm/{id}', [CRMcontroller::class, 'ActiveCRM']);

    //Material purchase
    Route::get('/raw/material', [RawMaterial::class, 'rawmaterial'])->name('raw.material');
    Route::get('/raw/material/list', [RawMaterial::class, 'rawmateriallist'])->name('raw.material.list');
    Route::get('/raw/material/list/edit/{id}', [RawMaterial::class, 'rawmateriallistedit'])->name('raw.material.list.edit');
    Route::get('/raw/material/index', [RawMaterial::class, 'rawmaterial_data'])->name('raw.material.data');
    Route::get('/raw/material/edit', [RawMaterial::class, 'rawmaterial_edit'])->name('raw.material.edit');
    Route::post('/raw/material/update/{id}', [RawMaterial::class, 'rawmaterial_update'])->name('raw.material.update');
    Route::post('/raw/material/store', [RawMaterial::class, 'rawmaterialstore'])->name('raw.material.store');

    Route::get('/material/stock', [RawMaterial::class, 'materialstock'])->name('material.stock');
    Route::get('/material/stock/data', [RawMaterial::class, 'materialstockdata'])->name('material.stock.data');
    
    //suppliers
    Route::get('/supplier/create', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/list', [SupplierController::class, 'list'])->name('supplier.list');
    Route::get('/supplier/list/edit/{id}', [SupplierController::class, 'list_edit'])->name('supplier.list.edit');
    Route::post('/supplier/list/update/{id}', [SupplierController::class, 'list_update'])->name('supplier.list.update');
    Route::get('/supplier/list/data', [SupplierController::class, 'list_data'])->name('supplier.list.data');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

    //purchase invoice
    Route::get('/purchase/invoice/create', [PurchaseInvoiceController::class, 'Invoice'])->name('purchase.invoice');
    Route::get('/purchase/invoice/list', [PurchaseInvoiceController::class, 'Invoice_list'])->name('purchase.invoice.list');
    Route::get('/purchase/invoice/data', [PurchaseInvoiceController::class, 'Invoice_list_data'])->name('purchase.invoice.data');
    Route::get('/purchase/invoice/search-project', [PurchaseInvoiceController::class, 'search_supplier_for_purchase']);
    Route::post('/purchase/invoice/store', [PurchaseInvoiceController::class, 'store'])->name('purchase.store');
    Route::get('/purchase/material/create', [PurchaseInvoiceController::class, 'purchase_material'])->name('purchase.material');
    Route::get('/purchase/material/list', [PurchaseInvoiceController::class, 'purchase_material_list'])->name('purchase.material.list');
    Route::get('/purchase/material/data', [PurchaseInvoiceController::class, 'purchase_material_data'])->name('purchase.material.data');
    Route::post('/purchase/material/submite', [PurchaseInvoiceController::class, 'purchase_material_submite'])->name('purchase.material.submite');
    Route::get('/search_member', [PurchaseInvoiceController::class, 'search_member']);
    Route::get('/create/search-doner', [PurchaseInvoiceController::class, 'search_doner']);
    
    //product
    Route::get('/product/create', [ProductInvoiceController::class, 'create'])->name('product.create');
    Route::get('/material/make/product/create', [ProductInvoiceController::class, 'material_product'])->name('material.make.product');
    Route::post('/product/store', [ProductInvoiceController::class, 'productstore'])->name('product.store');
    Route::get('/product/list', [ProductInvoiceController::class, 'product_list'])->name('product.list');
    Route::get('/product/edit/{id}', [ProductInvoiceController::class, 'edit_product'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductInvoiceController::class, 'update_product'])->name('product.update');
    
    Route::get('/product/list/data', [ProductInvoiceController::class, 'product_list_data'])->name('product.list.data');
    
    Route::get('/product/material-info-to-make-product/{id}', [ProductInvoiceController::class, 'material_info_to_make_product'])->name('material.info.to.make.product');
    
    Route::get('/search_product', [ProductInvoiceController::class, 'search_product']);
    Route::get('/create/search/material', [ProductInvoiceController::class, 'search_material_to_make_product']);
    Route::get('/create/search/material/product', [ProductInvoiceController::class, 'make_product']);
    Route::post('/material/make/product/submite', [ProductInvoiceController::class, 'material_make_product_submite'])->name('material.make.product.submite');
    Route::get('/material/make/product/list', [ProductInvoiceController::class, 'material_make_product_product_list'])->name('material.make.product.list');
    Route::get('/material/make/product/data', [ProductInvoiceController::class, 'material_make_product_data'])->name('materiak.make.product.data');
    
    //production to product 
    Route::get('/production/invoices', [ProductionToProductController::class, 'production_invoices'])->name('production.invoices');
    Route::post('/product/invoice/store', [ProductionToProductController::class, 'invoicestore'])->name('invoice.store');
    Route::get('/product/invoice/list/data', [ProductionToProductController::class, 'invoicelistdata'])->name('invoice.list.data');
    Route::get('/product/invoice/list/edit/{id}', [ProductionToProductController::class, 'invoicelistedit'])->name('invoice.list.edit');
    Route::get('/production/material/create', [ProductionToProductController::class, 'production_material'])->name('production.material.create');
    Route::get('/search_member', [ProductionToProductController::class, 'search_member']);
    Route::get('/create/search-doner', [ProductionToProductController::class, 'search_doner']);
   
    //Production
    Route::post('/production/material/store', [ProductionToProductController::class, 'production_material_store'])->name('production.material.store');
    Route::get('/make-production', [ProductionToProductController::class, 'make_production'])->name('production.material');
    Route::get('/make-production/search_materials', [ProductionToProductController::class, 'search_materials_for_production']);
    Route::get('/production/material/list', [ProductionToProductController::class, 'productionmateriallist'])->name('production.material.list');
    Route::get('/production/material/data', [ProductionToProductController::class, 'production_material_data'])->name('production.material.data');
    Route::get('/production-invoice/{invoice_number}/view', [ProductionToProductController::class, 'production_invoice_view'])->name('production.invoice.view');

    // Production to make product
    Route::get('/production/{id}/make-product', [ProductionToProductController::class, 'production_to_make_product'])->name('production.to.make.product');
    Route::get('/search/product', [ProductionToProductOutPutController::class, 'productsearch_for_production_to_product_output']);
    Route::post('/production/to/product/store', [ProductionToProductOutPutController::class, 'productiontoproductstore'])->name('production.product.store');
    
    Route::get('/production/to/product', [ProductionToProductOutPutController::class, 'productiontoproduct'])->name('production.product');
    
    Route::post('/production/change/status', [ProductionToProductOutPutController::class, 'change_production_status'])->name('production.change.status');
    
    Route::get('/search//raw/material', [ProductionToProductOutPutController::class, 'rawmaterialsearch']);
    
    Route::get('/production/to/product/list', [ProductionToProductOutPutController::class, 'productiontoproductlist'])->name('production.product.list');
    Route::get('/production/to/product/data', [ProductionToProductOutPutController::class, 'productiontoproductdata'])->name('production.product.data');
    Route::get('/production/product/stock', [ProductionToProductOutPutController::class, 'productstock'])->name('production.product.stock');
    Route::get('/production/product/stock/data', [ProductionToProductOutPutController::class, 'productstockdata'])->name('production.product.stock.data');



    // staff route start
    Route::get('/add/staff', [StaffController::class, 'addstaff'])->name('add.staff');
    Route::get('/staff/list', [StaffController::class, 'stafflist'])->name('staff.list');
    Route::post('/store/staff', [StaffController::class, 'staffstore'])->name('staff.store');
    Route::get('/staff/list/index',[StaffController::class, 'stafflistindex'])->name('staff.list.index');
    Route::get('/staff/edit/{id}',[StaffController::class, 'staffedit'])->name('staff.edit');
    Route::post('/staff/update',[StaffController::class, 'staffupdate'])->name('staff.update');

    //staff sallery start
    Route::get('/staff/sallery', [StaffSalleryController::class, 'staff_sallery'])->name('staff.sallery');
    Route::get('/staff/sallery/history', [StaffSalleryController::class, 'salleryhistory'])->name('staff.sallery.history');
    Route::get('/sallery/index', [StaffSalleryController::class, 'salleryhistoryindex'])->name('staff.sallery.index');
    Route::get('/sallery/search', [StaffSalleryController::class, 'staffsearch'])->name('staff.search');
    Route::post('/month/search', [StaffSalleryController::class, 'monthsearch']);
    Route::post('/staff/pay', [StaffSalleryController::class, 'pay'])->name('staff.payment.pay');
    //staff sallery end

    // expense route start
    Route::get('/expence', [ExpensesController::class, 'expence'])->name('expence');
    Route::get('/expence/list', [ExpensesController::class, 'expencelist'])->name('expence.list');
    Route::post('/expence/store', [ExpensesController::class, 'expence_store'])->name('expence.store');
    Route::get('/expence/index', [ExpensesController::class, 'expenceindex'])->name('expence.index');
    Route::get('/expence/category', [ExpensesController::class, 'category'])->name('expence.category');
    Route::get('/expense/edit-category/{id}', [ExpensesController::class, 'categoryedit']);
    Route::post('/category/store', [ExpensesController::class, 'categorystore']);
    Route::post('/category/update', [ExpensesController::class, 'categoryupdate']);
    // expense route end

    // business setting route
    Route::get('/setting', [Admincontroller::class, 'setting'])->name('setting');
    Route::post('/store/setting', [Admincontroller::class, 'storesetting'])->name('store.update.setting');
    Route::get('/balance/index',[Admincontroller::class, 'balanceindex'])->name('balance.index');

    // Sell / bill preparation Start
    Route::get('/bill/preparation', [SellInvoiceController::class, 'create'])->name('bill.preparation');
    Route::get('/bill_preparation/search_client', [SellInvoiceController::class, 'search_client']);
    Route::get('/bill_preparation/search_products', [SellInvoiceController::class, 'search_products']);
    Route::post('/bill/preparation/store', [SellInvoiceController::class, 'store'])->name('bill.preparation.store');
    Route::get('/all-bills', [SellInvoiceController::class, 'index'])->name('sell.index');
    Route::get('/all-bills_data', [SellInvoiceController::class, 'index_data'])->name('bills.index.data');
    
    // Sell End






});
