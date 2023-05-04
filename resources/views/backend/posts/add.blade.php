@php
    $breadcrumb = [['name' => 'Dashboard', 'url' => route('backend.dashboard')], ['name' => $page_title ?? '', 'url' => '#']];
@endphp
@extends('layouts.backend')

@section('css')

@endsection
@section('title', $page_title)
@section('page-title', $page_title)
@section('content')

    <div class="card p-5">
        <form>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <h2>Main Info</h2>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter the post title">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter the post slug">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea class="form-control" id="excerpt" rows="3" placeholder="Enter the post excerpt"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" rows="5" placeholder="Enter the post content"></textarea>
                        </div>
                    </section>
                </div>
                <div class="col-md-4">
                    <section>
                        <h2>Tags</h2>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id="tags" placeholder="Enter tags">
                        </div>
                    </section>
                    <section>
                        <h2>Cover Image</h2>
                        <div class="form-group">
                            <input type="file" class="dropify" id="cover_image">
                        </div>
                    </section>
                    <section>
                        <h2>Post Images</h2>
                        <div class="form-group">
                            <input type="file" class="dropify" id="post_images" multiple>
                        </div>
                    </section>
                    <section>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="published">Published</label>
                                <select class="form-control" id="published">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <button type=" submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

@section('js')
@endsection
