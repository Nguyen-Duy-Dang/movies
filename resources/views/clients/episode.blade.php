@extends('clients.movie_layout.layout')
@section('type')
    <video
        controls
        crossorigin
        playsinline
        id="player"
        >
        @foreach ($urls as $url)
        <source
            src="{{$url->url}}" 
            size="{{$url->resolution}}"
        />
        @endforeach
    </video>
@endsection
@section('download')
    <div class="article__download">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
        Tải về:
        @foreach ($urls as $url)
            @if ($url->premium === 0)
                <a href="{{$url->url}}">{{$url->resolution}}p</a>  
            @else
                <a href="{{$url->url}}"><svg class="svg__premium" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffe600"><path d="m387-412 35-114-92-74h114l36-112 36 112h114l-93 74 35 114-92-71-93 71ZM240-40v-309q-38-42-59-96t-21-115q0-134 93-227t227-93q134 0 227 93t93 227q0 61-21 115t-59 96v309l-240-80-240 80Zm240-280q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70ZM320-159l160-41 160 41v-124q-35 20-75.5 31.5T480-240q-44 0-84.5-11.5T320-283v124Zm160-62Z"/></svg>{{$url->resolution}}p</a>
            @endif
        @endforeach
    </div>
@endsection