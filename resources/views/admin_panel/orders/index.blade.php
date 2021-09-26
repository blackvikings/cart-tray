@extends('layouts.app')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Address</th>
                                    <th>Products Name</th>
                                    <th>Quantities of product</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>Discount</th>
                                    <th>Discount Price</th>
                                    <th>Paid Price</th>
                                    <th>Placed at</th>
                                    <th>Status</th>
                                    <th>Pickup Method</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sale as $s)
                                <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->user->full_name }}</td>
                                <td>{{ $s->user->phone }}</td>
                                <td>{{ $s->user->addresses[0]->area }}, {{ $s->user->addresses[0]->city }}, {{ $s->user->addresses[0]->zip }} ,India</td>

                                    <td>
                                        @foreach($s->product as $product)
                                            {{ $product->name }}<br><br>
                                        @endforeach
                                    </td>

                                   <td>
                                        @foreach($s->saledetails as $saledetails)
                                            {{ $saledetails->qty }}<br><br>
                                       @endforeach
                                    </td>
                                    @php
                                        $subtotalPrice = 0;
                                    @endphp
                                    <td>
                                        @foreach($s->product as $product)
                                            @php
                                                $totalPrice =  $product->price - $product->discount;

                                                $subtotalPrice = $subtotalPrice + $totalPrice;
                                            @endphp
                                                {{ $totalPrice }}<br><br>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $subtotalPrice }}
                                    </td>
                                    <td>
                                        @if($subtotalPrice > 1000)
                                            @php
                                                $percentage = 20;
                                            @endphp
                                            20% off
                                        @else
                                            @php
                                                $percentage = 10;
                                            @endphp
                                            10% off
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $discountPrice = ($percentage / 100) * $subtotalPrice;
                                        @endphp
                                        {{ $discountPrice }}
                                    </td>
                                    <td>
                                        {{  $subtotalPrice - $discountPrice }}
                                    </td>
                                    <td>
                                        {{ $s->created_at }}
                                    </td>
                                    <td>
                                        {{ $s->order_status }}
                                    </td>
                                    <td>
                                        {{ $s->orderMethod }}
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin.orderUpdate') }}" style="display:inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$s->id}}" name="orderId">
                                            <select name="stat">
                                                @foreach($status as $x)
                                                    <option @if($s->order_status == $x[$loop->index]) selected @endif value="{{$x}}">{{$x}}</option>
                                                @endforeach
                                            </select>
                                            <input type="submit" class="btn btn-sm btn-warning" value="Update">
                                        </form>
                                    </td>
                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
