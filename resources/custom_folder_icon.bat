If [%1] == [] goto :eof
ECHO [.ShellClassInfo] >%1\desktop.in
ECHO IconResource=C:\icon.ico,0 >>%1\desktop.in
move %1\desktop.in %1\desktop.ini
attrib +S +H %1\desktop.ini
attrib +R %1