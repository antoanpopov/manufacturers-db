<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Vendors</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown {!! Route::is('vendors.vali.index')? "active" : "" !!}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Vali
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('vendors.vali.categories') }}">Categories</a>
                    <a class="dropdown-item" href="{{ route('vendors.vali.manufacturers') }}">Manufacturers</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('vendors.vali.search_parameters_by_category_id') }}">Search parameters by category id</a>
                    <a class="dropdown-item" href="{{ route('vendors.vali.search_by_product_id') }}">Search product by product id</a>
                </div>
        </ul>
    </div>
</nav>
