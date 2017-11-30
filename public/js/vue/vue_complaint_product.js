var complaint_product = new Vue({
    el: '#vue_complaint_product_container',
    data: {
        nodeTitle: '',
        masterProductId: '',
        productCategoryId: '',
        show: true
    },
    methods: {
        append: function(title, masterProductId, productCategoryId) {
            $('#btn_show_category_navigator').removeClass('hidden');
            $('#panel_add_complaint').removeClass('hidden');
            this.show = false;
            this.nodeTitle = '<span class="text-red"> Add complaint to </span> : ' + title;
            this.masterProductId = '<input type="hidden" name="master_product_id" value="' + masterProductId +'">';
            this.productCategoryId = '<input type="hidden" name="product_category_id" value="' + productCategoryId +'">';
        },

        showNavigator: function () {
            this.show = true;
        }
    }
});