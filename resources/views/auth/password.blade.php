@extends('shopping-cart')
@section('content_shopping-cart')
<h2>Forget Password</h2>
<form method="POST" action="{{ url(App::getLocale().'/password/email') }}">
    {!! csrf_field() !!}

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
    </div>
    <div class="col_input" style="margin:20px 0 0 0;">
        <button type="submit" class="btn_std_dis" style="padding:0 120px;"> Send Password Reset Link</button>
    </div>

</form>
@endsection