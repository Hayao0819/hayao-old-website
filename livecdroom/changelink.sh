#!/usr/bin/env bash

set -eu
cd "$(cd "$(dirname "$0")"; pwd)" || exit 1
SiteURL="http://simosnet.com/livecdroom/"

Msg(){
    echo -e "$@" >&2
}

ReplaceALink(){
    Msg "Downloading index.html ..."
    readarray -t LinkSrcList < <(curl -sL "$SiteURL"  | grep "href" | tr " " "\n" | grep "^href=" | sed -e 's|href="||g' | cut -d '"' -f 1 | grep -v "^img" | grep -v "^http" | grep -v "^$" | grep -v "^#" | cut -d "#" -f 1 | sort | uniq)

    cp ./index.html ./index.html.old

    for Link in "${LinkSrcList[@]}"; do
        Msg "Replace $Link -> ${SiteURL}/${Link}"
        sed -i "s|${Link}|${SiteURL}/${Link}|g" "$(pwd)/index.html"
    done
}

ReplaceImg(){
    readarray -t ImgSrcList < <(curl -sL "$SiteURL"  | grep "src" | tr " " "\n" | grep "^src=" | sed -e 's|src="||g' -e 's|"$||g' | grep -v "^http" | grep -v "^$" | grep -v "^#" | cut -d "#" -f 1 | sort | uniq)

    for Img in "${ImgSrcList[@]}"; do
        Msg "Replace ${Img} to ${SiteURL}/${Img}"
        sed -i "s|${Img}|${SiteURL}/${Img}|g" "$(pwd)/index.html"
    done
}

ReplaceALink
#ReplaceImg
