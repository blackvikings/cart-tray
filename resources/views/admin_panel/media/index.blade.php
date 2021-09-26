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

        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Media</h4>
                    <form class="forms-sample" method="post" action="{{ route('admin.store') }}" id="cat_form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $err)
                        <tr>
                            <td>
                                <li>{{$err}}</li>
                            </td>
                        </tr>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Image Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
{{--                                    <th>--}}
{{--                                        Edit--}}
{{--                                    </th>--}}
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($media as $img)
                                <tr>
                                    <td>
                                        <img src="{{ asset($img->images) }}" width="20" >
                                    </td>
                                    <td>
                                        {{$img->created_at}}
                                    </td>
                                    <td>
                                        {{$img->updated_at}}
                                    </td>
{{--                                    <td>--}}
{{--                                        <a href="{{route('admin.categories.edit', ['id' => $img->id])}}" class="btn btn-warning">Edit</a>--}}
{{--                                    </td>--}}
                                    <td>
                                        <a href="{{route('admin.media.delete', ['id' => $img->id])}}" onclick="delete()" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('js')
    <!--JQUERY Validation-->
    <script>

        // $(document).ready(function() {
        //
        // 	$("#cat_form").validate({
        // 		rules: {
        // 			Name: "required",
        // 			Type: "required",
        //
        // 		},
        // 		messages: {
        // 			Name: "Category Name is Required",
        // 			Type: "Category Type is Required",
        //
        // 		}
        // 	});
        //
        //
        // });
    </script>
    <!--/JQUERY Validation-->
@endpush
