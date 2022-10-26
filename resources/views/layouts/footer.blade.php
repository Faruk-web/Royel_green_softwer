
<script src="{{asset('backend/assets/js/oneui.core.min.js') }}"></script>
<script src="{{asset('backend/assets/js/oneui.app.min.js') }}"></script>
<script src="{{asset('backend/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{asset('backend/assets/js/pages/be_pages_dashboard.min.js') }}"></script>
<script src="{{ asset('js/toastify-js.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>


<script>
    jQuery(function () {
        One.helpers(['sparkline']);
    });

    //Begin:: Sidebar Mini
    function SidebarColpase() {
        var element = document.getElementById("page-container");
        element.classList.add("sidebar-mini");
    }
    //End:: Sidebar Mini

    function error(info) {
        Toastify({
            text: info,
            backgroundColor: "linear-gradient(to right, #6E32CF, #FFA300)",
            className: "error",
        }).showToast();
    }

    function success(info) {
        Toastify({
            text: info,
            backgroundColor: "linear-gradient(to right, #269E70, #00BFA6)",
            className: "success",
        }).showToast();
    }
</script>

@if(session('success'))
<script>
    swal({
        title: "Success",
        text: "{{ session('success') }}",
        icon: "success",
        button: "Ok",
    });
</script>
@endif

@if(session('error'))
<script>
    swal({
        title: "Error",
        text: "{{ session('error') }}",
        icon: "error",
        button: "Ok",
    });
</script>
@endif


</body>
</html>
