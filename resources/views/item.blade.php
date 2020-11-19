@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-5">
            <div class="book-cover">
                <img src="{{ asset('storage/images/'.$data->image) }}" alt="" />
            </div>
        </div>

        <div class="col-md-7">
            <div class="info">
                @if(Auth::check())
                <a href="{{ asset('list/edit/'.$data->id) }}">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>{{ __('lang.edit') }}</a>
                <hr>
                @endif
                <h2 class="mb-0">{{ $data->name }}</h2>
                <div class="rating">
                    <span>★★★★</span>★
                </div>
                <p class="text-muted">{{ __('lang.premiered') }} : {{ $data->year }}</p>

            </div>
            <div class="description">
                {!! nl2br($data->description) !!}
                <p><b>{{ __('lang.isbn') }} : {{ $data->isbn }}</b></p>
            </div>
        </div>

    </div>
</div>
@endsection