import random
import time
import os
import tkinter as tk
from tkinter import ttk
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from twocaptcha import TwoCaptcha
import undetected_chromedriver as uc
from selenium.webdriver.common.action_chains import ActionChains


# Initialize 2Captcha solver with your API key
solver = TwoCaptcha('6f6adfd9bc748bf827dc270f0f975818')

# Function to randomize delays for human-like behavior
def random_delay(min_time=2, max_time=5):
    time.sleep(random.uniform(min_time, max_time))

# Function to simulate human-like mouse click behavior
def human_click(element, driver):
    action = ActionChains(driver)
    action.move_to_element(element).perform()
    random_delay()
    element.click()

# Function to initialize the WebDriver with user profile and stealth settings
def initialize_driver():
    chrome_options = Options()
    chrome_options.add_argument(r"--user-data-dir=C:\Users\Dream\AppData\Local\Google\Chrome\User Data\Default")
    chrome_options.add_argument("user-agent=Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36")

    # Use undetected-chromedriver to avoid bot detection
    driver = uc.Chrome(options=chrome_options)

    return driver

def solve_recaptcha(driver, sitekey, url):
    try:
        # Send CAPTCHA request to 2Captcha
        result = solver.recaptcha(sitekey=sitekey, url=url)
        token = result['code']
        print(f"Solved reCAPTCHA token: {token}")
        return token
    except Exception as e:
        print(f"Error solving reCAPTCHA: {e}")
        return None

# Function to handle login with email, password, and CAPTCHA
def handle_login(driver, email, password):
    # Handle reCAPTCHA (if checkbox type) by extracting sitekey and solving it
    try:
        # Check for reCAPTCHA presence by finding its iframe
        recaptcha_iframe = WebDriverWait(driver, 20).until(
            EC.presence_of_element_located((By.XPATH, "//iframe[contains(@src, 'recaptcha')]"))
        )
        print("reCAPTCHA iframe detected.")

        # Switch to the reCAPTCHA iframe to get the sitekey
        driver.switch_to.frame(recaptcha_iframe)
        sitekey_element = driver.find_element(By.XPATH, "//div[@class='g-recaptcha']")
        sitekey = sitekey_element.get_attribute('data-sitekey')

        # Solve the reCAPTCHA using 2Captcha
        captcha_solution = solve_recaptcha(driver, sitekey, driver.current_url)
        if captcha_solution:
            # Inject the CAPTCHA token back into the form
            driver.execute_script(f"document.getElementById('g-recaptcha-response').innerHTML = '{captcha_solution}';")
            print(f"reCAPTCHA token injected: {captcha_solution}")

            # Switch back to the default content
            driver.switch_to.default_content()

            # Click the login/submit button after CAPTCHA is solved
            login_button = WebDriverWait(driver, 20).until(
                EC.element_to_be_clickable((By.XPATH, "//button[@type='submit']"))
            )
            human_click(login_button, driver)
            print("Login button clicked after solving reCAPTCHA.")
        else:
            print("Failed to solve reCAPTCHA.")
            return False
    except Exception as e:
        print(f"No reCAPTCHA found, proceeding: {e}")
    try:
        # Wait for email input field (Angular form)
        email_input = WebDriverWait(driver, 20).until(
            EC.visibility_of_element_located((By.XPATH, "//input[@formcontrolname='username']"))
        )
        print(email_input)
        email_input.clear()
        email_input.send_keys(email)
        print(f"Entered email: {email}")

        # Wait for password input field (Angular form)
        password_input = WebDriverWait(driver, 20).until(
            EC.visibility_of_element_located((By.XPATH, "//input[@formcontrolname='password']"))
        )
        password_input.clear()
        password_input.send_keys(password)
        print("Entered password")

        # Wait for the login button and click it
        login_button = WebDriverWait(driver, 20).until(
            EC.element_to_be_clickable((By.XPATH, "//button[@type='submit']"))
        )
        login_button.click()
        print("Login button clicked.")
    except Exception as e:
        print(f"Error during login process: {e}")
        return False


    return True

# Function to automate the entire booking process
def automate_booking(email, password, country, destination):
    driver = initialize_driver()  # Initialize WebDriver with stealth settings
    email = email.get()  # Get email from input field
    password = password.get()  # Get password from input field
    country_of_origin = country.get()  # From Tkinter input
    destination_country = destination.get()  # From Tkinter input
    
    try:
        # Open the VFS Global booking page
        driver.get("https://www.vfsglobal.com/en/individuals/index.html")
        random_delay()

        # Handle cookie consent
        try:
            cookie_button = WebDriverWait(driver, 10).until(
                EC.element_to_be_clickable((By.ID, "onetrust-accept-btn-handler"))
            )
            human_click(cookie_button, driver)
            print("Cookie consent accepted.")
        except Exception as e:
            print(f"Cookie consent not found or already clicked: {e}")

        random_delay()


        # Input country of origin
        country_input = WebDriverWait(driver, 10).until(
            EC.visibility_of_element_located((By.XPATH, "//input[@placeholder='Select Country / Region']"))
        )
        country_input.clear()
        country_input.send_keys(country_of_origin)
        random_delay()
        country_input.send_keys(Keys.ARROW_DOWN)
        country_input.send_keys(Keys.RETURN)
        print(f"Selected country of origin: {country_of_origin}")

        random_delay()

        # Input destination country
        destination_input = WebDriverWait(driver, 10).until(
            EC.visibility_of_element_located((By.XPATH, "//input[@placeholder='Select Country']"))
        )
        destination_input.clear()
        destination_input.send_keys(destination_country)
        random_delay()
        destination_input.send_keys(Keys.ARROW_DOWN)
        destination_input.send_keys(Keys.RETURN)
        print(f"Selected destination country: {destination_country}")

        random_delay()

        # Click the submit button to proceed
        submit_button = WebDriverWait(driver, 10).until(
            EC.element_to_be_clickable((By.XPATH, "//div[@class='button_link_wrapper']/a"))
        )
        human_click(submit_button, driver)
        print("Submit button clicked.")

        random_delay()

        # Close the original window and switch to the newly opened tab
        driver.close()
        driver.switch_to.window(driver.window_handles[-1])

        
        try:
            book_now_button = WebDriverWait(driver, 20).until(
                EC.element_to_be_clickable((By.XPATH, "//a[contains(@class, 'cta-link navigate-btn btn-first clearfix d-flex acces-color')]//span[text()='Book now']"))
            )
            human_click(book_now_button, driver)
            print("Clicked on the 'Book now' button.")
            try:
                # Adjust the selector based on the actual button
                second_button = WebDriverWait(driver, 20).until(
                    EC.element_to_be_clickable((By.XPATH, "//a[contains(@class, 'lets-get-started') and text()='Book now']"))
                )
                driver.execute_script("arguments[0].click();", second_button)
                print("Clicked on the second button successfully!")
                
                if handle_login(driver, email, password):
                    print("Logged in successfully!")
                else:
                    print("Login failed or CAPTCHA could not be solved.")

            except Exception as e:
                print("Notification window appeared.")
        except Exception as e:
            print(f"Error clicking the 'Book now' button: {e}")
    except Exception as e:
        print(f"Error during automation: {e}")

def main():
    root = create_ui(automate_booking)
    root.mainloop()
if __name__ == "__main__":
    main()