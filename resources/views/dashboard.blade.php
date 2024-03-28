@extends('layouts.app')

@section('content')
    <table>
        <thead>
        <tr>
            <th>Symbol</th>
            <th>Currency Name</th>
            <th>Amount</th>
            <th>Short Code</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->symbol }}</td>
                <td>{{ $result->currencyName }}</td>
                <td>{{ $result->amount }}</td>
                <td>{{ $result->shrtCode }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
