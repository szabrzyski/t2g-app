  <nav class="niebieskie-tlo navbar navbar-expand-md navbar-dark" aria-label="Pasek nawigacji">
      <div class="container">
          <a class="navbar-brand" href="{{ route('glowna') }}"><span>T2G</span> App</a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
              data-bs-target="#gornyPasekNawigacji" aria-controls="gornyPasekNawigacji" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="gornyPasekNawigacji">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link @isset($aktywneMenu) @if ($aktywneMenu === 'szyfrowanie') active @endif @endisset" aria-current="page"
                          href="{{ route('szyfrowanie') }}">Łamacz kodu</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link @isset($aktywneMenu) @if ($aktywneMenu === 'wyswietlacz') active @endif @endisset" aria-current="page"
                          href="{{ route('wyswietlacz') }}">Wyświetlacz LDC</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @isset($aktywneMenu) @if ($aktywneMenu === 'wygraneLosy') active @endif @endisset" aria-current="page"
                        href="{{ route('wygraneLosy') }}">Wygrane losy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @isset($aktywneMenu) @if ($aktywneMenu === 'statystykaZarobkow') active @endif @endisset" aria-current="page"
                        href="{{ route('statystykaZarobkow') }}">Statystyka zarobków</a>
                </li>

              </ul>
          </div>
      </div>
  </nav>
