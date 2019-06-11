
    @extends('layouts.app')
    @section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    Productsoort:
                    <select class="form-control">
                        @foreach($producten as $product)
                        <option value="{{ $product->productnr }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-12">
                    Wattage:
                    <input type="text" id="wattage" class="form-control" />
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <button id="toon" class="btn w-100">Toon Overzicht</button>
                </div>
            </div>
        </div>
    </div>
    <h1></h1>
    <table class="table bg-white">
        <tr>
            <th></th>
            <th>Partnr</th>
            <th>Specs</th>
            <th>Price</th>
        </tr>
        <tbody id="mid"></tbody>
    </table>

    @endsection
