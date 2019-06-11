@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Item: {{$lampinfo[0]->partnr}}</div>
                    <form method="post" action="/Product/Update">
                        @csrf
                        <div class="container" style="margin-top: 1%">
                            <div class="form-group d-flex justify-content-center">
                                <img width="300" height="200" src="/images/{{$lampinfo[0]->partnr}}.png"/>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Partnr</th>
                                    <th scope="col">Specs</th>
                                    <th scope="col">Price</th>
                                    <th></th>
                                </tr>
                                </thead>
                                    <tr>
                                        <td><input type="text" name="partnr" readonly class="form-control-plaintext" value="{{$lampinfo[0]->partnr}}"></td>
                                        <td><input type="text" name="specs" readonly class="form-control-plaintext" value="{{$lampinfo[0]->specs}}"></td>
                                        <td><input type="text" name="Price" class="form-control" value="{{  sprintf("%.2f", $lampinfo[0]->price) }}"></td>
                                        <td><button type="submit" class="btn btn-primary">Save!</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
