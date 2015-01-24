<html>
<head>
<?= get_instance()->load->view('asu/include/include')?>
<title>AUBG Musicals - All Shook Up!</title>
</head>
<style>
    body{
       background: white;
    }

</style>

<body>
    <div id='splash_page'>
        <div id='splash_background'>

<!--                <img src='/allshookup/images/splash.jpg' >-->

        </div>

        <div id='splash_container'>
            <div id='logo_intro_container'>
                <a href="/home/bg">
                    <img src='/allshookup/images/logos/broadway.png'>
                </a>
            </div>
            <div id='proceed_languages'>
                <a href="home/en">
                    <div id='proceed_in_english'>
                        <span>Proceed in ENGLISH</span>
                    </div>
                </a>
                <a href=/home>
                    <div id='proceed_in_bulgarian'>
                        <span>Продължи на БЪЛГАРСКИ</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        if (!are_cookies_enabled()) window.location.replace('/home/bg');
        $.when($('#splash_page').fadeIn(200)).then(function(){
            $.when($('#splash_container').fadeIn(1600)).then(function(){
                setTimeout(function(){
                    $('#proceed_languages').fadeIn(1000);
                }, 300);
            });
        })
    });

    function are_cookies_enabled()
    {
        var cookieEnabled = (navigator.cookieEnabled) ? true : false;

        if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled)
        {
            document.cookie="testcookie";
            cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false;
        }
        return (cookieEnabled);
    }
</script>
</html>