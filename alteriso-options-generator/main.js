var ARGUMENTS = ""

// デフォルトではない設定のみ引数で指定する
ONLY_NO_DEFAULT = true

function getPlymouth(){
    var _IsPlymouth = document.getElementById("plymouth_enable");
    if (_IsPlymouth.checked) {
        ARGUMENTS = ARGUMENTS + " -b";
    }
}

function getClean () {
    var _IsClean = document.getElementById("clean_enable");
    if (_IsClean.checked) {
        ARGUMENTS = ARGUMENTS + " -e"
    }
}

function getTarball () {
    var _IsTarball = document.getElementById("tarball_enable");
    if (_IsTarball.checked) {
        ARGUMENTS = ARGUMENTS + " --tarball";
    }
}

function getArchitecture () {
    var _Architecture = document.getElementById("architecture").value;

    if (_Architecture != "") {
        if (ONLY_NO_DEFAULT == false || _Architecture != "x86_64") {
            ARGUMENTS = ARGUMENTS + " -a \"" + _Architecture + "\"";
        }
    }
}

function getCompType () {
    var _Comptype = document.getElementById('sfs-comp-type').value;
    if (_Comptype != "") {
        if (_Comptype != "zstd" || ONLY_NO_DEFAULT == false) {
            ARGUMENTS = ARGUMENTS + " -c \"" + _Comptype + "\"";
        }
    }
}

function getKernel () {
    var _Kernel = document.getElementById("kernel").value;
    if(_Kernel != "") {
        if (_Kernel != "zen" || ONLY_NO_DEFAULT == false) {
            ARGUMENTS = ARGUMENTS + " -k \"" + _Kernel + "\"";
        }
    }
}

function getUsername (){
    var _Username = document.getElementById("username").value;
    // console.log(_Username);
    if (_Username != "" ) {
        if (_Username != "alter" || ONLY_NO_DEFAULT == false) {
            ARGUMENTS = ARGUMENTS + " -u \"" + _Username + "\"";
        }
    }
}

function getPassword (){
    var _Password = document.getElementById("password").value;
    //console.log(_Password);
    if (_Password != "" ) {
        if (_Password != "alter" || ONLY_NO_DEFAULT == false ) { 
            ARGUMENTS = ARGUMENTS + " -p \"" + _Password + "\"";
        }
    }
}

function getDebug () {
    var _IsDebug = document.getElementById("debug_enable");
    if (_IsDebug.checked) {
        ARGUMENTS = ARGUMENTS + " -d"
    }
}

function startgen() {
    // 初期化
    ARGUMENTS = ""

    if (document.getElementById("only_no_default").checked) {
        ONLY_NO_DEFAULT = false
    } else {
        ONLY_NO_DEFAULT = true
    }

    getPlymouth();
    getClean();
    getTarball();
    getArchitecture();
    getCompType();
    getKernel();
    getUsername();
    getPassword();
    getDebug();
    
    // 出力
    document.getElementById('output').innerHTML = "";
    if (ARGUMENTS == "") {
        document.getElementById('output').innerHTML = "引数は必要ありません";
    } else {
        document.getElementById('output').innerHTML = ARGUMENTS;
    }
}