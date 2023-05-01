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
        <div class="col-md-12 text-right py-2">
            <a href="{{ route('backend.category.add') }}" class="btn btn-primary  py-3" style="float: right">Add {{ $page_title??'New' }}</a>
        </div>
        <div class="col-md-12 mx-auto">
            <div id="expbuttons"></div>
            <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <table id="kt_datatable" class="table table-row-bordered gy-5">
                        <thead>
                            @php
                                $table_fields = ['Name', 'Parent', 'Status', 'Action'];
                            @endphp
                            <tr class="fw-semibold fs-6 text-muted">
                                @foreach ($table_fields as $field)
                                    <td class="text-start">{{ $field }}</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $key => $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->parent->name ?? '' }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <a href="{{ route('backend.category.status', $data->id) }}"
                                            class="btn btn-sm btn-{{ $data->status?'danger':'success' }}">Status</a>
                                        <a href="{{ route('backend.category.edit', $data->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('backend.category.delete', $data->id) }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection
