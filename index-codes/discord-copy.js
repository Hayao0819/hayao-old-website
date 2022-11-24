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
