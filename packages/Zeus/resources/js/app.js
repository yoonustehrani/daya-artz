import { render } from 'react-dom'
import { lazy, Suspense } from 'react'

require('./bootstrap')

const ReactFilesPicker = lazy(() => import('./components/ReactFilesGallery/ReactFilePicker'))

const makeUpDatePicker = elem => {
    let options = JSON.parse($(elem).attr('data-options')) ?? {};
    let target = $(elem).attr('data-fill');
    let targetElem = $(`input[name="${target}"]`);
    let timePicker = $(elem).attr('data-timepicker') === 'true';
    let defaultFormat =  timePicker ? 'YYYY/MM/DD HH:mm:ss' : 'YYYY/MM/DD';
    let dpicker = $(elem).persianDatepicker({
        initialValue: false,
        observer: true,
        // format: options.format ?? defaultFormat,
        altField: '#' + $(elem).attr('data-target-id'),
        altFormat: options.format ?? defaultFormat,
        inline: true,
        navigator:{
            scroll:{
                enabled: false
            }
        },
        calendar:{
            persian: {
                leapYearMode: 'astronomical',
            },
        },
        timePicker: {
            enabled: timePicker
        },
        onSelect: unix => {
            targetElem.val(unix / 1000)
            $(' > span.clear-date', targetElem.parent()).addClass('flex').removeClass('hidden')
        }
    });
    if (Number(targetElem.val())) {
        dpicker.setDate(Number(targetElem.val()) * 1000)
        $(' > span.clear-date', targetElem.parent()).addClass('flex').removeClass('hidden')
    }
    $('.clear-date').on('click', function() {
        $(' > span.clear-date', targetElem.parent()).removeClass('flex').addClass('hidden')
        $(' input', $(elem).parent()).val(null)
    })
}
window.makeUpDatePicker = makeUpDatePicker

const handleJsonField = (e) => {
    e.preventDefault();
    let { value } = e.target;
    try {
        jsonval = JSON.parse(value);
        // e.target.value = JSON.stringify(jsonval, null, "\t");
        // e.target.styles.border = "0px solid";

        e.target.classList.remove('invalid')
    } catch (error) {
        e.target.classList.add('invalid')
        // e.target.styles.border = "2px solid red";
    }
}

const submitLogoutForm = (e) => {
    e.preventDefault();
    document.getElementById('logout-form').submit()
}

$(document).on('keyup', '.json_details', handleJsonField)

$(document).on('keyup', 'input[data-price-input]', function(e) {
    e.preventDefault()
    let currenciable = Number(e.target.value.replace(/[^0-9.-]+/g,""));
    currenciable = currenciable > 0 ? currenciable.toLocaleString('en-US') : null
    $(this).val(currenciable)
})

// pasword input show
$(document).on('mousedown', '.show-password', function(e) {
    $(' > i', this).toggleClass('fa-eye fa-eye-slash');
    $(this).prev('input').attr('type', 'text')
}).on('mouseup', '.show-password', function() {
    $(' > i', this).toggleClass('fa-eye fa-eye-slash');
    $(this).prev('input').attr('type', 'password')
});

window.openTableRows = [];
$(document).on('click', '.awesome-table tr.row > td:last-child .toggle-next-tr', function() {
    let ele = $(this).parent().parent().parent().next('tr.extra');
    
    if (ele.hasClass('hidden')) {
        openTableRows.push(ele.attr('wire:key'))
    } else {
        openTableRows = openTableRows.filter(x => x !== ele.attr('wire:key'));
    }
    ele.fadeToggle(500)
    ele.toggleClass('hidden table-row')
})
// .delete-row-btn 
$('#logout-button').on('click', submitLogoutForm)

const mceOptions = {
    plugins: [
        'advlist autolink lists link preview wordcount directionality table image',
    ],
    toolbar: [
        { name: 'history', items: [ 'undo', 'redo' ]},
        { name: 'formatting', items: [ 'styleselect', 'bold', 'italic', ]},
        { name: 'alignment', items: [ 'align']},
        { name: 'direction', items: [ 'ltr', 'rtl' ]},
        { name: 'indentation', items: [ 'outdent', 'indent' ]},
        { name: 'lists', items: [ 'numlist', 'bullist' ]},
        { name: 'link', items: ['link']},
        { name: 'table', items: [ 'table' ]},
        { name: 'other', items: [ 'removeformat', 'reactGallery' ] }
    ],
    toolbar_mode: 'sliding',
    relative_urls: false,
    remove_script_host: false,
    setup: editor => {
            editor.on('change keyup', function() {
                editor.targetElm.innerText = editor.getContent();
                // console.log(e);
            });
            let picker = document.createElement('div')
            picker.id = 'tinymce-react-' + (new Date()).valueOf()
            picker.style.display = 'none'
            document.body.append(picker)
            function insertImage(file) {
                editor.insertContent(`&nbsp;<img src="${APP_PATH + file.path}"/>&nbsp;`)
                picker.style.display = 'none'
            }
            render(
                <Suspense fallback={<div>Loading ...</div>}>
                    <ReactFilesPicker
                        searchUrl={API_PATH + "/files"}
                        fileUrl={API_PATH + "/files/fileId"}
                        uploadUrl={API_PATH + "/files"}
                        handlePick={insertImage}
                        htmlIndex={picker.id}
                        noToggle={true}
                    />
                </Suspense>,
                picker
            )
            editor.ui.registry.addButton('reactGallery', {
                text: 'Gallery',
                icon: 'image',
                onAction: (_) => {
                    picker.style.display = 'block'
                    // editor.notificationManager.open({
                    //     text: 'A test notification that will close automatically after 5 seconds.',
                    //     timeout: 5000,
                    //     type: 'error',
                    //     closeButton: true
                    // });
                }
            })
    },
}

$(() => {
    // slug input
    $('.slug-input').each(function() {
        let slugInput = $(this);
        let fromName = $(this).attr('data-slug-from')
        let identifier = `input[name="${fromName}"]`;
        $(identifier).on('keyup', function() {
            let slug = $(this).val().trim().replaceAll(/\s/ig, '-').toLowerCase();
            slugInput.val(slug);
        });
    });
    function handleFilterBox () {
        let filterList = {};
        function filterItem() {
            let [row, filter, filterValue] = [$('#filter_row_name').val(), $('#filter_row_filter_name').val(), $('#filter_value').val()]
            if (row && filter && filterValue) {
                filterList[`${row}__${filter}`] = filterValue
            }
        }
        filterItem()
        $('#filters-list').html("")
        let filters = Object.entries(filterList)
        filters.forEach(function([name, value]) {
            $('#filters-list').append(`<input type='hidden' name='${name}' value='${value}'>`)
        })
        if (filters.length) {
            $('form#filterable-form').submit()
        }
    }
    $('#filter-extension').on('click', handleFilterBox)
    // date picker
    // $('.date-picker').each(function() {
    //     makeUpDatePicker(this)
    // })
    // tinymce
    tinymce.init({
        selector: 'textarea.rich-text-editor',
        menubar: false,
        branding: false,
        toolbar_sticky: true,
        height: 500,
        // directionality: 'rtl',
        // language: "fa",
        ...mceOptions
    })
})