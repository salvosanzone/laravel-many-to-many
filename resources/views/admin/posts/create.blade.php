@extends('layouts.app')

@section('content')
  
  <div class="container">
    <div class="col-8 offset-2">
      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{ $error }}
              </li>
            @endforeach
          </ul>
        </div>
      @endif
      

      <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input value="{{ old('title') }}" type="text" 
          class="form-control @error('title') is-invalid @enderror" 
          name="title" id="title" placeholder="Titolo del post">
          @error('title')
            <div class="form_errors">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Testo</label>
          <textarea 
          class="form-control @error('content') is-invalid @enderror" 
          name="content" id="content" rows="3">
            {{ old('content') }}
          </textarea>
          @error('content')
            <div class="form_errors ">
              {{ $message }}
            </div>
          @enderror
        </div>
        @foreach ($tags as $tag)
        <div class="form-check">
          <input type="checkbox" 
            value="{{ $tag->id }}" 
            name="tags[]" 
            id="tag{{ $loop->iteration }}"
            @if (in_array($tag->id, old('tags', [])))
              checked
            @endif>
          <label class="form-check-label" 
            for="{{ $loop->iteration }}">
            #{{ $tag->name }}
          </label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-info mt-3">Invia</button>
        <button type="reset" class="btn btn-secondary mt-3">Reset</button>
      </form>
    </div>
  </div>

  
  
@endsection