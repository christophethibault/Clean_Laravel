#!/bin/bash
#TAG=`git describe | sed -ne 's/\([^-]*\-[^-]*\).*/\1/p'`
TAG=`git describe --abbrev=0`
REVISION=`git rev-list --count HEAD`

cat <<EOT > .release
TAG=$TAG
REVISION=$REVISION
EOT
