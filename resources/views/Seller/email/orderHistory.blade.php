@component('mail::message')
Order History

<table class="table table-border">
    <tr>
        <th>Name</th>
        <th>ID</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{$order->title}}</td>
        <td>{{$order->id}}</td>
        <td><a href="/sellerbidetails/{{$order->id}}">Details</a></td>
        <td><a href="/orderDelete/{{$order->id}}">Delete</a></td>    
    </tr>
    @endforeach

</table>

Thanks,<br>
{{ config('app.name') }}
@endcomponent


@endsection