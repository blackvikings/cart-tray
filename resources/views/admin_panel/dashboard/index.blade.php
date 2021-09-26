@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-xl-4">
        <div class="card Online-Order">
            <div class="card-block">
                <h5>Online Orders</h5>
                <h6 class="text-muted d-flex align-items-center justify-content-between m-t-30">Delivery Orders<span class="float-right f-18 text-c-green">237 / 400</span></h6>
                <div class="progress mt-3">
                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:65%;height:6px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="text-muted mt-2 d-block">37% Done</span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card Online-Order">
            <div class="card-block">
                <h5>Pending Orders</h5>
                <h6 class="text-muted d-flex align-items-center justify-content-between m-t-30">Pending Orders<span class="float-right f-18 text-c-purple">100 / 500</span></h6>
                <div class="progress mt-3">
                    <div class="progress-bar progress-c-theme2" role="progressbar" style="width:50%;height:6px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="text-muted mt-2 d-block">20% Pending</span>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-4">
        <div class="card Online-Order">
            <div class="card-block">
                <h5>Return Orders</h5>
                <h6 class="text-muted d-flex align-items-center justify-content-between m-t-30">Return Orders<span class="float-right f-18 text-c-blue">50 / 400</span></h6>
                <div class="progress mt-3">
                    <div class="progress-bar progress-c-blue" role="progressbar" style="width:40%;height:6px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="text-muted mt-2 d-block">10% Return</span>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                       Time
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $s)
                                <tr>
                                    <td class="font-weight-medium">
                                        {{$s->created_at}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->order_status}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->price}}
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
