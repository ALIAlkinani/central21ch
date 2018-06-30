<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Channels
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @foreach ($channels as $Channel )
          <a class="dropdown-item" href="/poems/{{$Channel->slug}}">{{ $Channel->name }}</a>

              
          @endforeach
        </div>
      </li>