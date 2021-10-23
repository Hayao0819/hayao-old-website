//window.addEventListener("load", function(){
{
    Array.from(document.getElementsByClassName("code")).forEach(element =>{
        var code  = element.innerText;
        var Lang
        element.classList.value.split(" ").forEach(className =>{
            Lang = className.match("language-.+")
        })
        element.outerHTML = `<pre class="line-numbers"><code class="${Lang}">${code}</code></pre>`;
    })
}
