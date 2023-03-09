var initFieldMoreItemsSortable = function () {},
    initFieldSelect2Static = function () {},
    initJsVerificationSlugField = function () {},
    initFieldSelect2Ajax = function () {},
    initCKEditors = function () {},
    initSortableTable = function() {},
    initFieldSelectBlocks = function() {},
    initInlineFields = function() {};

$(function () {

    'use strict';

    const LANGUAGE = $('html').attr('lang') || 'en';

    $(document).ajaxStart(function () {
        Pace.restart()
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.field-checkbox-ajax').each(function(){
        var $base = $(this),
            url = $base.data('url'),
            method = $base.data('method') || 'POST',
            $input = $base.find('input.checkbox'),
            fieldName = $input.attr('name'),
            rawFieldName = $input.data('raw-name'),
            format = $base.data('format');

        $input.on('change', function () {
            var value = this.checked ? 1 : 0,
                data = format === 'name,value' ? {name: rawFieldName, value: value} : {[rawFieldName] : value};
            $.ajax({
                method: method,
                url: url,
                dataType: 'json',
                data: data,
                success: function (data) {
                    if (data.message) {
                        $base.append('<div class="text-success">' + data.message + '</div>')
                        $base.find('.text-success').delay(2000).fadeOut(500, 'linear', function () {
                            $(this).remove()
                        })
                    }
                },
                error: function () {
                    console.log('Error Ajax!')
                    $base.append('<div class="text-danger">Error Ajax</div>')
                    $base.find('.text-danger').delay(2000).fadeOut(500, 'linear', function () {
                        $(this).remove()
                    })
                },
                complete: function () {
                    $base.find('.overlay').addClass('hidden')
                }
            })
        });
    });

    $('.field-select2-change-status-ajax').each(function () {
        var $base = $(this),
            $select = $base.find('.select2-change-status-ajax'),
            url = $base.data('url'),
            fieldName = $base.find('select').attr('name'),
            method = $base.data('method') || 'GET',
            $select2 = $select.select2({
                language: LANGUAGE,
                tags: false
            });

        $select2.on("select2:select", function (e) {
            $base.find('.overlay').removeClass('hidden');

            $.ajax({
                method: method,
                url: url,
                dataType: 'json',
                data: {name: fieldName, value: e.params.data.id},
                success: function (data) {
                    if (data.message) {
                        $base.append('<div class="text-success">' + data.message + '</div>')
                        $base.find('.text-success').delay(2000).fadeOut(500, 'linear', function () {
                            $(this).remove()
                        })
                    }
                },
                error: function () {
                    console.log('Error Ajax!')
                    $base.append('<div class="text-danger">Error Ajax</div>')
                    $base.find('.text-danger').delay(2000).fadeOut(500, 'linear', function () {
                        $(this).remove()
                    })
                },
                complete: function () {
                    $base.find('.overlay').addClass('hidden')
                }
            })
        })
    })

    $('.field-select2-tree-ajax').each(function () {
        var $base = $(this),
            $select = $base.find('.select2-tree'),
            url = $base.data('url'),
            valFld = $base.data('valFld') ? $base.data('valFld') : 'id',
            labelFld = $base.data('labelFld') ? $base.data('labelFld') : 'name',
            incFld = $base.data('incFld') ? $base.data('incFld') : 'children'

        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'json',
            data: {data: ''},
            success: function (data) {
                $select.select2ToTree({
                    treeData: {
                        dataArr: data.data,
                        dftVal: data.default,
                        valFld: valFld,
                        labelFld: labelFld,
                        'incFld': incFld
                    }
                })
            },
            error: function () {
                console.log('Error Ajax!')
            },
            complete: function () {
                $base.find('.overlay').fadeOut(200)
            }
        })
    })

    $('.field-tree').each(function () {
        var $base = $(this),
            $tree = $base.find('.field-tree-data'),
            url = $base.data('url'),
            showCheckbox = $base.data('showCheckbox') === undefined ? true : $base.data('showCheckbox'),
            showIcon = $base.data('showIcon') === undefined ? false : $base.data('showIcon'),
            fieldName = $base.data('field-name'),
            $inputs = $base.find('.field-tree-inputs'),
            getCheckedIds = function (obj) {
                $inputs.html('')
                var array = []
                obj.forEach(element => {
                    $inputs.append('<input type="hidden" name="' + fieldName + '[]" value="' + element.id + '" />')
                })
                return array
            }

        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'json',
            data: {data: ''},
            success: function (data) {
                $tree.treeview({
                    data: data,
                    showIcon: showIcon,
                    showCheckbox: showCheckbox,
                })

                getCheckedIds($tree.treeview('getChecked'))

                $tree.on('nodeChecked', function (event, data) {
                    // console.log($(this).treeview('getChecked'))
                    getCheckedIds($(this).treeview('getChecked'))
                })
                $tree.on('nodeUnchecked', function (event, data) {
                    // console.log($(this).treeview('getChecked'))
                    getCheckedIds($(this).treeview('getChecked'))
                })
            },
            error: function () {
                console.log('Error Ajax!')
            },
            complete: function () {
                $base.find('.overlay').fadeOut(200)
            }
        })

    })

    initCKEditors = function() {
        if ($('textarea.ck-editor.ck-mini').length) {
            $('textarea.ck-editor.ck-mini').ckeditor(ckMini || {})
        }

        if ($('textarea.ck-editor.ck-small').length) {
            $('textarea.ck-editor.ck-small').ckeditor(ckSmall || {})
        }

        if ($('textarea.ck-editor.ck-full').length) {
            $('textarea.ck-editor.ck-full').ckeditor(ckFull || {})
        }
    }
    initCKEditors();


    initInlineFields = function () {
        if ($('.field-x-editable').length) {
            $('.field-x-editable').editable(xEditable || {});
        }

        if ($('.field-colorpicker').length) {
            $('.field-colorpicker').colorpicker(colorpickerOptions || {});
        }

        if ($('.field-datetimepicker').length) {
            $('.field-datetimepicker').datetimepicker(datetimepickerOptions || {
                format: 'Y/m/d H:i:s'
            });
        }
        if ($('.field-datepicker').length) {
            $('.field-datepicker').datetimepicker(datepickerOptions || {
                timepicker:false,
                format:'d/m/Y'
            });
        }
        if ($('.field-timepicker').length) {
            $('.field-timepicker').datetimepicker(timepickerOptions || {
                datepicker:false,
                format: 'H:i'
            });
        }
    }
    initInlineFields();

    initJsVerificationSlugField = function () {
        if ($('.js-verification-slug-field').length) {
            if ($('input.js-slug-field-change').is(':checked')) {
                $('.js-verification-slug-field input.js-slug-field-input')
                    .prop('readonly', false)
                    .prop('disabled', false)
            }
            $(document).on('change', '.js-verification-slug-field [type="checkbox"]', function () {
                var $wrap = $(this).closest('.js-verification-slug-field');
                if(this.checked) {
                    $wrap.find('input.js-slug-field-input')
                        .prop('readonly', false)
                        .prop('disabled', false)
                } else {
                    $wrap.find('input.js-slug-field-input')
                        .prop('readonly', true)
                        .prop('disabled', true)
                }
            })
        }
    }
    initJsVerificationSlugField();

    $(document).on('click', '.js-action-form', function (e) {
        e.preventDefault()
        var $form = $('#js-action-form'),
            $this = $(this),
            method = $this.data('method') || 'POST',
            strConfirm = $this.data('confirm') ? confirm($this.data('confirm')) : true,
            destination = $(this).data('destination'),
            url = $(this).data('url');

        if (url && $form && strConfirm) {
            $form.find('input[name="_method"]').val(method)
            if (destination) {
                $form.find('input.js-destination-val').val(destination)
            }
            $form.attr('action', url).submit()
        }
        return false
    });

    // 10000 -> 10 000
    $('.js-num-format').each(function (index, value) {
        var number = parseFloat(value.textContent);
        value.textContent = numberWithSpaces(number);
    });
    function numberWithSpaces(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }

    initFieldSelect2Static = function () {
        $('.field-select2-static').each(function () {
            var $base = $(this),
                $select = $base.find('.select2-static'),
                urlSave = $base.data('url-save');

            // Autosave after change
            if (urlSave) {
                var fieldName = $base.find('select').data('name'),
                    method = $base.data('method-save') || 'POST',
                    $select2 = $select.select2({
                        language: LANGUAGE,
                        tags: false
                    });

                $select2.on('change', function (e) {
                    var values = $select.first(':selected').val();
                    $base.find('.overlay').removeClass('hidden');
                    $.ajax({
                        method: method,
                        url: urlSave,
                        dataType: 'json',
                        data: {name: fieldName, value: values},
                        success: function (data) {
                            if (data.message) {
                                $base.append('<div class="text-success">' + data.message + '</div>')
                                $base.find('.text-success').delay(2000).fadeOut(500, 'linear', function () {
                                    $(this).remove()
                                })
                            }
                        },
                        error: function () {
                            console.log('Error Ajax!')
                            $base.append('<div class="text-danger">Error Ajax</div>')
                            $base.find('.text-danger').delay(2000).fadeOut(500, 'linear', function () {
                                $(this).remove()
                            })
                        },
                        complete: function () {
                            $base.find('.overlay').addClass('hidden')
                        }
                    });
                });
            } else {
                $select.select2({
                    language: LANGUAGE,
                    tags: false
                });
            }
        });
    }
    initFieldSelect2Static();

    if ($('.select2.select2-tags').length) {
        $('.select2.select2-tags').each(function (index) {
            var url = $(this).data('url') || $(this).data('route'),
                maximumSelection = $(this).data('max') || -1,
                tokenSeparators = $(this).data('separators') || [',', ';'],
                newTagLabel = $(this).data('new-tag-label') || ' (new tag)';

            $(this).select2({
                language: LANGUAGE,
                tags: true,
                tokenSeparators: tokenSeparators,

                ajax: url ? {
                    delay: 250,
                    url: url,
                    dataType: 'json',
                    processResults: function(data) {
                        return {
                            results: data.results
                        }
                    }
                } : undefined,

                // Some nice improvements:

                // max tags is 3
                maximumSelectionLength: maximumSelection,

                // add "(new tag)" for new tags
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term + newTagLabel
                    };
                },
            });
        });
    }

    if ($('.select2.sortable').length) {
        $('.select2.sortable').select2({
            language: LANGUAGE,
            tags: true
        })

        $('.select2.sortable').on("select2:select", function (evt) {
            var element = evt.params.data.element
            var $element = $(element)

            $element.detach()
            $(this).append($element)
            $(this).trigger("change")
        })
    }

    initFieldSelect2Ajax = function () {
        if ($('.select2.field-select-ajax').length) {
            $('.select2.field-select-ajax').each(function (index) {
                var url = $(this).data('url') || $(this).data('route')

                $(this).select2({
                    language: LANGUAGE,
                    tags: false,
                    ajax: {
                        delay: 250,
                        url: url,
                        dataType: 'json'
                    }
                });
            });
        }
    }
    initFieldSelect2Ajax();

    $('.lte-daterangepicker').each(function () {
        $(this).on('apply.daterangepicker', function (ev, picker) {
            var $inputNameStart = $(this).data('input-name-start'),
                $inputNameEnd = $(this).data('input-name-end'),
                $format = $(this).data('format') || 'MM/DD/YYYY'
            $(this).val(picker.startDate.format($format) + ' - ' + picker.endDate.format($format))
            $(this).siblings('input[name="' + $inputNameStart + '"]').val(picker.startDate.format($format))
            $(this).siblings('input[name="' + $inputNameEnd + '"]').val(picker.endDate.format($format))
        })

        $(this).on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('')
        })

        $(this).daterangepicker({
            autoUpdateInput: false,
            "locale": {
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
            }
        })
    })

    $('[data-toggle="tooltip"]').tooltip()

    $(document).on('click', '.js-fill-modal', function (e) {
        e.preventDefault()
        var $this = $(this),
            url = $this.data('url'),
            dataFields = $this.data('fields'),
            modal = $($this.data('target'));

        console.log(modal);

        if (url) {
            modal.find('form').attr('action', url)
        }
        for (var field in dataFields) {
            modal.find('[name="' + field + '"]').val(dataFields[field]);
        }

        modal.modal() // Bootstrap!
    })

    var treeSortable = {}

    if ($('.tree-sortable').length) {
        $('.tree-sortable').each(function () {
            treeSortable[$(this).data('entity-name')] = $(this).sortable({
                group: 'serialization',
                delay: 500,
                handle: '.handle',
                onDrop: function ($item, container, _super) {
                    _super($item, container);
                }
            })
        })
    }

    $(document).on('click', '.post-tree-sortaple', function (e) {
        e.preventDefault()
        e.stopPropagation()
        var $base = $(this),
            data = treeSortable[$(this).data('entity-name')].sortable("serialize").get(),
            url = $base.data('url');

        $.ajax({
            method: 'POST',
            url: url,
            dataType: 'json',
            data: {'data': data},
            beforeSend: function () {
                $base.attr('disabled', true)
                    .find('.fa')
                    .toggleClass('fa-spin')
                    .toggleClass('fa-refresh')
            },
            success: function (data) {
                console.log(data)
            },
            error: function () {
                console.log('Error Ajax!')
            },
            complete: function () {
                $base.attr('disabled', false)
                    .find('.fa')
                    .toggleClass('fa-spin')
                    .toggleClass('fa-refresh')
            }
        })
    })

    if ($('.field-links').length) {
        $('.field-links').on('click', '.btn-info', function (e) {
            e.preventDefault()
            var n = $(this).parents('.field-links').find('.btn-info').index(this),
                length = $(this).parents('.field-links').find('.btn-info').length,
                fieldName = $(this).parents('.field-links').data('field-name'),
                keyKey = $(this).parents('.field-links').data('key'),
                keyValue = $(this).parents('.field-links').data('value'),
                placeholderKey = $(this).parents('.field-links').data('placeholder-key'),
                placeholderValue = $(this).parents('.field-links').data('placeholder-value'),
                item = '<tr class="item">'
                    + '<td>'
                    + '<div class="input-group input-group-md">'
                    + '<input type="text" name="' + fieldName + '[' + (length) + '][' + keyKey + ']" class="form-control" placeholder="' + placeholderKey + '">'
                    + '<span class="input-group-btn" style="width: 40%">'
                    + '<input type="text" name="' + fieldName + '[' + (length) + '][' + keyValue + ']" class="form-control" placeholder="' + placeholderValue + '">'
                    + '</span>'
                    + '<span class="input-group-btn">'
                    + '<button type="button" class="btn btn-info btn-flat">'
                    + '<i class="fa fa-plus"></i>'
                    + '</button>'
                    + '<button type="button" class="btn btn-danger btn-flat">'
                    + '<i class="fa fa-remove"></i>'
                    + '</button>'
                    + '</span>'
                    + '</div>'
                    + '</td>'
                    + '</tr>"'

            $(this).parents('.field-links').find('.item').eq(n).after(item)
        })

        $('.field-links').on('click', '.btn-danger', function (e) {
            e.preventDefault()
            var n = $(this).parents('.field-links').find('.btn-danger:not(.first)').index(this)

            $(this).parents('.field-links').find('.item').eq(n).remove()
        })
    }

    if ($('.field-linear-list').length) {
        $('.field-linear-list').on('click', '.btn-info', function (e) {
            e.preventDefault()
            var n = $(this).parents('.field-linear-list').find('.btn-info').index(this),
                length = $(this).parents('.field-linear-list').find('.btn-info').length,
                fieldName = $(this).parents('.field-linear-list').data('field-name'),
                placeholderValue = $(this).parents('.field-linear-list').data('placeholder-value'),
                item = '<tr class="item">'
                    + '<td>'
                    + '<div class="input-group input-group-md">'
                    + '<span class="input-group-btn" style="width: 100%">'
                    + '<input type="text" name="' + fieldName + '[' + (length) + ']" class="form-control" placeholder="' + placeholderValue + ' ' + (parseInt(length) + 1) + '">'
                    + '</span>'
                    + '<span class="input-group-btn">'
                    + '<button type="button" class="btn btn-info btn-flat">'
                    + '<i class="fa fa-plus"></i>'
                    + '</button>'
                    + '<button type="button" class="btn btn-danger btn-flat">'
                    + '<i class="fa fa-remove"></i>'
                    + '</button>'
                    + '</span>'
                    + '</div>'
                    + '</td>'
                    + '</tr>"'
            $(this).parents('.field-linear-list').find('.item').eq(n).after(item)
        })

        $('.field-linear-list').on('click', '.btn-danger', function (e) {
            e.preventDefault()
            var n = $(this).parents('.field-linear-list').find('.btn-danger:not(.first)').index(this)

            $(this).parents('.field-linear-list').find('.item').eq(n).remove()
        })
    }

    initFieldMoreItemsSortable = function () {
        if ($('.field-more-items-sortable').length) {
            $('.field-more-items-sortable .todo-list').sortable({
                handle: '.handle',
                onDrop: function ($item, container, _super) {
                    _super($item, container);
                    $(container.target[0]).find('li').each(function (index) {
                        $(this).find('.field-weight-item').val(index)
                    })
                }
            });

            $('.field-more-items-sortable').on('click', '.filed-remove', function (e) {
                e.preventDefault()
                $(this).parents('li').hide().find('.field-delete-item').val($(this).data('id'))
            })
        }
    }
    initFieldMoreItemsSortable();

    $('.field-more-items').on('click', '.filed-remove', function (e) {
        e.preventDefault()
        $(this).parents('tr').hide().find('.field-delete-item').val($(this).data('id'))
    })


    $(document).on('click', '.js-copy-to-clipboard', function (e) {
        e.preventDefault()
        var $tmp = $("<textarea>"),
            $text = $(this).data('text');
        $("body").append($tmp);
        $tmp.val($text).select();
        document.execCommand("copy");
        $tmp.remove();
        $(this).hide().show(100);
    });

    /**
     * Add cropper editor for input type file
     */
    $.fn.addCropperToFiled = function (options) {
        this.each(function () {
            var _self = $(this),
                settings = $.extend({
                    width: _self?.data('size-width') ? +_self.data('size-width') : (options?.width ? +options.width : 150),
                    height: _self?.data('size-height') ? +_self.data('size-height') : (options?.height ? +options.height : 100),
                    show_preview: _self?.data('show-preview') ? _self.data('show-preview') : false
                }, options),
                field_name = _self?.data('field-name') ? _self?.data('field-name') : 'field_cropper_'+settings.width+'x'+settings.height;

            // Cahnge variables
            var timeOut,
                // Function for read file from field and convert to base64
                toBase64Fn = file => new Promise(function (resolve, reject) {
                    var reader = new FileReader();

                    reader.readAsDataURL(file);
                    reader.onload = function () { return resolve(reader.result) };
                    reader.onerror = function (error) { return reject(error) };
                });

            // Event change file and cropped to size
            _self.on('change', async function (e) {
                if (_self.parents('.field-cropper').length) {
                    _self.parents('.field-cropper').find('.field-cropper-container').remove();
                    _self.removeClass('.field-cropper');
                } else {
                    _self.wrap('<div class="field-cropper"></div>');
                }

                _self.after(`<div class="field-cropper-container">
                            <div class="field-cropper-container__editor"><img style="max-width: 100%;"/></div>`
                    +(settings.show_preview ? `<h3 class="field-cropper-container__title">${settings.width}x${settings.height}</h3>
                            <div class="field-cropper-container__preview"><img width="${settings.width}" height="${settings.height}"/></div>` : ``)
                    +`<input class="field-cropper-container__input" type="hidden" name="${field_name}"/>
                        </div>`);

                //<input class="field-cropper-container__input" type="hidden" name="field_cropper_${settings.width}x${settings.height}"/>

                var data = await toBase64Fn(e.target.files[0]),
                    $parent = _self.parents('.field-cropper'),
                    $container = $parent.find('.field-cropper-container'),
                    $editor = $container.find('.field-cropper-container__editor img'),
                    $input = $container.find('.field-cropper-container__input'),
                    $preview = $container.find('.field-cropper-container__preview img');

                $editor.attr('src', data);

                if(Object.keys($editor.cropper('getData')).length) {
                    $editor.cropper('destroy');
                }

                $editor.cropper({
                    aspectRatio: settings.width / settings.height,
                    crop: function (event) {
                        clearTimeout(timeOut);
                        timeOut = setTimeout(function () {
                            var cropper = event.target.cropper,
                                prevData = cropper.getCroppedCanvas({ width: settings.width, height: settings.height }).toDataURL('image/jpeg');

                            // Insert base64 to preview
                            $preview.attr('src', prevData);
                            // Insert base64 to input
                            $input.val(prevData);
                        }, 200);
                    }
                });
            });
        });

        return this;
    };
    if ($('.field-image-cropper-uploaded').length) {
        $('.field-image-cropper-uploaded input.field-input-cropper').addCropperToFiled();

        $('.field-image-cropper-uploaded').on('click', '.filed-remove', function (e) {
            e.preventDefault()
            $(this).parents('tr').hide().find('.field-delete-item').val($(this).data('id'))
        });
    }


    // Displaying blocks depending on the selection in the selection
    initFieldSelectBlocks = function() {
        $('.js-select-blocks').each(function () {
            if ($(this).find(':selected')) {
                toggleSelectableBlocks($(this).find(':selected').val(), $(this).data('map'))
            }
        })
    }
    initFieldSelectBlocks();
    $(document).on('change', '.js-select-blocks', function () {
        if ($(this).data('map')) {
            toggleSelectableBlocks($(this).val(), $(this).data('map'))
        }
    });
    function toggleSelectableBlocks($val, selectBlocksMap) {
        for (var key in selectBlocksMap) {
            Pace.restart()
            var id = 0;
            if ($val === key) {
                for (id in selectBlocksMap[key]) {
                    $(selectBlocksMap[key][id]).show()
                }
            } else {
                for (id in selectBlocksMap[key]) {
                    $(selectBlocksMap[key][id]).hide()
                }
            }
        }
    }


    // Set active class LTE menu item
    if ($('.sidebar-menu.js-activeable').length) {
        var pathnameUrl = window.location.pathname,
            url = window.location.href,
            path = url.split('?')[0];

        $('.sidebar-menu.js-activeable li>a').each(function () {
            var aHref = $(this).attr("href"),
                regexp = $(this).data('pat') ? new RegExp($(this).data('pat')) : false;

            if (path === aHref || pathnameUrl === aHref || regexp && regexp.test(url)) {
                $(this).closest('li').addClass('active');
                $(this).closest('li.treeview').addClass('active');
            }
        });
    }

    // LTE template skin
    $('.js-check-skin').on('click', function (e) {
        e.preventDefault();
        var skin = $(this).data('skin');
        $('body').removeClass($('#lte_default_skin').val()).addClass(skin);
        $('#lte_default_skin').val(skin);
    });
    $('.js-set-body-class').change(function () {
        var bodyClass = $(this).data('bodyClass');
        this.checked ? $('body').addClass(bodyClass) : $('body').removeClass(bodyClass);
    })

    // Autosabmit form after change file
    $(document).on('change', '.js-form-submit-file-changed input[type="file"]', function() {
        $(this).closest('form').submit();
    });

    // Table sotrable (& ajax submit)
    initSortableTable = function () {
        if ($('.sortable-table').length) {
            var groupTable = $('.sortable-table').sortable({
                containerSelector: 'table',
                itemPath: '> tbody',
                itemSelector: 'tr',
                placeholder: '<tr class="placeholder"/>',
                onDrop: function ($item, container, _super) {
                    //var jsonString = JSON.stringify(data, null, ' ');
                    var $base = $item.closest('.sortable-table'),
                        data = groupTable.sortable("serialize").get();
                        url = $base.data('url');
                    if (url) {
                        $.ajax({
                            method: 'POST',
                            url: url,
                            dataType: 'json',
                            data: {'data': data},
                            success: function (data) {
                                console.log(data)
                            },
                            error: function () {
                                console.log('Error Ajax!')
                            }
                        })
                    }
                }
            });
        }
    }
    initSortableTable();

    // Change radio
    $(document).on('change', '.js-action-change', function (e) {
        e.preventDefault();
        var strConfirm = $(this).data('confirm') ? confirm($(this).data('confirm')) : true;
        if (strConfirm && $(this).data('url')) {
            var $form = $('#js-action-form');
            $form.attr('action', $(this).data('url')).submit();
        }
        return false
    })

    // Validate form before save
    $(document).on('click', '.js-form-submit-prevalidate', function (e) {
        e.preventDefault();
        var $form = $(this).closest('form');
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize() + '&prevalidate=1',
            success: function(data) {
                console.log(data)
                $form.submit()
            },
            error: function (data) {
                var response = JSON.parse(data.responseText);

                if (response && response.errors !== undefined) {
                    $.each(response.errors, function (key, value) {
                        value.forEach(function (item, /*i, value*/) {
                            console.log(item)
                            toastr.error(item)
                        });
                    })
                }
            }
        });
    });

    // Show ajax content in modal
    $(document).on('click', '.js-modal-fill-html', function (e) {
        e.preventDefault();
        var url = $(this).data('url'),
            target = $(this).data('target')
        $.get(url, function (data) {
            $(`${target} .modal-content`).html(data.html)
            $(`${target}`).modal();

            initFieldMoreItemsSortable();
            initFieldSelect2Static();
            initJsVerificationSlugField();
            initFieldSelect2Ajax();
            initFieldSelectBlocks();
            initCKEditors();
            initInlineFields();
        });
    })

    // Change select
    $(document).on('change', 'select.js-change-url', function () {
        window.location = $(this).val();
    })
});
