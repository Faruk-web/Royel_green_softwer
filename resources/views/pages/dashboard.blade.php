@extends('layouts.app')
@section('body_content')

@php
        $business_infos = DB::table('business_infos')->find(1);
        $expence = DB::table('expenses')->sum('amount');
        $staffs = DB::table('staff')->sum('id');
        $total_purchase = $business_infos->purchased_stock;
        $godown_stock = $business_infos->balance;
        $production_stock = $business_infos->production_stock;
        $balance = $business_infos->balance;
        $todays_expance = DB::table('expenses')->where('date', \Carbon\Carbon::now()->year)->sum('amount');
        $current_year_sales = DB::table('expenses')->whereYear('date', \Carbon\Carbon::now()->year)->sum('amount');
        $current_month_sales = DB::table('expenses')->whereYear('date', \Carbon\Carbon::now()->year)->whereMonth('date', \Carbon\Carbon::now()->month)->sum('amount');
        
@endphp
<div class="content">
<div class="row">
            <div class="col-md-8">
                <div class="row shadow rounded p-2 border">
                    <div class="col-md-12"><h4><b>Dashboard</b></h4></div>
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded d-flex flex-column border border-primary">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="font-size-h4 font-w700">{{$balance}} .Tk</dt>
                                    <dd class="text-muted mb-0">Current Balance</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded d-flex flex-column border border-primary">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="font-size-h4 font-w700">{{$expence }} .Tk</dt>
                                    <dd class="text-muted mb-0">Total Expence</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded d-flex flex-column border border-primary">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="font-size-h4 font-w700">{{$staffs }}</dt>
                                    <dd class="text-muted mb-0">Total Staff</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded d-flex flex-column border border-primary">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="font-size-h4 font-w700">{{$todays_expance }} .Tk</dt>
                                    <dd class="text-muted mb-0">Today Expance</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded d-flex flex-column border border-primary">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="font-size-h4 font-w700">{{$current_month_sales }} .Tk</dt>
                                    <dd class="text-muted mb-0">This Month Expance</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded d-flex flex-column border border-primary">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="font-size-h4 font-w700">{{$current_year_sales}} .Tk</dt>
                                    <dd class="text-muted mb-0">This Years Expance</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header text-light bg-dark text-center" style="padding: 5px; font-weight: bold;">
                        <h2 style="font-weight: bold; color: #fff;">Product Current Stock</h2>
                    </div>
                    <div class="card-body">
                         
                              <div class="row border-bottom mb-2">
                                <div class="col-md-6 col-12 text-center"><h6>30 Oct, 2022</h6></div>
                                <div class="col-md-6 col-12 text-center"><h6>0.00 </h6></div>
                            </div>
                                                     
                             <div class="row border-bottom mb-2">
                                <div class="col-md-6 col-12 text-center"><h6>29 Oct, 2022</h6></div>
                                <div class="col-md-6 col-12 text-center"><h6>2,201.00 </h6></div>
                            </div>
                                                     
                             <div class="row border-bottom mb-2">
                                <div class="col-md-6 col-12 text-center"><h6>28 Oct, 2022</h6></div>
                                <div class="col-md-6 col-12 text-center"><h6>0.00 </h6></div>
                            </div>
                                                     
                             <div class="row border-bottom mb-2">
                                <div class="col-md-6 col-12 text-center"><h6>27 Oct, 2022</h6></div>
                                <div class="col-md-6 col-12 text-center"><h6>0.00 </h6></div>
                            </div>
                                                     
                             <div class="row border-bottom mb-2">
                                <div class="col-md-6 col-12 text-center"><h6>26 Oct, 2022</h6></div>
                                <div class="col-md-6 col-12 text-center"><h6>0.00 </h6></div>
                            </div>
                                                     
                            <div class="row border-bottom mb-2">
                                <div class="col-md-6 col-12 text-center"><h6>25 Oct, 2022</h6></div>
                                <div class="col-md-6 col-12 text-center"><h6>46,000.00 </h6></div>
                            </div>
                                                     
                            <div class="row border-bottom mb-2">
                                <div class="col-md-6 col-12 text-center"><h6>24 Oct, 2022</h6></div>
                                <div class="col-md-6 col-12 text-center"><h6>0.00 </h6></div>
                            </div>
                         </div>
                </div>
            </div>
        </div>
    <br>
   
</div>

@endsection