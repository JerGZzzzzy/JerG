$(function () {
    $('#addkj').click(function () {
        var cont= {};
        cont['text'] = "<p>"+$("#text").val()+"</p>";
        cont['url'] = "<a href='"+$("#url").val()+"'>"+$("#link").val()+"</a>";
        cont['code'] = "<pre><code>"+$("#code").val()+"</code></pre>";
        cont['fileimg'] = $("#fileimg").val();
        cont['filevideo'] = $("#filevideo").val();
        cont['file'] = $("#file").val();
        $('#body').append("<div class='well'>" + cont.text+cont.url+cont.code+"</div>");
    });
});