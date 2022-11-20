@extends('firebase.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <h4 class="alert alert-warning">{{session('status')}}</h4>
            @endif
            <div class="card">
                <div class="card-header">
                <h4>Orders list
                    <a href="{{url('add-order')}}" class="btn btn-sm btn-primary float-end">Add Order</a>
                </h4>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key=> $order)
                            <tr>
                            <th>{{$key}}</th>
                                <td>{{$order['title']}}</td>
                                <td>{{$order['total']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

</div>
@endsection