<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Browse Poems by their types
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @foreach ($channels as $Channel )
          <a class="dropdown-item" href="/poems/{{$Channel->slug}}">{{ $Channel->name }}</a>

              
          @endforeach
        </div>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Browse poems via languages
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
              @foreach ($languages as $language )
             
              <a class="dropdown-item" href="/poems/languages/{{ $language->language }}">{{ $language->language }}</a>
    
             
         
                  
              @endforeach
                
         
          </div>
        </li>