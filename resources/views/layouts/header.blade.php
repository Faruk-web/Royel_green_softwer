<header id="page-header">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout"
                data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout"
                data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"  class="editt btn btn-primary btn-sm editProductt">Balance</a>
        </div>

        <div class="d-flex align-items-center">
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual d-flex align-items-center"
                    id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="{{asset('backend/assets/media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;">
                    <span class="d-none d-sm-inline-block ml-2">{{ $user->name }}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary-dark rounded-top">
                        <p class="mt-2 mb-0 text-white font-w500">{{ $user->name }}</p>
                    </div>
                    <div class="p-2">
                    <!-- <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="{{ route('profile.show') }}">
                            <span class="font-size-sm font-w500">Profile</span>
                            <span class="badge badge-pill badge-primary ml-2"></span>
                        </a> -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="font-size-sm font-w500">Log Out</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
</header>


<div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        
      <div class="modal-content">
           <div class="modal-header">
          <h5 class="modal-title">Balance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <div class="row gutters-tiny" id="amount">
         </div>
      </div>
    </div>
   
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      $('body').on('click', '.editProductt', function () {
        $.get("{{ route('balance.index') }}", function (data) {
           $('#amount').html(data);
            $('#exampleModall').modal('show');
        });
  
        });});
   
  </script>
