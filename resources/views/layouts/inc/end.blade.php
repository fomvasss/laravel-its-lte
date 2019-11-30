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
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        },
        ckFull = {
            language: 'ru',
            allowedContent: true,

            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        },
        translates = {
            localeDateRangePicker: {
                "format": "MM/DD/YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "firstDay": 1
            },
            notifications: {
                "confirmAction": "Подтверждаете действие?"
            }
        },

        xEditable = {},
        colorpickerOptions = {},
        datetimepickerOptions = {},
        datepickerOptions = {}
</script>

<script src="{{ mix('js/main.js', 'vendor/its-lte') }}"></script>
<script src="{{ mix('js/dashboard.js', 'vendor/its-lte') }}"></script>
<script src="{{ asset('vendor/its-lte/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/its-lte/ckeditor/adapters/jquery.js') }}"></script>

<form action="" class="hidden" method="POST" id="js-action-form">
    @csrf
    @method('POST')
    <input type="hidden" name="destination">
</form>

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