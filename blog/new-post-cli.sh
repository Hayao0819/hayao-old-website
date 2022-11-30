#!/bin/sh

set -eu

#script_path="$( cd -P "$( dirname "$(readlink -f "${0}")" )" && pwd )"
script_path="$(cd "$(dirname "${0}")" || exit 1 ; pwd)"

[ -z "${1-""}" ] && echo "Set English short title for argument" >&2 && exit 1

cd "${script_path}" || return 0
dirname="$(echo "$1" | tr " " "-" | tr "[:upper:]" "[:lower:]")"
filename="posts/$(date +%Y%m%d)/${dirname}/index.md"
[ ! -f "${script_path}/${filename}" ] && hugo new "${filename}"
type code 1>/dev/null 2>&1 && code "${script_path}/src/content/${filename}"
