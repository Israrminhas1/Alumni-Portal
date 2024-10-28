@extends('layouts.admin.master')

@section('title', 'Settings')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Setting - {{ $item->name }}</h1>
        <div class="my-3 my-lg-0 navbar-search">
            <div class="input-group">
                <div class="p-1 ">
                    <a href="{{ route('resume.builder', $item->code) }}" class="btn btn-sm btn-primary"><i
                            class="far fa-window-maximize"></i> Builder</a>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('resume.settings.update', $item) }}" autocomplete="off">
        @csrf

        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                </div>

                <div class="form-group mt-4">
                    <label for="basic-url">Public link resume</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">{{ URL::to('publish') }}</span>
                        </div>
                        <input type="text" name="slug" class="form-control" id="basic-url" value="{{ $item->slug }}"
                            aria-describedby="basic-addon3">
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <button class="btn btn-primary ml-auto">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
