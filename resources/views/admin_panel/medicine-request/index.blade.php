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

@endsection
