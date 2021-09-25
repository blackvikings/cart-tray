@extends('admin_panel.adminLayout') @section('content')
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    <style>label.error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding:1px 20px 1px 20px;
        }</style>



    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Compositions</h4>
                        <form class="forms-sample" method="post" action="{{ route('admin.composition.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" id="Name" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Compositions Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($compositions as $cat)
                                    <tr>
                                        <td>
                                            {{$cat->title}}
                                        </td>
                                        <td>
                                            {{$cat->created_at}}
                                        </td>
                                        <td>
                                            {{$cat->updated_at}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.composition.edit', ['id' => $cat->id])}}" class="btn btn-warning">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.composition.delete', ['id' => $cat->id])}}" class="btn btn-danger">Delete</a>
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
    </div>


    <!--JQUERY Validation-->
    <script>

        // $(document).ready(function() {
        //
        //     $("#cat_form").validate({
        //         rules: {
        //             Name: "required",
        //             Type: "required",
        //
        //
        //
        //         },
        //         messages: {
        //             Name: "Category Name is Required",
        //             Type: "Category Type is Required",
        //
        //         }
        //     });
        //
        //
        // });
    </script>
    <!--/JQUERY Validation-->

@endsection
