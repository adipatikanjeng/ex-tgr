@extends('account')
@section('content_account')
<div class="breadcrumb breadcrumb_account">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/my-account') }}">My Account</a><span> / </span>
    <a href="{{ url(App::getLocale().'/my-account') }}">My Info</a><span> / </span>
    <a href="">Kontrak Pembelian</a>
</div>
<h2>
    Kontrak Pembelian
    <div class="boxWizard after_clear">
        <ul class="after_clear">
            <li class="active">1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
    </div>
</h2>
<div class="contact_form form_account after_clear" style="margin:60px 0 0 0">
    <h2>Yang bertanda tangan di bawah ini:</h2>
    @include('partial.alert')
    <form action="{{ url(App::getLocale().'/my-account/contracts/page-one') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="contract_number" value="{{ $contractNumber }}">
        <div class="row_account after_clear">
            <div class="col_account">
                <label style="letter-spacing: 2px;">kp number: </label>
                <h2>{{ $contractNumber }}</h2>
            </div>
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <label style="letter-spacing: 2px;">pemilikan program dengan cara: </label>
                {!! Form::select('payment_type', ['Cash' => 'Cash', 'Credit' => 'Credit', 'COD' => 'COD'], @$contract->payment_type, ['id' => 'paymentTypeContract']) !!}
            </div>
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <label>Nama :</label>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="gender" required value="Male" {{ (@$contract->gender) ? ((@$contract->gender == 'Male') ? 'checked="checked"' : '') : 'checked="checked"' }}/> Bapak
                    </label>
                    <label>
                        <input type="radio" name="gender" required value="Female" {{ (@$contract->gender) ? ((@$contract->gender == 'Female') ? 'checked="checked"' : '') : '' }}/> Ibu
                    </label>
                </div>
            </div>
            <div class="col_account">

                <input type="text" name="name" value="{{ (Input::old('name')) ?: @$contract->name }}" required/>
            </div>
        </div>
        <div id="GroupOffice1" class="row_account after_clear">
            <div class="col_account">
                <label>Bekerja pada</label>
                <input id="office" type="text" name="office" value="{{ (Input::old('office')) ?: @$contract->office }}" required/>
            </div>
            <div class="col_account">
                <label>Jabatan/ Bagian</label>
                <input type="text" name="position" value="{{ (Input::old('position')) ?: @$contract->position }}"/>
            </div>
        </div>
        <div id="GroupOffice2" class="row_account after_clear">
            <div class="col_account">
                <label>Alamat Kantor</label>
                <textarea id="office_address" name="office_address" required>{{ (Input::old('office_address')) ?: @$contract->office_address }}</textarea>
            </div>
            <div class="row_account2">
                <div class="col_account2">
                    <label>Tower/ Lantai</label>
                    <input name="floor" type="text" value="{{ (Input::old('floor')) ?: @$contract->floor }}"/>
                </div>
                <div class="col_account2" style="margin-top:15px;">
                    <label>Telepon Kantor</label>
                    <input id="office_telephone" type="text" name="office_telephone" value="{{ (Input::old('office_telephone')) ?: @$contract->office_telephone }}" required/>
                </div>
            </div>
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <label>alamat e-mail</label>
                <input type="email" name="email" value="{{ (Input::old('email')) ?: @$contract->email }}"/>
            </div>
            <div class="col_account">
                <label>hp</label>
                <input type="text" class="phone-number" name="mobile_phone" value="{{ (Input::old('mobile_phone')) ?: @$contract->mobile_phone }}" />
            </div>
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <label id="AlamatRumah" >Alamat Kirim</label>
                <textarea id="home_address" name="home_address" >{{ (Input::old('home_address')) ?: @$contract->home_address }}</textarea>
            </div>
            <div class="row_account2">
                <div class="col_account2 kode_pos">
                    <label>kode pos</label>
                    <div style="clear:right"></div>
                    <input type="text" class="postal_code" maxlength="1" name="postal_code1" value="{{ (Input::old('postal_code1')) ?: substr(@$contract->postal_code, 0, 1) }}" style="width:28px;"/>
                    <input type="text" class="postal_code" maxlength="1" name="postal_code2" value="{{ (Input::old('postal_code2')) ?: substr(@$contract->postal_code, 1, 1) }}" style="width:28px;margin-left:9px;"/>
                    <input type="text" class="postal_code" maxlength="1" name="postal_code3" value="{{ (Input::old('postal_code3')) ?: substr(@$contract->postal_code, 2, 1) }}" style="width:28px;margin-left:9px;"/>
                    <input type="text" class="postal_code" maxlength="1" name="postal_code4" value="{{ (Input::old('postal_code4')) ?: substr(@$contract->postal_code, 3, 1) }}" style="width:28px;margin-left:9px;"/>
                    <input type="text" class="postal_code" maxlength="1" name="postal_code5" value="{{ (Input::old('postal_code5')) ?: substr(@$contract->postal_code, 4, 1) }}" style="width:28px;margin-left:9px;"/>
					<input type="hidden" name="postal_codes" />
                </div>
                <div class="col_account2" style="margin-top: 10px">
                    <label style="letter-spacing: 2px;">cabang: </label>
                    <div id="branchList">
                        @include('account.contract.branch-list', ['branches' => $branches, 'branchCode' => (@$contract->branch->code) ?: Auth::user()->epc->profile->rm_branch_id])
                    </div>
                </div>
            </div>
        </div>
        <div class="row_account after_clear">
            <div  class="col_account">
                <label>Telepon Rumah</label>
                <input type="text" name="home_telephone" value="{{ (Input::old('home_telephone')) ?: @$contract->home_telephone }}" required/>
            </div>
        </div>
        <div class="row_account after_clear">
            <div  class="col_account">
                 <label>Upload bukti transfer</label>
                    <input type="file" name="file_transfer" {{ (@$contract->file_transfer) ? '' : 'required'  }} value="{{ (Input::old('file_transfer')) ?: @$contract->file_transfer }}"/>
                    @if(@$contract->file_transfer)
                    <?php $file = explode('_', $contract->file_transfer) ?>
                    <?php $file = (count($file) <= 2) ?  '_'.end($file) : $contract->file_transfer?>
                    <br><br>
                    Download File: <br><a href="{{ url(App::getLocale().'/download-file/'.$file) }}">{{ @$file }}</a>
                    @endif
            </div>
            <div class="row_account2">
                <div class="col_account2">
                    <label>Upload KTP</label>
                    <input type="file" id="id_card" name="id_card" {{ (@$contract->id_card) ? '' : 'required'  }} value="{{ (Input::old('id_card')) ?: @$contract->id_card }}"/>
					<input type="hidden" id="id_card_req" value ="{{ @$contract->id_card }}"/>
                    @if(@$contract->id_card)
                    <?php $file = explode('_', $contract->id_card) ?>
                    <?php $file = (count($file) <= 2) ?  '_'.end($file) : $contract->id_card?>
                    <br><br>
                    Download File: <br><a href="{{ url(App::getLocale().'/download-file/'.$file) }}">{{ @$file }}</a>
                    @endif
                </div>
            </div>
        </div>

        <div id="KirimTagih" class="row_account after_clear" style="display: none;">
            <div class="col_account">
                <label>alamat kirim :</label>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="shipping_address" required value="Home" {{ (@$contract->shipping_address) ? ((@$contract->shipping_address == 'Home') ? 'checked="checked"' : '') : 'checked="checked"' }} /> Rumah
                    </label>
                    <label>
                        <input type="radio" name="shipping_address" required value="Office" {{ (@$contract->shipping_address) ? ((@$contract->shipping_address == 'Office') ? 'checked="checked"' : '') : '' }}/> Kantor
                    </label>
                </div>
            </div>
            <div class="col_account">
                <label>alamat tagih :</label>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="receivable_address" value="Home" {{ (@$contract->receivable_address) ? ((@$contract->receivable_address == 'Home') ? 'checked="checked"' : '') : 'checked="checked"' }} /> Rumah
                    </label>
                    <label>
                        <input type="radio" name="receivable_address" value="Address" {{ (@$contract->receivable_address) ? ((@$contract->receivable_address == 'Office') ? 'checked="checked"' : '') : '' }}/> Kantor
                    </label>
                </div>
            </div>
        </div>
		
		<h2 style="margin-top:80px;">Sumber referensi pelanggan (diisi oleh EPC) :</h2>
		<div class="row_account after_clear" style="padding-bottom:20px;">
			<div class="col_account_full">
				<div class="checkbox-inline">
					  <div class="row_account program after_clear">
						<div class="col_account">
							@if(isset($contract->source_id ))
								{!! Form::select('source_id', $sources, $contract->source_id ) !!}
							@else
								{!! Form::select('source_id', $sources, '' ) !!}
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		
        <div style="margin-top:20px;">
            <button type="submit" class="btn_std_dis" style="padding:0 115px">Continue</button>
        </div>
    </form>
