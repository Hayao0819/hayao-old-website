#!/usr/bin/env bash
set -eu

script_path="$( cd -P "$( dirname "$(readlink -f "${0}")" )" && pwd )"
cd "${script_path}/blog"
hugo --minify
