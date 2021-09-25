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
{{--            <div class="col-12 stretch-card">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title">Add Categories</h4>--}}
{{--                        <form class="forms-sample" method="post" id="cat_form" enctype="multipart/form-data">--}}
{{--                            {{csrf_field()}}--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter Category Name">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Category Type</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <input type="text" class="form-control" name="Type" id="Type" placeholder="Enter Category Type">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-sm-3 col-form-label">Image</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <input type="file" name="image"/>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <button type="submit" class="btn btn-success mr-2">Submit</button>--}}
{{--                        </form>--}}
{{--                        @if($errors->any())--}}
{{--                            <ul>--}}
{{--                                @foreach($errors->all() as $err)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <li>{{$err}}</li>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Medicine Request Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Mobile No.
                                    </th>
                                    <th>
                                        Medicine Name
                                    </th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($medicineRequest as $cat)
                                    <tr>
                                        <td>
                                            {{$cat->name}}
                                        </td>
                                        <td>
                                            {{$cat->mobile_no}}
                                        </td>
                                        <td>
                                            {{ $cat->medicine_name }}
                                        </td>
                                        <td>
                                            {{$cat->created_at}}
                                        </td>
                                        <td>
                                            {{$cat->updated_at}}
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
