{!! Form::select('branch_code', $branches , $branchCode, ['id' => 'branchListId', 'disabled']) !!}
<input type="hidden" id="branch_code" value="{{ $branchCode }}">