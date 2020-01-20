$.noConflict();
jQuery( document ).ready(function( $ ) {

    /*  Generate url    */
    $('body').on('click', '#generateUrl', function(e){
        e.preventDefault();
        let url = $('input#currentUrl').val();
        $.ajax({
            url: '/generate',
            data: { url: url },
            type: 'POST',
            success: function(res) {
                let data = JSON.parse(res);
                console.log(data);
                $('#readyLink').removeClass('d-none');
                $('#readyLink input').val(data.message);
            },
            error: function() {
                alert('Error! Something went wrong. Try again later.');
            }
        });
    });

    /*  Button to copy text   */
    $('body').on('click', '#copyLink', function(e){
        e.preventDefault();
        let copyText = document.getElementById("shortLink");
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        /* Copy the text inside the text field */
        document.execCommand("copy");
    });

    /*  Button to remove link from database   */
    $('body').on('click', '#removeLink', function(e){
        e.preventDefault();
        let id = $(this).data("id");
        $.ajax({
            url: '/admin/remove/'+id,
            // data: { url: url },
            type: 'POST',
            success: function(res) {
                location.reload();
            },
            error: function() {
                alert('Error! Something went wrong. Try again later.');
            }
        });
    });

});
