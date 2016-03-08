<html>
<head>
    {!! HTML::style('css/main.css'); !!}
    {!! HTML::script('https://code.jquery.com/jquery-2.2.1.min.js'); !!}
    {!! HTML::script('js/app.js'); !!}
    <title>Food for Thought Friday: Panda, Facebook Advertising & Inbox Spam | SemRush</title>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
</head>
<body>
    <div id="head" class="col-0 header">
        {!! HTML::image('image/logo.png', 'Semrush logo', array('class' => 'logo')); !!}
    </div>
    <article class="col-1">
        <h1>Food for Thought Friday: Panda, Facebook Advertising & Inbox Spam</h1>
        <p>Communication between SEOs and CEOs is quite different than communication between team members. Alongside researching, exploring, setting the tasks and asking questions, SEOs have to know how to report their team’s results, present achievements and answer questions using accessible terms. You could say that SEOs have to know CEO optimization. Today will talk about the best ways to explain SEO to the CEO with {!! HTML::link('#', 'Heather Lutze'); !!}, Master Trainer & Owner of Findability University.</p>
        <p>Let’s face it, if a business owner doesn’t understand the benefits of SEO or its impact on other marketing activities, or has no idea how it works, there is no way you can convince him or her to hire you. So, how can you explain to an executive why SEO is essential in simple, non-marketing language?</p>
        <p>This really explains a lot about the integration of SEO into a company’s marketing mix, and this key idea is often overlooked by executives. It’s important to understand that SEO is not an island in the ocean of marketing. Here's how it works:</p>
        <p class="share">
            <div id="tw" class="share-btn">
                <span class="icon-tw"></span>
                <span class="count">{!! $tw !!}</span>
            </div>
            <div id="fb" class="share-btn">
                <span class="icon-fb"></span>
                <span class="count">{!! $fb !!}</span>
            </div>
            <div id="gp" class="share-btn">
                <span class="icon-gp"></span>
                <span class="count">{!! $gp !!}</span>
            </div>
            <div id="ln" class="share-btn">
                <span class="icon-in"></span>
                <span class="count">{!! $ln !!}</span>
            </div>
        </p>
    </article>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '{!! $fbapi !!}',
                xfbml      : true,
                version    : 'v2.1'
            });
        };
    </script>
</body>
</html>