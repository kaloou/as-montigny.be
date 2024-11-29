import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
import undetected_chromedriver as uc

chrome_options = Options()
chrome_options.add_argument("--headless")

# launch driver
driver = uc.Chrome(options=chrome_options)
driver.get('https://www.acff.be/club/8361/matches-a-venir')

try:
    # extraction des noms d'équipe
    elements = WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.CLASS_NAME, "team-name"))
    )
    for element in elements:
        print("Nom de l'équipe :", element.text)

    # extraction des scores
    scores = WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.CLASS_NAME, "score"))
    )
    for score in scores:
        print("Score :", score.text)

    # extraction des catégories de match
    categories = WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.CLASS_NAME, "game-type"))
    )
    for category in categories:
        print("Catégorie :", category.text)

    # extraction des images
    images = WebDriverWait(driver, 10).until(
        EC.presence_of_all_elements_located((By.TAG_NAME, "img"))
    )
    for img in images:
        img_url = img.get_attribute("src")
        if img_url and "belgianfootball.s3.eu-central-1.amazonaws.com" in img_url and "/rbfa/img/logos/clubs/" in img_url:
            print("Image URL :", img_url)

except Exception as e:
    print("Erreur :", e)

finally:
    driver.quit()
