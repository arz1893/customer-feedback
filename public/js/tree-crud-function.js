$(document).ready(function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var master_product_id = $('#master_product_id').val();

    $.ajax({
        method: 'POST',
        url: window.location.protocol + "//" + window.location.host + "/" + 'product_category/get-trees',
        dataType: 'json',
        data: {master_product_id: master_product_id, _token: CSRF_TOKEN},
        success: function (response) {
            console.log(response);
        }
    });

    $('#product_category_tree').fancytree({
        source: $.ajax({
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + 'product_category/get-trees',
            dataType: 'json',
            data: {master_product_id: master_product_id, _token: CSRF_TOKEN},
            success: function (response) {
                return response;
            }
        }),
        contextMenu: {
            menu: {
                "edit": { "name": "Edit", "icon": "edit" },
                "cut": { "name": "Cut", "icon": "cut" },
                "copy": { "name": "Copy", "icon": "copy" },
                "paste": { "name": "Paste", "icon": "paste" },
                "delete": { "name": "Delete", "icon": "delete", "disabled": true },
                "sep1": "---------",
                "quit": { "name": "Quit", "icon": "quit" },
                "sep2": "---------",
                "fold1": {
                    "name": "Sub group",
                    "items": {
                        "fold1-key1": { "name": "Foo bar" },
                        "fold2": {
                            "name": "Sub group 2",
                            "items": {
                                "fold2-key1": { "name": "alpha" },
                                "fold2-key2": { "name": "bravo" },
                                "fold2-key3": { "name": "charlie" }
                            }
                        },
                        "fold1-key3": { "name": "delta" }
                    }
                },
                "fold1a": {
                    "name": "Other group",
                    "items": {
                        "fold1a-key1": { "name": "echo" },
                        "fold1a-key2": { "name": "foxtrot" },
                        "fold1a-key3": { "name": "golf" }
                    }
                }
            },
            actions: function(node, action, options) {
                $("#selected-action")
                    .text("Selected action '" + action + "' on node " + node + ".");
            }
        },
        lazyload: function (event, data) {
           var node = data.node;
           data.result = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + "/" + 'product_category/get-childs',
                data: {mode: 'children', parent_id: node.key, _token: CSRF_TOKEN},
                cache: false
           };
        }
    });
});

function setCategoryType(selected) {
    var type = $(selected).data('type');

    if(type === 'root') {
        var master_product_id = $(selected).data('product_id');
        $('<input>').attr({
            type: 'hidden',
            name: 'category_type',
            value: 'root'
        }).appendTo('#form_add_category');
        $('<input>').attr({
            type: 'hidden',
            name: 'master_product_id',
            value: master_product_id
        }).appendTo('#form_add_category');
    } else if(type === 'sub') {
        var activeNode = $('#product_category_tree').fancytree('getActiveNode');
        if(activeNode === null) {
            alert('please select category first');
        } else {
            var id = activeNode.key;
            $('<input>').attr({
                type: 'hidden',
                name: 'master_product_id',
                value: master_product_id
            }).appendTo('#form_add_category');
            $('<input>').attr({
                type: 'hidden',
                name: 'category_type',
                value: 'sub'
            }).appendTo('#form_add_category');
            $('<input>').attr({
                type: 'hidden',
                name: 'parent_id',
                value: id
            }).appendTo('#form_add_category');
            $('#modal_add_sub').modal('show');
        }
    }
}