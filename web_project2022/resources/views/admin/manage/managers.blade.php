@extends('admin.admin_master')
@section ('admin')

<div class="content_wrapper">
    <!--middle content wrapper-->
    <h3 class="m-3">MANAGERS</h3>
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <div class="">
            <!-- page content -->
            <div class="registration_page">
                <div class="">
                    <div class="logo">
                        <img src="panel/assets/images/logo.png" alt="" class="img-fluid">
                    </div>
                    <form action="{{  route('admin.manage.register.create')  }} " method="post">
                        @csrf
                        <div class="form-group icon_parent">
                            <label for="uname">Username</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                                <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="form-group icon_parent">
                                <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                                <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                            </div>
                            <div class="form-group icon_parent">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"placeholder="Password"> 
                                <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                            </div>
                            <div class="form-group icon_parent">
                                <label for="rtpassword">Re-type Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-blue">Register</button>
                            </div>
                        </form>
                        @if(Auth::guard('admin')->user()->status === 'admin')
                            <h3 class="m-3">LIST OF MANAGERS</h3>
                            @foreach($admins as $admin)
                                    @if($admin->status != 'admin')
                                        <p>{{ $admin['name'] }} <a href="/admin/manage/manager/delete/{{ $admin['id'] }}"><button type="button" class="btn btn-red">DELETE ACCOUNT</button></a></p>
                                    @endif
                                @endforeach
                        @endif
                        <div class="footer">
                            <p>Copyright &copy; 2020 <a href="https://easylearningbd.com/">easy Learning</a>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>

    </div><!--/middle content wrapper-->


</div><!--/ content wrapper -->

@endsection