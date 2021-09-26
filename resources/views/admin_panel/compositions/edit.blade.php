@extends('layouts.app')
@push('css')
    <style>label.error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding:1px 20px 1px 20px;
        }</style>
@endpush
@section('content')

    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{route('admin.categories')}}"> < Back to List</a>
                                <br><br>
                                <h4 class="card-title">Edit Composition</h4>
                                <br>
                                <form class="forms-sample" method="post"  id="cat_form" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Composition Name</label>
                                        <input type="text" class="form-control" id="Name" name="title" value="{{$composition->title}}">
                                    </div>
                                    <input  type="submit" name="updateButton"  class="btn btn-success mr-2" id="updateButton" value="UPDATE" />
                                </form>
                            </div>
                        </div>
                    </div>

@endsection
@push('js')
    <script>

        $(document).ready(function() {
            // validate the comment form when it is submitted
            //$("#commentForm").validate();

            // validate signup form on keyup and submit
            // $("#cat_form").validate({
            //     rules: {
            //         Name: "required",
            //         Type: "required",
            //
            //
            //
            //     },
            //     messages: {
            //         Name: "Category Name is Required",
            //         Type: "Category Type is Required",
            //
            //     }
            // });


        });
    </script>
    <!--/JQUERY Validation-->
@endpush
