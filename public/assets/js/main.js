;(function($, window, undefined){
    $(document).foundation();

    $(document).ready(function() {
        $('.confirm').click(function(e) {
            if ( ! confirm('¿Estás seguro de realizar esta acción?') ) {
                e.preventDefault();
            }
        });
    });
}(jQuery, window));