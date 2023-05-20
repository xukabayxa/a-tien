@extends('layouts.main')

@section('title')
Thêm mới danh mục lĩnh vực hoạt động
@endsection

@section('page_title')
    Thêm mới danh mục lĩnh vực hoạt động
@endsection

@section('title')
    Thêm mới danh mục lĩnh vực hoạt động
@endsection
@section('content')
<div ng-controller="CreateCategory" ng-cloak>
  @include('admin.activity_categories.form')
</div>
@endsection

@section('script')
@include('admin.activity_categories.ActivityCategory')
<script>
  app.controller('CreateCategory', function ($scope, $http) {
    $scope.form = new ActivityCategory({}, {scope: $scope});
    $scope.loading = {};
    $scope.submit = function() {
      $scope.loading.submit = true;
      $.ajax({
        type: 'POST',
        url: "{!! route('ActivityCategory.store') !!}",
        headers: {
          'X-CSRF-TOKEN': CSRF_TOKEN
        },
        data: $scope.form.submit_data,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            toastr.success(response.message);
            window.location.href = "{{ route('ActivityCategory.index') }}";
          } else {
            toastr.warning(response.message);
            $scope.errors = response.errors;
          }
        },
        error: function(e) {
          toastr.error('Đã có lỗi xảy ra');
        },
        complete: function() {
          $scope.loading.submit = false;
          $scope.$applyAsync();
        }
      });
    }
  });
</script>
@endsection
