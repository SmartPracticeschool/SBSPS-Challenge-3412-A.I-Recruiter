#!C:/Users/rok75/AppData/Local/Programs/Python/Python38/python
print()
import cgi 
import numpy as np
import cv2
import pyautogui
import os

##recording
fourcc = cv2.VideoWriter_fourcc(*'XVID')
outs = cv2.VideoWriter("screenm.avi", fourcc, 10, (1920,1080))
cap = cv2.VideoCapture(0)
outv = cv2.VideoWriter("videom.avi", fourcc, 10, (640,480))
templatev = cv2.imread("rk.jpg", 0)
w, h = templatev.shape[::-1]
templates = cv2.imread("templates.png",0)
countv=0
counts=0
while True:
    print(counts)
    print(countv)
    img = pyautogui.screenshot()
    frames = np.array(img)
    frames = cv2.cvtColor(frames, cv2.COLOR_BGR2RGB)
    outs.write(frames)
    ret, framev = cap.read()
    grey_imgv = cv2.cvtColor(framev, cv2.COLOR_BGR2GRAY)
    resv = cv2.matchTemplate(grey_imgv, templatev, cv2.TM_CCOEFF_NORMED)
    grey_imgs = cv2.cvtColor(frames, cv2.COLOR_BGR2GRAY)
    ressc = cv2.matchTemplate(grey_imgs, templatev, cv2.TM_CCOEFF_NORMED)
    threshold = 0.9
    loc = np.where(resv >= threshold)
    for loca in zip(*loc[::-1]):
        pass
    else:
        countv+=1
    locsc = np.where(ressc >= threshold)
    for locasc in zip(*locsc[::-1]):
        pass
    else:
        counts += 1
    outv.write(framev)
    if cv2.waitKey(1) == ord('q'):
        print(counts)
        print(countv)
        break


cap.release()
outv.release()
outs.release()
cv2.destroyAllWindows()