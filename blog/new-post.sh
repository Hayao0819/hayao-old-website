#!/usr/bin/env bash

set -eu

script_path="$( cd -P "$( dirname "$(readlink -f "${0}")" )" && pwd )"

[[ -z "${1-""}" ]] && echo "Set English short title for argument" >&2 && exit 1

cd "${script_path}" || return 0
filename="posts/$(date +%Y%m%d)/${1}/index.md"
[[ ! -f "${script_path}/${filename}" ]] && hugo new "${filename}"
type code 1>/dev/null 2>&1 && code "${script_path}/src/content/${filename}"
