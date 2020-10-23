@extends('admin.layout.master')
@section('content')

@if(session('error'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{session('error')}}
</div>
@endif

  <form role="form" class="form-horizontal" action="{{ route('insert_post') }}" method="POST" encType="multipart/form-data">
    {{ csrf_field() }}
    <!-- form group -->
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
      <p>
        <label for="title" class="form-label"><i class="fa fa-plus-circle"></i> Title</label>
      </p>
      <div class="t-wrapper">
        @if($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
        <input id="title" class="p-textbox" type="text" name="title" value="{{ old('title') }}" placeholder="Enter title..."/>
      </div>
    </div>
    <!-- end form group -->

    <!-- form group -->
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
      <p>
        <label for="image" class="form-label"><i class="fa fa-plus-circle"></i> Header Image</label>
      </p>
      <div class="t-wrapper">
        @if($errors->has('image'))
          <span class="help-block">
            <strong>{{ $errors->first('image') }}</strong>
          </span>
        @endif
        <input id="image" class="p-textbox" type="file" name="image"/>
      </div>
    </div>
    <!-- end form group -->

    <!-- form group -->
    <div class="form-group {{ $errors->has('introduction') ? 'has-error' : ''}}">
      <p>
        <label for="introduction" class="form-label"><i class="fa fa-plus-circle"></i> Introduction</label>
      </p>
      <div class="t-wrapper">
        @if($errors->has('introduction'))
          <span class="help-block">
            <strong>{{ $errors->first('introduction') }}</strong>
          </span>
        @endif
        <input id="introduction" class="p-textbox" type="text" name="introduction" value="{{ old('introduction') }}" placeholder="Enter introduction..."/>
      </div>
    </div>
    <!-- end form group -->

    <!-- form group -->
    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
      <p>
        <label for="content" class="form-label"><i class="fa fa-plus-circle"></i> Content</label>
      </p>
      <div class="t-wrapper">
        @if($errors->has('content'))
          <span class="help-block">
            <strong>{{ $errors->first('content') }}</strong>
          </span>
        @endif
        <textarea id="content" type="text" name="content" placeholder="Enter post...">{{ old('content') }}</textarea>
      </div>
    </div>
    <!-- end form group -->

    <div class="t-wrapper">

      <hr/>

      <label>
        <input type="checkbox" name="publish"/> Publish this post
      </label>

      <p>
        <input type="submit" class="btn btn-success col-md-3" value="Save"/>
      </p>

    </div>

  </form>

@endsection

@section('foot')
<!-- CK Editor -->
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content' );
</script>
@endsection