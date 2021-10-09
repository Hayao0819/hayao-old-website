<!DOCTYPE html>
<html lang="ja">
<head>

    <?php
        // ページ設定
        $title = "仮想マシンについて";
        $commonhtml = "${_SERVER['DOCUMENT_ROOT']}/buildmydist-2/commonhtml";
        $distro = "misc";

        // 共通ファイルを読み込み
        $domain = $_SERVER['HTTP_HOST'];
        include("${commonhtml}/head.php");
    ?>

</head>
<body>
    <?php include("${commonhtml}/beforemain.php"); ?>

    <main>
        <h2>仮想マシンについて</h2>
        <h3>仮想マシンとは</h3>
        <p>仮想マシンは実際のPCの上に別のPCを仮想的に作成するソフトウェアです。実際のPCを用意するより手軽に利用でき、構成の変更やOSのテストが容易に行えます。</p>
        <p>ここでは主によく使用されている仮想化ソフトウェアとその基本的な用語について解説します。</p>

        <h3>用語解説と仮想化ソフトウェアの種類</h3>

        <h4>仮想化</h4>
        <p>仮想マシンの中でOSを実行したり、実機で動いていたものを仮想マシンに移すことを仮想化と言います。</p>
        <p>（最近は仮想マシンのことを仮想化とも言ったりするので結構そこらへんは曖昧になっているかもしれません）</p>

        <h4>ホスト、ホストOS</h4>
        <p>先程、仮想マシンは「実際のPCの上に別のPCを仮想的に作成する」といいました。その「実際のPC」のことを「ホスト」と呼びます。</p>
        <p>また、そのホストで動いているOSのことを「ホストOS」と呼びます。</p>

        <h4>ゲスト、ゲストOS</h4>
        <p>ホストの反対がゲストになります。つまり仮想環境で動いているほうのことを指します。</p>
        <p>例えば「Windows 10の上でUbuntuが動いている」という場合、Windows 10がホスト、Ubuntuがゲストになります。</p>

        <h4>VirtualBox</h4>
        <p><img src="./images/vbox-1.png" alt="VirtualBox"></p>
        <p>Oracle社が開発する仮想化を行うソフトウェアです。WindowsとMac、Linux上で動作させることができます。</p>
        <p>ホスト型と呼ばれる最も一般的な種類のものです。USBデバイスなどの管理がしやすいのが特徴です。</p>
        <p>以下で紹介するVMwareと違ってオープンソースで開発されています。</p>
        
        <h4>VMware Workstation Player</h4>
        <p><img src="./images/vmware-1.png" alt="VirtualBox"></p>
        <p>VMware社が開発する仮想化ソフトウェアです。Windows上とLinux上で動作させることができます。（Mac用としてはVMware Fusion）があります</p>
        <p>個人的な用途での利用は無料ですが商用で使用するには有料版のWorkstation Proを購入する必要が有ります。</p>
        <p>VirtuakBoxより安定して動作する印象があります。</p>

        <h4>Docker</h4>
        <p>上の2つとは少し違うものです。DockerはLinux上でしか利用が出来ません。</p>
        <p>Dockerは「コンテナ型」と呼ばれるもので、ホストOSのLinuxカーネルを共有することで上記2つのホスト型より高速に動作させることができます。</p>
        <p>また、管理や環境の構築もDockerfileでかんたんに行えるのも特徴の1つです。</p>

        <h4>Qemu</h4>
        <p>これもまた上の3つとは違うものです。QemuはWindowsとLinux上で利用できます。</p>
        <p>Qemuはアーキテクチャをエミュレートするので。x86_64上でARMやPPCなどを実行できるのが特徴です。</p>
        <p>ただし、動作はホスト型よりも遅くなってしまいます。Linuxでは<code>virt-manager</code>を使用してGUIで管理できます。</p>

        <h3>ディストリ開発に必要なのはどれなのか</h3>
        <p>通常はVirtualBoxとVmwareを使えばいいと思います。Alter Linuxもこの2つで検証を行っています。</p>
        <p>Ubuntu系では仮想マシンのp設定が重要になってくるので別途解説します。</p>
        <p>それ以外のディストリではビルドしたisoを検証することにしか使用しないのでそこまで重要ではありません。</p>

        <h2>VMware Workstation Playerのインストールと使い方</h2>
        <p>現在工事中👷</p>

        <h2>VirtualBoxのインストールと使い方</h2>
        <p>現在工事中👷</p>
    </main>

    <?php include("${commonhtml}/aftermain.php"); ?>
</body>
</html>
