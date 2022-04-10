#!/usr/bin/env bash

set -eu

SiteURL="http://simosnet.com/livecdroom/"

Msg(){
    echo -e "$@" >&2
}

Msg "Downloading index.html ..."
readarray -t ImgSrcList < <(curl -sL "$SiteURL"  | grep "src" | tr " " "\n" | grep "^src=" | sed -e 's|src="||g' -e 's|"$||g')

cd "$(cd "$(dirname "$0")"; pwd)" || exit 1


for Img in "${ImgSrcList[@]}"; do
    Msg "Downloading ${SiteURL}/${Img} to $(pwd)/${Img}"
    Dir="$(dirname "$Img")"
    mkdir -p "$Dir"
    curl -sL "${SiteURL}/${Img}" -o "${Img}"
done
