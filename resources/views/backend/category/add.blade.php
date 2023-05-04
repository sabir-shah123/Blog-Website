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
        <form action="{{ route('backend.category.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 mx-auto">
                <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <div class="row">
                            {{-- parent --}}
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label for="name" class="py-2">Select Parent</label>
                                    <select name="parent_id" id="parent_id" class="form-control" data-control="select2">
                                        <option value="">Select Parent</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label for="name" class="py-2">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}">
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label for="name" class="py-2">Category Image</label>
                                    <input type="file" name="image" id="image" class="form-control dropify"
                                        data-default-file="">
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Save" style="float:right">
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
