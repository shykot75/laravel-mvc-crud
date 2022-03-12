@extends('master')


@section('title')
    Manage Product Page
@endsection

@section('body')

    <section class="py-5 ">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center bg-primary font-weight-bold">All Products</div>
                        <div class="card-body bg-secondary">
                            <h4 class="text-white text-center">{{Session::get('message')}}</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Sl NO</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Brand</th>
                                    <th>Product Category</th>
                                    <th>Product Image</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->category}}</td>

                                        <td><img src="{{asset('/'.$product->image)}}" alt="" height="60"></td>
                                        <td>
                                            <a href="{{route('edit-product', ['id'=> $product->id])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="deleteProduct({{$product->id}}) "><i class="fa fa-trash"></i></a>

                                            <form action="{{route('delete-product', ['id' => $product->id])}}" method="POST" id="deleteProduct{{$product->id}}">
                                                    @csrf
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function deleteProduct(id){
            event.preventDefault();
            var check = confirm('Are You sure to delete?');
            if(check){
                document.getElementById('deleteProduct'+id).submit();
            }
        }
    </script>







@endsection

