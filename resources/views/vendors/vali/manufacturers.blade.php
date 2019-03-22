@extends('layouts.main')

@section('content')

    <h1>Manufacturers count - {{ sizeof($manufacturers)  }}</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                NAME
            </th>
        </tr>
        </thead>
        @foreach($manufacturers as $manufacturer)
            <tr>
                <td>
                    {{ $manufacturer->id }}
                </td>
                <td>
                    {{$manufacturer->name}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
