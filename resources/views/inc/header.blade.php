<header>

  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Socail NW</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      @if(Auth::check())
    <li><a href="{{'/logout'}}"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    <li><a href="{{'/account'}}"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      @else
        <li><a href="{{'/?sign=up'}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{'/?sign=in'}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @endif


      </ul>
    </div>
  </div>
</nav>



</header>
<br>
<br>
