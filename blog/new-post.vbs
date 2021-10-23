Dim Input
Input = InputBox("Set English short title for argument")
Dim objShell
Set objShell = CreateObject("WScript.Shell")
Dim FlSysObj
Set FlSysObj = createObject("Scripting.FileSystemObject")
objShell.Run "cmd /c " & "bash .\new-post.sh " & Input ,0,false
