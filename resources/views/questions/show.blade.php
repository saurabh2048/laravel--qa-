

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h1>{{ $question->title }}</h1>     
                        <div class="ms-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                        </div>                   
                    </div>
                   
                </div>

                <div class="card-body">
                    @parsedown($question->body_html)
                    
                 {{-- { !! $question->body_html !! } --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count . " " . str_plural('Answer',$question->answers_count) }}</h2>
                    </div>
                    <hr>
                    {{-- {{ dd($question->answers) }} --}}
                    @foreach ($question->answers as $answer)
                    <div class="media" style="padding-bottom: 5rem;">
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div style="float: right;">
                                <span class="text-muted">Aswered {{ $answer->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="">
                                        </a>                                        
                                            <a href="{{ $answer->user->url }}" style="margin-left: 1rem;">{{ $answer->user->name }}</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
