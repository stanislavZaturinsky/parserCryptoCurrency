@extends('app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Rates</h2>
        </div>
    </div>
</div>

<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Time</th>
        <th scope="col">USD</th>
        <th scope="col">EUR</th>
        <th scope="col">GBP</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rates as $key => $rate)
    <tr>        
        <td>{{ $rate->created_at }}</td>
        <td>{{ $rate->usd }}</td>
        <td>{{ $rate->eur }}</td>
        <td>{{ $rate->gbp }}</td>
    </tr>
    @endforeach
    </tbody>
</table>

{{ $rates->links() }}
@stop