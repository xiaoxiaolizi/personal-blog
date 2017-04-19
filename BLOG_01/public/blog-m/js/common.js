/**
 * Created by 123 on 2017/3/5.
 */
window._bd_share_config={
    "common":{
        "bdSnsKey":{},
        "bdText":"",
        "bdMini":"2",
        "bdMiniList":false,
        "bdPic":"",
        "bdStyle":"1",
        "bdSize":"32"
    },
    "share":{}};

with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];


$(function(){
    var s = location.pathname;
    var active= s.substring(s.lastIndexOf('/')+1);
    $('nav ul li').each(function(){
        var h=$(this).children('a').attr('href');
       if(h==active){
           $(this).addClass('active').siblings('.active').removeClass('active');
       }
    })

    console.log(active);

    $('#SOHUCS .invalidity').css('padding','0');

})

$('.m').click(function(){
    console.log('123');
    $('nav ul.mainM').toggle();
})





