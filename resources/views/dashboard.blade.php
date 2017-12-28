@extends('layouts.master')

@section('title')
Dashboard
@endsection


@section('content')

<br>
<br>

<section class="row new-post">
  <div class="col-md-3">
      <h1> Dashboard </h1>
  </div>

<div class="col-md-6 ">
  <header> <h3> what do you think .... </h3></headr>
    <form action="{{route('createpost')}}" method ="POST">
        {{ csrf_field() }}
    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="what's on your mind"></textarea>
<br/>
<button type="submit" class="btn btn-primary" name="button">Post</button>

@if ($errors->has('body'))<div class="alertmsg pull-right" > <strong>{{ $errors->first('body') }}</strong>  </div> @endif

</form>
</div>

</section>
<section class="row posts">

  <div class="col-md-6 col-md-offset-3">
  <header>
    <h3> what other people say</h3>
  </header>
  @foreach($posts as $post)
  <article class="post" data-postid="{{$post->id}}">
    <p>{{$post->body}}</p>
    <div class="info">
      posted by
      @if (Auth::user()==$post->user)
       Me
      @else
      {{$post->user->username}}
      @endif
       on {{$post->created_at->diffForHumans()}}

    </div>
    <div class="interaction">
      <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
      <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
      @if(Auth::user()==$post->user)
      |<a  id="edit" href="#">Edit</a>|
      <a  class="confirm" href="{{route('deletepost',['id'=>$post->id])}}">Delete</a>
      @endif
    </div>

  </article>
@endforeach
  </div>
</section>
<!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog ">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Edit Post</h4>
       </div>
       <div class="modal-body">
      <form class="" action="index.html" method="post">
        <div class="form-group">
          <label for="post-body"> edit the post</label>
          <textarea  class="form-control"name="post-body" id="post-body" rows="5" ></textarea>
        </div>
      </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button"  class="btn btn-primary"name="button" id="modal-save"> Save changes</button>
       </div>
     </div>
   </div>
 </div>
<!-- Modal -->

<div class="message ">
  <div class="  success">
    @if(Session::has('message'))
  <p>  {{Session::get('message')}}</p>
  </div>

  @endif


</div>
<script>
  var token=  '{{ Session::token() }}'; // {{ Session::token() }} ==={{ csrf_token() }} not {{ csrf_field() }}
  var urlEdit='{{route('editajax')}}';
  var urlLike='{{route('like')}}';
</script>

@endsection
