@extends('layouts.main')

@section('title')
Thêm mới bài viết lĩnh vực hoạt động
@endsection

@section('page_title')
    Thêm mới bài viết lĩnh vực hoạt động

@endsection

@section('content')
<div ng-controller="ActivityPost" ng-cloak>
  @include('admin.activity_posts.form')
</div>
@endsection
@section('script')
@include('admin.activity_posts.ActivityPost')
<script>
  app.controller('ActivityPost', function ($scope, $http) {
    $scope.form = new ActivityPost({}, {scope: $scope});
    $scope.loading = {}

    $scope.submit = function(publish = 0) {
      $scope.loading.submit = true;
      let data = $scope.form.submit_data;
      data.append('publish', publish);
      $.ajax({
        type: 'POST',
        url: "{!! route('ActivityPosts.store') !!}",
        headers: {
          'X-CSRF-TOKEN': CSRF_TOKEN
        },
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            toastr.success(response.message);
            window.location.href = "{{ route('ActivityPosts.index') }}";
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
