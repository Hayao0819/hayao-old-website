// bodyの最後に読み込まれます

const sectionList = Array.from(document.getElementsByClassName("section"));
const sideBar = document.getElementById("sidebar");
const sidebarCollapse = document.getElementById("sidebar-collapse");
//const widthBreakPoint = parseFloat(window.getComputedStyle(document.body).getPropertyValue("--breakpoint-md").slice(0, -2));
// https://getbootstrap.com/docs/5.2/layout/breakpoints/


const navBar = document.getElementById("navbar");
const mainContent = document.getElementById("maincontent");
const fakeBar = document.getElementById("fakebar");

sectionList.forEach(e=>{
    // サイドバーを作成
    {
        let navItem = document.createElement("li");
        let navLink = document.createElement("a");
        navItem.classList.add("nav-item");
        navLink.classList.add("nav-link");
        // スマホのハンバーガーメニューで項目をクリック時に閉じる
        navItem.addEventListener("click", ()=>{
            if (window.innerWidth < widthBreakPoint) {
                sidebarCollapse.classList.remove("show")
                //sidebarCollapse.classList.add("close")
            }
            
            
        });

        navLink.href = "#" + e.id; // 内部リンク
        navLink.textContent = e.dataset.header || e.id; // ヘッダーがなければidを表示
        navItem.appendChild(navLink);
        document.getElementById("navlastitem").insertAdjacentElement("beforebegin", navItem);
    }

    // セクションにh2を追加
    {
        let sectionHeader = document.createElement("h2");
        sectionHeader.textContent = e.dataset.header || e.id; // ヘッダーがなければidを表示
        sectionHeader.classList.add("fw-bold", "py-3"); //太字にして縦方向の余白を確保
        e.prepend(sectionHeader); // セクションの先頭に追加
    }

    // メニューバーの文字を白にする
    {
        Array.from(document.getElementsByClassName("nav-link")).forEach(e=>{
            e.classList.add("text-white", "m-2");
        })
    }
    
})

// BootstrapでどうしようもないレスポンシブデザインをJSでゴリ押し実装
const CalculateStyle = () => {
    //console.log("widthBreakPoint="+widthBreakPoint);
    if (window.innerWidth < widthBreakPoint) {
        // スマホ
        sideBar.classList.remove("vh-100");
        //navBar.classList.add("flex-row", "gap-3");

        {   // メニューをデフォルトで閉じる
            sidebarCollapse.classList.remove("show");
           //sidebarCollapse.classList.add("close");
        }
        
        {   // 各セクションの末尾のマージンを消す
            sectionList.forEach(e=>{
                e.style.marginBottom = 0;
            })
        }

        
        {   // スクロールしたときにメニューバーと重ならないようにいい感じに調整する
            fakeBar.style.setProperty ("height", sideBar.clientHeight + "px", "important");
            document.documentElement.style.setProperty ("scroll-padding-top", sideBar.clientHeight + "px", "important");
        }

    } else {
        // PC
        sideBar.classList.add("vh-100");
        //navBar.classList.remove("flex-row" , "gap-3");

        {   // メニューをデフォルトで表示
            sidebarCollapse.classList.add("show");
            //sidebarCollapse.classList.remove("close");
        }
        
        {   // 各セクションの末尾にディスプレイいっぱいの余白を追加
            sectionList.forEach(e=>{
                let marginSize = window.innerHeight -  e.clientHeight;
                if (marginSize < 0) {
                    marginSize = 0;
                }
                e.style.marginBottom = marginSize + "px";
            })
        }

        {   // スマホ用の調整を解除
            fakeBar.style.removeProperty("height");
            document.documentElement.style.removeProperty("scroll-padding-top");
        }
    }

    // 最後のセクションだけフッター幅を確保
    let footerHeight = document.getElementsByTagName("footer")[0].clientHeight;
    let lastSection = sectionList[sectionList.length - 1];
    let lastSectionMargin = parseFloat(window.getComputedStyle(lastSection).getPropertyValue("margin-bottom").slice(0, -2));
    let calculatedMargin = lastSectionMargin - footerHeight - 20;

    if (calculatedMargin < 0) {
        lastSection.style.marginBottom = 0;
    } else {
        lastSection.style.marginBottom = calculatedMargin + "px";
    }
}

CalculateStyle();
window.addEventListener("load", CalculateStyle);
window.addEventListener("resize", CalculateStyle);
