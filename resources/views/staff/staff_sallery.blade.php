@extends('layouts.app')
@section('body_content')
<style>
    * {
      box-sizing: border-box;
    }
    
    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }
    
    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }
    
    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    
    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }
    
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
    </style>
<div class="content">
   
  
        
    <div class="row">
        <div class="col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                    <div class="row px-5">
                        <h3>Search Staff Info(Phone, Name)</h3>
                        <input type="text" placeholder=" search by Phone, Name" id="search_order" class="form-control">
                        <div class="row" id="show2">
                            <div class="col-md-12 mt-3 p-3 shadow rounded " id="search_order_show">
                            </div>
                        </div>
                      </div>


                </div>
                </div>
            </div>
       
            <div class="col-md-12" style="display: none" id="show3">
                <div class="block block-rounded d-flex flex-column">
                    <div class="block-content block-content-full justify-content-between align-items-center">
                         <form method="POST" action="javascript:void(0)" id="send_sms_form" >
                    <div class="row">
                        <div class="col-md-8" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Select Month</label>
                                         <input type="month" class="form-control" oninput="change_month()" id="month" name="month" required>
                                    </div>
                                    <input type="hidden" name="staffid" id="staff_id" value="">
                                </div>
                                </form>
                                  <form action="{{route('staff.payment.pay')}}" method="POST">
                                @csrf
                                <input type="hidden" name="staff_id_for_submit" id="staff_id_for_submit" value="">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Amount Pay</label>
                                        <input type="text" class="form-control" id="pay" min="1" name="pay" required >
                                        <input type="hidden" name="staff_id" id="s_id">
                                        <input type="hidden" name="month_name" id="month_name" value="">
                                         <div style="display: none" id="duepaymsg"><p style="color: red" id="stock_msg">Due payment is over</p></div>
                                    </div>
                                </div>
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Date</label>
                                        <input type="date" class="form-control" id="date"  value="{{date('Y-m-d')}}" name="date" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Note</label>
                                        <textarea name="note" class="form-control" id="" cols="10" rows="3"></textarea>
                                    </div>
                                </div>
                                 <div class="form-group text-right">
                            <button type="submit" class="btn btn-success btn-rounded">Paid</button>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <div class="shadow rounded row" >
                                 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Staff Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required readonly>
                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Sallery</label>
                                        <input type="text" class="form-control" id="sallery" name="sallery" required readonly>
                                     </div>
                                </div>
                      
                                    <div class="col-md-12" style="display: none" id="show6">
                                           <div class="col-md-12">
                                    <!--<div class="form-group">-->
                                    <!--    <label class="p-0">Total Attendance</label>-->
                                    <!--    <input type="text" class="form-control" id="attendance" name="attendance"  required readonly>-->
                                    <!--</div>-->
                                </div>
                                     <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="p-0">Paid</label>
                                        <input type="text" class="form-control" id="paid" required readonly>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">-->
                                <!--    <div class="form-group">-->
                                <!--        <label class="p-0">Due</label>-->
                                <!--        <input type="text" class="form-control" id="sdue"  required  readonly>-->
                                <!--    </div>-->
                                <!--</div>-->
                                </div>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
referrerpolicy="no-referrer"></script>
<script>
       $('#search_order').keyup(function () {
        var info = $(this).val();
        console.log(info);
        $.ajax({
            type: 'get',
            url: '/sallery/search',
            data: {
                'info': info,
            },
            success: function (data) {
              $("#show2").show();
                $('#search_order_show').html(data);
                
            }
        });
    });


    function add_order_data(id, name, phone, sallery) {
     
       $('#name').val(name);
       $('#phone').val(phone);
       $('#sallery').val(sallery);
       $('#staff_id').val(id);
       $('#staff_id_for_submit').val(id);
       
       $("#show2").hide();
       $("#show3").show(); 
       
}

  $('#pay').keyup(function () {
    var pay = $(this).val();
    var due=parseInt($("#due").val());
if(due < pay){
     $("#duepaymsg").show(); 
    $('#pay').val(1);
}if(due > pay){
    $("#duepaymsg").hide();  
}

});

function change_month() {
        $('#month_name').val($('#month').val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //$('#send_form').html('Sending..');
        
        $.ajax({
            url: "/month/search",
            method: 'post',
            data: $('#send_sms_form').serialize(),
            success: function(response){
                $("#show6").show(); 
                //$('#attendance').val(response.attendance);
                $('#paid').val(response.paid);
                //$('#month_name').val(response.month_name);
                //$('#s_id').val(response.s_id);
                // $('#sdue').val(response.sdue);
            },
        });
}

</script>



@endsection
