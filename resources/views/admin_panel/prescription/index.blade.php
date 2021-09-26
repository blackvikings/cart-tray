@extends('layouts.app')
@push('css')
    <style>
        label.error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding:1px 20px 1px 20px;
        }
    </style>
@endpush
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>age</th>
                                        <th>weight</th>
                                        <th>email</th>
                                        <th>gender</th>
                                        <th>mobile</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($media as $img)
                                    <tr>
                                        <td>{{ $img->name }}</td>
                                        <td>{{ $img->age }}</td>
                                        <td>{{ $img->weight }}</td>
                                        <td>{{ $img->email }}</td>
                                        <td>{{ $img->gender }}</td>
                                        <td>{{ $img->mobile }}</td>
                                        <td><img src="{{ asset($img->title) }}" width="20" ></td>
                                        <td>{{$img->created_at}}</td>
                                        <td>{{$img->updated_at}}</td>
                                        <td>
                                            <a href="{{ route('admin.prescription.delete', ['id' => $img->id]) }}" class="btn btn-danger">Delete</a>
                                            <a href="{{ route('admin.prescription.show', ['id' => $img->id]) }}" class="btn btn-danger">Show</a>
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
