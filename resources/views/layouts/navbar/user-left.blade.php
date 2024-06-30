<?php use App\User; ?>
<!-- layouts/navbar/user-left -->
<style>
    .navbar-dropdown .dropdown-menu>li>a {
        padding: 5px 10px;
    }
    .navbar-dropdown .dropdown-menu>li>a>i {
        top: 2px;
        padding-right: 3px;
    }
</style>
<ul class="nav navbar-nav navbar-dropdown">
    {{--
    <li class="active"><a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Product</a></li>
    <li><a href="#"><i class="fa fa-asterisk fa-fw"></i> Promotion</a></li>
    <li><a href="#"><i class="fa fa-book fa-fw"></i> Lookbook</a></li>
    <li><a href="#"><i class="fa fa-archive fa-fw"></i> Blog</a></li>
    <li><a href="#"><i class="fa fa-phone fa-fw"></i> About us</a></li>
    --}}
    @if (Auth::user()->active && Auth::user()->role !== User::ROLE_SHOP_PENDING)
        {{--@if (Auth::user()->role === User::ROLE_CATALOG)--}}
            {{--<li class="dropdown {{ $page === 'catalog' ? 'active' : '' }}">--}}
                {{--<a href="{{ url("/catalog") }}">Каталог <span class="caret"></span> </a>--}}
                {{--<ul class="dropdown-menu orange" role="menu">--}}
                    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="">Каталог Ex-Solaris</a></li>--}}
                    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="">Каталог магазина</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--@else--}}
{{--            <li class="{{ $page === 'catalog' ? 'active' : '' }}"><a href="{{ url("/catalog") }}">Каталог</a></li>--}}
        {{--@endif--}}

        <li><a href="{{ url('/') }}">Каталог</a></li>
        <?php $count = Auth::user()->activeOrdersCount(); ?>
        <li class="{{ $page === 'orders' ? 'active' : ''}}"><a href="{{ url("/orders?status=active") }}">Заказы @if($count > 0)<span class="badge red">{{ $count }}</span>@endif</a></li>
        <?php $count = Auth::user()->newThreadsCount(); ?>
        <li class="{{ $page === 'messages' ? 'active' : ''}}"><a href="{{ url("/messages") }}">Сообщения @if($count > 0)<span class="badge red">{{ $count }}</span>@endif</a></li>
        <li class="{{ $page === 'balance' ? 'active' : ''}}"><a href="{{ url("/balance") }}">Баланс</a></li>
        @if (($menuQiwiExchange = \App\Shop::getDefaultShop()->getActiveQiwiExchange()) && $menuQiwiExchange->active)
            <li class="{{ $page === 'exchange' ? 'active' : '' }}"><a href="{{ url("/exchange") }}">Обмен</a></li>
        @endif
        @if (Auth::user()->employee)
            <li class="dropdown">
                <a href="#">Магазин <span class="caret"></span> </a>
                <ul class="dropdown-menu orange" role="menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('/shop/'.Auth::user()->shop()->slug) }}">Магазин</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('/shop/management') }}">Настройки</a></li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->qiwiExchange)
            <li class="{{ $page === 'exchange_management' ? 'active' : '' }}"><a href="{{ url('/exchange/management') }}">Панель обменника</a></li>
        @endif
        <li class="dropdown">
            <a href="#"><b class="text-orange">Ex-Solaris <span class="caret"></span> </b></a>
            <ul class="dropdown-menu orange" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://tobechanged</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://tobechanged</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://tobechanged</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#"><b class="text-orange">Форум <span class="caret"></span></b></a>
            <ul class="dropdown-menu orange" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://tobechanged</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://tobechanged</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://tobechanged</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://tobechanged</a></li>
            </ul>
        </li>
    @endif
</ul>
<!-- / layouts/navbar/user-left -->