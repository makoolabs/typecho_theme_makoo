    var OriginTitile = document.title;
    var yuanico = $('[rel="icon"]').attr("href");
    var hjurl = $('[rel="apple-touch-icon"]').attr("href");
        hjurl = hjurl.replace('favicon.png','hj.png');
    var titleTime;
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
            $('[rel="icon"]').attr('href', hjurl);
            document.title = 'Σ(っ °Д °;)っ爱我憋走!';
            clearTimeout(titleTime);
        }
        else {
            $('[rel="icon"]').attr('href', yuanico);
            document.title =  OriginTitile;
        }
    });