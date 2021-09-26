@extends('layouts.app')
@php
    //dd($media->toArray());
@endphp
@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image Table</h4>
                        <img src="{{ asset($media->title) }}" />
                        <br>
                        <br>
                        <p><span> Name :-</span> {{ $media->name }}</p>
                        <p><span> Age :-</span> {{ $media->age }}</p>
                        <p><span> Weight :-</span> {{ $media->weight }}</p>
                        <p><span> Email :-</span> {{ $media->email }}</p>
                        <p><span> Gender :-</span> {{ $media->gender }}</p>
                        <p><span> Mobile no. :-</span> {{ $media->mobile }}</p>
                    </div>
                </div>
            </div>

@endsection
