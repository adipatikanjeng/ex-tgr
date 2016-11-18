@extends('customer')
@section('content_customer')

<div class="breadcrumb">
	<a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
	<a href="{{ url(App::getLocale().'/customers') }}">My Account</a><span> / </span>
	<a href="">My Profile</a>
</div>
<h2>
	My Profile
</h2>
@include('partial.alert')
<div class="contact_form form_account after_clear" style="margin:40px 0 0 0">
    <form action="{{ url(App::getLocale().'/customers') }}" method="POST">
        {!! csrf_field() !!}
        <table class="tb_biodata">
            <tr>
                <th width="20%">{{ trans('global.name') }}</th> <th>:</th>
                <td>
                    <input name="name" class="frm_edit" type="text" disabled="disabled" value="{{ $row->name }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.gender') }}</th> <th>:</th>
                <td>
                    {!! Form::select('gender', ['M' => 'Laki-laki', 'F' => 'Perempuan'], (Input::old('gender')) ?: $row->gender, ['class' => 'frm_edit', 'disabled' => 'disabled']) !!}
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.place-of-birth') }}</th> <th>:</th>
                <td>
                    <input name="place_of_birth" class="frm_edit" type="text" disabled="disabled" value="{{ $row->place_of_birth }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.date-of-birth') }}</th> <th>:</th>
                <td>
                    <input name="date_of_birth" class="frm_edit datepicker" type="text" disabled="disabled" value="{{ $row->date_of_birth }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.religion') }}</th> <th>:</th>
                <td>
                    {!! Form::select('religion', ['Islam' => 'Islam','Katolik' => 'Katolik' ,'Protestan' => 'Protestan','Budha' => 'Budha','Hindu' => 'Hindu','Konghucu' => 'Konghucu'], (Input::old('religion')) ?: $row->religion, ['class' => 'frm_edit', 'disabled' => 'disabled']) !!}
                </td>
            </tr>
            <tr>
                <th width="20%">Merital Status</th> <th>:</th>
                <td>
                    {!! Form::select('merital_status', ['Single' => 'Single', 'Married' => 'Married'], (Input::old('merital_status')) ?: $row->merital_status, ['class' => 'frm_edit', 'disabled' => 'disabled']) !!}
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.telephone') }}</th> <th>:</th>
                <td>
                    <input name="telephone" class="frm_edit" type="text" disabled="disabled" value="{{ $row->telephone }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.id-number') }}</th> <th>:</th>
                <td>
                    <input name="id_number" class="frm_edit" type="text" disabled="disabled" value="{{ $row->id_number }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.zip-code') }}</th> <th>:</th>
                <td>
                    <input name="zip_code" class="frm_edit" type="text" disabled="disabled" value="{{ $row->zip_code }}" required maxlength="5"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{ trans('global.citizen') }}</th> <th>:</th>
                <td>
                    <input name="citizen" class="frm_edit" type="text" disabled="disabled" value="{{ $row->citizen }}"/>
                </td>
            </tr>
            <tr>
            <th width="20%">NPWP</th> <th>:</th>
                <td>
                    <input name="tax_number" class="frm_edit" type="text" disabled="disabled" value="{{ $row->tax_number }}"/>
                </td>
            </tr>
            <tr>
                <th width="20%" valign="middle">{{ trans('global.address') }}</th> <th valign="middle">:</th>
                <td valign="middle">
                    <textarea name="address" cols="5" rows="5" class="frm_edit" disabled="disabled">{{ $row->address }}</textarea>
                </td>
            </tr>
            <tr>
                <th width="20%">Password</th> <th>:</th>
                <td>
                    <input name="password" class="frm_edit" type="password" disabled="disabled" value="{{ $row->password }}"/>
                </td>
            </tr>
            <th width="20%">Re type Password</th> <th>:</th>
            <td>
                <input name="password_confirmation" class="frm_edit" type="password" disabled="disabled" value="{{ $row->password_confirmation }}"/>
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