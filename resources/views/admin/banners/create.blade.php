<div class="modal fade" id="create-banner" tabindex="-1" role="dialog" aria-hidden="true"
     ng-controller="CreateBanner">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="semi-bold">Thêm banner</h4>
            </div>
            <div class="modal-body">
                @include('admin.banners.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
                    <i ng-if="!loading.submit" class="fa fa-save"></i>
                    <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
                    Lưu
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Hủy</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    app.controller('CreateBanner', function ($rootScope, $scope, $http) {
        $rootScope.$on("createBanner", function (event, data , form){
            $scope.errors = data;
            $scope.form = new Banner({}, {scope: $scope});
            $scope.$applyAsync();
            $('#create-banner').modal('show');
        });


        $scope.form = new Banner({}, {scope: $scope});
        $scope.loading = {};
        $scope.pages = [
            {'name': 'Trang chủ', 'value': 'home_page'},
            {'name': 'Trang tin tức', 'value': 'news_page'},
            {'name': 'Trang liên hệ', 'value': 'contact_page'},
            {'name': 'Trang giới thiệu', 'value': 'about_page'},
        ];

        // Submit Form tạo mới
        $scope.submit = function () {
            let url = "{!! route('banners.store') !!}";
            $scope.loading.submit = true;

            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: $scope.form.submit_data,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        $('#create-banner').modal('hide');
                        toastr.success(response.message);
                        datatable.ajax.reload();
                        $scope.errors = null;
                    } else {
                        $scope.errors = response.errors;
                        toastr.warning(response.message);
                    }
                },
                error: function () {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.loading.submit = false;
                    $scope.form.clearImage();
                    $scope.$applyAsync();
                },
            });
        }
    })
</script>
