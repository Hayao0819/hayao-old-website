// AddclassToElements(elements, class1, class2 ...)
function AddClassToElements(Elements){
    Array.from(Elements).forEach((element)=>{
        let ArgumentList = Array.from(arguments);
        ArgumentList.shift();
        ArgumentList.forEach((className) => {
            element.classList.add(className);
        })
    });
}

AddClassToElements(document.getElementsByTagName("select"), "selectform-select", "block", "w-3/4", "text-black")
AddClassToElements(document.getElementsByTagName("h2"), "bg-green-900", "p-2", "rounded-full", "pl-5", "font-bold")
AddClassToElements(document.getElementsByTagName("h3"), "bg-green-900", "p-2", "m-2" , "rounded")
AddClassToElements(document.getElementById("main").getElementsByTagName("p"), "p-2", "pl-5", "font-medium")
