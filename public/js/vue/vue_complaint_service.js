var complaint_service = new Vue({
    el: '#vue_complaint_service_container',
    data: {
        nodeTitle: '',
        masterServiceId: '',
        serviceCategoryId: '',
        show: true
    },
    methods: {
        append: function (title, masterServiceId, serviceCategoryId) {
            this.show = false;
            this.nodeTitle = '<span class="text-red"> Add complaint to </span> : ' + title;
            this.masterServiceId = '<input type="hidden" name="master_service_id" value="' + masterServiceId +'">';
            this.serviceCategoryId = '<input type="hidden" name="service_category_id" value="' + serviceCategoryId +'">';
        },

        showNavigator: function () {
            this.show = true;
        }
    }
});