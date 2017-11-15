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
        extensions: ['edit'],
        source: $.ajax({
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + 'product_category/get-trees',
            dataType: 'json',
            data: {master_product_id: master_product_id, _token: CSRF_TOKEN},
            success: function (response) {
                return response;
            }
        }),

        edit: {
            triggerStart: ["f2", "dblclick", "shift+click", "mac+enter"],

            close: function(event, data){
                console.log('now closing the editor');
                console.log(event);
                console.log(data);
                $.ajax({
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + "/" + 'product_category/add-child-node',
                    dataType: 'json',
                    data: {parent_id: data.node.parent.key, name: data.node.title, _token: CSRF_TOKEN},
                    success: function (response) {
                        data.node.key = response;
                    }
                });
                console.log(data.node);
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

    $.contextMenu({
        selector: "#product_category_tree span.fancytree-title",
        items: {
            "add_sub": {name: "Add sub", icon: "add"},
            "rename": {name: "Rename", icon: "edit"},
            "sep1": "----",
            "delete": {name: "Delete", icon: "delete"}
            // "more": {name: "More", items: {
            //     "sub1": {name: "Sub 1"},
            //     "sub1": {name: "Sub 2"}
            // }}
        },
        callback: function(itemKey, opt) {
            var node = $.ui.fancytree.getNode(opt.$trigger);
            if(itemKey === 'add_sub') {
                node.editCreateNode('child', {
                    title: '',
                    folder: true,
                    lazy: true
                });
            } else if(itemKey === 'delete') {
                var confirm = window.confirm('Are you sure want to delete this category ?');
                if(confirm === true) {
                    $.ajax({
                        method: 'POST',
                        url: window.location.protocol + "//" + window.location.host + "/" + 'product_category/delete-node',
                        dataType: 'json',
                        data: {node_id: node.key, _token: CSRF_TOKEN},
                        success: function (response) {
                            if(response.status === 'success') {
                                node.remove();
                            }
                        }
                    });
                }
            } else if(itemKey === 'rename') {
                node.editStart();
            }
        }
    });
});

function setCategoryType(selected) {
    var type = $(selected).data('type');

    if(type === 'root') {
        $('#modal_title').html('Add Category');
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
            $('#modal_title').html('Add Sub Category');
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