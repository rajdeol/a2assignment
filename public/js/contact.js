// basic modal functions
var modal = (function(){
    var 
    method = {},
    $overlay,
    $modal,
    $content,
    $close;

    // Center the modal in the viewport
    method.center = function () {
            var top, left;

            top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
            left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;

            $modal.css({
                    top:top + $(window).scrollTop(), 
                    left:left + $(window).scrollLeft()
            });
    };

    // Open the modal
    method.open = function (settings) {
            //$content.empty().append(settings.content);
            if(settings){
                $loading.show();
            }else{
                $content.show();
                $loading.hide();
            }
            $modal.css({
                    width: 'auto', 
                    height: 'auto'
            });

            method.center();
            $(window).bind('resize.modal', method.center);
            $modal.show();
            $overlay.show();
    };

    // Close the modal
    method.close = function () {
            $modal.hide();
            $overlay.hide();
            $('#form_outer').show();
            //$content.empty();
            $(window).unbind('resize.modal');
    };

    // Generate the HTML and add it to the document
    $overlay = $('#overlay');
    $modal = $('#modal');
    $content = $('#content');
    $close = $('#close');
    $loading= $('#loading');

    $modal.hide();
    $overlay.hide();
    $loading.hide();
    //$modal.append($content, $close);

//    $(document).ready(function(){
//            $('body').append($overlay, $modal);						
//    });

    $close.click(function(e){
            e.preventDefault();
            method.close();
    });

    return method;
}());

// Wait until the DOM has loaded before querying the document
$(document).ready(function(){
    $('#contact_us_click').click(function(e){
            modal.open();
            e.preventDefault();
    });
    // validation rules for the form
     $("#contact_form").validate({
        rules: {
          name: {
                required: true,
                minlength: 2},
          email: {
		required: true,
		email: true},
          phone:{
              required:false,
              minlength:10,
              maxlength:10,
              digits:true
          },
          invoice_number:{
              required:false,
              minlength:10,
              maxlength:10,
              digits:true
          },
          contact_method: "required",
          enquiry: "required"
        },
        messages:{
            name:"Name is required",
            email:"Enter a valid email",
            enquiry:"Enter an enquiry",
            phone:"Enter valid 10 digit phone number",
            invoice_number:"Invoce can only have 10 digits"
        },
        submitHandler: function(form) {
            $('#form_outer').hide();
            modal.open('loading');
            $.ajax({
                type: "POST",
                url: $('#contact_form').attr('action'),
                data: $('#contact_form').serialize(), 
                success: function(data){
                    $('#loading').html(data);
                }
            });
        }
    });
    
    $('#submit_form').click(function(e){
       $("#contact_form").submit();
    });
    
    
});