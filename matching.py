import numpy as np
import cv2
img = cv2.imread("ro.jpg")
grey_img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
template = cv2.imread("rk.jpg", 0)
w, h = template.shape[::-1]
res = cv2.matchTemplate(grey_img, template, cv2.TM_CCOEFF_NORMED)
threshold = 0.9
loc = np.where(res>= threshold)
print(loc)
for pt in zip(*loc[::-1]):
    cv2.rectangle(img, pt, (pt[0] + w, pt[1] + h ), (255, 0, 0), 2)
cv2.imshow("image", img)
cv2.waitKey(0)
cv2.destroyAllWindows()