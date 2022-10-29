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
    
    .col-40 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }
    
    .col-60 {
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
      .col-40, .col-60, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
    </style>
<div class="content">
    <form action="{{route('expence.store')}}" method="POST">
        @csrf
        <div>
            <h3> Expence</h3>
        </div>
    <div class="row">
              <div class="col-md-6">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">


                    <div class="row" style="margin: 0px 10px">
                     <label for="fname">Expense Category</label>
                        
                    <select class="form-control" name="category_id" required>
                        <option selected value="0">Select Expence Category</option>
                        @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        
                       @endforeach
                    </select>
                       
                        
                      </div>


                </div>


               
                </div>
            </div>
        <div class="col-md-6">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">


                    <div class="row" style="margin: 0px 10px">
                    
                        
                        <div class="col-40">
                          <label for="fname">Amount</label>
                        </div>
                        <div class="col-60">
                            <input type="number" step="any" class="form-control" name="amount"  min="0"   required>
                            
                        </div>
                       
                        
                      </div>


                </div>


               
                </div>
            </div>
  
         
   
        </div>

        <div class="col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <div class="row">
               
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control"   >
            
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="form-group">
                           <label for="fname">Voucher Number</label>
                              <input type="text" step="any" class="form-control" name="voucer_number"     required>
            
                        </div>
                    </div> --}}
                   
                   
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Note</label>
                            <textarea name="note" class="form-control" id="" cols="10" rows="3"></textarea>
                           
            
                        </div>
                    </div>
                
                </div>


                <div class="form-group text-right">
                <button type="submit" class="btn btn-success btn-rounded">Save</button>
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
  $('#stock').keyup(function () {
    var stockkg = $(this).val();
   var mon =stockkg/40;
   var a=$("#checkstock").val();
   console.log(mon);
   console.log(a);
if (mon <= a) {
    $("#show2").hide();
    $('#stock_mon').val(mon);
}else{
    $("#show2").show();
    $('#stock_mon').val(0);
}
    
    
});

  $('#stock_mon').keyup(function () {
    var stockmon = $(this).val();
   var mon =stockmon*40;
   var a=$("#checkstock").val();
   if (stockmon <= a) {
    $("#show3").hide();
    $('#stock').val(mon);
}else{
    $("#show3").show();
    $('#stock').val(0);
}
    
   
});



  $('#godown_stock_mon').keyup(function () {
    var wastemon = $(this).val();
    var mon =wastemon*40;
    $('#godown_stock').val(mon);
   
    

});
</script>
<script>
       $('#search_distributor').keyup(function () {
        var info = $(this).val();
        console.log(info);
        $.ajax({
            type: 'get',
            url: '/supplier/search',
            data: {
                'info': info,
            },
            success: function (data) {
              $("#show2").show();
                $('#search_distributor_show').html(data);
                
            }
        });
    });
    function add_distributor_data(name, id, phone, address) {
       
       
       $('#s_name').val(name);
       $('#s_phone').val(phone);
       $('#s_address').val(address);
       $('#s_id').val(id);
       $("#show2").hide();
 
}
</script>
@endsection
