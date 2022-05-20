---
title: "Memo"
description: ""
date: 2022-03-12T23:21:14+09:00
categories:
  - "ブログ"
  - "プライベート"
  - "技術系"
tags:
  - "Linux"
draft: false
pager: true
share: true
---


Alter Linux i686のテスト中にmkinitcpioで失敗したのでログ。

なんでここで失敗するんだろう。かなり珍しい。

```
==> WARNING: pv not found; falling back to cp for copy to RAM
  -> Running build hook: [archiso_loop_mnt]
  -> Running build hook: [archiso_pxe_common]
==> WARNING: Possibly missing firmware for module: softing_cs
==> WARNING: Possibly missing firmware for module: qed
==> WARNING: Possibly missing firmware for module: nfp
==> WARNING: Possibly missing firmware for module: bnx2x
==> WARNING: Possibly missing firmware for module: mlxsw_spectrum
==> WARNING: Possibly missing firmware for module: bna
  -> Running build hook: [archiso_pxe_nbd]
  -> Running build hook: [archiso_pxe_http]
  -> Running build hook: [archiso_pxe_nfs]
  -> Running build hook: [archiso_kms]
  -> Running build hook: [block]
==> WARNING: Possibly missing firmware for module: qla2xxx
==> WARNING: Possibly missing firmware for module: aic94xx
==> WARNING: Possibly missing firmware for module: wd719x
==> WARNING: Possibly missing firmware for module: qla1280
==> WARNING: Possibly missing firmware for module: bfa
  -> Running build hook: [filesystems]
  -> Running build hook: [keyboard]
zstd: /tmp/mkinitcpio.IWsRcW/root/lib/modules/5.16.12-zen1-1.0-zen-zen/kernel/hid-appleir.ko.zst: unsupported format 
==> Generating module dependencies
depmod: ERROR: failed to load symbols from /tmp/mkinitcpio.IWsRcW/root/lib/modules/5.16.12-zen1-1.0-zen-zen/kernel/hid-appleir.ko.zst: Exec format error
==> Creating xz-compressed initcpio image: /boot/archiso.img
==> WARNING: errors were encountered during the build. The image may not be complete.
[build.sh]  Error An exception error occurred in the function
[build.sh]  Error Exit Code: 1
[build.sh]  Error Line: 675
[build.sh]  Error Argument: -a i686 lxde --nolog --nocolor --nodepend --rerun
```

