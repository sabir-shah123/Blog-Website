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
        <div class="col-md-12 mx-auto">
            <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <form action="{{ route('backend.setting.save') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @php
                                $fields = [['name' => 'site_name', 'label' => 'Site Name', 'type' => 'text'], ['name' => 'email', 'label' => 'Email', 'type' => 'email'], ['name' => 'phone', 'label' => 'Phone', 'type' => 'tel'], ['name' => 'facebook', 'label' => 'Facebook', 'type' => 'text'], ['name' => 'twitter', 'label' => 'Twitter', 'type' => 'text'], ['name' => 'instagram', 'label' => 'Instagram', 'type' => 'text'], ['name' => 'linkedin', 'label' => 'Linkedin', 'type' => 'text'], ['name' => 'youtube', 'label' => 'Youtube', 'type' => 'text'], ['name' => 'address', 'label' => 'Address', 'type' => 'textarea'], ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'], ['name' => 'keywords', 'label' => 'Keywords', 'type' => 'textarea'], ['name' => 'logo', 'label' => 'Logo', 'type' => 'file']];
                            @endphp
                            @foreach ($fields as $field)
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="{{ $field['name'] }}"
                                            class="font-weight-bold">{{ $field['label'] }}</label>
                                        @if ($field['type'] == 'file')
                                            <input type="file" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                                class="form-control-file dropify"
                                                data-default-file="{{ asset($setting[$field['name']] ?? '') }}">
                                        @elseif($field['type'] == 'textarea')
                                            <textarea name="{{ $field['name'] }}" id="{{ $field['name'] }}" class="form-control">{{ $setting[$field['name']] ?? '' }}</textarea>
                                        @else
                                            <input type="text" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                                class="form-control" value="{{ $setting[$field['name']] ?? '' }}">
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </div>

                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
