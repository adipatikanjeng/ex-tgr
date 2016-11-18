<div class="detail_order order_2">
	<h2>Shipping Address</h2>
	<div style="padding: 0px 20px 20px 20px;">
		<table>
			<tr>
				<td>{{ $address->name }}</td>
			</tr>
			<tr>
				<td>{{ $address->address }}</td>
			</tr>
			<tr>
				<td>{{ @$address->city->province->name }} - {{ @$address->city->name }}</td>
			</tr>
			<tr>
				<td>{{ $address->telephone }}</td>
			</tr>

		</table>
	</div>
</div>
<div class="detail_order order_2">
	<h2>Billing Address</h2>
	<div style="padding: 0px 20px 20px 20px;">
		<table>
			<tr>
				<td>{{ $billingAddress->name }}</td>
			</tr>
			<tr>
				<td>{{ $billingAddress->address }}</td>
			</tr>
			<tr>
				<td>{{ $billingAddress->city->province->name }} - {{ $billingAddress->city->name }}</td>
			</tr>
			<tr>
				<td>{{ $billingAddress->telephone }}</td>
			</tr>

		</table>
	</div>
</div>