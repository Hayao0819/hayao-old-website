var ARGUMENTS = ""

function getPlymouth(){
    var IsPlymouth = document.getElementsByName("plymouth");
    for(var i = 0; i < IsPlymouth.length; i++){
        if(IsPlymouth[i].checked) {
            if ( IsPlymouth[i].value = "enable") {
                ARGUMENTS = ARGUMENTS + "-b";
            }
        }
    }
}

function startgen() {
    // 初期化
    ARGUMENTS = ""

    getPlymouth();
    
    // 出力
    document.getElementById('output').innerHTML = ARGUMENTS;
}