@extends('firebase.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h4>Create order
                    <a href="{{url('orders')}}" class="btn btn-sm btn-danger float-end">Back</a>
                </h4>

                </div>
                <div class="card-body">
                    <form action="{{url('add-order')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <select class="form-control" name="title" id="title">
                                <option value="vanilla">Vanilla</option>
                                <option value="chocolate">Chocolate</option>
                                <option value="strawberries">Strawberries</option>
                                <option value="cheese">Cheese</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</div>
@endsection