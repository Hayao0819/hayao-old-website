#!/usr/bin/env bash

set -Eeu
title="$(zenity --forms --add-entry="Title" --text="Set English short title for argument" | tr " " "-" | tr "[:upper:]" "[:lower:]")"
bash "$(cd "$(dirname "${0}")" && pwd)/new-post-cli.sh" "${title}"
