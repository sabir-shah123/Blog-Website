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
            <a href="{{ route('backend.post.add') }}" class="btn btn-primary  py-3" style="float: right">Add
                {{ $page_title ?? 'New' }}</a>
        </div>
        <div class="col-md-12 mx-auto">
            <div id="expbuttons"></div>
            <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <table id="kt_datatable" class="table table-row-bordered gy-5">
                        <thead>
                            @php
                                $table_fields = ['Cover', 'Title', 'Category', 'Created By', 'Published', 'Last Modified', 'Action'];
                            @endphp
                            <tr class="fw-semibold fs-6 text-muted">
                                @foreach ($table_fields as $field)
                                    <td class="text-start">{{ $field }}</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $key => $data)
                                <tr>
                                    <td>
                                        <img src="{{ asset($data->cover->image) }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->category->name ?? '' }}</td>
                                    <td>{{ $data->createdBy->name ?? '' }}</td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $data->published ? 'success' : 'danger' }}">{{ $data->status ? 'Published' : 'Draft' }}</span>
                                    </td>
                                    <td>
                                        {{ $data->updated_at->format('d M Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('backend.post.status', $data->id) }}"
                                            class="btn btn-sm btn-{{ $data->status ? 'danger' : 'success' }}">Status</a>
                                        <a href="{{ route('backend.post.edit', $data->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('backend.post.delete', $data->id) }}"
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
