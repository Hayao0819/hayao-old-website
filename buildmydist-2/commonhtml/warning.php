<div id="top-warning" style="display: none;">
    <div class="box-warning">
        このサイトはまだ作りかけです。追記してほしいこと、わかりにくいこと、誤字などがあれば<a href="https://github.com/Hayao0819/hayao.fascode.net/issues">こちら</a>から報告をお願いします。
    </div>

    <div class="box-warning">
        CSSが苦手なので一部のデバイスなどでレイアウトが崩れるかもしれません。また、h3以降のCSSもまだ何もできてません（）何かアイデアあったらください。
    </div>
    <input type="button" value="邪魔なこいつらを閉じる" onclick="closeTopWarning()">
</div>

<script>
    function closeTopWarning(){
        if (localStorage.getItem("TopWarningHide") != "true"){
            document.getElementById("top-warning").style.display = "none";
            document.getElementById("show-top-warning").style.display = "block"
            localStorage.setItem("TopWarningHide", "true")
        }
    }


    window.addEventListener("load", function(){
        if (localStorage.getItem("TopWarningHide") == "true"){
            document.getElementById("top-warning").style.display = "none";
        }else{
            document.getElementById("top-warning").style.display = "block";
        }
    })
</script>
