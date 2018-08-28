@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse ($lists as $list)
                    <div class="card">
                        <div class="card-header">
                            <h4><a href="lists/{{ $list->id  }}">{{ $list->title }}</a></h4>
                        </div>
                        <div class="card-body">
                                {{ $list->body }}
                        </div>
                    </div>
                @empty
                    <p>There are no relevant results at this time.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
