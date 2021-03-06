<!DOCTYPE html>
<!-- saved from url=(0022)http://mdlwp.com/demo/ -->
<html lang="en-US" class="mdl-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('blog.title')}}</title>
    <!-- This site is optimized with the Yoast SEO plugin v3.1.2 - https://yoast.com/wordpress/plugins/seo/ -->
    <meta name="description" content="{{config('blog.describe')}}">
    <meta name="robots" content="{{config('blog.describe')}}">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('blog/asset/material-design-lite/material.min.css')}}" type="text/css"
          media="all">
    <link rel="stylesheet" href="{{asset('blog/asset/style.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset(config('blog.css.markdown'))}}" type="text/css" media="all">
    <script type="text/javascript" src="{{asset('blog/asset/material-design-lite/material.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('blog/asset/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('blog/asset/custom.js')}}"></script>
</head>
<body>
<div class="mdl-loading">
    <div class="mdl-loading-spinner mdl-cell--middle mdl-spinner  mdl-js-spinner is-active"></div>
</div>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title"></span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="waterfall-exp">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    {!! Form::open(['url'=>url('article/search'),'method'=>'get']) !!}
                    {!! Form::text('key',old('key'),['class'=>'mdl-textfield__input','id'=>'waterfall-exp']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- Bottom row, not visible on scroll -->
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <nav class="mdl-navigation">
                @if(!empty($blog_cates))
                    @foreach($blog_cates as $cate)
                        <a class="mdl-navigation__link" href="{{url('cate/'.$cate['id'])}}">{{$cate['name']}}</a>
                    @endforeach
                @endif
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Blog</span>
        <nav class="mdl-navigation">
            @if(!empty($blog_cates))
                @foreach($blog_cates as $cate)
                    <a class="mdl-navigation__link" href="{{url('cate/'.$cate['id'])}}">{{$cate['name']}}</a>
                @endforeach
            @endif
        </nav>

    </div>

    <div class="mdl-layout__content">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--2-col"></div>
            <div class="mdl-cell mdl-cell--8-col">
                @yield('content')
            </div>
            <div class="mdl-cell mdl-cell--2-col"></div>
        </div>



        <footer class="mdl-mega-footer">
            <div class="mdl-mega-footer__middle-section">
                <div class="mdl-mega-footer__drop-down-section">
                    <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
                    <h1 class="mdl-mega-footer__heading">友链</h1>
                    <ul class="mdl-mega-footer__link-list">
                        {{--<li><a href="#">About</a></li>--}}
                        {{--<li><a href="#">Terms</a></li>--}}
                        {{--<li><a href="#">Partners</a></li>--}}
                        {{--<li><a href="#">Updates</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="mdl-mega-footer__bottom-section">
                <ul class="mdl-mega-footer__link-list">
                    <li><a href="#">备案号:</a></li>
                </ul>
            </div>

        </footer>
    </div>
</div>

<div class="mdl-right-bottom">
    <!-- Colored FAB button with ripple -->
    <button class="mdl-scroll-top mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">arrow_upward</i>
    </button>
</div>
</body>
<script type="text/javascript">
    $(function () {
        customJs().init();
    });

</script>
</html>