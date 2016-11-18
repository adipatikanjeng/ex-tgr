@extends('shopping-cart')
@section('content_shopping-cart')
<div class="box_shop_01 after_clear">
    <div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
        <h2>Reset Password</h2>
        <form method="POST" action="{{ url(App::getLocale().'/password/reset') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="row_input contact_us">
                <div class="col_input">
                    <label style="letter-spacing:2px;">email :</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="col_input">
                    <label style="letter-spacing:2px;">Password :</label>
                    <input type="password" name="password" required>
                </div>
                <div class="col_input">
                    <label style="letter-spacing:2px;">Confirm Password :</label>
                    <input type="password" name="password_confirmation" required>
                </div>
            </div>
            <div class="col_input" style="margin:20px 0 0 0;">
                <button type="submit" class="btn_std_dis" style="padding:0 120px;"> Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection