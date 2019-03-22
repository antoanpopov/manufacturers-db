@extends('layouts.main')

@section('content')

    <h1>Categories count - {{ sizeof($categories)  }}</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                PARENT
            </th>
            <th>
                NAME
            </th>
            <th>
                DESCRIPTION
            </th>
            <th>
                SHOW
            </th>
            <th>
                ORDER
            </th>
        </tr>
        </thead>
        @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->id }}
                </td>
                <td>{{ $category->parent }}</td>
                <td>
                    <ul>
                        @foreach($category->name as $nameTexts)
                            <li>[{{$nameTexts->language_code}}] {{$nameTexts->text}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($category->description as $descriptionTexts)
                            <li>[{{$descriptionTexts->language_code}}] {{$descriptionTexts->text}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{$category->show}}
                </td>
                <td>
                    {{$category->order}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
