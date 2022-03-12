@extends('master')

@section('title')
    Add Product Page
@endsection


@section('body')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center bg-secondary font-weight-bold">Add Product Form</div>
                        <div class="card-body bg-primary">

                            <form action="{{route('update-product', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Price</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="price" value="{{$product->price}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description">{{$product->name}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Brand</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="brand" value="{{$product->brand}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Category</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="category" value="{{$product->category}}"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control-file" name="image"/>
                                        <img src="{{asset('/'.$product->image)}}" alt="" height="150" width="150">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Update Product"/>
                                    </div>
                                </div>

                            </form>
                            <h4 class="text-white text-center">{{Session::get('message')}}</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection
