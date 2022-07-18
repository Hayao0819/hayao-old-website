'use strict';

// AddclassToElements(elements, class1, class2 ...)
function AddClassToElements(Elements){
    window.addEventListener("load", ()=>{Array.from(Elements).forEach((element)=>{
        let ArgumentList = Array.from(arguments);
            ArgumentList.shift();
            ArgumentList.forEach((className) => {
                element.classList.add(className);
            })
        });
    })
}

AddClassToElements(document.getElementsByTagName("select"), "selectform-select", "block", "w-3/4", "text-black");
AddClassToElements(document.getElementsByTagName("header"), `text-${TextColor2}`);
AddClassToElements(document.getElementsByTagName("h2"), `bg-${Color1}`, `text-${TextColor2}` ,  "p-2", "rounded-full", "pl-5", "font-bold");
AddClassToElements(document.getElementsByTagName("h3"), `bg-${Color1}`, `text-${TextColor2}`,  "p-2", "m-2" , "rounded");
AddClassToElements(Main.getElementsByTagName("p"), "p-2", "pl-5", "font-medium");
AddClassToElements(Menu.getElementsByTagName("li"), "block", `hover:bg-${Color3}`, `text-${TextColor2}` ,  `hover:text-${TextColor3}`, "hover:underline");
AddClassToElements(Menu.getElementsByTagName("li"), "px-3", "py-2");
AddClassToElements(menu.getElementsByTagName("a"), "block")
AddClassToElements(document.getElementsByTagName("select"), `bg-${Color1}`, `text-${TextColor2}`);
AddClassToElements(document.body, `text-${TextColor1}`);

document.getElementById("header_container").classList.add(`bg-${Color1}`);
document.getElementsByTagName("body")[0].classList.add(`bg-${Color2}`);
