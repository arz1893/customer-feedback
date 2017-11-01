function checkTenantName(selected) {
    if($('#txt_tenant_email').val().length == 0) {
        $(selected).popover('show');
    } else {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var result = emailReg.test($('#txt_tenant_email').val());
        if(result === true) {
            $('#form-check-tenant').submit();
        } else {
            $(selected).popover('show');
        }
    }
}

function setDataId(selected) {
    var id = $(selected).data('id');
    var modal = $($(selected).data('target'));
    modal.data('id', id);
}

function deleteItem(selected) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var modal = $($(selected).data('modal'));
    var id = modal.data('id');

    if(modal.data('type') === 'product') {
        $.ajax({
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + 'master_product/delete-master-product',
            dataType: 'json',
            data: {id: id, _token: CSRF_TOKEN},
            success: function (response) {
                location.reload();
            }
        });
    } else if(modal.data('type') === 'service') {
        $.ajax({
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + 'master_service/delete-master-service',
            dataType: 'json',
            data: {id: id, _token: CSRF_TOKEN},
            success: function (response) {
                location.reload();
            }
        });
    } else if(modal.data('type') === 'product_faq') {
        $.ajax({
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + 'faq/product/delete/' + id,
            dataType: 'json',
            data: {id: id, _token: CSRF_TOKEN},
            success: function (response) {
                location.reload();
            }
        });
    } else if(modal.data('type') === 'service_faq') {
        $.ajax({
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + 'faq/service/delete/' + id,
            dataType: 'json',
            data: {id: id, _token: CSRF_TOKEN},
            success: function (response) {
                location.reload();
            }
        });
    }
}