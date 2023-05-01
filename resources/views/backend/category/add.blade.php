@php
    $breadcrumb = [['name' => 'Dashboard', 'url' => route('backend.dashboard')], ['name' => $page_title ?? '', 'url' => '#']];
@endphp
@extends('layouts.backend')

@section('css')

@endsection
@section('title', $page_title)
@section('page-title', $page_title)
@section('content')

    <div class="row">
        <form action="{{ route('backend.category.save') }}" method="POST">
            @csrf
            <div class="col-md-6 mx-auto">
                <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}">
                                </div>
                            </div>




                        </div>


                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
@endsection
