<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('back.dashboard') }}">
                <img src="{{ asset('back/logo/logo.jpg') }}" width="110" height="32" alt="{{ auth()->user()->name }}" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3"></div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" id="nav-avatar" style="background-image: url({{ asset('avatars/'.auth()->user()->avatar) }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div id="top-name">{{ mb_substr(explode(' ',auth()->user()->name)[0],0,16) }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @if(app()->getLocale() != 'az') <span style="margin-left: 12px"><a href="{{ route('lang.swithcher',['locale'=>'az']) }}">AZ</a></span> @endif
                    @if(app()->getLocale() != 'en') <span style="margin-left: 12px"><a href="{{ route('lang.swithcher',['locale'=>'en']) }}">EN</a></span> @endif
                    @if(app()->getLocale() != 'ru') <span style="margin-left: 12px"><a href="{{ route('lang.swithcher',['locale'=>'ru']) }}">RU</a></span> @endif
                    <a href="{{ route('back.profile') }}" class="dropdown-item">{{ __('static.profile') }}</a>
                    <a href="{{ route('logout') }}" class="dropdown-item">{{ __('static.logout') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('option.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                    </span>
                            <span class="nav-link-title">
                      {{ __('static.settings') }}
                    </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="6" x2="20" y2="6" /><line x1="4" y1="12" x2="20" y2="12" /><line x1="4" y1="18" x2="20" y2="18" /></svg>
                            </span>
                            <span class="nav-link-title">
                              {{ __('static.menus') }}
                                @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'product.create')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 9 12 15 18 9" /></svg>
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('home.create') }}" >
                                {{ __('menus.home') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('about.create') }}" >
                                {{ __('menus.about') }}
                            </a>
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ __('menus.products') }}


                                            @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'product.create')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
                                            @endif


                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('esas-menu.index') }}" class="dropdown-item">Əsas Menular</a>
                                            <a href="{{ route('sub-one-menu.index') }}" class="dropdown-item">Sub Menu 1</a>
                                            <a href="{{ route('sub-two-menu.index') }}" class="dropdown-item">Sub Menu 2</a>
                                            <a href="{{ route('product.index') }}" class="dropdown-item">Məhsullar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('brend.index') }}" >
                                {{ __('menus.brends') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('career.create') }}" >
                                {{ __('menus.career') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('contact.create') }}" >
                                {{ __('menus.contact') }}
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('career.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="9" y1="9" x2="10" y2="9" /><line x1="9" y1="13" x2="15" y2="13" /><line x1="9" y1="17" x2="15" y2="17" /></svg>
                    </span>
                            <span class="nav-link-title">
                      {{ __('static.cv') }}
                    </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" /><line x1="12" y1="11" x2="12" y2="11.01" /><line x1="8" y1="11" x2="8" y2="11.01" /><line x1="16" y1="11" x2="16" y2="11.01" /></svg>
                    </span>
                            <span class="nav-link-title">
                      {{ __('static.mesaj') }}
                    </span>
                        </a>
                    </li>
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last"></div>
            </div>
        </div>
    </div>
</div>
