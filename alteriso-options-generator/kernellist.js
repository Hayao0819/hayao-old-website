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

function createKernelList(_kernel) {
    var _option = document.createElement('option');
    if ( _kernel == "core"){
        _option.text = "linux";
        _option.value = "core";
    } else {
        _option.text = "linux-" + _kernel;
        _option.value = _kernel;
    }
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
    var _Architecture = document.getElementById("architecture").value;
    createListAny();
    if (_Architecture = "x86_64") {
        createListx86_64();
    }
}