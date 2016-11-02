<input type="hidden" id="client-name" value="{{$client->lastname}}, {{$client->firstname}}">
<input type="hidden" id="patient-name" value="{{$patient->name}}">
<input type="hidden" id="consult-id" value="{{$consult_id}}">
<input type="hidden" id="reg-id" value="{{$reg_id}}">

@php($total = 0)
@foreach($payments as $payment)
<tr>
  	<td class="col-sm-1"> <input type="checkbox" checked class="form-control chk-item" data-payment-id="{{$payment->id}}"></td>
  	<td class="col-sm-6 payment-item">{{$payment->item}}</td>
  	<td class="col-sm-1 payment-price">{{$payment->price}}</td>
  	<td class="col-sm-1 payment-qty">{{$payment->qty}}</td>
  	<td class="col-sm-2 payment-subtotal">{{$subtotal = $payment->price * $payment->qty}}</td>
</tr>

@php($total = $total + $subtotal)
@endforeach

<tr>
	<td class="text-right" colspan="4"><h3>Total</h3></td>
	<td class="text-center"><h3 id="table-cell-total">{{$total}}</h3></td>
</tr>