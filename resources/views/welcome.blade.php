@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card-columns">
        @foreach($data ?? '' as $item)
        @if(isset($item->name) || isset($item->image))
        <div class="card shadow-sm p-1">
            @if(isset($item->image))
            <a href="{{ asset('item/'.$item->id) }}" class="crop">
                <img src="{{ asset('storage/images/'.$item->image) }}" class="w-100" alt="" />
            </a>
            @endif
            <div class="card-body">
                <h4 class="mb-0"><a href="{{ asset('item/'.$item->id) }}" class="text-dark">{{$item->name}}</a></h4>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection