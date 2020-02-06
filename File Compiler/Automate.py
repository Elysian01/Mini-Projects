import os
import subprocess

try :
    if os.name == 'nt':       # for Windows
        FileName = os.path.expanduser("~/Desktop") + "\\FileComipler"
        FileName2 = FileName + "\\lib"
        os.mkdir(FileName)
        os.mkdir(FileName2)

        command1 = "xcopy lib C:\\Users\\abhis\\Desktop\\FileComipler\\lib /s"
        command2 = "xcopy FileCompiler.exe C:\\Users\\abhis\\Desktop\\FileComipler /s"
        
        subprocess.check_output(command1,shell=True)
        subprocess.check_output(command2,shell=True)
except :
    pass
