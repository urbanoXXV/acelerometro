import pickle
import sys
import numpy as np
import pandas as pd

filename = str('Modelo_1103.sav')
loaded_model = pickle.load(open(filename, 'rb'))

if len(sys.argv) == 91:
  x = sys.argv[1:31]
  y = sys.argv[31:61]
  z = sys.argv[61:91]
  for i in range(len(sys.argv)):
    texto = sys.argv[1]


vX = np.array(x)
vX = vX.astype(np.float)

vY = np.array(y)
vY = vY.astype(np.float)
vZ = np.array(z)
vZ = vZ.astype(np.float)

fX = np.fft.fft(vX)
fY = np.fft.fft(vY)
fZ = np.fft.fft(vZ)

inputX = np.abs(fX[0:len(vX)//2])
inputY = np.abs(fY[0:len(vY)//2])
inputZ = np.abs(fZ[0:len(vZ)//2])

inputRed = []
inputRed.extend(inputX)
inputRed.extend(inputY)
inputRed.extend(inputZ)

ired = []
ired.append(inputRed)

respuesta = loaded_model.predict(ired)
print(int(respuesta[0]))