// bodyの最後（モーダルの定義直後）に読み込まれます

const imgList = Array.from(document.getElementsByTagName("img"));
const modal = document.getElementById("lightbox");
//const modalBs = new bootstrap.Modal(modal);
const modalImg = document.getElementById("lightbox-img");
const modalTitle = document.getElementById("lightbox-title");
const modalDlLink = document.getElementById("lightbox-dl-link");
const modalDescription = document.getElementById("lightbox-description");

imgList.forEach(e=>{
    if (e.dataset.lightbox == "false"){
        return;
    }
    e.dataset.bsToggle = "modal";
    e.dataset.bsTarget = "#lightbox";
    e.classList.add("btn");
    e.addEventListener("click", ()=>{
        // imgタグ
        modalImg.src = e.src;
        modalImg.alt = e.alt;

        // タイトル
        modalTitle.textContent = e.alt;

        // ダウンロードリンク
        modalDlLink.href = e.src;

        //説明
        if (e.dataset.description) {
            modalDescription.innerHTML = e.dataset.description;
            modalDescription.classList.remove("d-none");
        } else {
            modalDescription.classList.add("d-none");
        }
    })
})

const setImgSize = () =>{
    //const widthBreakPoint = parseFloat(window.getComputedStyle(document.body).getPropertyValue("--breakpoint-md").slice(0, -2));
    imgList.forEach(e=>{
        if (e == modalImg){
            return;
        }
        if (window.innerWidth < widthBreakPoint) {
            e.style.width = "100%";
        } else {
            e.style.width = "40%";
        }
    })
}

setImgSize();
window.addEventListener("load", setImgSize);
window.addEventListener("resize", setImgSize);
