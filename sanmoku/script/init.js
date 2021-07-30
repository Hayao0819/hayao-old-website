const InitilizeTable = () => {
    for (a = 0 ; a < TableYNumber; a++){
        //alert("None")
        let tr = document.createElement("tr")
        for(b = 0; b < TableXNumber; b++){
            let td = document.createElement("td");
            td.addEventListener("click", ClickedBox)
            tr.appendChild(td)
        }
        MainTable.appendChild(tr)
    }
}

const ClickedBox = (e) => {
    const MySelf = e.path[0]
    MySelf.innerText = "Clicked";
}

window.addEventListener("load", InitilizeTable)

