@extends('admin.layout.master')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{session('success')}}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{session('error')}}
</div>
@endif

  <table id="postTable" class="table table-stripped">

    <thead>
      <tr>
        <td>#</td>
        <td>Title</td>
        <td>Author</td>
        <td>Published</td>
        <td>Views</td>
        <td>Comments</td>
        <td>Action</td>
      </tr>
    </thead>

    <tbody>
    <?php $i=1; ?>
    @foreach($posts as $post)
      <tr>
        <td>{{$i}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{ ($post->published) ? 'Yes' : 'No' }}</td>
        <td>{{$post->views}}</td>
        <td>0</td>
        <td>
          <div class="btn-group">
            <button style="cursor:pointer" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="fa fa-bars"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a target="_blank" href="{{ route('view',['slug' => $post->slug]) }}">View</a></li>
              <li>
                @if($post->published)
                  <a onclick="return confirmBox();" href="{{ route('suspend',['slug' => $post->slug]) }}">Suspend</a>
                @else
                  <a onclick="return confirmBox();" href="{{ route('publish',['slug' => $post->slug]) }}">Publish</a>
                @endif
              </li>
              <li><a href="{{ route('edit',['slug' => $post->slug]) }}">Edit</a></li>
              <li><a onclick="return confirmBox();" href="{{ route('discard',['slug' => $post->slug]) }}">Discard</a></li>
            </ul>
          </div>
        </td>
      </tr>
    <?php $i++; ?>
    @endforeach
    </tbody>

    <tfoot>
      <tr>
        <td>#</td>
        <td>Title</td>
        <td>Author</td>
        <td>Published</td>
        <td>Views</td>
        <td>Comments</td>
        <td>Action</td>
      </tr>
    </tfoot>


  </table>

@endsection

@section('foot')
<script>
    function confirmBox(){
        var confirmAction = confirm("Are you sure?");
        if(!confirmAction) return false;
    }
    $(document).ready(function(){
        $('#postTable').DataTable();
    });
</script>
@endsection