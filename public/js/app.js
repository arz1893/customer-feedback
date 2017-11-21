$(document).ready(function () {form_add_user
    $('.popover-dismiss').popover({
        trigger: 'focus'
    });

    $('#table_master_product').DataTable({
        responsive: true,
        scrollX: true,
        columnDefs: [ {
            targets: [2, 3],
            render: function ( data, type, row ) {
                return data.length > 10 ?
                    data.substr( 0, 50 ) +'…' :
                    data;
            }
        } ]
    });

    $('#table_master_service').DataTable({
        responsive: true,
        scrollX: true,
        columnDefs: [ {
            targets: [2],
            render: function ( data, type, row ) {
                return data.length > 10 ?
                    data.substr( 0, 50 ) +'…' :
                    data;
            }
        } ]
    });
    $('#table_question').DataTable({
        responsive:true,
        scrollX: true,
        columnDefs: [ {
            targets: [2],
            render: function ( data, type, row ) {
                return data.length > 10 ?
                    data.substr( 0, 50 ) +'…' :
                    data;
            }
        } ]
    });
    $('#table_user').DataTable({
        responsive: true,
        scrollX: true
    });

    $('#product_picture').on('change', function (e) {
        e.preventDefault();
        $('#form_change_picture').submit();
    });

    $('#toggle_anonymous').change(function () {
        if($(this).prop('checked') === true) {
            $('#cust_name_container').removeAttr('style');
            // $('#toggle_anonymous_text').html('Enter or select user');
        } else {
            $('#cust_name_container').css('display', 'none');
            // $('#toggle_anonymous_text').html('Anonymous user');
        }
    });

    // $('#tree_view').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});
    $('.selectpicker').selectpicker({
        showSubtext: true
    });
    $('#birthdate').dateDropper({});
    $('#modal_add_customer').modal({
        show: false,
        backdrop: 'static'
    });


});