@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">
                        <h4>{{ $list->title }}</h4>
                    </div>
                    <div class="card-body">
                        {{ $list->body }}
                    </div>
                </div>

            </div>


            <div class="col-md-8">
                @foreach ($items as $item)
                    @include ('rlists.item')
                @endforeach

                <hr>

                @if(auth()->check())
                    @if( auth()->user()->rol == 1)
                            <form method="POST" action="{{ $list->path() . '/items' }}">
                                @csrf

                                <div class="form-group">

                                <input type="text" name="name" id="name" class="form-control" placeholder="Item Name">
                                <textarea name="description" id="description" class="form-control" placeholder="Item Description"
                                      rows="5"></textarea>
                                </div>

                                <button type="submit" class="btn btn-default">Add item</button>
                            </form>
                    @else
                        <p class="text-center">To add new items you must be an administrator</p>
                    @endif
                @endif

            </div>
        </div>
    </div>

@endsection
