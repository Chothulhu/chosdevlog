@extends('admin.admin_master')
@section ('admin')
  
<div class="content_wrapper">
    <!--middle content wrapper-->
    <h3 class="m-3">USERS</h3>
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        
        <form method="get" action="{{ route('admin.manage.comments.export') }}">
                    @foreach($users as $user)
                        <p><b>{{ $user->name }}</b><a href="/admin/manage/user/delete/{{ $user->id }}"> DEL</a></p></p>
                    @endforeach
                </form>
    </div><!--/middle content wrapper-->


</div><!--/ content wrapper -->

@endsection