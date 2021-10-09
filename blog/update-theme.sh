#!/usr/bin/env bash

set -eu

script_path="$( cd -P "$( dirname "$(readlink -f "${0}")" )" && pwd )"
theme_dir="${script_path}/src/themes/"

cd "${theme_dir}"
for _theme in "${theme_dir}/"*; do
    cd "${_theme}"
    current_commit_id="$(git rev-parse --short HEAD)"
    default_branch="$(git remote show origin | grep 'HEAD branch' | awk '{print $NF}')"
    git checkout "${default_branch}"
    git pull
    new_commit_id="$(git rev-parse --short HEAD)"
    cd "${script_path}"


    if [[ ! "${current_commit_id}" = "${new_commit_id}" ]]; then
        git add "${_theme}"
        git commit -S -m "Updated hugo theme (${new_commit_id})"
    fi

    git push
done
