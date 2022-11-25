
/*
const tooltipElement = document.getElementById("discord-copy")
const tooltip = new bootstrap.Tooltip(tooltipElement)
tooltip.disable()

tooltipElement.addEventListener("click", function() {
    tooltip.enable()
    navigator.clipboard.writeText("Hayao0819#2661");
    tooltip.show()
});

tooltipElement.addEventListener("hidden.bs.tooltip", ()=>{
    tooltip.disable()
});
*/

Array.from(document.querySelectorAll('[data-copybutton]')).forEach(e=>{
    const tooltip = new bootstrap.Tooltip(e)
    tooltip.disable()

    e.addEventListener("click", function() {
        tooltip.enable()
        navigator.clipboard.writeText(e.innerText);
        console.log(e.innerText)
        tooltip.show()
    });

    e.addEventListener("hidden.bs.tooltip", ()=>{
        tooltip.disable()
    });
})
