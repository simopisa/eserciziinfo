Set WshShell = WScript.CreateObject("WScript.Shell")
do
dim r
randomize
r = int(rnd*6) + 1
select case r
    case 1
        '... 
        WshShell.SendKeys "{up}"
        WScript.Sleep 100 
    case 2
        '... 
         WshShell.SendKeys "{down}"
        WScript.Sleep 100 
    case 3
        '...
         WshShell.SendKeys "{left}"
        WScript.Sleep 100      
    case 4
        '... 
         WshShell.SendKeys "{right}"
        WScript.Sleep 100    
   case 5
        '... 
         WshShell.SendKeys "{ENTER}"
        WScript.Sleep 100   
    case 6
        '... 
        WshShell.SendKeys "{DEL}"
        WScript.Sleep 100   
         
end select
   
loop