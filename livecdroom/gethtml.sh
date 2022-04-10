#!/usr/bin/env bash

set -eu

SiteURL="http://simosnet.com/livecdroom/"

Msg(){
    echo -e "$@" >&2
}

Msg "Downloading index.html ..."
curl -sLo ./index.html "$SiteURL"
cp ./index.html ./index.html.org
