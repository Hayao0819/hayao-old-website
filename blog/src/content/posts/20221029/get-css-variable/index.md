---
title: "CSSのカスタムプロパティをJavaScriptで取得する"
description: ""
date: 2022-10-29T23:13:47+09:00
categories:
  - "ブログ"
  - "技術系"
tags:
draft: false
pager: true
share: true
---

CSSのカスタムプロパティの値をJavaScriptから取得する方法です。

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body>
    <div id="myElementId"></div>
    <style>
        #myElementId{
            --hogehogePie: 31415;
        }
    </style>
    <script>
        window.addEventListener("load", ()=>{
            const myElement = document.getElementById("myElementId");
            const myStyle = window.getComputedStyle(myElement);
            const hogehogePie = parseFloat(myStyle.getPropertyValue("--hogehogePie"));
            myElement.innerText = hogehogePie;
        });
    </script>
</body>
</html>
```

ワンライナーにするとこんな感じ

```javascript
parseFloat(window.getComputedStyle(document.getElementById("myElementId")).getPropertyValue("--hogehogePie"))
```


