import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
import undetected_chromedriver as uc

chrome_options = Options()
chrome_options.add_argument("--headless")
# chrome_options.add_argument("--user-data-dir=/Users/kalou/Library/Application Support/Google/Chrome/User Data")
# chrome_options.add_argument("--user-agent=Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36")

driver = uc.Chrome(options=chrome_options)
driver.get('https://www.acff.be/club/8361/matches-a-venir')

try:
    # team name
    elements = WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.CLASS_NAME, "team-name"))
    )
    for element in elements:
        print(element.text)

    # score
    elementts = WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.CLASS_NAME, "score"))
    )
    
    # Extraire et imprimer le texte de chaque élément
    for elementt in elementts:
        print(elementt.text)

    #catégorie
    elementtts = WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.CLASS_NAME, "game-type"))
    )
    
    # Extraire et imprimer le texte de chaque élément
    for elementtt in elementtts:
        print(elementtt.text)

except Exception as e:
    print("Erreur :", e)

finally:
    driver.quit()
