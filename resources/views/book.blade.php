@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::get('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header"><b>{{ __('lang.new_book') }}</b></div>
                <div class="card-body">

                    <form action="/{{ isset($data->id) ? 'edit' : 'add' }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if(isset($data->id))
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        @endif

                        <div class="form-group">
                            <label for="name">{{ __('lang.name') }}</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name',$data->name ?? '') }}" placeholder="{{ __('lang.name_placeholder') }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('lang.description') }}</label>
                            <textarea name="description" class="form-control" id="description" rows="5" placeholder="{{ __('lang.description_placeholder') }}">{{ old('description',$data->description ?? '') }}</textarea>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="year">{{ __('lang.premiered') }}</label>
                                <input type="text" name="year" class="form-control" id="year" value="{{ old('year',$data->year ?? '') }}" placeholder="{{ __('lang.premiered_placeholder') }}">
                                @error('year')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="isbn">{{ __('lang.isbn') }}</label>
                                <input type="text" name="isbn" class="form-control" id="isbn" value="{{ old('isbn',$data->isbn ?? '') }}" placeholder="{{ __('lang.isbn_placeholder') }}">
                                @error('isbn')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">{{ __('lang.choose_image') }}</label>
                            </div>
                            @if(isset($data->id) && isset($data->image))
                            <div class="mt-3">
                                <img src="{{ asset('storage/images/'.$data->image) }}" class="w-50">
                            </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success font-weight-bold text-uppercase">{{ isset($data->id) ? __('lang.edit_book') : __('lang.add_book') }}</button>

                        @if(isset($data->id))
                        <a class="btn btn-info text-white font-weight-bold text-uppercase" href="{{ asset('item/'.$data->id) }}" target="_blank">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg>
                        </a>
                        @endif

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection