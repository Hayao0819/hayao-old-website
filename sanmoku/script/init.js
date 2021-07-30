const InitilizeTable = () => {
    for (a = 0 ; a < TableYNumber; a++){
        //alert("None")
        let tr = document.createElement("tr")
        for(b = 0; b < TableXNumber; b++){

            // マス目を作成
            let td = document.createElement("td");
            td.innerText = InitialStr;
            td.dataset.clicked = false;
            td.addEventListener("click", ClickedBox)
            tr.appendChild(td)
        }
        MainTable.appendChild(tr)
    }
}

window.addEventListener("load", InitilizeTable)

