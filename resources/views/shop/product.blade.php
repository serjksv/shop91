@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{ $product->name }}</h1>

    <div class="container">
        <div class="row">
            
                <div class="col-3">
                    <div class="border">
                        <a href="/product/{{ $product->slug }}">
                            <img src="{{$product->img}}" alt="" class="img-fluid">
                            
                            <div class="border-top">

                            <div class="col-6">
                                Category:{{$product->category ?
                                $product->category->name : 'No category'}}
                            </div>

                                Price: {{ $product->price }}
                            </div>

                            <div class="border-top">
                            Description: {{ $product->description }}
                            </div>
                           
                        </a>
                    </div>
                </div>
           
        </div>


        <h3>Add Review</h3>
        @guest
            Login or register
        @else
            <form action="/product/{{ $product->slug }}" method="POST">
                @csrf
                <div class="form-group">
                <textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="hidden" name="product" value="{{ $product->id }}">
                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                <button class="btn btn-primary">Send</button>
            </form>
        @endguest 
        
                            @foreach($reviews as $review)
                            <div class="col-12">
                                Reviews:{{ $review->review}} <br>
                                {{ $review->user->name}}
                            </div>
                            @endforeach
       </div>
@endsection