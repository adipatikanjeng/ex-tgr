@extends('sales-service')
@section('content_sales-service')

<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/customers/profile') }}">Sales Service</a><span> / </span>
	<a href="">My Profile</a>
</div>
<h2>
	My Profile
</h2>
@include('partial.alert')
<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
    <form action="{{ url(App::getLocale().'/sales/profile') }}" method="POST">
        {!! csrf_field() !!}
        <table class="tb_biodata">
            <tr>
                <th width="20%">{{ trans('global.name') }}</th> <th>:</th>
                <td>
                    <input name="name" class="frm_edit" type="text" disabled="disabled" value="{{ @$row->name }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">Username</th> <th>:</th>
                <td>
                <input name="username" class="frm_edit" type="text" disabled="disabled" value="{{ @$row->user->email }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">Email</th> <th>:</th>
                <td>
                    <input name="email" class="frm_edit" type="text" disabled="disabled" value="{{ @$row->email }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.branch') }}</th> <th>:</th>
                <td>
                    {!! Form::select('branch_id', $branches, (Input::old('branch_id')) ?: $row->branch_id, ['class' => 'frm_edit', 'disabled' => 'disabled']) !!}
                </td>
            </tr>
            <tr>
                <th width="20%">Password</th> <th>:</th>
                <td>
                    <input name="password" class="frm_edit" type="password" disabled="disabled" value=""/>
                </td>
            </tr>
            <th width="20%">Re type Password</th> <th>:</th>
            <td>
                <input name="password_confirmation" class="frm_edit" type="password" disabled="disabled" value="{{ @$row->password_confirmation }}"/>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding-top:30px;"><a class="btn_std_dis" style="margin-right:10px;" id="edit_profile">Edit</a><button class="btn_std_dis">Save</button>
            </td>
        </tr>
    </table>
</form>

</div>
@include('partial.footer-account')
@endsection