//var _Architecture = document.getElementById("architecture").value
//if (_Architecture = "x86_64") {
//    var _option = document.createElement('option');
//    _option.text = "linux-lqx";
//    _option.value = "lqx";
//    document.getElementById("kernel").appendChild(_option);
//}

// 参考
// https://techacademy.jp/magazine/27133
// https://techacademy.jp/magazine/22315
// 


kernelMain();


function createKernelList(_kernel) {
    
    var _option = document.createElement('option');

    if ( _kernel == "core") {
        _option.text = "linux";
        _option.value = "core";
        _option.id = "core"
    } else {
        _option.text = "linux-" + _kernel;
        _option.value = _kernel;
        _option.id = _kernel;
    }

    //console.log(_option);
    //console.log(_kernel);
    document.getElementById("kernel").appendChild(_option);
    
}

function createListAny() {
    createKernelList("core");
    createKernelList("lts");
    createKernelList("zen");
}

function createListx86_64() {
    createKernelList("hardened");
    createKernelList("lqx");
    createKernelList("ck");
    createKernelList("rt");
    createKernelList("rt-lts");
    createKernelList("xanmod");
    createKernelList("xanmod-lts");
    createKernelList("zen-letsnote");
}

function kernelMain() {

    document.getElementById("kernel").innerHTML = "";

    createListAny();
    var _Architecture = document.getElementById("architecture").value;
    if (_Architecture == "x86_64") {
        createListx86_64();
    }

    document.getElementById("zen").selected = true;;
}
