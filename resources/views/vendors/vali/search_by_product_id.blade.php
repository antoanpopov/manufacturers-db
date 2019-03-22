@extends('layouts.main')

@section('content')

    <h1>Product</h1>
    @if(isset($product_id))
        <p> The parameters for category with ID <b> {{ $product_id }} </b> are :</p>
    @endif
    <form action="{{ route("vendors.vali.search_by_product_id") }}" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="product_id"
                   placeholder="Search by product id" value="{{old("product_id")}}"> <span class="input-group-btn">
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
                IDWF
            </th>
            <th>
                REFERENCE NUMBER
            </th>
            <th>
                MANUFACTURER ID
            </th>
            <th>
                STATUS
            </th>
            <th>
                PRICE CLIENT
            </th>
            <th>
                PRICE PARTNER
            </th>
            <th>
                SHOW
            </th>
        </tr>
        </thead>
        @if($productData)
            <tbody>
            <td>{{ $productData->id }}</td>
            <td>{{ $productData->idWF }}</td>
            <td>{{ $productData->reference_number }}</td>
            <td>{{ $productData->manufacturer_id }}</td>
            <td>{{ $productData->status }}</td>
            <td>{{ $productData->price_client }}</td>
            <td>{{ $productData->price_partner }}</td>
            <td>{{ $productData->show }}</td>
            </tbody>
        @endif
    </table>
@endsection
