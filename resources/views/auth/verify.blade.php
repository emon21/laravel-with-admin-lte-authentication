@include('admin/inc_file/header')
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="{{ asset('/storage/profile') }}/{{ Auth::user()->user_picture }}">
                <b class="h2">
                    <p>Hi , {{ Auth::user()->name }}</p>
                </b>
                {{--  <img class="card-img-top" src="{{ asset('storage/profile/default.jpg')}}" alt="Card image">  --}}
            </div>
            <div class="card-header text-danger text-center"><b>{{ __('Please Verify Your Email Address') }}</b></div>
            <div class="card-body">
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to '. Auth::user()->email) }}
                </div>
                @endif
                <div class="alert p-2 text-success text-justify" role="alert">
                    {{--  {{ __('thanks for signup before getting started could you verify email address by click on the link we just
                    proceeding, please check your email'.'<b>email here</b>'.' for a verification link.') }},  --}}
                    <p style="font-size:18px;text-transform: capitalize;">thanks for signup before getting started could you verify email address by click on the link we just
                        proceeding, please check your email
                    </p><span class="text-danger">{{ auth::user()->email }}</span><span> for a verification link</span>
                </div>
                {{ __('If you did not receive the email Please Click Here Request') }} >>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark p-2 m-0 align-baseline mt-2">{{ __('click here to request another') }}</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->