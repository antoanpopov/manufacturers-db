@extends('layouts.main')

@section('content')

    <h1>Parameters</h1>
    @if(isset($category_id))
        <p> The parameters for category with ID <b> {{ $category_id }} </b> are :</p>
    @endif
    <form action="{{ route("vendors.vali.search_parameters_by_category_id") }}" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="category_id"
                   placeholder="Search by category id" value="{{old("category_id")}}"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                SEARCH
            </button>
        </span>
        </div>
    </form>
    @if(isset($errors))
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach

    @endif

    <table class="table table-dark">
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                CATEGORY ID
            </th>
            <th>
                ORDER
            </th>
            <th>
                NAME
            </th>
            <th>
                OPTIONS
            </th>
        </tr>
        </thead>
        @foreach($parameters as $parameter)
            <tr>
                <td>
                    {{ $parameter->id }}
                </td>
                <td>{{ $parameter->category_id }}</td>
                <td>
                    {{$parameter->order}}
                </td>
                <td>
                    <ul>
                        @foreach($parameter->name as $nameTexts)
                            <li>[{{$nameTexts->language_code}}] {{$nameTexts->text}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($parameter->options as $option)
                            <li>
                                <div class="badge badge-success">ID {{$option->id}}</div>
                                <div class="badge badge-warning">ORDER {{$option->order}}</div>

                            @foreach($option->name as $name)
                                    <div> - [{{$name->language_code}}] {{$name->text}}</div>
                            @endforeach
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
