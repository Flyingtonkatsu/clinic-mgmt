@foreach($meds as $med)

<tr>
    <td class="text-center col-xs-8">{{$med->name}}</td>
    <td class="text-center col-sm-4"><button class="btn btn-sm btn-primary btn-issue-med" id="btn-issue-med-{{$med->id}}" data-med-id="{{$med->id}}">Issue</button></td>
</tr>

@endforeach