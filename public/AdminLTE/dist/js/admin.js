

$(document).ready(function() {

    $(".textarea").wysihtml5();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    //Initialize Select2 Elements
    $(".select2").select2();

    $('select[name="main_category"]').on('change', function() {
        var categoryID = $(this).val();
        if(categoryID) {
            $.ajax({
                url: '/admin/ajax_cat/'+categoryID,
                type: "GET",
                dataType: "json",
                success:function(data) {

                    $('select[name="category"]').empty();
                    $('select[name="sub_category"]').empty();
                    $('select[name="category"]').append('<option value="">Select a category</option>');
                    $.each(data, function(key, value) {
                        $('select[name="category"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });

                }
            });
        }else{
            $('select[name="category"]').empty();
        }
    });

    $('select[name="category"]').on('change', function() {
        var categoryID = $(this).val();
        if(categoryID) {
            $.ajax({
                url: '/admin/ajax_sub_cat/'+categoryID,
                type: "GET",
                dataType: "json",
                success:function(data) {

                    $('select[name="sub_category"]').empty();
                    $('select[name="sub_category"]').append('<option value="">Select a subcategory</option>');
                    $.each(data, function(key, value) {
                        $('select[name="sub_category"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });

                }
            });
        }else{
            $('select[name="sub_category"]').empty();
        }
    });

    /*================================*/
    /* products in home page via AJAX */
    /*================================*/

    $(".new, .promotion, .featured").click(function (e) {

        var formData, section, id;

        id = $(this).attr('id'); // $(this) refers to button that was clicked
        section = $(this).attr('class');
        formData = $(this).serialize(),

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //e.preventDefault();

        $.ajax({
            url: '/admin/product/'+section+'/'+id+'/edit/',
            type: 'POST',
            data: formData,
            dataType: 'json',
            complete: function(xhr, textStatus) {
                //e.preventDefault();
                if(xhr.status == 200){
                    // Success!

                    //return true;
                }
            }
        });
    });


    /*=============================*/
    /* Add Active Navigation Class */
    /*=============================*/

    $(function(){
        var current = location.pathname;
        $('.sidebar-menu li a').each(function(){
            var $this = $(this);
            if($this.attr('href').indexOf(current) !== -1){
                $this.parents('li').addClass('active');
            }
        })
    })

    /*END DOCUMENT READY*/
});


$('#custom_discount').keyup(function(){
    $('#promotion').removeAttr("disabled");
});
if( $('#custom_discount').val() ) {
    $('#promotion').removeAttr("disabled");
}

var csrf_token   =   $('meta[name="csrf-token"]').attr('content');
$.ajaxSetup({
    headers: {"X-CSRF-TOKEN": csrf_token}
});

Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element
    // The configuration we've talked about above
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    //previewsContainer: "#previews", // Define the container to display the previews
    previewsContainer: ".dropzone-previews",
    // You probably don't want the whole body
    // to be clickable to select files
    clickable: ".clickable",
    addRemoveLinks: true,
    headers: {
        'X-CSRF-Token': $('input[name="_token"]').val()
    },
    // The setting up of the dropzone
    init: function() {
        var myDropzone = this;
        // First change the button to actually tell Dropzone to process the queue.
        this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            //  e.preventDefault();
            //  e.stopPropagation();
            myDropzone.processQueue();
        });
        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
        // of the sending event because uploadMultiple is set to true.
        this.on("sendingmultiple", function() {
            // Gets triggered when the form is actually being sent.
            // Hide the success button or the complete form.
        });
        this.on("successmultiple", function(files, response) {
            // Gets triggered when the files have successfully been sent.
            // Redirect user or notify of success.
        });
        this.on("errormultiple", function(files, response) {
            // Gets triggered when there was an error sending the files.
            // Maybe show form again, and notify user of error
        });
        this.on("addedfile", function(file) {
            // Create the remove button
            var removeButton = Dropzone.createElement("<button>Elimina il file</button>");
            // Capture the Dropzone instance as closure.
            var _this = this;
            // Listen to the click event
            removeButton.addEventListener("click", function(e) {
                // Make sure the button click doesn't submit the form:
                e.preventDefault();
                e.stopPropagation();
                // Remove the file preview.
                _this.removeFile(file);
                // If you want to the delete the file on the server as well,
                // you can do the AJAX request here.
                alert('delete this file!');
            });

            // Add the button to the file preview element.
            file.previewElement.appendChild(removeButton);
        });

    }
}



