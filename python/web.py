import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
import undetected_chromedriver as uc
import json

def extraire_donnees_match():
    chrome_options = Options()
    chrome_options.add_argument("--headless")
    
    try:
        driver = uc.Chrome(options=chrome_options)
        driver.get('https://www.acff.be/club/8361/equipe/305050/apercu')
        wait = WebDriverWait(driver, 10)
        
        # Structure pour stocker les données
        donnees_matchs = {
            'matchs': [],
            'classement': {
                'categorie': '',
                'equipes': []
            }
        }

        # URL du logo à remplacer
        logo_a_remplacer = "https://belgianfootball.s3.eu-central-1.amazonaws.com/s3fs-public/rbfa/img/logos/clubs/09676.jpg"
        logo_local = "img/logo-as.png"

        # Extraction des matchs
        match_elements = wait.until(EC.presence_of_all_elements_located((By.CLASS_NAME, "game")))
        
        for match in match_elements:
            match_data = {
                'categorie': match.find_element(By.CLASS_NAME, "game-type").text,
                'equipe_domicile': '',
                'equipe_visiteur': '',
                'score': '',
                'logo_domicile': '',
                'logo_visiteur': '',
                'date': match.find_element(By.CLASS_NAME, "date").text if match.find_elements(By.CLASS_NAME, "date") else "",
                'type': 'dernier' if match_elements.index(match) == 0 else 'prochain'
            }
            
            equipes = match.find_elements(By.CLASS_NAME, "team-name")
            match_data['equipe_domicile'] = equipes[0].text if len(equipes) > 0 else ""
            match_data['equipe_visiteur'] = equipes[1].text if len(equipes) > 1 else ""
            
            scores = match.find_elements(By.CLASS_NAME, "score")
            match_data['score'] = scores[0].text if len(scores) > 0 else ""
            
            images = match.find_elements(By.TAG_NAME, "img")
            for i, img in enumerate(images):
                img_url = img.get_attribute("src")
                if img_url == logo_a_remplacer:
                    img_url = logo_local
                if i == 0:
                    match_data['logo_domicile'] = img_url
                elif i == 1:
                    match_data['logo_visiteur'] = img_url
            
            donnees_matchs['matchs'].append(match_data)

        # Extraction du classement
        tbody = wait.until(
            EC.presence_of_element_located((By.ID, "team-ranking-periode-generalRanking"))
        )
        
        lignes = tbody.find_elements(By.TAG_NAME, "tr")
        
        for ligne in lignes:
            try:
                position = ligne.find_element(By.CLASS_NAME, "position").text
                equipe_cell = ligne.find_element(By.CLASS_NAME, "team")
                equipe = equipe_cell.find_element(By.TAG_NAME, "a").text
                logo = equipe_cell.find_element(By.TAG_NAME, "img").get_attribute("src")
                points = ligne.find_element(By.CLASS_NAME, "nomobile").text
                matchs = ligne.find_elements(By.TAG_NAME, "td")[4].text
                
                equipe_data = {
                    "position": position,
                    "equipe": equipe,
                    "matchs_joues": matchs,
                    "points": points,
                    "logo": logo
                }
                
                donnees_matchs['classement']['equipes'].append(equipe_data)
                
            except Exception as e:
                print(f"Erreur lors de l'extraction d'une ligne: {str(e)}")
                continue
        
        # Extraction de la catégorie
        try:
            categorie = wait.until(
                EC.presence_of_element_located((By.CSS_SELECTOR, "div.filter div.ng-star-inserted"))
            ).text
            donnees_matchs['classement']['categorie'] = categorie
        except Exception as e:
            print(f"Erreur lors de l'extraction de la catégorie: {str(e)}")
            donnees_matchs['classement']['categorie'] = "Non disponible"
        
        # Sauvegarde des données en JSON
        with open('data/donnees_matchs.json', 'w', encoding='utf-8') as f:
            json.dump(donnees_matchs, f, ensure_ascii=False, indent=4)
            
        print("Données extraites et sauvegardées avec succès dans donnees_matchs.json")
        
    except Exception as e:
        print(f"Erreur lors de l'extraction : {str(e)}")
    
    finally:
        driver.quit()

if __name__ == "__main__":
    extraire_donnees_match()
   