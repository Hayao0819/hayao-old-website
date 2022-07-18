'use strict';

// GETパラメータからrとeの値をそれぞれ取得する
const GetParams = () => {
    let ParamsArray = {
        release: undefined,
        edition: undefined,
    };
    let searchParams = new URLSearchParams(document.location.search.substring(1));
    ParamsArray["release"] = searchParams.get("r")
    ParamsArray["edition"] = searchParams.get("e")
    //ParamsArray["redirect"] = searchParams.get('redirect')
    return ParamsArray;
}

// ダウンロードIDを取得してフォームを作成
const XmlReq = new XMLHttpRequest();
let JsonData = null;
XmlReq.onreadystatechange = function() {
    if ((XmlReq.readyState === 4) && (XmlReq.status === 200)) {
        JsonData = JSON.parse(XmlReq.responseText);
        Object.keys(JsonData).reverse().forEach((ReleaseId) => {
            //console.log(JsonData[ReleaseId])

            if (JsonData[ReleaseId].disabled == true){
                console.log(`${ReleaseId}をスキップしました`);
                return;
            }else{
                console.log(ReleaseId + "を追加しました");
            }

            // セレクトボックス
            let ReleaseIdOption = document.createElement("option");
            ReleaseIdOption.value = ReleaseId;

            // 選択肢の文字
            ReleaseIdOption.innerText = ReleaseId;
            //if (JsonData[ReleaseId].description){
                //ReleaseIdOption.innerText = `${ReleaseId} - ${JsonData[ReleaseId].description}`;
                //ShowMsg(JsonData[ReleaseId].description)
            //}
            
            ReleaseIdForm.insertAdjacentElement("afterbegin", ReleaseIdOption);
        });

        // URLのパラメータでリリース番号が指定されていた場合の処理
        const ReleaseParam = GetParams()["release"];
        let InitializeRelease = true // リリースフォームを初期化するかどうか

        if (ReleaseParam){
            //console.log(GetParams()["release"])
            Array.from(ReleaseIdForm.options).forEach((e)=>{
                if (e.value.toLowerCase() === ReleaseParam.toLowerCase()){
                    e.selected = true;
                    InitializeRelease = false
                }
            })
        }

        // GETでリリース番号が指定されていなければリリースフォームの初期化を行う
        // 指定されていれば、その番号でエディション一覧を更新する
        if(InitializeRelease){
            // 「選択してください」にする
            Array.from(ReleaseIdForm.options).slice(-1)[0].selected = true;

            // エディションフォームを隠す
            document.getElementById("editionform_div").classList.add("hidden");
        }else{
            Update_Edition();
        }
        

        // ダウンロードリンクのClassを設定
        //Array.from(ReleaseIdForm.getElementsByTagName("option")).forEach((element) => {
        //    element.classList.add("p-2", "cursor-pointer", "mt-1", `bg-${Color1}`)
        //})

    }
}
XmlReq.open("GET","/alter/alterlinux.json", true);
XmlReq.send(null);


// リリース番号が変更された時
const Update_Edition = () => {
    let SelectedReleaseId = ReleaseIdForm.value;
    EditionForm.innerHTML = null;

    if (SelectedReleaseId == "None" || SelectedReleaseId == undefined || SelectedReleaseId == null){
        document.getElementById("editionform_div").classList.add("hidden");
        ShowMsg("リリース番号を選択してください");
        return 0;
    }else{
        console.log("エディション一覧を" + SelectedReleaseId + "に更新しました");
        document.getElementById("editionform_div").classList.remove("hidden");

        if (JsonData[SelectedReleaseId].description){
            //ReleaseIdOption.innerText = `${ReleaseId} - ${JsonData[ReleaseId].description}`;
            ShowMsg(JsonData[SelectedReleaseId].description);
        }else{
            ShowMsg();
        }
    }

    // 選択肢を作成
    const createOption = (value, text, selected) =>{
        let Option = document.createElement("option");

        if (! selected) {
            selected = false;
        }
        Option.value = value;
        Option.innerText = text;
        Option.selected = selected;
        //Option.classList.add("p-2", "cursor-pointer", "mt-1", `bg-${Color1}`)
        return Option;
    }

    // 選択してくださいを追加
    EditionForm.insertAdjacentElement("afterbegin", createOption("None", "選択してください", true))

    Object.keys(JsonData[SelectedReleaseId].Editions).forEach((EditionName) => {
        //if (EditionName != "disabled" && EditionName != "disabled-edition"){
            //EditionOption = document.createElement("option");
            //EditionOption.value = EditionName;
            //EditionOption.innerText = EditionName;
            if (JsonData[SelectedReleaseId].Editions[EditionName] == null || (JsonData[SelectedReleaseId]["disabled-edition"] && JsonData[SelectedReleaseId]["disabled-edition"].includes(EditionName)) ){
                console.log(`${EditionName}をスキップしました`);
                return;
            }
            EditionForm.insertAdjacentElement("afterbegin", createOption(EditionName, EditionName, false));
        //}
    })

    const EditionParam = GetParams()["edition"];
    if (EditionParam){
        Array.from(EditionForm.getElementsByTagName("option")).forEach((e)=>{
            if(e.value.toLowerCase() == EditionParam.toLowerCase()){
                e.selected = true;
            }
        })
    }
    ShowEditionInfo();

    /*
    const Redirect = GetParams()["redirect"];
    console.log(Redirect)
    if (Redirect.toLowerCase() == "true"){
        console.log(ReleaseIdForm.value)
        console.log(JsonData)
        AccessToOSDN(JsonData[ReleaseIdForm.value][EditionForm.value])
    }
    */
}

ReleaseIdForm.addEventListener("change", (e) => {
    Update_Edition();
});


// ダウンロードのエラーメッセージを表示する
const ShowMsg = (message) => {
    const messageElement = document.getElementById("message");
    if (message){
        messageElement.innerText = message;
        console.log(`ShowMsg: ${message}`);
    }else{
        console.log("Reset Msg");
        messageElement.innerText = "";
    }
    
}

// エディションが変更された時
const ShowEditionInfo = () => {
    const ReleaseId = ReleaseIdForm.value;
    const EditionName = EditionForm.value;
    if (ReleaseId == "None" || EditionName == "None"){
        //ShowMsg()
        DownloadButton.classList.add("hidden")
        return;
    }
    if (ReleaseId && EditionName){
        ShowMsg(ReleaseId + "の" + EditionName + "が選択されました");
        DownloadButton.classList.remove("hidden")
    }else{
        //ShowMsg();
    }
}
EditionForm.addEventListener("change", ShowEditionInfo);
ReleaseIdForm.addEventListener("change", ShowEditionInfo);

// OSDN遷移
const AccessToOSDN = id=>{
    if (! id){ return; }
    location.href = "https://osdn.net/projects/alterlinux/releases/" + id;
}


//ダウンロードボタン
DownloadButton.addEventListener("click", (element) => {

    const ReleaseId = ReleaseIdForm.value
    const EditionName = EditionForm.value
    if (! EditionName || EditionName == "None"){
        ShowMsg("設定が不完全です。リリース番号とエディションを適切に指定してください。\n指定してるにも関わらずエラーが出る場合は開発者に連絡してください。");
        return;
    }else{
        const OsdnId = JsonData[ReleaseId].Editions[EditionName]
        if (OsdnId != undefined){
            AccessToOSDN(OsdnId);
        }else{
            ShowMsg(`不明なエラーが発生しました。\nリリースIDの取得に失敗しました。`)
        }
        
    }
})