</div>

<script type="text/javascript">

    $("#paymentTypeContract").change(function(event){
        
        var selected = $(this).val();
		//alert(selected);
		PaymentChange(selected);
    });
	
	$(document).ready(function () {
		var PaymentType = $("#paymentTypeContract").val();
		PaymentChange(PaymentType);
	});
	
	function PaymentChange(PayType){
		if(PayType=='Cash'||PayType=='COD'){
			$("#AlamatRumah").text('Alamat Kirim');
			$("#KirimTagih").hide();
			//$("#office_address").prop('disabled', true);
			document.getElementById("office_address").required = false;
			document.getElementById("office").required = false;
			document.getElementById("office_telephone").required = false;
			document.getElementById("id_card").required = false;
			$("#GroupOffice1").hide();
			$("#GroupOffice2").hide();
			
			var $radiosKirim = $('input:radio[name=shipping_address]');
			$radiosKirim.filter('[value=Home]').prop('checked', true);
			
			var $radiosTagih = $('input:radio[name=receivable_address]');
			$radiosTagih.filter('[value=Home]').prop('checked', true);
			
		}else{
			$("#AlamatRumah").text('Alamat Rumah');
			$("#KirimTagih").show();
			//$("#office_address").prop('disabled', false);
			document.getElementById("office_address").required = true;
			document.getElementById("office").required = true;
			document.getElementById("office_telephone").required = true;
			if(document.getElementById("id_card_req").value == ""){
				document.getElementById("id_card").required = true;
			}else{
				document.getElementById("id_card").required = false;
			};
			$("#GroupOffice1").show();
			$("#GroupOffice2").show();
		}
	};
</script>

@endsection