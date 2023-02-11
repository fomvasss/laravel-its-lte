<script>
    var
        ckMini = {
            language: 'ru',
            toolbar: [
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {name: 'links', items: ['Link', 'Image', 'Anchor']},
                {name: 'colors', items: ['TextColor', 'BGColor']},
            ]
        },
        ckSmall = {
            language: 'ru',
            allowedContent: true,
            toolbar: [
                {
                    name: 'basicstyles',
                    items: ['Source', 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {name: 'links', items: ['Link', 'Image', 'Anchor']},
                {name: 'styles', items: ['Format', 'FontSize']},
                {name: 'colors', items: ['TextColor', 'BGColor']},
            ],
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
        },
        ckFull = {
            language: 'ru',
            allowedContent: true,

            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
        },

        xEditable = {},
        colorpickerOptions = {},
        datetimepickerOptions = {
            format: 'Y-m-d H:i:s'
        },
        datepickerOptions = {
            timepicker:false,
            format:'d-m-Y'
        },
        timepickerOptions = {
            datepicker:false,
            format: 'H:i:s',
        }
</script>

<script src="{{ mix('js/main.js', 'vendor/its-lte') }}"></script>
<script src="{{ mix('js/dashboard.js', 'vendor/its-lte') }}"></script>
<script src="{{ asset('vendor/its-lte/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/its-lte/ckeditor/adapters/jquery.js') }}"></script>

<form action="" class="hidden" method="POST" id="js-action-form">
    @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="destination" value="{{ Request::fullUrl() }}" class="js-destination-val">
</form>

<div class="modal fade" id="modal-lg-wrap"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<div class="modal fade" id="modal-wrap"><div class="modal-dialog"><div class="modal-content"></div></div></div>
<div class="modal fade" id="modal-sm-wrap"><div class="modal-dialog modal-sm"><div class="modal-content"></div></div></div>


<script>
    $.widget.bridge('uibutton', $.ui.button);
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "6000",
        "extendedTimeOut": "500",
        "positionClass": "toast-top-right"
    }
</script>
@stack('scripts')
</body>
</html>
