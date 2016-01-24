$( document ).ready(function() {

    $('#SelectAll').change(function () {
        $('.data-table input:checkbox').prop('checked', $(this).prop('checked'));
    });

    $('.SubmitSelected').click(function() {
        var data = [];
        $('.data-table input:checkbox').each(function( index ) {
            if($(this).val() != '' && $(this).is(':checked')) {
                data.push($(this).val());
            }
        });
        if(data.length > 0) {
            location.href = this.href + '/' + data.join(',');
        }
        return false;
    });

});